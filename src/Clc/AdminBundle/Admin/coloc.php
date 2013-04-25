<?php
//src/Clc/AdminBundle/Admin/coloc.php

namespace Clc\AdminBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
 
class coloc extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
      $formMapper
        ->add('id')
        ->add('name')
        ->add('city')
      ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
      $datagridMapper
        ->add('id')
        ->add('name')
        ->add('city')
      ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
      $listMapper
        ->addIdentifier('id')
        ->add('name')
        ->add('city')
      ;
    }
}
