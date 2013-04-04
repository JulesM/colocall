<?php
// src/Clc/UserBundle/Controller/ProfileController.php

namespace Clc\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Clc\UserBundle\Entity\profilepicture;

class ProfileController extends Controller
{
    public function profileAction()
    {
        $p = $this->getUser()->getPicture()->getPath();
        
        return $this->render('ClcUserBundle:profile:profile.html.twig', array(
            'path' => $p,
        ));
    }
    
    public function editProfileAction()
    {
        $user = $this->getUser();
        
        $form = $this->createFormBuilder($user)
                     ->add('username', 'text')
                     ->add('firstname', 'text')
                     ->add('lastname', 'text')
                     ->add('nationality','text')
                     ->add('birthday','birthday')
                     ->add('phone','integer')
                     ->add('email','email')
                     ->add('comment','textarea')
                     ->getForm();
        
        $request = $this->get('request');

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                
                return $this->profileAction();
            }
        }
                
        return $this->render('ClcUserBundle:profile:editprofile.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function editProfilePictureAction()
    {
        $profilepicture = new profilepicture();
        $form = $this->createFormBuilder($profilepicture)
            ->add('file')
            ->getForm()
        ;

        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                
                $user = $this->getUser();
                $currentpicture = $user->getPicture();
                $profilepicture->upload($user);
                
                $user->setPicture($profilepicture);
                
                $em->remove($currentpicture);
                $em->persist($user);
                $em->flush();

                return $this->profileAction();
            }
        }

        return $this->render('ClcUserBundle:profile:editprofilepicture.html.twig', array(
            'form' => $form->createView(),
                ));
    }
}
