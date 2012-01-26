<?php

namespace IamSoft\AndrethaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class DocumentoTipoTramiteType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('tipoTramite')
            ->add('documento')
        ;
    }

    public function getName()
    {
        return 'iamsoft_andrethabundle_documentotipotramitetype';
    }
}
