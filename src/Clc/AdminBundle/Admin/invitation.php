<?php
//src/Clc/AdminBundle/Admin/invitation.php

namespace Clc\AdminBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
 
class invitation extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
      $formMapper
        ->add('id')
        ->add('author')
        ->add('email')

      ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
      $datagridMapper
        ->add('id')
        ->add('author')
        ->add('email')
      ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
      $listMapper
        ->addIdentifier('id')
        ->add('author.nickname')
        ->add('email')
      ;
    }
}
