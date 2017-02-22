<?php

namespace indexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        // ------------- Fotos aleatorias del carrusel ------------------

        $cadena = realpath(__DIR__ . "/../../../web/images/carrusel");

        $fotos = scandir($cadena);

        array_shift($fotos);
        array_shift($fotos);

        array_pop($fotos);

        for($i = 0; $i < count($fotos); $i++) {
            $fotos[$i] = "images\carrusel". "\\" . $fotos[$i];
        }

        shuffle($fotos);

        // -------------------------- FIN FOTOS -------------------------

        // -------------------- Novedades ----------------

//        $novedades = $this->getDoctrine()
//                            ->getRepository("indexBundle:Producto")
//                            ->findBy(array(), array("fechaAnadido" => "DESC"), 2);

        $em = $this->getDoctrine()->getManager();

        $novedades = $em->createQuery(
            "SELECT p.marca, p.modelo, p.descripcion, p.precio, i.url 
                FROM indexBundle:Producto p,
                      indexBundle:Imagen i,
                      indexBundle:ImagenTieneProducto itp
                WHERE p.id = itp.productoId
                      AND itp.imagenId = i.id
                ORDER BY p.fechaAnadido DESC"
        )->setMaxResults(4);

        $resultado = $novedades->getResult();

        $resDef = array();

        for($i = 0; $i < count($resultado); $i++) {
            if($i % 2 == 0) {
                array_push($resDef, $resultado[$i]);
            }
        }

        // ---------------

        return $this->render('indexBundle:Index:index.html.twig', array("fotos" => $fotos, "novedades" => $resDef));
    }
}
