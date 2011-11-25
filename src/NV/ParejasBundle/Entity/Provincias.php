<?php

namespace NV\ParejasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NV\ParejasBundle\Entity\Provincias
 *
 * @ORM\Table(name="provincias")
 * @ORM\Entity(repositoryClass="NV\ParejasBundle\Repository\ProvinciasRepository")
 */
class Provincias
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
     * @var integer $comunidad_id
     *
     * @ORM\Column(name="comunidad_id", type="integer")
     */
    private $comunidad_id;

    /**
     * @var string $provincia
     *
     * @ORM\Column(name="provincia", type="string", length=50)
     */
    private $provincia;

    /**
     * @var string $slug
     *
     * @ORM\Column(name="slug", type="string", length=50)
     */
    private $slug;


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
     * Set comunidad_id
     *
     * @param integer $comunidadId
     */
    public function setComunidadId($comunidadId)
    {
        $this->comunidad_id = $comunidadId;
    }

    /**
     * Get comunidad_id
     *
     * @return integer 
     */
    public function getComunidadId()
    {
        return $this->comunidad_id;
    }

    /**
     * Set provincia
     *
     * @param string $provincia
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }

    /**
     * Get provincia
     *
     * @return string 
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}