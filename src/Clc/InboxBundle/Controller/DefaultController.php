<?php

namespace Clc\InboxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ClcInboxBundle:Default:index.html.twig', array('name' => $name));
    }
}
