<?php
//src/Clc/AdminBundle/Admin/item.php

namespace Clc\AdminBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
 
class item extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
      $formMapper
        ->add('id')
        ->add('coloc.name')
        ->add('author.nickname')
        ->add('addedDate')
        ->add('name')
        ->add('doneDate')
      ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
      $datagridMapper
        ->add('id')
        ->add('coloc.name')
        ->add('author.nickname')
        ->add('addedDate')
        ->add('name')
        ->add('doneDate')
      ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
      $listMapper
        ->add('id')
        ->add('coloc.name')
        ->add('author.nickname')
        ->add('addedDate')
        ->addIdentifier('name')
        ->add('doneDate')
      ;
    }
}
