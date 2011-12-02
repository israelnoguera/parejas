<?php

namespace NV\ParejasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PerfilController extends Controller{
    
    public function editarAction(){
        return new response('Edicion perfil');
    }
    
}