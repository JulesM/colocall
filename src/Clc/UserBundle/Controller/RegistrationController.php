<?php
// src/Clc/UserBundle/Controller/RegistrationController.php

namespace Clc\UserBundle\Controller;

use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;

class RegistrationController extends BaseController
{
    public function registerAction()
    {
        $form = $this->container->get('fos_user.registration.form');
        $formHandler = $this->container->get('fos_user.registration.form.handler');
        $confirmationEnabled = $this->container->getParameter('fos_user.registration.confirmation.enabled');

        $process = $formHandler->process($confirmationEnabled);
        if ($process) {
            $user = $form->getData();

            //Adding coloc if invitation detected
            $invitation_id = $this->container->get('request')->getSession()->get('invitation_id');

            if ($invitation_id != null) {
                $em = $this->container->get('doctrine.orm.entity_manager');
                $coloc = $em ->getRepository('ClcColocBundle:coloc')
                               ->find($invitation_id);
                
                $user->setColoc($coloc);
                $em->persist($user);
                $em->flush();
            }

            $authUser = false;
            if ($confirmationEnabled) {
                $this->container->get('session')->set('fos_user_send_confirmation_email/email', $user->getEmail());
                $route = 'fos_user_registration_check_email';
            } else {
                $authUser = true;
                $route = 'fos_user_registration_confirmed';
            }

            $this->setFlash('fos_user_success', 'registration.flash.user_created');
            $url = $this->container->get('router')->generate($route);
            $response = new RedirectResponse($url);

            if ($authUser) {
                $this->authenticateUser($user, $response);
            }

            return $response;
        }

        return $this->container->get('templating')->renderResponse('FOSUserBundle:Registration:register.html.'.$this->getEngine(), array(
            'form' => $form->createView(),
        ));
    }

    /**
     * Tell the user his account is now confirmed
     */
    public function confirmedAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        
        //Adding default picture
        $em = $this->container->get('doctrine.orm.entity_manager');
        $picture = $em ->getRepository('ClcUserBundle:profilepicture')
                       ->find(1);
        
        $user->setPicture($picture);
        $em->persist($user);
        $em->flush();
        
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        
        $route = 'clc_dashboard_homepage';
        $url = $this->container->get('router')->generate($route);
        $response = new RedirectResponse($url);
        return $response;
    }
}