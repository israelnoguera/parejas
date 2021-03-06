<?php

namespace NV\ParejasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="paises")
 * @ORM\Entity(repositoryClass="NV\ParejasBundle\Repository\PaisesRepository")
 */
class Paises
{
    /**
     * @var integer $id
     *
     * @ORM\Id 
     * @ORM\Column(type="integer")     
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer $iso1
     *
     * @ORM\Column(name="iso1", type="integer")
     */
    private $iso1;

    /**
     * @var integer $iso2
     *
     * @ORM\Column(name="iso2", type="integer")
     */
    private $iso2;

    /**
     * @var integer $iso3
     *
     * @ORM\Column(name="iso3", type="integer")
     */
    private $iso3;

    /**
     * @var string $pais
     *
     * @ORM\Column(name="pais", type="string", length=100)
     */
    private $pais;

    /**
     * @var string $slug
     *
     * @ORM\Column(name="slug", type="string", length=100)
     */
    private $slug;

    /**
     * @var integer $estado
     *
     * @ORM\Column(name="estado", type="integer")
     */
    private $estado;


    public function getId(){
        return $this->id;
    }

    public function __toString(){
       return strval($this->id);
    } 
 
    public function setIso1($iso1){
        $this->iso1 = $iso1;
    }

    public function getIso1(){
        return $this->iso1;
    }

    public function setIso2($iso2){
        $this->iso2 = $iso2;
    }

    public function getIso2(){
        return $this->iso2;
    }

    public function setIso3($iso3){
        $this->iso3 = $iso3;
    }

    public function getIso3(){
        return $this->iso3;
    }

    public function setPais($pais){
        $this->pais = $pais;
    }

    public function getPais(){
        return $this->pais;
    }

    public function setSlug($slug){
        $this->slug = $slug;
    }

    public function getSlug(){
        return $this->slug;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function getEstado(){
        return $this->estado;
    }
}