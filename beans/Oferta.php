<?php
class Oferta {
    private $codOferta;
    private $codProducto;
    private $fechaCreacion;
    private $fechaInicio;
    private $fechaFin;
    private $precioOferta;
    private $estado; 
 
    // Métodos Get y Set
    public function getCodOferta() {
        return $this->codOferta;
    }

    public function setCodOferta($codOferta) {
        $this->codOferta = $codOferta;
    }

    public function getCodProducto() {
        return $this->codProducto;
    }

    public function setCodProducto($codProducto) {
        $this->codProducto = $codProducto;
    }

    public function getFechaCreacion() {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion($fechaCreacion) {
        $this->fechaCreacion = $fechaCreacion;
    }

    public function getFechaInicio() {
        return $this->fechaInicio;
    }

    public function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }

    public function getFechaFin() {
        return $this->fechaFin;
    }

    public function setFechaFin($fechaFin) {
        $this->fechaFin = $fechaFin;
    }

    public function getPrecioOferta() {
        return $this->precioOferta;
    }

    public function setPrecioOferta($precioOferta) {
        $this->precioOferta = $precioOferta;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
}

?>