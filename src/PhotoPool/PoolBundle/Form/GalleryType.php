<?php

namespace PhotoPool\PoolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class GalleryType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('path')
            ->add('created')
            ->add('updated')
            ->add('category')
        ;
    }

    public function getName()
    {
        return 'photopool_poolbundle_gallerytype';
    }
}
