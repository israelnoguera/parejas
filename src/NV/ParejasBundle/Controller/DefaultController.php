<?php

namespace NV\ParejasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller{
    
    public function indexAction(){
        //return $this->render('NVParejasBundle:Default:index.html.twig', array('name' => $name));
        return new Response('HOME');
    }
}
