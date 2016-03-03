<?php

namespace Resources\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * ATENCION: No olvidar de poner la anotarion Gedmo\SoftDeleteable(fieldName="fechaBorrado") cuando de extienda esta entidad. Sino no funciona el borrado logico.
 */

/**
 * @Gedmo\SoftDeleteable(fieldName="fechaBorrado")
 */
Abstract class BaseEntitySoftDelete extends BaseEntity {

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $fechaBorrado;

    public function getFechaBorrado() {
        return $this->fechaBorrado;
    }

    public function setFechaBorrado($fechaBorrado) {
        $this->fechaBorrado = $fechaBorrado;
    }

}
