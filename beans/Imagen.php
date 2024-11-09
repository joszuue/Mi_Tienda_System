<?php
class Imagen {
    private $idImagen;
    private $codProducto;
    private $imagen;
    private $estado;

    // Métodos Get y Set
    public function getIdImagen() {
        return $this->idImagen;
    }

    public function setIdImagen($idImagen) {
        $this->idImagen = $idImagen;
    }

    public function getCodProducto() {
        return $this->codProducto;
    }

    public function setCodProducto($codProducto) {
        $this->codProducto = $codProducto;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
}

?>