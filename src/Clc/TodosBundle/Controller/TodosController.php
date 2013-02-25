<?php
// src/Clc/TodosBundle/Controller/ShoppinglistController.php

namespace Clc\TodosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TodosController extends Controller
{
    public function indexAction()
    {
        return $this->render('ClcTodosBundle::layout.html.twig');
    }
}
