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

    public function investorsAction()
    {
        return $this->render('ClcWelcomeBundle:Links:investors.html.twig');
    }

    public function mediaAction()
    {
        return $this->render('ClcWelcomeBundle:Links:media.html.twig');
    }

    public function setLocaleAction($locale)
    {
        $this->get('session')->set('_locale', $locale);
        $invitation_token = $this->get('session')->get('invitation_token');
        $route = $this->get('request')->get('route');

        return $this->redirect($this->generateUrl($route, array('_locale' => $locale, 'invitation_token' => $invitation_token)));
    }

    public function invitationAction($invitation_token)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $coloc = $em ->getRepository('ClcColocBundle:coloc')
                     ->findOneByInvitationToken($invitation_token);

        if(!$coloc){
            throw $this->createNotFoundException('The invitation token is not correct');
        }else{
            $session =$this->getRequest()->getSession();
            $session->set('invitation_id', $coloc->getId());
            $session->set('invitation_token', $invitation_token);

            return $this->render('ClcWelcomeBundle:Invitation:invitation-register.html.twig');
        }  
    }
}
