<?php

namespace Clc\TodosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class taskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('task', 'text')
            ->add('dueDate', 'date')
            ->add('owner', 'entity', array(
                  'required'=>false,
                  'class'=>'ClcUserBundle:User', 
                  'property'=>'username',
                 ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Clc\TodosBundle\Entity\task'
        ));
    }

    public function getName()
    {
        return 'clc_todosbundle_tasktype';
    }
}
