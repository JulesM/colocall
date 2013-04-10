<?php

namespace Clc\ColocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Clc\ColocBundle\Form\Type\ColocType;
use Clc\ColocBundle\Entity\coloc;
use Clc\ColocBundle\Entity\invitation;

class ColocController extends Controller
{
    public function indexAction()
    {
        return $this->render('ClcColocBundle::layout.html.twig', array(
            'users'       => $this->getUser()->getColoc()->getUsers(),
            'invitations' => $this->getUser()->getColoc()->getInvitations()
        ));
    }
    
    public function newAction()
    {
        $coloc = new coloc();
        $coloc->setDate(new \Datetime('today'));
        $this->getUser()->setColoc($coloc);
        
        $form = $this->createForm(new ColocType, $coloc);
        
        $request = $this->get('request');
        
        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($coloc);
                $em->flush();
                
                $url = $this->get('router')->generate('clc_dashboard_homepage');
                return $this->redirect($url);
            }
        }
                
        return $this->render('ClcColocBundle:Creation:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function sendInvitationAction()
    {
        $user = $this->getUser();
        $coloc = $user->getColoc();
        
        $invitation = new invitation();
        $invitation->setAuthor($user);
        $invitation->setColoc($coloc);
        $invitation->setDate(new \DateTime('today'));
        
        $form = $this->createFormBuilder($invitation)
                     ->add('email', 'email')         
                     ->getForm();
        
        $request = $this->get('request');

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($invitation);
                $em->flush();
                
                $url = $this->getRequest()->headers->get("referer");
                return $this->redirect($url);
            }
        }
        
        return $this->render('ClcColocBundle:Invitation:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
