<?php
//src/Clc/ExpensemanagerBundle/Services/Payback.php

namespace Clc\ExpensemanagerBundle\Services;

class Payback {
    
    public function getPayback($coloc, $activeBalances)
    {
        $payments = array();
        $positive = array();
        $negative = array();
        
        foreach($activeBalances as $key => $value) {
            
            if ($value > 0) {
                $positive[$key] = $value;
            }
            
            elseif ($value < 0) {
                $negative[$key] = $value;
            }
            
            else {}
        }
        
        foreach ($positive as $key1 => &$value1) {
            foreach ($negative as $key2 => &$value2) {
                if ($value1 == -$value2) {
                    $payments[] = array($key2, $value1, $key1);
                    $positive[$key1] = 0;
                    $negative[$key2] = 0;
                }
            }
        }
        
        $a = $positive;
        arsort($a);
        $b = $negative;
        asort($b);
        
        if (current($a) < 0.1) { $continue = false; } else { $continue = true; }
        
        while ($continue) {
            
            reset($a);
            reset($b);
            
            $ca = current($a);
            $cb = current($b);
            $ka = key($a);
            $kb = key($b);
            $min = min($ca,-$cb);
            
            $payments[] = array($kb, $min, $ka);
            
            $a[$ka] -= $min;
            $b[$kb] += $min;
            
            arsort($a);
            asort($b);
            reset($a);
            reset($b);
            
            if (current($a) < 0.1) {$continue = false;} else {$continue = true;}
        }

        return $payments;
    }

    public function applyPayback($coloc)
    {   
        $activeExpenses = $coloc->getExpenses();
        
        foreach($activeExpenses as $expense) {
            $expense->setActive(false);
        }
        
        return true;
    }
    
    public function sortExpensesByDate($array)
    {
        uasort($array, array($this,'cmp'));
        return $array;
    }
    
    function cmp($a, $b) {
            $da=$a->getDate();
            $db=$b->getDate();        
            if ($da == $db) {return 0;}
            elseif ($da < $db) {return 1;}
            else {return -1;}   
            }
}

?>
