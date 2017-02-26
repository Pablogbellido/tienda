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

        // -------------------- Novedades ----------------

        $em = $this->getDoctrine()->getManager();

        $novedades = $em->createQuery(
            "SELECT p.id, p.marca, p.modelo, p.descripcion, p.precio, i.url 
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

        // ----------- Productos más vendidos ------------

        $query = $em->createQuery(
            "SELECT COUNT(fd.productoId) cant, p.id, p.marca, p.modelo, p.descripcion, p.precio, i.url 
                FROM indexBundle:Producto p,
                      indexBundle:Imagen i,
                      indexBundle:ImagenTieneProducto itp,
                      indexBundle:FacturaDetalle fd
                WHERE p.id = itp.productoId
                      AND itp.imagenId = i.id
                      AND p.id = fd.productoId
                      GROUP BY fd.productoId, p.id, i.id, itp.imagenId, itp.productoId, p.marca, p.modelo
                      ORDER BY cant DESC, p.fechaAnadido DESC"
        )->setMaxResults(4);

        $masVendidos = $query->getResult();

        $masDef = array();

        for($i = 0; $i < count($masVendidos); $i++) {
            if($i % 2 == 0) {
                array_push($masDef, $masVendidos[$i]);
            }
        }

        // ---------- Últimas unidades ---------

        $query = $em->createQuery(
            "SELECT p.id, p.marca, p.modelo, p.descripcion, p.precio, i.url, p.stockActual 
                FROM indexBundle:Producto p,
                      indexBundle:Imagen i,
                      indexBundle:ImagenTieneProducto itp
                WHERE p.id = itp.productoId
                      AND itp.imagenId = i.id
                      GROUP BY p.id, i.id, itp.imagenId, itp.productoId, p.marca, p.modelo
                ORDER BY p.stockActual ASC"
        )->setMaxResults(4);

        $ultimasUni = $query->getResult();

        $ultimasDef = array();

        for($i = 0; $i < count($ultimasUni); $i++) {
            if($i % 2 == 0) {
                array_push($ultimasDef, $ultimasUni[$i]);
            }
        }

        return $this->render('indexBundle:Index:index.html.twig', array("fotos" => $fotos, "novedades" => $resDef, "masVendidos" => $masDef, "ultimasUnidades" => $ultimasDef));
    }
}
