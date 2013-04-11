<?php
//src/Clc/UserBundle/Services/Balance.php

namespace Clc\UserBundle\Services;

class Balance {
    
    public function getBalances($coloc)
    {
        $users = $coloc->getUsers();
        $balances = new \Doctrine\Common\Collections\ArrayCollection;
        
        foreach ($users as $u){
            $balance = $this->getBalance($u);
            $nickname = $u->getNickname();
            $balances[$nickname] = $balance;
        }
        
        return $balances;
    }

    public function getBalance($user)
    {
        return $balance = $this->getTotalSpent($user) - $this->getTotalSpentForMe($user);
    }
    
    public function getTotalSpent($user)
    {
        $myExpenses = $user->getMyExpenses();
        
        $totalSpent = 0;
        foreach($myExpenses as $expense){
            $totalSpent += $expense->getAmount();
        }
        
        return $totalSpent;  
    }
    
    public function getTotalSpentForMe($user)
    {
        $ForMeExpenses = $user->getForMeExpenses();
        
        $totalSpentForMe = 0;
        foreach($ForMeExpenses as $expense){
            $totalSpentForMe +=  floor($expense->getAmount()/$expense->getNumber()*100)/100;
        }
        
        return $totalSpentForMe;
    }
    
    public function getActiveBalances($coloc)
    {
        $users = $coloc->getUsers();
        $activeBalances = new \Doctrine\Common\Collections\ArrayCollection;
        
        foreach ($users as $u){
            $activeBalance = $this->getActiveBalance($u);
            $nickname = $u->getNickname();
            $activeBalances[$nickname] = $activeBalance;
        }
        
        return $activeBalances;
    }
    
    public function getActiveBalance($user)
    {
        return $activeBalance = $this->getActiveTotalSpent($user) - $this->getActiveTotalSpentForMe($user);
    }
    
    public function getActiveTotalSpent($user)
    {        
        $activeTotalSpent = 0;
        foreach($user->getMyExpenses() as $expense){
            $activeTotalSpent += $expense->getAmount()*$expense->getActive();
        }
        
        return $activeTotalSpent;  
    }
    
    public function getActiveTotalSpentForMe($user)
    {   
        $activeTotalSpentForMe = 0;
        foreach($user->getForMeExpenses() as $expense){
            $activeTotalSpentForMe += floor(($expense->getAmount()/$expense->getNumber())*$expense->getActive()*100)/100;
        }
        
        return $activeTotalSpentForMe;
    }
    
}

?>
