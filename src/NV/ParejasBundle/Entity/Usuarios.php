<?php

namespace NV\ParejasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;


/**
 * @ORM\Table(name="usuarios")
 * @ORM\Entity()
 * @DoctrineAssert\UniqueEntity(fields={"username"},message="El nombre de usuario no está disponible")
 * @DoctrineAssert\UniqueEntity(fields={"email"},message="El email indicado no está disponible")
 */
class Usuarios implements UserInterface, \Serializable{ 
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
    * @ORM\Column(type="string")
    * @Assert\NotBlank()
    * @Assert\Regex(pattern="/^[a-zA-Z0-9\_\-\.]+$/",match=true, message="Nombre de usuario inválido")
    * @Assert\MinLength(4)
    * @Assert\MaxLength(100)
    */
    protected $username;

    /**
    * @ORM\Column(type="string")
    * @Assert\NotBlank(message="E-mail obligatorio")
    * @Assert\Email(message="E-mail no válido")
    */
    protected $email;

    /**
    * @ORM\Column(type="string", length=255)
    * @Assert\NotBlank()
    * @Assert\MinLength(5)
    * @Assert\MaxLength(10)
    */
    protected $password;
    
    /**
    * @ORM\Column(type="string")
    * @Assert\NotBlank()
    */
    protected $roles;    

    public function getRoles(){
        return array('ROLE_'.$this->roles);
    }

    public function getSalt(){
        return false;
    }

    public function getUsername(){
        return $this->username;
    }

    public function eraseCredentials(){
        return false;
    }

    public function equals(UserInterface $user){
        return $user->getUsername() == $this->getUsername();
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

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId(){
        return $this->id;
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

    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username){
        $this->username = $username;
    }

    /**
     * Set roles
     *
     * @param string $roles
     */
    public function setRoles($roles){
        $this->roles = $roles;
    }

}