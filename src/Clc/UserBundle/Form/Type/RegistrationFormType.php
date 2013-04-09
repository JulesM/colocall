<?php
// src/Clc/UserBundle/Form/Type/RegistrationFormType.php

namespace Clc\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('plainPassword', 'password')
        ;
    }

    public function getName()
    {
        return 'clc_user_registration';
    }
}