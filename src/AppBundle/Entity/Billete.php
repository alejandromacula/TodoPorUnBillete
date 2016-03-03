<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Resources\Entity\BaseEntitySoftDelete;
use Gedmo\Mapping\Annotation as GEDMO;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @GEDMO\SoftDeleteable(fieldName="fechaBorrado")
 */
class Billete extends BaseEntitySoftDelete {

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     */
    protected $nombre;

    /**
     * @ORM\OneToMany(targetEntity="Producto", mappedBy="categoria", cascade={"persist"})
     */
    protected $productos;

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
        return $this;
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

}
