<?php

namespace Clc\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ClcEventBundle:Default:index.html.twig', array('name' => $name));
    }
}
