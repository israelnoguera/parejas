<?php

namespace NV\ParejasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NV\ParejasBundle\Entity\Geo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Geo{
    
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="id_pais", type="integer", columnDefinition="INT(3) NOT NULL")
     */
    private $id_pais;    
    
    /**
     * @ORM\Column(name="id_provincia", type="integer", columnDefinition="INT(3) NOT NULL")
     */
    private $id_provincia;     
    
    /**
     * @ORM\Column(name="localidad", type="string", length="100")
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
     * Set id_pais
     *
     * @param integer $idPais
     */
    public function setIdPais($idPais)
    {
        $this->id_pais = $idPais;
    }

    /**
     * Get id_pais
     *
     * @return integer 
     */
    public function getIdPais()
    {
        return $this->id_pais;
    }

    /**
     * Set id_provincia
     *
     * @param integer $idProvincia
     */
    public function setIdProvincia($idProvincia)
    {
        $this->id_provincia = $idProvincia;
    }

    /**
     * Get id_provincia
     *
     * @return integer 
     */
    public function getIdProvincia()
    {
        return $this->id_provincia;
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