<?php

namespace indexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class ClienteController extends Controller
{
    public function panelAction(Request $request)
    {
        $sesion = new Session();

        if($sesion->has("id")) {

            $cliente = $this->getDoctrine()
                ->getRepository("indexBundle:Cliente")
                ->findOneBy(array("id" => $sesion->get("id")));

            if($request->getMethod() == "POST") {
                // Recogida de datos

                $usuario = $request->get("usuario");
                $contrasena = $request->get("contrasena");
                $nombre = $request->get("nombre");
                $apellidos = $request->get("apellidos");
                $email = $request->get("email");

                $cliente->setUsuario($usuario)
                            ->setContrasena($contrasena)
                            ->setNombre($nombre)
                            ->setApellidos($apellidos)
                            ->setEmail($email);

                $em = $this->getDoctrine()->getManager();

                $em->flush();

                $this->get("session")
                        ->getFlashBag()
                        ->add("exito", "Se han modificado los datos con éxito");
            }

            //var_dump($cliente);exit;

            return $this->render("indexBundle:Index:panel_control.html.twig", array("cliente" => $cliente));
        }
        else {
            $this->get("session")
                ->getFlashBag()
                ->add("errorSesion", "Debes iniciar sesión para ver este contenido.");

            return $this->redirect($this->generateUrl("index"));
        }
    }
}
