<?php
// src/Clc/UserBundle/Controller/BetaController.php

namespace Clc\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Clc\UserBundle\Entity\betaUser;

class BetaController extends Controller
{
    public function emailFormAction()
    {
        $beta = new betaUser();
        $beta->setEnabled(false);
        
        $form = $this->createFormBuilder($beta)
                     ->add('email','email')
                     ->getForm();
        
        $request = $this->get('request');
        
        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                    
                $em = $this->getDoctrine()->getManager();
                $em->persist($beta);
                $em->flush();
                
                return new RedirectResponse($this->container->get('router')->generate('clc_welcome'));
            }
        }
                
        return $this->render('ClcUserBundle:Beta:betaEmailForm.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
