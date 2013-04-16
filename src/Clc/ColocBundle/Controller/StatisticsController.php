<?php
// src/Clc/ColocBundle/Controller/StatisticsController.php

namespace Clc\ColocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Clc\UserBundle\Entity\feedback;

class StatisticsController extends Controller
{
    public function indexAction()
    {
        return $this->render('ClcColocBundle:Statistics:layout.html.twig');
    }
    
    public function feedbackAction()
    {
        $feedback = new feedback();
        
        $feedback->setDate( new \DateTime('now'))
                 ->setAuthor($this->getUser())
                 ->setCategory('statistics');
        
        $form = $this->createFormBuilder($feedback)
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
                
        return $this->render('ClcColocBundle:Statistics:feedbackForm.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
