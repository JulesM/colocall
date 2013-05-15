<?php
// src Clc/ColocBundle/Form/Type/ColocType.php

namespace Clc\ColocBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ColocType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text')
                ->add('address1', 'text')
                ->add('address2', 'text', array('required' => false))
                ->add('zipcode', 'integer')
                ->add('city', 'text')
                ->add('country', 'text')
                ->add('currency', 'entity', array(
                            'class'         => 'ClcColocBundle:currency',
                            'property'      => 'description',
                            )
                );
    }
    
    public function getName()
    {
        return 'clc_colocbundle_coloctype';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Clc\ColocBundle\Entity\coloc'
        ));
    }
}
?>
