<?php

namespace NV\ParejasBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UsuariosRepository extends EntityRepository{
    
    public function findAllOrderedById(){
        
        return $this->getEntityManager()
            ->createQuery('SELECT p FROM NVParejasBundle:Usuarios p WHERE p.username != :value ORDER BY p.id DESC')
            ->setParameter('value', '')
            ->getResult();        
    
    }
 
    
    
}