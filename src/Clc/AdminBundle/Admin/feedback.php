<?php
//src/Clc/AdminBundle/Admin/feedback.php

namespace Clc\AdminBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
 
class feedback extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
      $formMapper
        ->add('id')
        ->add('text')
        ->add('category')
        ->add('author')
      ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
      $datagridMapper
        ->add('id')
        ->add('text')
        ->add('category')
        ->add('author')
      ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
      $listMapper
        ->addIdentifier('id')
        ->add('text')
        ->add('category')
        ->add('author.nickname')
      ;
    }
}
