<?php

namespace indexBundle\Controller;

use indexBundle\Entity\Cliente;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegistroController extends Controller
{
    public function registroAction(Request $request)
    {
        $contrasena = null;
        $nombre = null;
        $apellidos = null;
        $email = null;

        if($request->getMethod() == "POST") {
            $usuario = $request->get("usuario");
            $contrasena = $request->get("contrasena");
            $nombre = $request->get("nombre");
            $apellidos = $request->get("apellidos");
            $email = $request->get("email");

            $cliente = new Cliente();

            $usuRepe = $this->getDoctrine()
                            ->getRepository("indexBundle:Cliente")
                            ->findOneBy(array("usuario" => $usuario));

            if($usuRepe) {
                $this->get("session")
                        ->getFlashBag()
                        ->add("error", "ERROR: Debe introducir otro usuario que sea único.");
            }
            else {
                $cliente->setUsuario($usuario)
                        ->setContrasena($contrasena)
                        ->setNombre($nombre)
                        ->setApellidos($apellidos)
                        ->setEmail($email);

                $em = $this->getDoctrine()->getManager();

                $em->persist($cliente);
                $em->flush();

                $this->get("session")
                    ->getFlashBag()
                    ->add("exito", "Usuario '" . $usuario . "' registrado con éxito.");

                $contrasena = null;
                $nombre = null;
                $apellidos = null;
                $email = null;
            }
        }

        return $this->render('indexBundle:Index:registro.html.twig', array(
            "contrasena" => $contrasena,
            "nombre" => $nombre,
            "apellidos" => $apellidos,
            "email" => $email
        ));
    }
}
