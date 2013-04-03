<?php

namespace Clc\InboxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Clc\InboxBundle\Entity\message;

class InboxController extends Controller
{
    public function indexAction()
    {
        return $this->render('ClcInboxBundle::layout.html.twig', array(
            'message_list' => $this->getMessagesAction(),
        ));
    }
    
    private function getMessagesAction()
    {
        $coloc = $this->getUser()->getColoc();
        
        $ib = $this->container->get('clc_inbox.inbox');
        $message_list = $ib->getMessages($coloc);
        
        return $message_list;
    }
    
    public function getMessageFormAction()
    {
        $user = $this->getUser();
        $coloc = $user->getColoc();
        
        // initialisez simplement un objet $message
        $message = new message();
        $message->setDate(new \DateTime('today'));
        $message->setAuthor($user);
        $message->setColoc($coloc);

        $form = $this->createFormBuilder($message)
            ->add('content', 'textarea')   
            ->getForm();
        
        $request = $this->get('request');

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                
                $message->setDate(new \DateTime('today'));
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($message);
                $em->flush();
                
                $url = $this->getRequest()->headers->get("referer");
                return $this->redirect($url);
            }
        }
        
        return $this->render('ClcInboxBundle:Default:addmessage.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
