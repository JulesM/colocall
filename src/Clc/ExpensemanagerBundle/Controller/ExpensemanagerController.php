<?php
// src/Clc/ExpensemanagerBundle/Controller/ExpensemanagerController.php

namespace Clc\ExpensemanagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Clc\ExpensemanagerBundle\Entity\expense;
use Clc\ExpensemanagerBundle\Entity\payback;
use Clc\UserBundle\Entity\UserRepository;

class ExpensemanagerController extends Controller
{
    public function indexAction()
    { 
        return $this->render('ClcExpensemanagerBundle::layout.html.twig', array(
            'coloc_expense' => $this->getByColocAction(),
            'user_expense'  => $this->getMineAction(),
            'forme_expense' => $this->getForMeAction(),
            'balances'      => $this->getActiveBalancesAction(),
            'payback'       => $this->getPaybackAction(),
            'last_payback'  => $this->getLastPaybackAction(),
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
        foreach($coloc->getUsers() as $u){
            $expense->addUser($u);
        }
        $expense->setAddedDate(new \DateTime('now'));
        $expense->setDate(new \DateTime('today'));
        
        $usersQuery = function(\Clc\UserBundle\Entity\UserRepository $ur) use ($coloc)
                    {
                    return $ur->createQueryBuilder('u')
                              ->where('u.coloc = :coloc and u.enabled = :enabled')
                              ->setParameters(array('coloc' => $coloc, 'enabled' => 1))
                              ->orderBy('u.nickname', 'ASC');
                    };
        
        $form = $this->createFormBuilder($expense)
                     ->add('owner', 'entity', array(
                            'class'         => 'ClcUserBundle:User', 
                            'property'      => 'nickname',
                            'query_builder' => $usersQuery,
                            ))
                     ->add('name', 'text')
                     ->add('amount', 'money', array(
                            'currency' => $coloc->getCurrency()->getISO(),
                            ))
                     ->add('date', 'date', array(
                            'input'    => 'datetime',
                            'widget'   => 'choice',
                            ))
                     ->add('users', 'entity', array(
                            'class'         => 'ClcUserBundle:User',
                            'property'      => 'nickname',
                            'query_builder' => $usersQuery,
                            'multiple'      => 'true',
                            'expanded'      => 'true',
                            'required'      => 'true',
                            ))
                     ->getForm();
        
        $request = $this->get('request');

        if ($request->isMethod('POST')) {
            
            $form->bind($request);

            if ($form->isValid() and count($form->get('users')->getData()) > 0) {
                    
                $em = $this->getDoctrine()->getManager();
                $em->persist($expense);
                $em->flush();
                
                $url = $this->getRequest()->headers->get("referer");
                return $this->redirect($url);
            }
            
            $url = $this->getRequest()->headers->get("referer");
            return $this->redirect($url);
        }
                
        return $this->render('ClcExpensemanagerBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function editAction($id)
    {
        $user = $this->getUser();
        $coloc = $user->getColoc();
        
        $em = $this->getDoctrine()->getEntityManager();
        $expense = $em->getRepository('ClcExpensemanagerBundle:expense')->find($id);
        
        $usersQuery = function(\Clc\UserBundle\Entity\UserRepository $ur) use ($coloc)
                    {
                    return $ur->createQueryBuilder('u')
                              ->where('u.coloc = :coloc and u.enabled = :enabled')
                              ->setParameters(array('coloc' => $coloc, 'enabled' => 1))
                              ->orderBy('u.nickname', 'ASC');
                    };
        
        $form = $this->createFormBuilder($expense)
                     ->add('owner', 'entity', array(
                            'class'         => 'ClcUserBundle:User', 
                            'property'      => 'nickname',
                            'query_builder' => $usersQuery,
                            ))
                     ->add('name', 'text')
                     ->add('amount', 'money', array(
                            'currency' => $coloc->getCurrency()->getISO(),
                            ))
                     ->add('date', 'date', array(
                            'input'    => 'datetime',
                            'widget'   => 'choice',
                            ))
                     ->add('users', 'entity', array(
                            'class'         => 'ClcUserBundle:User',
                            'property'      => 'nickname',
                            'query_builder' => $usersQuery,
                            'multiple'      => 'true',
                            'expanded'      => 'true',
                            'required'      => 'true',
                            ))
                     ->getForm();
        
        $request = $this->get('request');

        if ($request->isMethod('POST')) {
            
            $form->bind($request);

            if ($form->isValid() and count($form->get('users')->getData()) > 0) {
                    
                $em->flush();
                
                $url = $this->get('router')->generate('clc_expensemanager_homepage');
                return $this->redirect($url);
            }
        }
                
        return $this->render('ClcExpensemanagerBundle:Default:edit.html.twig', array(
            'form' => $form->createView(),
            'id'   => $id,
        ));
    }
    
    public function getByColocAction()
    {
        $coloc_expenses_collection = $this->getUser()->getColoc()->getExpenses();
        $coloc_expenses = $coloc_expenses_collection->toArray();
        
        $pb = $this->container->get('clc_expensemanager.payback');
        $coloc_expenses_sorted = $pb->sortExpensesByDate($coloc_expenses);
        
        return $coloc_expenses_sorted;
    }
    
    public function getMineAction()
    {
        $my_expenses_collection = $this->getUser()->getMyExpenses();
        $my_expenses = $my_expenses_collection->toArray();
        
        $pb = $this->container->get('clc_expensemanager.payback');
        $my_expenses_sorted = $pb->sortExpensesByDate($my_expenses);
        
        return $my_expenses_sorted;
    }
    
    public function getForMeAction()
    {
        $forme_expenses_collection = $this->getUser()->getForMeExpenses();
        $forme_expenses = $forme_expenses_collection->toArray();
        
        $pb = $this->container->get('clc_expensemanager.payback');
        $forme_expenses_sorted = $pb->sortExpensesByDate($forme_expenses);
        
        return $forme_expenses_sorted;
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
    
    public function getActiveBalancesAction()
    {
        $coloc = $this->getUser()->getColoc();
        $bal = $this->container->get('clc_user.balance');
        
        return $bal->getActiveBalances($coloc);
    }
    
    public function getPaybackAction()
    {
        $user = $this->getUser(); 
        $coloc = $user->getColoc();
        $payback = new payback();
        $payback->setColoc($coloc);
        $payback->setAuthor($user);
        $payback->setDate(new \Datetime('now'));
        
        $bal = $this->container->get('clc_user.balance');
        $activeBalances = $bal->getActiveBalances($coloc);
        
        $pb = $this->container->get('clc_expensemanager.payback');
        $payments = $pb->getPayback($coloc, $activeBalances);
        
        $payback->setPaymentsArray($payments);

        return $payback;
    }

    public function applyPaybackAction()
    {   
        $user = $this->getUser();
        $coloc = $user->getColoc();
        $payback = $this->getPaybackAction();

        $pb = $this->container->get('clc_expensemanager.payback');
        $pb->applyPayback($coloc);

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($payback);
        $em->flush();

        $users= $coloc->getUsers();
        $mailer = $this->get('mailer');
        foreach($users as $recipient) {
            $message = \Swift_Message::newInstance();
            $message->setSubject('Payback on Coloc\'all !')
                    ->setFrom(array('noreply@colocall.co' => 'Coloc\'all'))
                    ->setTo($recipient->getEmail())
                    ->setBody($this->renderView('ClcExpensemanagerBundle:Default:paybackEmail.html.twig', array(
                                                'recipient' => $recipient, 
                                                'payback' => $payback)
                                                ),
                                             'text/html');
            $mailer->send($message);
        }

        $url = $this->getRequest()->headers->get("referer");
        return $this->redirect($url); 
    }
    
    public function getLastPaybackAction()
    {
        $coloc = $this->getUser()->getColoc();
        
        $paybacks = $coloc->getPaybacks();
        
        return $paybacks[sizeof($paybacks)-1];
    }
}