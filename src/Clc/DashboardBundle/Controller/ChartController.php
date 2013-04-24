<?php
// src/Clc/DashboardBundle/Controller/ChartController.php

namespace Clc\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ChartController extends Controller
{
    public function displayBarChartAction($balances)
    {
        $balancesArray = $balances->toArray();
        
        $new_balances =array();
        
        foreach ($balancesArray as $key => $value) {
            $new_balances[] = array($key, $value);
        }
        
        return $this->render('ClcExpensemanagerBundle:Chart:balanceBarChart.html.twig', array(
            'balances' => $balances
        ));
    }
}