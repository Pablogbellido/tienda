<?php

namespace indexBundle\Controller;

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
        }

        return $this->render('indexBundle:Index:registro.html.twig');
    }
}
