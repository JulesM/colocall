<?php
// src/Clc/ShoppinglistBundle/Controller/ShoppinglistController.php

namespace Clc\ShoppinglistBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ShoppinglistController extends Controller
{
    public function indexAction()
    {
        return $this->render('ClcShoppinglistBundle::layout.html.twig');
    }
}
