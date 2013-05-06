<?php

namespace Clc\WelcomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends Controller
{
    public function loginAction()
    {
        return $this->render('ClcWelcomeBundle:Links:login.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('ClcWelcomeBundle:Links:about.html.twig');
    }

    public function registerAction()
    {
        return $this->render('ClcWelcomeBundle:Links:register.html.twig');
    }

    public function howAction()
    {
        return $this->render('ClcWelcomeBundle:Links:how.html.twig');
    }
}
