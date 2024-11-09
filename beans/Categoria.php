<?php
class Categoria {
    private $codCategoria;
    private $nombre;
    private $descripcion;
    private $estado;
    private $cantidadProductos;

    // Métodos Get y Set
    public function getCodCategoria() {
        return $this->codCategoria;
    }

    public function setCodCategoria($codCategoria) {
        $this->codCategoria = $codCategoria;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getCantidadProductos(){
        return $this->cantidadProductos;
    }

    public function setCantidadProductos($cantidadProductos) {
        $this->cantidadProductos = $cantidadProductos;
    }
}

?>