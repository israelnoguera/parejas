<?php

namespace NV\ParejasBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * NV\ParejasBundle\Entity\Perfiles
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="NV\ParejasBundle\Repository\PerfilesRepository")
 */
class Perfiles
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var Usuarios
     * @ORM\OneToOne(targetEntity="Usuarios", inversedBy="perfiles")
     */
    protected $usuario;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $fh_alta;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    protected $fh_editado;

    /**
     * @ORM\Column(type="integer",columnDefinition="TINYINT(1) NULL")
     * @Assert\NotBlank()
     */
    protected $estado;

    /**
     * @ORM\ManyToOne(targetEntity="Paises")
     * @ORM\JoinColumn(name="pais_id")
     * @Assert\Type(type="NV\ParejasBundle\Entity\Paises")
     */
    protected $pais_id;

    /**
     * @ORM\ManyToOne(targetEntity="Provincias")
     * @ORM\JoinColumn(name="provincia_id")
     * @Assert\Type(type="NV\ParejasBundle\Entity\Provincias")
     */
    protected $provincia_id;

    /**
     * @ORM\ManyToOne(targetEntity="Localidades")
     * @ORM\JoinColumn(name="localidad_id")
     * @Assert\Type(type="NV\ParejasBundle\Entity\Localidades")
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

    /**
     * @ORM\Column(name="que_busco", type="string", length=50, nullable=true)
     */
    protected $que_busco;

    /**
     * @ORM\Column(name="para_que", type="string", length=50, nullable=true)
     */
    protected $para_que;

    public function __construct()
    {
        $this->fh_alta = new DateTime;
        $this->estado  = 1;
    }

    /*
     * SETTERS Y GETTERS
     */
    public function getId()
    {
        return $this->id;
    }

    public function setTipoPerfil($tipoPerfil)
    {
        $this->tipo_perfil = $tipoPerfil;
    }

    /**
     * 1 = pareja, 2 = chico, 3 = chica
     * @return integer
     */
    public function getTipoPerfil()
    {
        return $this->tipo_perfil;
    }

    /**
     * Is profile single or couple?
     * @return bool
     */
    public function countPeople()
    {
        return $this->tipo_perfil === 1 ? 2 : 1;
    }

    public function setUsuario(Usuarios $usuario)
    {
        $this->usuario = $usuario;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set pais_id
     *
     * @param Paises $paisId
     */
    public function setPaisId(Paises $paisId)
    {
        $this->pais_id = $paisId;
    }

    /**
     * Get pais_id
     *
     * @return Paises
     */
    public function getPaisId()
    {
        return $this->pais_id;
    }

    /**
     * Set provincia_id
     *
     * @param Provincias $provinciaId
     */
    public function setProvinciaId(Provincias $provinciaId)
    {
        $this->provincia_id = $provinciaId;
    }

    /**
     * Get provincia_id
     *
     * @return Provincias
     */
    public function getProvinciaId()
    {
        return $this->provincia_id;
    }

    /**
     * Set localidad_id
     *
     * @param Localidades $localidadId
     */
    public function setLocalidadId(Localidades $localidadId)
    {
        $this->localidad_id = $localidadId;
    }

    /**
     * Get localidad_id
     *
     * @return Localidades
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

    /**
     * Set fh_alta
     *
     * @param datetime $fhAlta
     */
    public function setFhAlta($fhAlta)
    {
        $this->fh_alta = $fhAlta;
    }

    /**
     * Get fh_alta
     *
     * @return datetime
     */
    public function getFhAlta()
    {
        return $this->fh_alta;
    }

    /**
     * Set fh_editado
     *
     * @param datetime $fhEditado
     */
    public function setFhEditado($fhEditado)
    {
        $this->fh_editado = $fhEditado;
    }

    /**
     * Get fh_editado
     *
     * @return datetime
     */
    public function getFhEditado()
    {
        return $this->fh_editado;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * Get estado
     *
     * @return integer
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set que_busco
     *
     * @param string $queBusco
     */
    public function setQueBusco($queBusco)
    {
        $this->que_busco = $queBusco;
    }

    /**
     * Get que_busco
     *
     * @return string
     */
    public function getQueBusco()
    {
        return $this->que_busco;
    }

    /**
     * Set para_que
     *
     * @param string $paraQue
     */
    public function setParaQue($paraQue)
    {
        $this->para_que = $paraQue;
    }

    /**
     * Get para_que
     *
     * @return string
     */
    public function getParaQue()
    {
        return $this->para_que;
    }
}