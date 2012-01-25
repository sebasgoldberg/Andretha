<?php

namespace IamSoft\AndrethaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class RegistroEscribanoType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('fechaValidoDesde')
            ->add('fechaValidoHasta')
            ->add('escribano')
            ->add('registro')
            ->add('caracter')
        ;
    }

    public function getName()
    {
        return 'iamsoft_andrethabundle_registroescribanotype';
    }
}
