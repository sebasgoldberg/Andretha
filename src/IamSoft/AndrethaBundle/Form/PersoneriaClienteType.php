<?php

namespace IamSoft\AndrethaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PersoneriaClienteType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('personeria')
            ->add('cliente')
            ->add('escribano',null,array('required' => false))
        ;
    }

    public function getName()
    {
        return 'iamsoft_andrethabundle_personeriaclientetype';
    }
}
