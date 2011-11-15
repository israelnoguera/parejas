<?php

namespace NV\ParejasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use NV\ParejasBundle\Form\UsuarioType;
use NV\ParejasBundle\Entity\Usuarios;

class SeguridadController extends Controller{
    
    public function registroAction(){
        
        $usuario = new Usuarios();
        $form = $this->createForm(new UsuarioType, $usuario, array());
        //$form = $this->get('form.factory')->create(new UsuarioType(), array());

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {

                // Mensaje para notificar al usuario que todo ha salido bien
                $session = $this->get('request')->getSession();
                $session->setFlash('notice', 'Gracias por registrarte');

                // Obtenemos el usuario
                $usuario = $form->getData();

                
                // Codificamos el password
                /*
                $factory = $this->get('security.encoder_factory');                
                $codificador = $factory->getEncoder($usuario);                
                $password = $codificador->encodePassword($usuario->getPassword(), $usuario->getSalt());
                $usuario->setPassword($password);
                 */

                // Guardamos el objeto en base de datos
                $em = $this->get('doctrine')->getEntityManager();
                $em->persist($usuario);
                $em->flush();

                // Logueamos al usuario
                $token = new UsernamePasswordToken($usuario, null, 'main', $usuario->getRoles());
                $this->get('security.context')->setToken($token);

                return $this->redirect($this->generateUrl('portada'));

            }
        }      
        
        return $this->render('NVParejasBundle:Seguridad:registro.html.twig', array('form' => $form->createView()));
    }

    
}
