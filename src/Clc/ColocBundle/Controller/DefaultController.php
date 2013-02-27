<?php

namespace Clc\ColocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ClcColocBundle:Default:index.html.twig', array('name' => $name));
    }
}
