<?php
//src/Clc/AdminBundle/Admin/expense.php

namespace Clc\AdminBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
 
class expense extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
      $formMapper
        ->add('id')
        ->add('coloc.name')
        ->add('owner.nickname')
        ->add('name')
        ->add('amount')
        ->add('date')
      ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
      $datagridMapper
        ->add('id')
        ->add('coloc.name')
        ->add('owner.nickname')
        ->add('name')
        ->add('amount')
        ->add('date')
      ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
      $listMapper
        ->add('id')
        ->add('coloc.name')
        ->add('owner.nickname')
        ->addIdentifier('name')
        ->add('amount')
        ->add('date')
      ;
    }
}
