<?php
class Orden {
    private $codOrden;
    private $direccion;
    private $fecha;
    private $total;
    private $estado;

    // Métodos Get y Set
    public function getCodOrden() {
        return $this->codOrden;
    }

    public function setCodOrden($codOrden) {
        $this->codOrden = $codOrden;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
}

?>