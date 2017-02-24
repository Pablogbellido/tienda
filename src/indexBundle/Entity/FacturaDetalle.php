<?php

namespace indexBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FacturaDetalle
 */
class FacturaDetalle
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $productoId;

    /**
     * @var int
     */
    private $facturaId;

    /**
     * @var int
     */
    private $cantidad;

    /**
     * @var string
     */
    private $precioUnitario;

    /**
     * @var int
     */
    private $tipoIva;

    /**
     * @var int
     */
    private $descuento;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set productoId
     *
     * @param integer $productoId
     * @return FacturaDetalle
     */
    public function setProductoId($productoId)
    {
        $this->productoId = $productoId;

        return $this;
    }

    /**
     * Get productoId
     *
     * @return integer 
     */
    public function getProductoId()
    {
        return $this->productoId;
    }

    /**
     * Set facturaId
     *
     * @param integer $facturaId
     * @return FacturaDetalle
     */
    public function setFacturaId($facturaId)
    {
        $this->facturaId = $facturaId;

        return $this;
    }

    /**
     * Get facturaId
     *
     * @return integer 
     */
    public function getFacturaId()
    {
        return $this->facturaId;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return FacturaDetalle
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set precioUnitario
     *
     * @param string $precioUnitario
     * @return FacturaDetalle
     */
    public function setPrecioUnitario($precioUnitario)
    {
        $this->precioUnitario = $precioUnitario;

        return $this;
    }

    /**
     * Get precioUnitario
     *
     * @return string 
     */
    public function getPrecioUnitario()
    {
        return $this->precioUnitario;
    }

    /**
     * Set tipoIva
     *
     * @param integer $tipoIva
     * @return FacturaDetalle
     */
    public function setTipoIva($tipoIva)
    {
        $this->tipoIva = $tipoIva;

        return $this;
    }

    /**
     * Get tipoIva
     *
     * @return integer 
     */
    public function getTipoIva()
    {
        return $this->tipoIva;
    }

    /**
     * Set descuento
     *
     * @param integer $descuento
     * @return FacturaDetalle
     */
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;

        return $this;
    }

    /**
     * Get descuento
     *
     * @return integer 
     */
    public function getDescuento()
    {
        return $this->descuento;
    }
}
