<?php

namespace NV\ParejasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
//use NV\ParejasBundle\Repository\PaisesRepository; //esto solo si queremos usar funciones del repositorio
use Doctrine\ORM\EntityRepository;

class PerfilesType extends AbstractType{

    public function buildForm(FormBuilder $builder, array $options){
        
        $builder
            ->add('pais_id', 'entity', array(
            'class' => 'NVParejasBundle:Paises',
            'query_builder' => function (EntityRepository $er){
                return $er->createQueryBuilder('p')
                    ->where('p.estado = 1')
                    ->add('orderBy', 'p.pais ASC');                
             },                
            'property' => 'pais', 
            'label'=>'Selecciona un pais:'))                     
            ->add('provincia_id', 'choice', array(
                    'choices'   => array('0' => 'Selecciona un pais'),
                    'required'  => false,
                    'empty_value' => false,
                    'label' => 'Selecciona una provincia:'
                ))
            ->add('localidad_id', 'choice', array(
                    'choices'   => array('0' => 'Selecciona una provincia'),
                    'required'  => false,
                    'empty_value' => false,
                    'label' => 'Selecciona una localidad:'
                ))                                          
            ->add('tipo_perfil', 'choice', array(
                'choices'   => array('1' => 'Somos pareja', '2' => 'Soy un chico solo', '3' => 'Soy una chica sola'),
                'required'  => true,
                'empty_value' => false,
                'label' => 'Selecciona el tipo de perfil:'
                ));
        
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
