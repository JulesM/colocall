<?php
//src/Clc/AdminBundle/Admin/notification.php

namespace Clc\AdminBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
 
class notification extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
      $formMapper
        ->add('id')
        ->add('category')
        ->add('author.nickname')
        ->add('date')
        ->add('expense.name')
        ->add('payback.date')
        ->add('task.task')
        ->add('item.name')
      ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
      $datagridMapper
        ->add('id')
        ->add('category')
        ->add('author.nickname')
        ->add('date')
        ->add('expense.name')
        ->add('payback.date')
        ->add('task.task')
        ->add('item.name')
      ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
      $listMapper
        ->addIdentifier('id')
        ->add('category')
        ->add('author.nickname')
        ->add('date')
        ->add('expense.name')
        ->add('payback.date')
        ->add('task.task')
        ->add('item.name')
      ;
    }
}
