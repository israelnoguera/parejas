<?php

namespace NV\ParejasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Doctrine\ORM\EntityRepository;

class PerfilesType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add(
            'pais_id',
            'entity',
            array(
                'class' => 'NVParejasBundle:Paises',
                'property' => 'pais',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                              ->where('p.estado = 1')
                              ->add('orderBy', 'p.pais ASC');
                },
                'required' => true,
                'empty_value' => 'Selecciona un país',
                'preferred_choices' => array(73),
                'label' => 'Selecciona un pais:',
            )
        )
        ->add(
            'provincia_id',
            'entity',
            array(
                'class' => 'NVParejasBundle:Provincias',
                'property' => 'provincia',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')->where('0 = 1');
                },
                'required' => true,
                'empty_value' => 'Selecciona una provincia',
                'label' => 'Selecciona una provincia:'
            )
        )
        ->add(
            'localidad_id',
            'entity',
            array(
                'class' => 'NVParejasBundle:Localidades',
                'property' => 'localidad',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')->where('0 = 1');
                },
                'required' => true,
                'empty_value' => 'Selecciona una localidad',
                'label' => 'Selecciona una localidad:'
            )
        )
        ->add(
            'tipo_perfil',
            'choice',
            array(
                'choices' => array(
                    '1' => 'Somos pareja',
                    '2' => 'Soy un chico solo',
                    '3' => 'Soy una chica sola',
                ),
                'required' => true,
                'empty_value' => false,
                'label' => 'Selecciona el tipo de perfil:'
            )
        )
        ->add(
            'intro',
            'textarea',
            array(
                'label' => 'Introducción:',
                'trim' => true,
                'required' => false
            )
        );
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'NV\ParejasBundle\Entity\Perfiles',
        );
    }

    public function getName()
    {
        return 'perfiles';
    }

}
