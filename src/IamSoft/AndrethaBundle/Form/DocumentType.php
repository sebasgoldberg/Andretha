<?php

namespace IamSoft\AndrethaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class DocumentType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('descripcion')
            ->add('file')
        ;
    }

    public function getName()
    {
        return 'iamsoft_andrethabundle_documenttype';
    }
}
