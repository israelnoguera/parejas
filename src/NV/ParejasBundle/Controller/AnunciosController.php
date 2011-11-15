<?php

namespace NV\ParejasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AnunciosController extends Controller{
    
    public function indexAction($pag){
        //return $this->render('NVParejasBundle:Default:index.html.twig', array('name' => $name));
        return new Response('ANUNCIOS viendo pagina:'. $pag );
    }
    
    public function usuarioAction($user,$pag){
        //return $this->render('NVParejasBundle:Default:index.html.twig', array('name' => $name));
        return new Response('ANUNCIOS del usuario '. $user .', viendo pagina:'. $pag );
    }    
    
}
