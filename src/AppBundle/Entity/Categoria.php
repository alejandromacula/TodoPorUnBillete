<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Resources\Entity\BaseEntitySoftDelete;
use Gedmo\Mapping\Annotation as GEDMO;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @GEDMO\SoftDeleteable(fieldName="deletedAt")
 */
class Categoria extends BaseEntitySoftDelete {

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     */
    protected $nombre;

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
        return $this;
    }

}
