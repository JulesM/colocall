<?php

namespace Clc\ParametersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ParametersController extends Controller
{
    public function indexAction()
    {
        return $this->render('ClcParametersBundle::layout.html.twig');
    }
}
