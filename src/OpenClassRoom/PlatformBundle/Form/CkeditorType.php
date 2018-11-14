<?php

// src/OpenClassRoom/PlatformBundle/Form/CkeditorType.php


namespace OpenClassRoom\PlatformBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CkeditorType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'attr' => array('class' => 'ckeditor')
        ));
    }

    public function getParent()
    {
        return TextareaType::class;
    }

}