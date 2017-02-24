<?php

namespace indexBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Factura
 */
class Factura
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var int
     */
    private $clienteId;

    /**
     * @var int
     */
    private $empresaId;

    /**
     * @var string
     */
    private $codFact;

    /**
     * @var int
     */
    private $tipoPagoId;


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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Factura
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set clienteId
     *
     * @param integer $clienteId
     * @return Factura
     */
    public function setClienteId($clienteId)
    {
        $this->clienteId = $clienteId;

        return $this;
    }

    /**
     * Get clienteId
     *
     * @return integer 
     */
    public function getClienteId()
    {
        return $this->clienteId;
    }

    /**
     * Set empresaId
     *
     * @param integer $empresaId
     * @return Factura
     */
    public function setEmpresaId($empresaId)
    {
        $this->empresaId = $empresaId;

        return $this;
    }

    /**
     * Get empresaId
     *
     * @return integer 
     */
    public function getEmpresaId()
    {
        return $this->empresaId;
    }

    /**
     * Set codFact
     *
     * @param string $codFact
     * @return Factura
     */
    public function setCodFact($codFact)
    {
        $this->codFact = $codFact;

        return $this;
    }

    /**
     * Get codFact
     *
     * @return string 
     */
    public function getCodFact()
    {
        return $this->codFact;
    }

    /**
     * Set tipoPagoId
     *
     * @param integer $tipoPagoId
     * @return Factura
     */
    public function setTipoPagoId($tipoPagoId)
    {
        $this->tipoPagoId = $tipoPagoId;

        return $this;
    }

    /**
     * Get tipoPagoId
     *
     * @return integer 
     */
    public function getTipoPagoId()
    {
        return $this->tipoPagoId;
    }
}
