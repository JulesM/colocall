<?php
// src/Clc/TodosBundle/Controller/TodosController.php

namespace Clc\TodosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Clc\TodosBundle\Form\Type\TaskType;
use Clc\TodosBundle\Entity\task;

class TodosController extends Controller
{
    public function indexAction($state)
    {
        return $this->render('ClcTodosBundle::layout.html.twig', array(
            'coloc_task'=> $this->getByColocAction($state),
            'user_task' => $this->getMineAction(0),
            'state'     => $state,
        ));
    }
    
    public function newAction()
    {
        $user = $this->getUser();
        $coloc = $user->getColoc();
        
        // initialisez simplement un objet $task
        $task = new task();
        $task->setState(0);
        $task->setDate(new \DateTime('now'));
        $task->setDueDate(new \DateTime('tomorrow'));
        $task->setAuthor($user);
        $task->setColoc($coloc);
        
        $usersQuery = function(\Clc\UserBundle\Entity\UserRepository $ur) use ($coloc)
                    {
                    return $ur->createQueryBuilder('u')
                              ->where('u.coloc = :coloc and u.enabled = :enabled')
                              ->setParameters(array('coloc' => $coloc, 'enabled' => 1))
                              ->orderBy('u.nickname', 'ASC');
                    };

        $form = $this->createFormBuilder($task)
            ->add('task', 'text')
            ->add('owner', 'entity', array(
                  'class'         => 'ClcUserBundle:User', 
                  'property'      => 'nickname',
                  'query_builder' => $usersQuery,
                  'required'      => false,
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
        $coloc = $user->getColoc();

        $em = $this->getDoctrine()->getEntityManager();
        $task = $em->getRepository('ClcTodosBundle:task')->find($id);

        $usersQuery = function(\Clc\UserBundle\Entity\UserRepository $ur) use ($coloc)
                    {
                    return $ur->createQueryBuilder('u')
                              ->where('u.coloc = :coloc and u.enabled = :enabled')
                              ->setParameters(array('coloc' => $coloc, 'enabled' => 1))
                              ->orderBy('u.nickname', 'ASC');
                    };

        $form = $this->createFormBuilder($task)
            ->add('task', 'text')
            ->add('owner', 'entity', array(
                  'class'         => 'ClcUserBundle:User', 
                  'property'      => 'nickname',
                  'query_builder' => $usersQuery,
                  'required'      => false,
                ))    
            ->getForm();    
        
        $request = $this->get('request');

        if ($request->isMethod('POST')) {
            $form->bind($request);
            
            if ($form->isValid()) {

                $em->flush();
                
                $url = $this->get('router')->generate('clc_todos_homepage', array('state' => 0));
                return $this->redirect($url);
            }
        }
        
        return $this->render('ClcTodosBundle:Default:edit.html.twig', array(
            'form' => $form->createView(),
            'id'   => $id,
        ));
    }
    
    public function getByColocAction($state) 
    {
        $user = $this->getUser();
        $coloc = $user->getColoc();
        
        $td = $this->container->get('clc_todos.todos');
        $task_list = $td->getByColoc($coloc, $state);
        
        return $task_list;
    }
    
    public function getMineAction($state) 
    {
        $user = $this->getUser();
        
        $td = $this->container->get('clc_todos.todos');
        $task_list = $td->getMine($user, $state);
        
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
    
    public function checkAction($id)
    {
        $em = $this->getDoctrine()
                   ->getEntityManager();
        
        $task = $em->getRepository('ClcTodosBundle:task')
                   ->find($id);
        
        $task->setState(1);
        $em->flush();
        
        $url = $this->getRequest()->headers->get("referer");
        return $this->redirect($url);
    }
    
    public function uncheckAction($id)
    {
        $em = $this->getDoctrine()
                   ->getEntityManager();
        
        $task = $em->getRepository('ClcTodosBundle:task')
                   ->find($id);
        
        $task->setState(0);
        $em->flush();
        
        $url = $this->getRequest()->headers->get("referer");
        return $this->redirect($url);
    }
}
