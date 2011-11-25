<?php

namespace NV\ParejasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class WebservicesController extends Controller{
    
    public function getProvinciasByIdPaisAction(){
        
            //CONSULTA MEDIANTE DQL Y REPOSITORIO (metodo aconsejado)
            //$em = $this->getDoctrine()->getEntityManager();
            //$paises = $em->getRepository('NVParejasBundle:Paises')
            //    ->findAllOrderedById(); 
            
            //return new Response($paises -> getPais());
        
        $peticion = $this->getRequest();
        if($peticion->isXmlHttpRequest()){
            $id_pais = $peticion->request->get('id');
            
            $em = $this->getDoctrine()->getEntityManager();
            $paises = $em->getRepository('NVParejasBundle:Paises')
                ->findAllOrderedById(); 
           
            
            $return = json_encode($paises);
            return new Response($return,200);
        }else{
            return new Response("Error",400);
        }
    }
    
}
