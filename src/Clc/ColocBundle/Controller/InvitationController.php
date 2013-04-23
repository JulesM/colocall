<?php
// src/Clc/ColocBundle/Controller/InvitationController.php

namespace Clc\ColocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Clc\ColocBundle\Entity\invitation;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\RedirectResponse;

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
                
                $message = \Swift_Message::newInstance()
                    ->setSubject('Tou received an invitation to use Coloc\'all')
                    ->setFrom('webmaster@colocall.co')
                    ->setTo($invitation->getEmail())
                    ->setBody($this->renderView('ClcColocBundle:Invitation:invitationEmail.html.twig', array('sender' => $user)))
                ;
                $this->get('mailer')->send($message);
                
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
        $d = $this->getDoctrine();
        
        $invitation = $d->getRepository('ClcColocBundle:invitation')
                        ->find($id);
        
        $repository = $d->getRepository('ClcUserBundle:User');
        $user = $repository->findOneBy(array('email' => $invitation->getEmail()));
        
        if ($user == $this->getUser()) {
        
            $user->setColoc($invitation->getAuthor()->getColoc());
        
            $em = $d->getEntityManager();
            $em->persist($user);
            $em->remove($invitation);
            $em->flush();
            
            $route = 'clc_dashboard_homepage';
            $url = $this->container->get('router')->generate($route);
            $response = new RedirectResponse($url);
            return $response;
        }
        
        else {
            throw new AccessDeniedException('You do not have access to this section.');
        } 
    }
    
    public function refuseInvitationAction($id)
    {
        $d = $this->getDoctrine();
        
        $invitation = $d->getRepository('ClcColocBundle:invitation')
                        ->find($id);
        
        $repository = $d->getRepository('ClcUserBundle:User');
        $user = $repository->findOneBy(array('email' => $invitation->getEmail()));
        
        if ($user == $this->getUser()) {
        
            $em = $d->getEntityManager();
            $em->remove($invitation);
            $em->flush();
            
            $route = 'clc_dashboard_homepage';
            $url = $this->container->get('router')->generate($route);
            $response = new RedirectResponse($url);
            return $response;
        }
        
        else {
            throw new AccessDeniedException('You do not have access to this section.');
        } 
    }
    
    public function removeInvitationAction($id)
    {
        $d = $this->getDoctrine();
        
        $invitation = $d->getRepository('ClcColocBundle:invitation')
                        ->find($id);
        
        $repository = $d->getRepository('ClcUserBundle:User');
        $user = $repository->findOneBy(array('email' => $invitation->getEmail()));
        
        $usersArray =$this->getUser()->getColoc()->getUsers()->toArray();
        
        if (in_array($this->getUser(), $usersArray)) {
        
            $em = $d->getEntityManager();
            $em->remove($invitation);
            $em->flush();

            $route = 'clc_coloc_homepage';
            $url = $this->container->get('router')->generate($route);
            $response = new RedirectResponse($url);
            return $response;
        }
        
        elseif ($user == $this->getUser()){
            
            $em = $d->getEntityManager();
            $em->remove($invitation);
            $em->flush();

            $route = 'clc_dashboard_homepage';
            $url = $this->container->get('router')->generate($route);
            $response = new RedirectResponse($url);
            return $response;
        }
        
        else {
            throw new AccessDeniedException('You do not have access to this section.');
        }
    }
}
