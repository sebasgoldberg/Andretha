<?php

namespace IamSoft\AndrethaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class EmprendimientoType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('denominacion')
            ->add('comentarios')
            ->add('fechaInicio')
        ;
    }

    public function getName()
    {
        return 'iamsoft_andrethabundle_emprendimientotype';
    }
}
