<?php
// src/Clc/DashboardBundle/Controller/DashboardController.php

namespace Clc\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    public function indexAction()
    {
        return $this->render('ClcDashboardBundle::layout.html.twig');
    }
    
    public function profileAction()
    {
        return $this->render('ClcDashboardBundle:default:profile.html.twig');
    }
}
