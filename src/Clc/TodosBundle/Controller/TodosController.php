<?php
// src/Clc/TodosBundle/Controller/TodosController.php

namespace Clc\TodosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Clc\TodosBundle\Entity\task;

class TodosController extends Controller
{
    public function indexAction()
    {
        return $this->render('ClcTodosBundle::layout.html.twig');
    }
    
    public function newAction(Request $request)
    {
        $user = $this->getUser();
        $coloc = $user->getColoc();
        
        // initialisez simplement un objet $task
        $task = new task();
        $task->setDate(new \DateTime('today'));
        $task->setDueDate(new \DateTime('tomorrow'));
        $task->setAuthor($user);
        $task->setColoc($coloc);

        $form = $this->createFormBuilder($task)
            ->add('task', 'text')
            ->add('dueDate', 'date')
            ->add('owner', 'entity', array(
                'required'=>false,
                'class'=>'ClcUserBundle:User', 
                'property'=>'username',
                ))    
            ->getForm();

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($task);
                $em->flush();
                
                return $this->redirect($this->generateUrl('clc_dashboard_homepage'));
            }
        }
        
        return $this->render('ClcTodosBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
