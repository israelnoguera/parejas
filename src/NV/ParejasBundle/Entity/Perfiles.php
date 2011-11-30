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
     * @ORM\Column(name="pais", type="integer")
     */
    protected $pais;    
    
    /**
     * @ORM\Column(name="provincia", type="integer")
     */
    protected $provincia;

    /**
     * @ORM\Column(name="localidad", type="integer")
     */
    protected $localidad;   
    
    /**
     * @ORM\Column(name="tipo_perfil", type="smallint")
     */
    protected $tipo_perfil;    
    
    /*
     * SETTERS Y GETTERS
     */
    
    public function getId(){
        return $this->id;
    }

    public function setPais($pais){
        $this->pais = $pais;
    }

    public function getPais(){
        return $this->pais;
    }

    public function setProvincia($provincia){
        $this->provincia = $provincia;
    }

    public function getProvincia(){
        return $this->provincia;
    }    
    
    public function setLocalidad($localidad){
        $this->localidad = $localidad;
    }

    public function getLocalidad(){
        return $this->localidad;
    }    
    
    public function setTipoPerfil($tipoPerfil){
        $this->tipo_perfil = $tipoPerfil;
    }

    public function getTipoPerfil(){
        return $this->tipo_perfil;
    }
    
    public function setUsuario(\NV\ParejasBundle\Entity\Usuarios $usuario){
        $this->usuario = $usuario;
    }

    public function getUsuario(){
        return $this->usuario;
    }     

}