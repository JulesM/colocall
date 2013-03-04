<?php

namespace Clc\InboxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ClcDashboardBundle::layout.html.twig');
    }
}
