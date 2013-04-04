<?php
// src/Clc/DashboardBundle/Controller/DashboardController.php

namespace Clc\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    public function indexAction()
    {
        return $this->render('ClcDashboardBundle::layout.html.twig', array(
            'current_balances' => $this->getCurrentBalancesAction(),
            'latest_expenses'  => $this->getLatestExpensesAction(),
            'my_todos'         => $this->getMyTodosAction(0),
            'shopping_list'    => $this->getShoppingListAction(0),
        ));
    }
    
    private function getCurrentBalancesAction()
    {
        $coloc = $this->getUser()->getColoc();
        $bal = $this->container->get('clc_user.balance');
        
        return $bal->getActiveBalances($coloc);
    }
    
    private function getLatestExpensesAction()
    {
        $my_expenses_collection = $this->getUser()->getMyExpenses();
        $my_expenses = $my_expenses_collection->toArray();
        
        $pb = $this->container->get('clc_expensemanager.payback');
        $my_expenses_sorted = $pb->sortExpensesByDate($my_expenses);
        
        return $my_expenses_sorted;
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
