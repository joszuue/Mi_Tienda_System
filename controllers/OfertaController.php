<?php
class OfertaController extends Controller { //extenderemos de controller para poder acceder a sus funciones
    public $view;
    public $model;
    public $utils;


    function __construct()
    {
        parent::__construct();
        $this->loadModel('Oferta');  
    }

    function nuevaOferta($codProducto){
        $codigo = $this->utils->generarCodigo("OFER");
        $fecha = $this->utils->fechaActual();
        $fechaInicio = $_POST["fechaInicio"];
        $fechaFin = $_POST["fechaFin"];
        $nuevoPrecio = $_POST["nuevoPrecio"];
        $estado ="Disponible";
        $validacion = $this->model->insertOferta($codigo, $codProducto, $fecha, $fechaInicio, $fechaFin, $nuevoPrecio, $estado); //invocamos al model y a la funcion del modelo
        return $validacion;
    }


    function updateOferta($codOferta, $fechaInicio, $fechaFin, $nuevoPrecio){
        $validacion = $this->model->updateOferta($codOferta, $fechaInicio, $fechaFin, $nuevoPrecio);
        return $validacion;
    }

   
}
