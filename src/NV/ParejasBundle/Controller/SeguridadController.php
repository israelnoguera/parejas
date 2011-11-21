<?php

namespace NV\ParejasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use NV\ParejasBundle\Form\UsuarioType;
use NV\ParejasBundle\Entity\Usuarios;
use NV\ParejasBundle\Entity\Perfiles;

class SeguridadController extends Controller{
    
    public function accesoAction(){
        if ($this->get('request')->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $this->get('request')->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $this->get('request')->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('NVParejasBundle:Public:acceso.html.twig', array(
            'last_username' => $this->get('request')->getSession()->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        ));        
    }
    
    public function registroAction(){
        
        $usuario = new Usuarios();
        $perfil = new Perfiles();
     
        $form = $this->createForm(new UsuarioType, $usuario, array());

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {

                // Mensaje para notificar al usuario que todo ha salido bien
                $session = $this->get('request')->getSession();
                $session->setFlash('notice', 'Gracias por registrarte');

                // Obtenemos el usuario
                //$form_usuario = $form->getData();
                
                $usuario -> setUsername('Nombre de usuario');
                $perfil -> setUsuario($usuario);                
                $perfil -> setLocalidad(4);
                $perfil -> setProvincia(34);
                $perfil -> setPais(36);
                $perfil -> setTipoPerfil(2);
                
                
                // Codificamos el password
                /*
                $factory = $this->get('security.encoder_factory');                
                $codificador = $factory->getEncoder($usuario);                
                $password = $codificador->encodePassword($usuario->getPassword(), $usuario->getSalt());
                $usuario->setPassword($password);
                 */

                // Guardamos el objeto en base de datos
                $em = $this->get('doctrine')->getEntityManager();
                $em->persist($perfil);
                $em->persist($usuario);               
                $em->flush();

                // Logueamos al usuario
                $token = new UsernamePasswordToken($usuario, null, 'main', $usuario->getRoles());
                $this->get('security.context')->setToken($token);

                return $this->redirect($this->generateUrl('portada'));

            }
        }      
        
        return $this->render('NVParejasBundle:Public:registro.html.twig', array('form' => $form->createView()));
    }

    
}
