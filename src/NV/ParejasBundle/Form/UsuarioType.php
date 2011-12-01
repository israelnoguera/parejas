<?php

namespace NV\ParejasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

use Doctrine\ORM\EntityRepository;

class UsuarioType extends AbstractType{

    public function buildForm(FormBuilder $builder, array $options){
        
        $builder
            ->add('username', 'text', array('label' => 'Nombre de usuario'))
            ->add('email', 'email',array('label' => 'Introduce un email válido:'))
            ->add('password', 'repeated', array('type' => 'password'))
            ->add('perfiles', new PerfilesType())
            ->add('condiciones','checkbox',array(
                'label' => 'Acepta las condiciones de uso',
                'required' => true,
            ));
        
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
