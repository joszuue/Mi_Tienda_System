<?php
class Operador {
    private $codOperadores;
    private $contrasena;
    private $nombre1;
    private $nombre2;
    private $apellido1;
    private $apellido2;
    private $rol;
    private $estado;

    // Métodos Get y Set
    public function getCodOperadores() {
        return $this->codOperadores;
    }

    public function setCodOperadores($codOperadores) {
        $this->codOperadores = $codOperadores;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function getNombre1() {
        return $this->nombre1;
    }

    public function setNombre1($nombre1) {
        $this->nombre1 = $nombre1;
    }

    public function getNombre2() {
        return $this->nombre2;
    }

    public function setNombre2($nombre2) {
        $this->nombre2 = $nombre2;
    }

    public function getApellido1() {
        return $this->apellido1;
    }

    public function setApellido1($apellido1) {
        $this->apellido1 = $apellido1;
    }

    public function getApellido2() {
        return $this->apellido2;
    }

    public function setApellido2($apellido2) {
        $this->apellido2 = $apellido2;
    }

    public function getRol() {
        return $this->rol;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
}

?>