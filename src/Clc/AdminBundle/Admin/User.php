<?php
//src/Clc/AdminBundle/Admin/User.php

namespace Clc\AdminBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
 
class User extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
      $formMapper
        ->add('id')
        ->add('email')
        ->add('nickname')
        ->add('coloc')           
      ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
      $datagridMapper
        ->add('id')
        ->add('email')
        ->add('nickname')
        ->add('coloc.name')
      ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
      $listMapper
        ->addIdentifier('id')
        ->add('email')
        ->add('nickname')
        ->add('coloc.name')
      ;
    }
}
