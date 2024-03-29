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
class Producto extends BaseEntitySoftDelete {

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     */
    protected $nombre;

    /**
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="productos", cascade={"persist"})
     */
    protected $categoria;

    /**
     * @ORM\ManyToOne(targetEntity="Billete", inversedBy="productos", cascade={"persist"})
     */
    protected $billete;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="productos", cascade={"persist"})
     */
    protected $usuario;

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
        return $this;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria(Categoria $categoria) {
        $this->categoria = $categoria;
        return $this;
    }

    public function getBillete() {
        return $this->billete;
    }

    public function setBillete(Billete $billete) {
        $this->billete = $billete;
        return $this;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario(Usuario $usuario) {
        $this->usuario = $usuario;
        return $this;
    }

}
