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
        $path = $user->getPicture()->getPath();
        $this->container->get('request')->getSession()->set('path', $path);
        
        if ($coloc == null) {
            return $this->render('ClcDashboardBundle:JoinColoc:noInvitation.html.twig');
        }
        
        else {
            return $this->render('ClcDashboardBundle::layout.html.twig', array(
            'current_balances' => $this->getCurrentBalancesAction(),
            'latest_expenses'  => $this->getLatestExpensesAction(),
            'my_todos'         => $this->getMyTodosAction(0),
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
    
    private function getMyTodosAction($state)
    {
        $user = $this->getUser();
        
        $td = $this->container->get('clc_todos.todos');
        $task_list = $td->getMine($user, $state);
        
        return $task_list;
    }
    
    private function getShoppingListAction($state)
    {
        $coloc = $this->getUser()->getColoc();
        
        $sl = $this->container->get('clc_shoppinglist.shoppinglist');
        $item_list = $sl->getByColoc($coloc, $state);
        
        return $item_list;
    }
}
