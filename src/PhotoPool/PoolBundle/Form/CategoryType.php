<?php

namespace PhotoPool\PoolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('path')
            ->add('created')
            ->add('updated')
            ->add('pool')
        ;
    }

    public function getName()
    {
        return 'photopool_poolbundle_categorytype';
    }
}
