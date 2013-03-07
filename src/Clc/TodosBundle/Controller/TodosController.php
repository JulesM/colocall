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
        return $this->render('ClcTodosBundle::layout.html.twig', array(
            'coloc_task'=> $this->displayByColocAction(),
            'user_task'=> $this->displayMineAction(),
        ));
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
                
                $url = $this->getRequest()->headers->get("referer");
                return $this->redirect($url);
            }
        }
        
        return $this->render('ClcTodosBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function displayByColocAction() 
    {
        $user = $this->getUser();
        $coloc = $user->getColoc();
        
        $repository = $this->getDoctrine()
                           ->getManager()
                           ->getRepository('ClcTodosBundle:task');
        
        $task_list = $repository->findBy(array('coloc'=>$coloc),
                                         array('dueDate'=>'asc'));
        
        return $task_list;
    }
    
    public function displayMineAction() 
    {
        $user = $this->getUser();
        
        $repository = $this->getDoctrine()
                           ->getManager()
                           ->getRepository('ClcTodosBundle:task');
        
        $task_list = $repository->findBy(array('owner'=>$user),
                                         array('dueDate'=>'asc'));
        
        return $task_list;
    }
    
    public function displayPastAction() 
    {
        
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
