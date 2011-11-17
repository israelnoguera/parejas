<?php

namespace NV\ParejasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

use NV\ParejasBundle\Validator\Constraints\DNI;

class UsuarioType extends AbstractType{

    public function buildForm(FormBuilder $builder, array $options){
        $builder->add('username', 'text', array('label' => 'Nombre de usuario'));
        $builder->add('roles', 'choice', array(
            'choices'   => array('ROLE_ADMIN' => 'Admin', 'ROLE_USER' => 'Usuario estándar', 'ROLE_PREMIUM' => 'Usuario Premium'),
            'required'  => true,
        ));
        $builder->add('email', 'email');
        $builder->add('password', 'repeated', array('type' => 'password'));
    }

    public function getDefaultOptions(array $options){
        return array(
            'data_class' => 'NV\ParejasBundle\Entity\Usuarios',
        );
    }

    public function getName(){
        return 'usuario';
    }

}
