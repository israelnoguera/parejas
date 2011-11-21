<?php

namespace NV\ParejasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PortadaController extends Controller{
    
    public function indexAction(){
        return $this->render('NVParejasBundle:Public:home.html.twig',array(
            'mainmenu' => 'inicio'
        ));
    }
    
}