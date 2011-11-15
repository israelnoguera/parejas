<?php

namespace NV\ParejasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use NV\ParejasBundle\Validator\DNI;

/**
 * NV\ParejasBundle\Entity
 *
 * @ORM\Table(name="usuarios")
 * @ORM\Entity()
 * @UniqueEntity(fields="email")
 */
class Usuarios implements UserInterface, \Serializable{
    /*
     * Implementation of UserInterface
     */

    public function getRoles(){
        return array('ROLE_USER');
    }

    public function getSalt(){
        return false;
    }

    public function getUsername(){
        return $this->username;
    }

    public function eraseCredentials(){

    }

    public function equals(UserInterface $user){
        return $user->getUsername() == $this->getUsername();
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
    * @ORM\Column(type="string")
    * @Assert\NotBlank()
    * @Assert\MinLength(3)
    * @Assert\MaxLength(20)
    */
    protected $nombre;

    /**
    * @ORM\Column(type="string")
    * @Assert\NotBlank()
    * @Assert\MinLength(3)
    * @Assert\MaxLength(20)
    */
    protected $apellidos;

    /**
    * @ORM\Column(type="string")
    * @Assert\NotBlank()
    * @DNI()
    */
    protected $dni;

    /**
    * @ORM\Column(type="string")
    * @Assert\NotBlank()
    * @Assert\MinLength(5)
    * @Assert\MaxLength(100)
    */
    protected $direccion;

    /**
    * @ORM\Column(type="string")
    * @Assert\NotBlank()
    */
    protected $telefono;

    /**
    * @ORM\Column(type="string")
    * @Assert\NotBlank()
    * @Assert\Email()
    */
    protected $email;

    /**
    * @ORM\Column(type="string")
    * @Assert\NotBlank()
    * @Assert\MinLength(5)
    * @Assert\MaxLength(10)
    */
    protected $password;

    public function __toString(){
        return $this->getNombreCompleto();
    }

    public function getNombreCompleto(){
        return $this->getNombre().' '.$this->getApellidos();
    }

    public function serialize(){
        return serialize(array(
            $this->getEmail()
        ));
    }

    public function unserialize($serialized){
        $arr = unserialize($serialized);
        $this->setEmail($arr[0]);
    }

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId(){
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     */
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    /**
     * Get nombre
     *
     * @return string $nombre
     */
    public function getNombre(){
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     */
    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    /**
     * Get apellidos
     *
     * @return string $apellidos
     */
    public function getApellidos(){
        return $this->apellidos;
    }

    /**
     * Set dni
     *
     * @param string $dni
     */
    public function setDni($dni){
        $this->dni = $dni;
    }

    /**
     * Get dni
     *
     * @return string $dni
     */
    public function getDni(){
        return $this->dni;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     */
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    /**
     * Get direccion
     *
     * @return string $direccion
     */
    public function getDireccion(){
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     */
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    /**
     * Get telefono
     *
     * @return string $telefono
     */
    public function getTelefono(){
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email){
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string $email
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password){
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string $password
     */
    public function getPassword(){
        return $this->password;
    }

}
