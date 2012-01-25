<?php

namespace IamSoft\AndrethaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class LibroType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('numero')
            ->add('registroEscribano')
        ;
    }

    public function getName()
    {
        return 'iamsoft_andrethabundle_librotype';
    }
}
