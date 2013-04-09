<?php
// src/Clc/UserBundle/Controller/UserController.php

namespace Clc\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function welcomeAction()
    {
        return $this->render('ClcUserBundle::welcome.html.twig');
    }
}