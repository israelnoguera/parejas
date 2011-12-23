<?php

namespace NV\ParejasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use NV\ParejasBundle\Utilities\Dictionary;
use NV\ParejasBundle\Entity\Perfiles;
use NV\ParejasBundle\Form\EditaPerfilType;

class PerfilController extends Controller{

    public function editarAction()
    {
        // Redirección a la home para usuarios que no están logueados o les finaliza la sesión
        if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') === false) {
            return $this->redirect($this->generateUrl('home'));
        }

        // Recuperamos los datos del usuarios loguerado
        $usuario = $this->get('security.context')->getToken()->getUser();
        // Perfil
        $perfil = $usuario->getPerfiles();
        // Tipo de perfil
        $tipoperfil = $perfil->getTipoPerfil();

        $formBasico = $this->createForm(new EditaPerfilType(), $perfil);

        $arrParams = array(
            'formbasico' => $formBasico->createView(),
            'mainmenu'   => 'editarperfil',
            'count'      => $perfil->countPeople(),
        );

        return $this->render('NVParejasBundle:Private:perfil.html.twig', $arrParams);
    }

}