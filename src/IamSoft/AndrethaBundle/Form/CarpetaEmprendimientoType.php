<?php

namespace IamSoft\AndrethaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CarpetaEmprendimientoType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('emprendimiento')
            ->add('carpeta')
        ;
    }

    public function getName()
    {
        return 'iamsoft_andrethabundle_carpetaemprendimientotype';
    }
}
