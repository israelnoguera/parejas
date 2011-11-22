<?php

namespace NV\ParejasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsuariosController extends Controller{
    
    public function indexAction(){
        
        /*
        $usuarios = $this->getDoctrine()
            ->getRepository('NVParejasBundle:Usuarios')
            ->findAll();
        */
        
        $repositorio = $this->getDoctrine()->getRepository('NVParejasBundle:Usuarios');
        
        $consulta = $repositorio ->createQueryBuilder('p')
                ->where('p.username != :value ')
                ->setParameter('value', '')
                ->orderBy('p.id','DESC')
                ->getQuery();
        
        $usuarios = $consulta->getResult();
        
        $arrParams = array(
            'mainmenu' => 'usuarios',
            'usuarios' => $usuarios
        );
        
        return $this->render('NVParejasBundle:Public:usuarios.html.twig',$arrParams);
        
    }
    
}