<?php

namespace NV\ParejasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;


/**
 * @ORM\Table(name="usuarios")
 * @ORM\Entity(repositoryClass="NV\ParejasBundle\Repository\UsuariosRepository")
 * @DoctrineAssert\UniqueEntity(fields={"username"},message="El nombre de usuario no está disponible")
 * @DoctrineAssert\UniqueEntity(fields={"email"},message="El email indicado no está disponible")
 */
class Usuarios implements UserInterface, \Serializable{ 
    
    
    /**
     * @ORM\OneToOne(targetEntity="Perfiles", mappedBy="usuario")
     */
    protected $perfiles;  
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
    * @ORM\Column(type="string",length=100)
    * @Assert\NotBlank()
    * @Assert\Regex(pattern="/^[a-zA-Z0-9\_\-\.]+$/",match=true, message="Nombre de usuario inválido")
    * @Assert\MinLength(4)
    * @Assert\MaxLength(100)
    */
    protected $username;

    /**
    * @ORM\Column(type="string",length=100)
    * @Assert\NotBlank(message="E-mail obligatorio")
    * @Assert\Email(message="E-mail no válido")
    */
    protected $email;

    /**
    * @ORM\Column(type="string", length=100)
    * @Assert\NotBlank(message="Entre 5 y 10 caracteres")
    * @Assert\MinLength(5)
    * @Assert\MaxLength(10)
    */
    protected $password;
    
    /**
    * @ORM\Column(type="string", length=40)
    */
    protected $roles;    

    /**
    * @ORM\Column(type="integer",columnDefinition="TINYINT(1) NULL")
    * @Assert\NotBlank()
    */
    protected $state;  
    
    /**
    * @ORM\Column(type="datetime")    
    */
    protected $fh_alta;     
    
    /**
    * @ORM\Column(type="datetime",nullable=true)    
    */
    protected $fh_ult_acceso;      
    
    public function __construct(){
        $this->fh_alta = new \DateTime("now");
        $this->state = 1;
        $this->roles = 'USER';
    }    

    public function getSalt(){
        return false;
    }   

    public function eraseCredentials(){
        return false;
    }

    public function equals(UserInterface $user){
        return $user->getUsername() == $this->getUsername();
    }    
    
    public function getCondiciones(){
        
    } 
    
    public function setCondiciones(){
        
    }    
    
    public function serialize(){
        return serialize(array(
            $this->getUsername()
        ));
    }

    public function unserialize($serialized){
        $arr = unserialize($serialized);
        $this->setUsername($arr[0]);
    }

    public function getId(){
        return $this->id;
    }    
    
    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function getUsername(){
        return $this->username;
    }    
    
    public function setRoles($roles){
        $this->roles = $roles;
    }

    public function getRoles(){
        return array('ROLE_'.$this->roles);
    }    
    
    public function setState($state){
        $this->state = $state;
    }

    public function getState(){
        return $this->state;
    }

    public function setFhAlta($fhAlta){
        $this->fh_alta = $fhAlta;
    }

    public function getFhAlta(){
        return $this->fh_alta;
    }

    public function setFhUltAcceso($fhUltAcceso){
        $this->fh_ult_acceso = $fhUltAcceso;
    }

    public function getFhUltAcceso(){
        return $this->fh_ult_acceso;
    }      

    public function setPerfiles(\NV\ParejasBundle\Entity\Perfiles $perfiles){
        $this->perfiles = $perfiles;
    }

    public function getPerfiles(){
        return $this->perfiles;
    }
    
}