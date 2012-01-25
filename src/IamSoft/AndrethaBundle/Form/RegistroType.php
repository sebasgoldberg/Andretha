<?php

namespace IamSoft\AndrethaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class RegistroType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('denominacion')
        ;
    }

    public function getName()
    {
        return 'iamsoft_andrethabundle_registrotype';
    }
}
