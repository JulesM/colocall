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
        return $this->redirect($this->generateUrl('clc_welcome_login' ,array('_locale'=>$locale)));
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

            return $this->render('ClcWelcomeBundle:Invitation:invitation-register.html.twig');
        }  
    }
}
