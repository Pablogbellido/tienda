<?php

namespace indexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoriaController extends Controller
{
    public function indexAction($nombre)
    {
        // Ponemos la primera letra en mayúscula para buscar la categoría

        $nombreDef = ucfirst(strtolower($nombre));

        $em = $this->getDoctrine()->getManager();

        $categoria = $this->getDoctrine()
                            ->getRepository("indexBundle:Categoria")
                            ->findOneBy(array("nombre" => $nombreDef));

        if($categoria) {

            $idCat = $categoria->getId();

            $query = $em->createQuery(
                "SELECT p.marca, p.id, p.modelo, p.precio, p.descripcion, i.url
                FROM indexBundle:Producto p,
                      indexBundle:Imagen i,
                      indexBundle:ImagenTieneProducto itp,
                      indexBundle:Categoria cat
                WHERE p.id = itp.productoId
                      AND itp.imagenId = i.id
                      AND cat.id = p.categoriaId
                      AND p.categoriaId = :idCat
                      GROUP BY p.marca, p.modelo"
            )->setParameter("idCat", $idCat);

            $productos = $query->getResult();

            // Marcas de los productos que se encuentran en la categoría deseada

            $em = $this->getDoctrine()->getManager();

            $query = $em->createQuery(
                "SELECT DISTINCT p.marca
                FROM indexBundle:Producto p,
                      indexBundle:Categoria c
                WHERE p.categoriaId = c.id
                  AND c.id = :idCat"
            )->setParameter("idCat", $idCat);

            $marcas = $query->getResult();

            return $this->render("indexBundle:Index:categorias.html.twig", array("productos" => $productos, "nombre" => $nombreDef, "marcas" => $marcas));
        }
        else {
            return $this->render("indexBundle:Index:404.html.twig", array("nombre" => $nombre));
        }
    }

    public function categoriaAction()
    {
        $categorias = $this->getDoctrine()
            ->getRepository("indexBundle:Categoria")
            ->findAll();

        return $this->render('indexBundle:Index:nombre_categorias.html.twig', array("categorias" => $categorias));
    }
}
