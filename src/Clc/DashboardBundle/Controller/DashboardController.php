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
        $invitations = $this->container->get('clc_dashboard.invitation')->getInvitations($user);
        $path = $user->getPicture()->getPath();
        $this->container->get('request')->getSession()->set('path', $path);
        
        if ($coloc == null) {
            if ($invitations == null) {
                return $this->render('ClcDashboardBundle:JoinColoc:createcoloc.html.twig');
            }
            else {
                return $this->render('ClcDashboardBundle:JoinColoc:invitation.html.twig', array(
                    'invitations' => $invitations,
                ));
            }
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
        $my_expenses_collection = $this->getUser()->getMyExpenses();
        $my_expenses = $my_expenses_collection->toArray();
        
        $forme_expenses_collection = $this->getUser()->getForMeExpenses();
        $forme_expenses = $forme_expenses_collection->toArray();
        
        $latest_expenses = array_merge($my_expenses, $forme_expenses);
        
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
