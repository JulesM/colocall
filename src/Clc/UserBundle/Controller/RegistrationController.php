<?php
// src/Clc/UserBundle/Controller/RegistrationController.php

namespace Clc\UserBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\RegistrationController as BaseController;


class RegistrationController extends BaseController
{
    public function registerFormAction()
    {
        $form = $this->container->get('fos_user.registration.form');
        
        return $this->container
                    ->get('templating')
                    ->renderResponse('FOSUserBundle:Registration:register_content.html.twig', 
                            array('form' => $form->createView())
                            );
    }
    
}
