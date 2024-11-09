<?php
class Producto {
    private $codProducto;
    private $Categoria;
    private $Oferta; 
    private $nombre;
    private $descripcion;
    private $precio;
    private $sexo;
    private $stock;
    private $estado;

    // Métodos Get y Set
    public function getCodProducto() {
        return $this->codProducto;
    }

    public function setCodProducto($codProducto) {
        $this->codProducto = $codProducto;
    }

    public function getCategoria() {
        return $this->Categoria;
    }

    public function setCategoria($Categoria) {
        $this->Categoria = $Categoria;
    }

    public function getOferta() {
        return $this->Oferta;
    }

    public function setOferta($Oferta) {
        $this->Oferta = $Oferta;
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

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }
    
    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
}

?>