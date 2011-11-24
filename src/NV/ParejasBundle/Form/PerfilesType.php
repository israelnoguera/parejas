<?php

namespace NV\ParejasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

use Doctrine\ORM\EntityRepository;

class PerfilesType extends AbstractType{

    public function buildForm(FormBuilder $builder, array $options){
        
    /*
    ->add('pais', 'entity', array(
    'class' => 'NVParejasBundle:Perfiles',
    'property' => 'pais',
    'label'=>'Pais:'
    ))
    */
  
        
        $builder
                ->add('pais', 'choice', array(
                        'choices'   => array('1' => '1', '2' => '2', '3' => '3'),
                        'required'  => true,            
                    ))
                ->add('provincia', 'choice', array(
                        'choices'   => array('1' => '1', '2' => '2', '3' => '3'),
                        'required'  => true,            
                    ))
                ->add('localidad', 'choice', array(
                        'choices'   => array('1' => '1', '2' => '2', '3' => '3'),
                        'required'  => true,            
                    ))
                ->add('tipo_perfil', 'text', array('label' => 'Tipo de perfil'));
        
    }

    public function getDefaultOptions(array $options){
        return array(
            'data_class' => 'NV\ParejasBundle\Entity\Perfiles',
        );
    }

    public function getName(){
        return 'perfiles';
    }

}
