<?php

namespace indexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $cadena = realpath(__DIR__ . "/../../../web/images/carrusel");

        $fotos = scandir($cadena);

        array_shift($fotos);
        array_shift($fotos);

        array_pop($fotos);

        for($i = 0; $i < count($fotos); $i++) {
            $fotos[$i] = "images\carrusel". "\\" . $fotos[$i];
        }

        shuffle($fotos);

        return $this->render('indexBundle:Index:index.html.twig', array("fotos" => $fotos));
    }
}
