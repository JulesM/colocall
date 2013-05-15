<?php
// src/Clc/ColocBundle/Controller/ColocController.php

namespace Clc\ColocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Clc\ColocBundle\Form\Type\ColocType;
use Clc\ColocBundle\Entity\coloc;

class ColocController extends Controller
{
    public function indexAction()
    {
        return $this->render('ClcColocBundle::layout.html.twig', array(
            'users'       => $this->getUser()->getColoc()->getUsers(),
            'invitations' => $this->getUser()->getColoc()->getInvitations(),
            'pictures'    => $this->getProfilePicturesAction()
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
                
                $url = $this->get('router')->generate('clc_dashboard_invite_flatmates');
                return $this->redirect($url);
            }
        }

        return $this->render('ClcColocBundle:Creation:new.html.twig', array(
        'form' => $form->createView(),
        ));
    }
    
    public function editAction()
    {
        $coloc = $this->getUser()->getColoc();
        
        $form = $this->createFormBuilder($coloc)
                     ->add('name', 'text')
                     ->add('address1', 'text')
                     ->add('address2', 'text', array('required' => false))
                     ->add('zipcode', 'integer')
                     ->add('city', 'text')
                     ->add('country', 'text')
                     ->add('currency', 'choice', array(
                        'choices'   => array(
                            'EUR' => 'Euro',
                            'USD' => 'US Dollar',
                            'GBP' => 'British Pound',
                            'INR' => 'Indian Rupee',
                            'AUD' => 'Australian Dollar',
                            'CAD' => 'Canadian Dollar',
                            'CHF' => 'Swiss Franc',
                            'CNY' => 'Chinese Yuan Renminbi',
                            'JPY' => 'Japanese Yen',
                            ),
                        ))
                     ->getForm();
        
        $request = $this->get('request');
        
        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($coloc);
                $em->flush();
                
                $url = $this->get('router')->generate('clc_coloc_homepage');
                return $this->redirect($url);
            }
        }
                
        return $this->render('ClcColocBundle:Creation:edit.html.twig', array(
            'form'        => $form->createView(),
        ));
    }
    
    public function getProfilePicturesAction()
    {
        $users = $this->getUser()->getColoc()->getUsers();
        $pictures = array();
        
        foreach ($users as $user) {
            $a = $user->getId();
            $b = $user->getPicture()->getPath();
            $pictures[$a] = $b;
        }
            
        return $pictures;
    }
    
    public function leaveFlatshareAction()
    {
        $user = $this->getUser();
        $user->setColoc(null);
        
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($user);
        $em->flush();
        
        return new RedirectResponse(
                $this->container->get('router')->generate('fos_user_security_logout')
                ); 
    }
}
