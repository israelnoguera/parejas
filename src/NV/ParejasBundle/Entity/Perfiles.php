<?php

namespace NV\ParejasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NV\ParejasBundle\Entity\Perfiles
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Perfiles{          
    
    /**
     * @ORM\OneToOne(targetEntity="Usuarios", inversedBy="perfiles")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id") 
     */
    protected $usuario;    
    
    public function setUsuario(\NV\ParejasBundle\Entity\Usuarios $usuario){
        $this->usuario = $usuario;
    }

    public function getUsuario(){
        return $this->usuario;
    }    
    
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var integer $provincia
     *
     * @ORM\Column(name="provincia", type="integer")
     */
    protected $provincia;

    /**
     * @var integer $pais
     *
     * @ORM\Column(name="pais", type="integer")
     */
    protected $pais;

    /**
     * @var smallint $tipo_perfil
     *
     * @ORM\Column(name="tipo_perfil", type="smallint")
     */
    protected $tipo_perfil;

    /**
     * @var integer $localidad
     *
     * @ORM\Column(name="localidad", type="integer")
     */
    protected $localidad;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set provincia
     *
     * @param integer $provincia
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }

    /**
     * Get provincia
     *
     * @return integer 
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Set pais
     *
     * @param integer $pais
     */
    public function setPais($pais)
    {
        $this->pais = $pais;
    }

    /**
     * Get pais
     *
     * @return integer 
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set tipo_perfil
     *
     * @param smallint $tipoPerfil
     */
    public function setTipoPerfil($tipoPerfil)
    {
        $this->tipo_perfil = $tipoPerfil;
    }

    /**
     * Get tipo_perfil
     *
     * @return smallint 
     */
    public function getTipoPerfil()
    {
        return $this->tipo_perfil;
    }

    /**
     * Set localidad
     *
     * @param integer $localidad
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;
    }

    /**
     * Get localidad
     *
     * @return integer 
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

}