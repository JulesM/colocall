<?php
// src/Clc/ExpensemanagerBundle/Controller/ExpensemanagerController.php

namespace Clc\ExpensemanagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Clc\ExpensemanagerBundle\Entity\expense;

class ExpensemanagerController extends Controller
{
    public function indexAction()
    { 
        return $this->render('ClcExpensemanagerBundle::layout.html.twig', array(
            'coloc_expense'=> $this->getByColocAction(),
            'user_expense'=> $this->getMineAction(),
        ));
    }
    
    public function newAction()
    {
        $user = $this->getUser();
        $coloc = $user->getColoc();
        
        $expense = new expense();
        $expense->setAuthor($user);
        $expense->setOwner($user);
        $expense->setColoc($coloc);
        $expense->setName('test');
        $expense->setAmount(1000);
        $expense->setAddedDate(new \DateTime('today'));
        $expense->setDate(new \DateTime('today'));
        $expense->setState(0);
        
        $form = $this->createFormBuilder($expense)
                     ->add('owner', 'entity', array(
                            'class'=>'ClcUserBundle:User', 
                            'property'=>'username',
                          ))
                     ->add('name', 'text')
                     ->add('amount', 'integer')
                     ->add('users', 'entity', array(
                            'class'=>'ClcUserBundle:User', 
                            'property'=>'username',
                            'multiple' => 'true',
                            'expanded' => 'true',
                          ))
                     ->getForm();
        
        $request = $this->get('request');

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($expense);
                $em->flush();
                
                $url = $this->getRequest()->headers->get("referer");
                return $this->redirect($url);
            }
        }
                
        return $this->render('ClcExpensemanagerBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function getByColocAction()
    {
        $user = $this->getUser();
        $coloc = $user->getColoc();
        $em = $this->getDoctrine()->getEntityManager();
        
        $query = $em->createquery(
            'SELECT e FROM ClcExpensemanagerBundle:expense e WHERE e.coloc = :coloc ORDER BY e.date ASC'
                                 );
        
        $query->setParameter('coloc', $coloc);
        
        $coloc_expense=$query->getResult();
        
        return $coloc_expense;
    }
    
    public function getMineAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getEntitymanager();
        
        $query = $em->createquery(
                'SELECT e FROM ClcExpensemanagerBundle:expense e WHERE e.owner = :user ORDER BY e.date ASC'
                );
        
        $query->setParameter('user', $user);
        
        $user_expense = $query->getResult();
        
        return $user_expense;
    }
    
    public function getForMeAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getEntitymanager();
        
        $query = $em->createquery(
                'SELECT e FROM ClcExpensemanagerBundle:expense e WHERE e.users = :user ORDER BY e.date ASC'
                );
        
        $query->setParameter('user', $user);
        
        $forme_expense = $query->getResult();
        
        return $forme_expense;
    }
    
    public function removeAction($id)
    {
        $em = $this->getDoctrine()
                   ->getEntityManager();
        
        $expense = $em->getRepository('ClcExpensemanagerBundle:expense')
                   ->find($id);
          
        $em->remove($expense);
        $em->flush();

        $url = $this->getRequest()->headers->get("referer");
        return $this->redirect($url);
    }
}
