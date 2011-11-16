<?php

namespace NV\ParejasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PortadaController extends Controller{
    
    public function indexAction(){
        return new Response('portada');
    }
    
}