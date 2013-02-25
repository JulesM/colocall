<?php
// src/Clc/ExpensemanagerBundle/Controller/ExpensemanagerController.php

namespace Clc\ExpensemanagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ExpensemanagerController extends Controller
{
    public function indexAction()
    {
        return $this->render('ClcExpensemanagerBundle::layout.html.twig');   
    }
}
