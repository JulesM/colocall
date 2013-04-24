<?php
// src/Clc/UserBundle/Controller/ProfileController.php

namespace Clc\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Clc\UserBundle\Entity\profilepicture;

class ProfileController extends Controller
{
    public function profileAction()
    {
        $p = $this->getUser()->getPicture()->getPath();
        $this->container->get('request')->getSession()->set('path', $p);
                
        return $this->render('ClcUserBundle:Profile:profile.html.twig');
    }
    
    public function editProfileAction()
    {
        $user = $this->getUser();
        
        $form = $this->createFormBuilder($user)
                     ->add('nickname', 'text')
                     ->add('firstname', 'text')
                     ->add('lastname', 'text')
                     ->add('nationality','text')
                     ->add('birthday', 'birthday', array(
                                'format' => 'dd - MMMM - yyyy',
                                'widget' => 'choice',
                                'pattern' => "{{ day }}/{{ month }}/{{ year }}",
                                'years' => range(date('Y'), date('Y')-70)
                            ))  
                     ->add('phone','integer')
                     ->add('comment','textarea')
                     ->getForm();
        
        $request = $this->get('request');

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                
                return new RedirectResponse(
                $this->container->get('router')->generate('clc_user_profile')
                );
            }
        }
                
        return $this->render('ClcUserBundle:Profile:editprofile.html.twig', array(
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
                
                if ($currentpicture->getId() !== 1) {
                $em->remove($currentpicture);
                }
                
                $em->persist($user);
                $em->flush();

                $route = 'clc_user_profile';
                $url = $this->container->get('router')->generate($route);
                $response = new RedirectResponse($url);
                return $response;
            }
        }

        return $this->render('ClcUserBundle:Profile:pictureform.html.twig', array(
            'form' => $form->createView(),
                ));
    }
}
