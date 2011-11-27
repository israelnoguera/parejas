<?php

namespace NV\ParejasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GeoController extends Controller{
    
    public function getPaisesAction(){       

        $em = $this->getDoctrine()->getEntityManager();
        $paises = $em->getRepository('NVParejasBundle:Paises')
            ->findAllPaises();            

        $return = json_encode($paises);
        return new Response($return,200);

    }    
    
    public function getProvinciasByIdPaisAction(){
        
        $peticion = $this->getRequest();
        if($peticion->isXmlHttpRequest()){
            $id_pais = $peticion->request->get('id');
            
            $em = $this->getDoctrine()->getEntityManager();
            $provincias = $em->getRepository('NVParejasBundle:Provincias')
                ->findAllByIdPais($id_pais);            
            
            $return = json_encode($provincias);
            return new Response($return,200);
        }else{
            return new Response("Error",400);
        }
    }
    
    public function getLocalidadesByIdProvinciaAction(){
        
        $peticion = $this->getRequest();
        if($peticion->isXmlHttpRequest()){
            $id_provincia = $peticion->request->get('id');
            
            $em = $this->getDoctrine()->getEntityManager();
            $localidades = $em->getRepository('NVParejasBundle:Localidades')
                ->findAllByIdProvincia($id_provincia);            
            
            $return = json_encode($localidades);
            return new Response($return,200);
        }else{
            return new Response("Error",400);
        }
    }    
    
}
