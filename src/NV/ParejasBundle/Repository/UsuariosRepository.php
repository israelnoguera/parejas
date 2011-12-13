<?php

namespace NV\ParejasBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UsuariosRepository extends EntityRepository{

    public function findAllUsers($order='id'){        
        return $this->getEntityManager()
            ->createQuery('
                    SELECT p 
                    FROM NVParejasBundle:Usuarios p 
                    ORDER BY p.'.$order.' DESC
                    ')
            ->getResult();            
    }
 
    public function getAnuncios($id_usuario){
        return $this->getEntityManager()
            ->createQuery('
                    SELECT p 
                    FROM NVParejasBundle:Anuncios p
                    WHERE usuario_id = :idusuario
                    ORDER BY p.fechahora DESC
                    ')
                ->setParameter('idusuario', $id_usuario)
            ->getResult();        
    }
    
}