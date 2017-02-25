<?php

namespace indexBundle\Controller;

use indexBundle\Entity\Cliente;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegistroController extends Controller
{
    public function registroAction(Request $request)
    {
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
                        ->add("error", "ERROR: El usuario introducido debe ser único.");
            }
        }

        return $this->render('indexBundle:Index:registro.html.twig');
    }
}
