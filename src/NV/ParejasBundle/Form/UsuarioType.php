<?php

namespace NV\ParejasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

use Doctrine\ORM\EntityRepository;

class UsuarioType extends AbstractType{

    public function buildForm(FormBuilder $builder, array $options){
        
        $builder
                ->add('username', 'text', array('label' => 'Nombre de usuario'))
                ->add('roles', 'choice', array(
                    'choices'   => array('ADMIN' => 'Admin', 'USER' => 'Usuario estándar', 'PREMIUM' => 'Usuario Premium'),
                    'required'  => true,
                    ))
                ->add('email', 'email')
                ->add('password', 'repeated', array('type' => 'password'))
                ->add('perfiles', new PerfilesType());
        
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
