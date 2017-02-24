<?php

namespace indexBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoPago
 */
class TipoPago
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $metodo;


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
     * Set metodo
     *
     * @param string $metodo
     * @return TipoPago
     */
    public function setMetodo($metodo)
    {
        $this->metodo = $metodo;

        return $this;
    }

    /**
     * Get metodo
     *
     * @return string 
     */
    public function getMetodo()
    {
        return $this->metodo;
    }
}
