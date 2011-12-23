<?php

namespace NV\ParejasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use NV\ParejasBundle\Form\UsuarioType;
use NV\ParejasBundle\Entity\Usuarios;
use NV\ParejasBundle\Entity\Perfiles;

class AccesoController extends Controller
{
    public function loginAction()
    {
        // Redirección a la home para usuarios que acceden al apartado de login y ya están logueados
        if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') === true) {
            return $this->redirect($this->generateUrl('home'));
        }

        // Tratamiento de los parámetros recibidos del form de login
        if ($this->get('request')->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $this->get('request')->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $this->get('request')->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('NVParejasBundle:Public:login.html.twig', array(
            'mainmenu' => 'login',
            'last_username' => $this->get('request')->getSession()->get(SecurityContext::LAST_USERNAME),
            'error' => $error,
        ));
    }

    public function registroAction()
    {
        $usuario = new Usuarios();
        $form = $this->createForm(new UsuarioType(), $usuario);
        $request = $this->get('request');

        if ($request->getMethod() === 'POST') {
            $form->bindRequest($request);
            $em = $this->getDoctrine()->getEntityManager();
            if ($form->isValid()) {
                // Mensaje para notificar al usuario que todo ha salido bien
                $session = $request->getSession();
                $session->setFlash('notice', 'Gracias por registrarte');

                // Guardamos el objeto en base de datos
                $em->persist($usuario);

                // Relacionamos los dos objetos
                $perfil = $usuario->getPerfiles();
                $perfil->setUsuario($usuario);
                $em->persist($perfil);

                $em->flush();

                // Logueamos al usuario
                $token = new UsernamePasswordToken($usuario, null, 'main', $usuario->getRoles());
                $this->get('security.context')->setToken($token);

                /*
                $mensaje = \Swift_Message::newInstance()
                    ->setSubject('Bienvenido a parejas.com')
                    ->setFrom('hola@parejas.com')
                    ->setTo($usuario->getEmail())
                    ->setBody($this->renderView('NVParejasBundle:Email:registro.html.twig', array(
                        'usuario' => $usuario,
                    )));
                $this->get('mailer')->send($mensaje);
                 */

                return $this->redirect($this->generateUrl('bienvenido'));
            }
        }

        return $this->render('NVParejasBundle:Public:registro.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function bienvenidoAction()
    {
        return $this->render('NVParejasBundle:Public:bienvenido.html.twig');
    }
}
