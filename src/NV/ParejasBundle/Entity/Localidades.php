<?php

namespace NV\ParejasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NV\ParejasBundle\Entity\Localidades
 *
 * @ORM\Table(name="localidades")
 * @ORM\Entity(repositoryClass="NV\ParejasBundle\Repository\LocalidadesRepository")
 */
class Localidades
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer $pais_id
     *
     * @ORM\Column(name="pais_id", type="integer")
     */
    private $pais_id;

    /**
     * @var integer $provincia_id
     *
     * @ORM\Column(name="provincia_id", type="integer")
     */
    private $provincia_id;

    /**
     * @var string $localidad
     *
     * @ORM\Column(name="localidad", type="string", length=100)
     */
    private $localidad;


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
     * Set localidad
     *
     * @param string $localidad
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;
    }

    /**
     * Get localidad
     *
     * @return string 
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }
}