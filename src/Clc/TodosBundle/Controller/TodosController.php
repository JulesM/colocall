<?php
// src/Clc/TodosBundle/Controller/ShoppinglistController.php

namespace Clc\TodosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TodosController extends Controller
{
    public function indexAction()
    {
        return $this->render('ClcTodosBundle::layout.html.twig');
    }
    
    public function newAction(Request $request)
    {
        // crée une tâche et lui donne quelques données par défaut pour cet exemple
        $task = new Task();
        $task->setDate(new \DateTime('today'));
        $task->setDuedate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', 'text')
            ->add('duedate', 'date')   
            ->getForm();

        return $this->render('ClcTodosBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
