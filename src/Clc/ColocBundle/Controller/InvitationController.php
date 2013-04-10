<?php
// src/Clc/ColocBundle/Controller/InvitationController.php

namespace Clc\ColocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Clc\ColocBundle\Entity\invitation;

class InvitationController extends Controller
{
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
    
    public function acceptInvitationAction($id)
    {
        $invitation = $this->getDoctrine()
                           ->getRepository('ClcColocBundle:invitation')
                           ->find($id);
        
        //find user by email (créer la fonction dans user repository ?)
        //user->setcoloc(author->getcoloc());
        //remove(invitation)
    }
}
