<?php

namespace Clc\TodosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class taskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $usersQuery = function(\Clc\UserBundle\Entity\UserRepository $ur) use ($coloc)
                    {
                    return $ur->createQueryBuilder('u')
                              ->where('u.coloc = :coloc and u.enabled = :enabled')
                              ->setParameters(array('coloc' => $coloc, 'enabled' => 1))
                              ->orderBy('u.nickname', 'ASC');
                    };

        $builder->add('task', 'text')
                ->add('dueDate', 'date')
                ->add('owner', 'entity', array(
                    'class'=>'ClcUserBundle:User', 
                    'property'=>'nickname',
                    'query_builder' => $usersQuery,
                    'required'=>false,
                    )) 
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
