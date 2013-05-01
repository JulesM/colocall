<?php
// src/Clc/DashboardBundle/Controller/RegisterController.php

namespace Clc\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    public function createFlatshareAction()
    {
        return $this->render('ClcDashboardBundle:JoinColoc:createFlatshare.html.twig');
    }

    public function inviteFlatmatesAction()
    {
        return $this->render('ClcDashboardBundle:JoinColoc:inviteFlatmates.html.twig', array(
            'invitations' => $this->getUser()->getColoc()->getInvitations()
        ));
    }

    public function finishRegisterAction()
    {
        return $this->render('ClcDashboardBundle:JoinColoc:finishRegister.html.twig');
    }

}