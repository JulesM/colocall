<?php
// src/Clc/ShoppinglistBundle/Controller/ShoppinglistController.php

namespace Clc\ShoppinglistBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Clc\ShoppinglistBundle\Entity\item;

class ShoppinglistController extends Controller
{
    public function indexAction()
    {
        return $this->render('ClcShoppinglistBundle::layout.html.twig');
    }
    
    public function newAction()
    {
        $user = $this->getUser();
        $coloc = $user->getColoc();
        
        // initialisez simplement un objet $item
        $item = new item();
        $item->setState(0);
        $item->setAddedDate(new \DateTime('today'));
        $item->setAuthor($user);
        $item->setColoc($coloc);

        $form = $this->createFormBuilder($item)
                     ->add('name', 'text')
                     ->add('comment', 'text')   
                     ->getForm();
        
        $request = $this->get('request');

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($item);
                $em->flush();
                
                $url = $this->getRequest()->headers->get("referer");
                return $this->redirect($url);
            }
        }
        
        return $this->render('ClcShoppinglistBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
