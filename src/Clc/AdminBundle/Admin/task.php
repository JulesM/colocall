<?php
//src/Clc/AdminBundle/Admin/task.php

namespace Clc\AdminBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
 
class task extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
      $formMapper
        ->add('id')
        ->add('coloc.name')
        ->add('author.nickname')
        ->add('owner.nickname')
        ->add('task')
        ->add('dueDate')
        ->add('state')
      ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
      $datagridMapper
        ->add('id')
        ->add('coloc.name')
        ->add('author.nickname')
        ->add('owner.nickname')
        ->add('task')
        ->add('dueDate')
        ->add('state')
      ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
      $listMapper
        ->add('id')
        ->add('coloc.name')
        ->add('author.nickname')
        ->add('owner.nickname')
        ->addIdentifier('task')
        ->add('dueDate')
        ->add('state')
      ;
    }
}
