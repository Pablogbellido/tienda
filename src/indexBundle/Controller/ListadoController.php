<?php

namespace indexBundle\Controller;

use indexBundle\Entity\Factura;
use indexBundle\Entity\Agencia;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ListadoController extends Controller
{
    public function listadoAction(Request $request)
    {	
		$agencias = $this->getDoctrine()
						->getRepository("indexBundle:Agencia")->findAll();
		
		$em = $this->getDoctrine()
					->getManager();
		
		$query = $em->createQuery("
			SELECT f.fecha
			FROM indexBundle:Factura f
			ORDER BY f.fecha ASC
		")->setMaxResults(1); 
		
		$fantigua = $query->getResult();
		
		$query = $em->createQuery("
			SELECT f.fecha
			FROM indexBundle:Factura f
			ORDER BY f.fecha DESC
		")->setMaxResults(1); 

		$fnueva = $query->getResult();
		
	        $query4 = $em->createQuery(
                "SELECT c.id, c.nombre, c.apellidos, f.fecha, e.nombre as transporte
                    FROM indexBundle:Cliente c,
                         indexBundle:Factura f,
                         indexBundle:AgenciaTransporte e
                    WHERE f.clienteId = c.id 
                      AND e.id = f.empresaTransporteId
                      AND f.empresaTransporteId = 1"
            );

            $listadoagencias1 = $query4->getResult();
			
        return $this->render('indexBundle:Index:listado.html.twig', array("agencias"=>$agencias, "fechaAntigua"=>$fantigua, "fechaNueva"=>$fnueva, "listadoAgencias1"=>$listadoagencias1));
    }
	
	
	public function listado1Action(){
		return $this->render('indexBundle:Index:listado1.html.twig'); 
	}
	
	public function listado2Action(){
		return $this->render('indexBundle:Index:listado2.html.twig'); 
	}
	
	
}
