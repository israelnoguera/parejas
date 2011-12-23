<?php

namespace NV\ParejasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GeoController extends Controller
{
    public function getPaisesAction()
    {
        $paises = $this->getDoctrine()
                       ->getRepository('NVParejasBundle:Paises')
                       ->findAllPaises();

        return new Response(json_encode($paises));
    }

    public function getProvinciasByIdPaisAction()
    {
        $peticion = $this->getRequest();
        if(!$peticion->isXmlHttpRequest()){
            return new Response('Error', 400);
        }

        $id_pais = $peticion->get('id');
        $provincias = $this->getDoctrine()
                           ->getRepository('NVParejasBundle:Provincias')
                           ->findAllByIdPais($id_pais);

        return new Response(json_encode($provincias));
    }

    public function getLocalidadesByIdProvinciaAction()
    {
        $peticion = $this->getRequest();
        if(!$peticion->isXmlHttpRequest()){
            return new Response('Error', 400);
        }

        $id_provincia = $peticion->get('id');
        $localidades = $this->getDoctrine()
                            ->getRepository('NVParejasBundle:Localidades')
                            ->findAllByIdProvincia($id_provincia);

        return new Response(json_encode($localidades));
    }
}
