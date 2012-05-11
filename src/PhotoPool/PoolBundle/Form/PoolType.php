<?php

namespace PhotoPool\PoolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PoolType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('created')
            ->add('updated')
        ;
    }

    public function getName()
    {
        return 'photopool_poolbundle_pooltype';
    }
}
