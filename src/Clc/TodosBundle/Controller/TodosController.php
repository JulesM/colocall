<?php
// src/Clc/TodosBundle/Controller/TodosController.php

namespace Clc\TodosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Clc\TodosBundle\Entity\task;

class TodosController extends Controller
{
    public function indexAction($state)
    {
        return $this->render('ClcTodosBundle::layout.html.twig', array(
            'coloc_task'=> $this->getByColocAction($state),
            'user_task'=> $this->getMineAction(),
        ));
    }
    
    public function newAction()
    {
        $user = $this->getUser();
        $coloc = $user->getColoc();
        
        // initialisez simplement un objet $task
        $task = new task();
        $task->setState(0);
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
        
        $request = $this->get('request');

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($task);
                $em->flush();
                
                $url = $this->getRequest()->headers->get("referer");
                return $this->redirect($url);
            }
        }
        
        return $this->render('ClcTodosBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function editAction($id)
    {
        $user = $this->getUser();
        
        $task = $this->getDoctrine()
        ->getRepository('ClcTodosBundle:task')
        ->find($id);
        
        $task->setDate(new \DateTime('today'));

        $form = $this->createFormBuilder($task)
            ->add('task', 'text')
            ->add('dueDate', 'date')
            ->add('owner', 'entity', array(
                'required'=>false,
                'class'=>'ClcUserBundle:User', 
                'property'=>'username',
                ))    
            ->getForm();
        
        $request = $this->get('request');

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($task);
                $em->flush();
                
                $url = $this->getRequest()->headers->get("referer");
                return $this->redirect($url);
            }
        }
        
        return $this->render('ClcTodosBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function getByColocAction($state) 
    {
        $user = $this->getUser();
        $coloc = $user->getColoc();
        
        $em = $this->getDoctrine()->getEntityManager();
        
        $query = $em->createQuery(
            'SELECT t FROM ClcTodosBundle:task t WHERE t.coloc = :coloc AND t.state >= :state ORDER BY t.dueDate ASC'
                                 ); 
        
        $query->setParameter('coloc', $coloc);
        $query->setParameter('state', $state);
        
        $task_list = $query->getResult();
        
        return $task_list;
    }
    
    public function getMineAction() 
    {
        $user = $this->getUser();
        
        $em = $this->getDoctrine()->getManager();
        
        $query = $em->createQuery(
            'SELECT t FROM ClcTodosBundle:task t WHERE t.owner = :user AND t.dueDate >= :date ORDER BY t.dueDate ASC'
                                 );
        $query->setParameter('user', $user);
        $query->setParameter('date', new \DateTime('today'));
        
        $task_list = $query->getResult();
        
        return $task_list;
    }
    
    public function removeAction($id)
    {
        $em = $this->getDoctrine()
                   ->getEntityManager();
        
        $task = $em->getRepository('ClcTodosBundle:task')
                   ->find($id);
          
        $em->remove($task);
        $em->flush();

        $url = $this->getRequest()->headers->get("referer");
        return $this->redirect($url);
    }        
}
