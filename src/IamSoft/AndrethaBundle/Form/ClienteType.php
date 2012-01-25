<?php

namespace IamSoft\AndrethaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ClienteType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('Nombre')
            ->add('Apellido')
            ->add('numeroDocumento')
            ->add('tipoDocumentoIdentidad')
        ;
    }

    public function getName()
    {
        return 'iamsoft_andrethabundle_clientetype';
    }
}
