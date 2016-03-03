<?php

namespace Resources\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

Abstract class BaseEntity {

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

    public function getId() {
        return $this->id;
    }

    public function getFechaCreado() {
        return $this->fechaCreado;
    }

    public function getFechaActualizado() {
        return $this->fechaActualizado;
    }

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
