<?php

namespace IamSoft\AndrethaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class TipoTramiteType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('denominacion')
            ->add('tipoCarpeta',null,array('required' => false))
            ->add('tipoTramitePadre',null,array('required' => false))
        ;
    }

    public function getName()
    {
        return 'iamsoft_andrethabundle_tipotramitetype';
    }
}
