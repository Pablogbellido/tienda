<?php

namespace indexBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImagenTieneProducto
 */
class ImagenTieneProducto
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $imagenId;

    /**
     * @var int
     */
    private $productoId;


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
     * Set imagenId
     *
     * @param integer $imagenId
     * @return ImagenTieneProducto
     */
    public function setImagenId($imagenId)
    {
        $this->imagenId = $imagenId;

        return $this;
    }

    /**
     * Get imagenId
     *
     * @return integer 
     */
    public function getImagenId()
    {
        return $this->imagenId;
    }

    /**
     * Set productoId
     *
     * @param integer $productoId
     * @return ImagenTieneProducto
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
}
