<?php

namespace NV\ParejasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use NV\ParejasBundle\Utilities\Dictionary;

class PerfilController extends Controller{
    
    public function editarAction(){

        //Redirección a la home para usuarios que no están logueados o les finaliza la sesión
        if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') === false) {
            return $this->redirect($this->generateUrl('home'));
        } 
        
        //Recuperamos los datos del usuarios loguerado
        $usuario = $this->get('security.context')->getToken()->getUser();
        //Tipo de perfil
        $tipoperfil = $usuario->getPerfiles()->getTipoPerfil();
        
        $arrParams = array(
            'mainmenu' => 'editarperfil',
            'lang' => $tipoperfil > 1 ? Dictionary::getLang('single') : Dictionary::getLang(),
        );
        
        return $this->render('NVParejasBundle:Private:perfil.html.twig',$arrParams);
    }
    
}