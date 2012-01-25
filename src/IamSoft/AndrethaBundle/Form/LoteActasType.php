<?php

namespace IamSoft\AndrethaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class LoteActasType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('numPreImpresoIni')
            ->add('cantidad')
            ->add('fechaCompra')
            ->add('cantidadUsados')
            ->add('registroEscribano')
        ;
    }

    public function getName()
    {
        return 'iamsoft_andrethabundle_loteactastype';
    }
}
