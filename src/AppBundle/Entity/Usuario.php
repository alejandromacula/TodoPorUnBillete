<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Gedmo\Mapping\Annotation as GEDMO;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Usuario extends BaseUser {

    const ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';
    const ROLE_ADMIN = 'ROLE_ADMIN';

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $fechaCreado;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $fechaActualizado;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $fechaBorrado;

    /**
     * @ORM\OneToMany(targetEntity="Producto", mappedBy="usuario", cascade={"persist"})
     */
    protected $productos;

    public function getId() {
        return $this->id;
    }

    public function getFechaCreado() {
        return $this->fechaCreado;
    }

    public function getFechaActualizado() {
        return $this->fechaActualizado;
    }

    public function getFechaBorrado() {
        return $this->fechaBorrado;
    }

    public function setFechaBorrado($fechaBorrado) {
        $this->fechaBorrado = $fechaBorrado;
    }

    public function addProducto(Producto $producto) {
        $this->productos[] = $producto;
        return $this;
    }

    public function getProducto() {
        return $this->productos;
    }

    public function removeProducto(Producto $producto) {
        $this->productos->removeElement($producto);
    }

    /* ----- */

    /**
     * @ORM\PrePersist
     */
    public function onPrePersist() {
        $this->fechaCreado = new \DateTime("now");
        $this->fechaActualizado = new \DateTime("now");
    }

    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate() {
        $this->fechaActualizado = new \DateTime("now");
    }

}
