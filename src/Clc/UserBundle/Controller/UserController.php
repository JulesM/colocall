<?php
// src/Clc/UserBundle/Controller/UserController.php

namespace Clc\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Clc\UserBundle\Entity\feedback;

class UserController extends Controller
{
    public function welcomeAction()
    {
        return $this->render('ClcUserBundle::welcome.html.twig');
    }
    
    public function feedbackAction()
    {
        $feedback = new feedback();
        $feedback->setDate( new \DateTime('now'))
                 ->setAuthor($this->getUser())
                 ->setSolved(false);
        
        $form = $this->createFormBuilder($feedback)
                     ->add('category', 'choice', array(
                            'choices' => array(
                                'bug'        => 'Bug',
                                'suggestion' => 'Suggestion',
                                'design'     => 'Design',
                                'question'   => 'Question',
                            )))
                     ->add('text', 'textarea')
                     ->getForm();
        
        $request = $this->get('request');

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                    
                $em = $this->getDoctrine()->getManager();
                $em->persist($feedback);
                $em->flush();
                
                $url = $this->getRequest()->headers->get("referer");
                return $this->redirect($url);
            }
        }
                
        return $this->render('ClcUserBundle:Feedback:feedbackForm.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}