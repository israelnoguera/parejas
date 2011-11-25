<?php

namespace NV\ParejasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

use Doctrine\ORM\EntityRepository;

class PerfilesType extends AbstractType{

    public function buildForm(FormBuilder $builder, array $options){
        
        $builder
            ->add('pais', 'entity', array(
            'class' => 'NVParejasBundle:Paises',
            'query_builder' => function (\NV\ParejasBundle\Repository\PaisesRepository $repository){
                return $repository->createQueryBuilder('p')
                    ->where('p.estado = 1')
                    ->add('orderBy', 'p.pais ASC');
             },                
            'property' => 'pais', 
            'label'=>'Pais:'))
            ->add('provincia', 'choice', array(
                    'choices'   => array('' => 'Selecciona un pais'),
                    'required'  => true,            
                ))
            ->add('localidad', 'choice', array(
                    'choices'   => array('' => 'Selecciona una provincia'),
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
