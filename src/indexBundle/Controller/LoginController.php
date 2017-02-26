<?php

namespace indexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends Controller
{
    public function loginAction(Request $request)
    {
        if($request->getMethod() == "POST") {
            $usuario = $request->get("usuario");
            $contrasena = $request->get("contrasena");

            $cliente = $this->getDoctrine()
                            ->getRepository("indexBundle:Cliente")
                            ->findOneBy(array("usuario" => $usuario, "contrasena" => $contrasena));

            if($cliente) {
                $sesion = new Session();

                $sesion->set("id", $cliente->getId());
                $sesion->set("usuario", $cliente->getUsuario());
            }
            else {
                $this->get("session")
                        ->getFlashBag()
                        ->add("errorSesion", "ERROR: El usuario o la contraseña introducidos no son correctos");
            }

            return $this->redirect($this->generateUrl("index"));
        }
        else {
            die("No tiene permiso para ver esta página.");
        }
    }

    public function logoutAction()
    {
        $sesion = new Session();

        if($sesion->has("id")) {
            $sesion->clear();

            $this->get("session")
                    ->getFlashBag()
                    ->add("cerrarSesion", "Se ha cerrado su sesión con éxito.");

            return $this->redirect($this->generateUrl("index"));
        }
        else {
            die("No tiene permiso para ver esta página.");
        }
    }
}
