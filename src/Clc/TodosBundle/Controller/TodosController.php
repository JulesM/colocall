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
    
    public function getByColocAction($state) 
    {
        $user = $this->getUser();
        $coloc = $user->getColoc();
        
        $em = $this->getDoctrine()->getEntityManager();
        
        if ($state == 0) 
        {
        $query = $em->createQuery(
            'SELECT t FROM ClcTodosBundle:task t WHERE t.coloc = :coloc AND t.dueDate >= :date ORDER BY t.dueDate ASC'
                                 ); 
        }
        
        else 
        {
        $query = $em->createQuery(
            'SELECT t FROM ClcTodosBundle:task t WHERE t.coloc = :coloc AND t.dueDate < :date ORDER BY t.dueDate ASC'
                                 );    
        }
        
        $query->setParameter('coloc', $coloc);
        $query->setParameter('date', new \DateTime('today'));
        
        $task_list = $query->getResult();
        
        return $task_list;
    }
    
    public function getMineAction() 
    {
        $user = $this->getUser();
        
        $repository = $this->getDoctrine()
                           ->getManager()
                           ->getRepository('ClcTodosBundle:task');
        
        $task_list = $repository->findBy(array('owner'=>$user),
                                         array('dueDate'=>'asc'));
        
        return $task_list;
    }
    
    public function getPastAction() 
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
