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
            'forme_expense'=> $this->getForMeAction(),
            'balances' => $this->getBalancesAction(),
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
        return $coloc_expenses = $this->getUser()->getColoc()->getExpenses();
    }
    
    public function getMineAction()
    {
        return $my_expenses = $this->getUser()->getMyExpenses();
    }
    
    public function getForMeAction()
    {
        return $forme_expenses = $this->getUser()->getForMeExpenses(); 
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
    
    public function getBalancesAction()
    {
        $coloc = $this->getUser()->getColoc();
        $users = $coloc->getUsers();
        $balances = new \Doctrine\Common\Collections\ArrayCollection;
        
        foreach ($users as $u){
            $balance = $u->getBalance();
            $name = $u->getUsername();
            $balances[$name] = $balance;
        }
        
        return $balances;
    }
}