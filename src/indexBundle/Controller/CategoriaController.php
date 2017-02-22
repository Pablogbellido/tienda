<?php

namespace indexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoriaController extends Controller
{
    public function indexAction($categoria)
    {

    }

    public function categoriaAction()
    {
        $categorias = $this->getDoctrine()
            ->getRepository("indexBundle:Categoria")
            ->findAll();

        return $this->render('indexBundle:Index:categoria.html.twig', array("categorias" => $categorias));
    }
}
