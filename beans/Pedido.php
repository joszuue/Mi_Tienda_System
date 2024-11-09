<?php
class Pedido {
    private $codPedido;
    private $codProducto;
    private $codOrden;
    private $codCliente;
    private $cantidad;
    private $precioUnitario;
    private $estado;

    // Métodos Get y Set
    public function getCodPedido() {
        return $this->codPedido;
    }

    public function setCodPedido($codPedido) {
        $this->codPedido = $codPedido;
    }

    public function getCodProducto() {
        return $this->codProducto;
    }

    public function setCodProducto($codProducto) {
        $this->codProducto = $codProducto;
    }

    public function getCodOrden() {
        return $this->codOrden;
    }

    public function setCodOrden($codOrden) {
        $this->codOrden = $codOrden;
    }

    public function getCodCliente() {
        return $this->codCliente;
    }

    public function setCodCliente($codCliente) {
        $this->codCliente = $codCliente;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function getPrecioUnitario() {
        return $this->precioUnitario;
    }

    public function setPrecioUnitario($precioUnitario) {
        $this->precioUnitario = $precioUnitario;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
}

?>