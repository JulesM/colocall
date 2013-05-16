<?php
// src/Clc/DashboardBundle/Controller/DashboardController.php

namespace Clc\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
        $coloc = $user->getColoc();
        $picture = $user->getPicture();

        if ($picture == null){
            //Adding default picture
            $em = $this->container->get('doctrine.orm.entity_manager');
            $picture = $em ->getRepository('ClcUserBundle:profilepicture')
                           ->find(1);
            
            $user->setPicture($picture);
            $em->persist($user);
            $em->flush();
        }

        $path = $user->getPicture()->getPath();
        $this->container->get('request')->getSession()->set('path', $path);
        
        if ($coloc == null) {
            return $this->render('ClcDashboardBundle:JoinColoc:noInvitation.html.twig');
        }
        
        else {
            return $this->render('ClcDashboardBundle::layout.html.twig', array(
            'current_balances' => $this->getCurrentBalancesAction(),
            'latest_expenses'  => $this->getLatestExpensesAction(),
            'my_todos'         => $this->getMyTodosAction(),
            'shopping_list'    => $this->getShoppingListAction(0),
        ));
        }
    }
    
    private function getCurrentBalancesAction()
    {
        $coloc = $this->getUser()->getColoc();
        $bal = $this->container->get('clc_user.balance');
        
        return $bal->getActiveBalances($coloc);
    }
    
    private function getLatestExpensesAction()
    {
        $user = $this->getUser();
        $my_expenses = $this->getUser()->getMyExpenses()->toArray();
        $forme_expenses = $this->getUser()->getForMeExpenses()->toArray();
        
        $latest_expenses = $my_expenses;
        
        foreach($forme_expenses as $expense) {
            if ($expense->getOwner() == $user){
            } else {
                $latest_expenses[] = $expense;
            } 
        }
        
        $pb = $this->container->get('clc_expensemanager.payback');
        $latest_expenses_sorted = $pb->sortExpensesByDate($latest_expenses);
        
        return $latest_expenses_sorted;
    }
    
    private function getMyTodosAction()
    {
        $user = $this->getUser();
        $coloc = $user->getColoc();
        
        $td = $this->container->get('clc_todos.todos');
        $task_list = $td->getByColoc($coloc, 0);
        
        $my_task_list = array();

        foreach ($task_list as $task){
            if ($task->getOwner() == $user or $task->getOwner() == null){
                $my_task_list[] = $task;
            }else{
            }
        }

        return $my_task_list;
    }
    
    private function getShoppingListAction($state)
    {
        $coloc = $this->getUser()->getColoc();
        
        $sl = $this->container->get('clc_shoppinglist.shoppinglist');
        $item_list = $sl->getByColoc($coloc, $state);
        
        return $item_list;
    }
}
