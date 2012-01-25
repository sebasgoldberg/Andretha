<?php

namespace IamSoft\AndrethaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CarpetaType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('numeroReferencia')
            ->add('denominacion')
            ->add('comentarios')
            ->add('fechaInicio')
            ->add('tipoCarpeta')
        ;
    }

    public function getName()
    {
        return 'iamsoft_andrethabundle_carpetatype';
    }
}
