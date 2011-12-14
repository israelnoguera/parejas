<?php

namespace NV\ParejasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NV\ParejasBundle\Entity\Perfiles
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="NV\ParejasBundle\Repository\PerfilesRepository")
 */
class Perfiles{          
    
    /**
     * @ORM\OneToOne(targetEntity="Usuarios", inversedBy="perfiles")
     */
    protected $usuario;          
    
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="pais_id", type="integer")
     */
    protected $pais_id;    
    
    /**
     * @ORM\Column(name="provincia_id", type="integer")
     */
    protected $provincia_id;

    /**
     * @ORM\Column(name="localidad_id", type="integer")
     */
    protected $localidad_id;   
    
    /**
     * @ORM\Column(name="tipo_perfil", type="smallint")
     */
    protected $tipo_perfil; 
    
    /**
     * @ORM\Column(name="intro", type="text", nullable=true)
     */
    protected $intro;     
    
    /*
     * SETTERS Y GETTERS
     */
    
    public function getId(){
        return $this->id;
    }  
    
    public function setTipoPerfil($tipoPerfil){
        $this->tipo_perfil = $tipoPerfil;
    }

    /**
     * 1 = pareja, 2 = chico, 3 = chica
     * @return integer
     */
    public function getTipoPerfil(){
        return $this->tipo_perfil;
    }
    
    public function setUsuario(\NV\ParejasBundle\Entity\Usuarios $usuario){
        $this->usuario = $usuario;
    }

    public function getUsuario(){
        return $this->usuario;
    }     


    /**
     * Set pais_id
     *
     * @param integer $paisId
     */
    public function setPaisId($paisId)
    {
        $this->pais_id = $paisId;
    } 
    

    /**
     * Get pais_id
     *
     * @return integer 
     */
    public function getPaisId()
    {
        return $this->pais_id;
    }

    /**
     * Set provincia_id
     *
     * @param integer $provinciaId
     */
    public function setProvinciaId($provinciaId)
    {
        $this->provincia_id = $provinciaId;
    }

    /**
     * Get provincia_id
     *
     * @return integer 
     */
    public function getProvinciaId()
    {
        return $this->provincia_id;
    }

    /**
     * Set localidad_id
     *
     * @param integer $localidadId
     */
    public function setLocalidadId($localidadId)
    {
        $this->localidad_id = $localidadId;
    }

    /**
     * Get localidad_id
     *
     * @return integer 
     */
    public function getLocalidadId()
    {
        return $this->localidad_id;
    }

    /**
     * Set intro
     *
     * @param text $intro
     */
    public function setIntro($intro)
    {
        $this->intro = $intro;
    }

    /**
     * Get intro
     *
     * @return text 
     */
    public function getIntro()
    {
        return $this->intro;
    }
}