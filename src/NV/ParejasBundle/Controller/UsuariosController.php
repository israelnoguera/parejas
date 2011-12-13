<?php

namespace NV\ParejasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsuariosController extends Controller{
    
    public function indexAction(){
        
        //CONSULTA MEDIANTE DQL Y REPOSITORIO (metodo aconsejado)
        $em = $this->getDoctrine()->getEntityManager();
        $usuarios = $em->getRepository('NVParejasBundle:Usuarios')
            ->findAllUsers();

        $arrParams = array(
            'mainmenu' => 'usuarios',
            'usuarios' => $usuarios
        );
        
        return $this->render('NVParejasBundle:Public:usuarios.html.twig',$arrParams);
        
    }
    
}