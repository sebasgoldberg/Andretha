<?php

namespace IamSoft\AndrethaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class TipoCarpetaType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('letra')
            ->add('denominacion')
        ;
    }

    public function getName()
    {
        return 'iamsoft_andrethabundle_tipocarpetatype';
    }
}
