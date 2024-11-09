<?php
class ImagenController extends Controller { //extenderemos de controller para poder acceder a sus funciones
    public $view;
    public $model;
    public $utils;


    function __construct()
    {
        parent::__construct();
        $this->loadModel("Imagen");   
    }

    function redirigir(){
        header("Location: " . constant("URL") . "Producto/Show");
        exit();
    }

    function agregarImagen(){
        $imagen  = $_FILES["imagen"]["name"]; 
        $ruta = $_FILES['imagen']['tmp_name'];
        $validacion = $this->nuevaImagen($_POST["codProdu"], $imagen, $ruta);
        if($validacion){
            $this->view->success = 'Se ha agregado una nueva imagen para el prodycto ' . $_POST["codProdu"];
        }else{
            $this->view->error = 'Ha ocurrido un error al agregar la imagen.';
        }
        $this->redirigir();
    }

    function nuevaImagen($codProducto, $imagen, $ruta){
        $nombreImg = $this->utils->guardarImagen($codProducto, $imagen, $ruta);
        if($nombreImg != false){
            $estado = "Disponible";
            $validacion = $this->model->insertImagen($codProducto, $nombreImg, $estado); //invocamos al model y a la funcion del modelo
            return $validacion;
        }else{
            return false;
        }
    }

    function deleteImagen(){
        $idImagen = $_POST["idImagen"];
        $nombreImg = $_POST["nombreImagen"];
        $this->model->deleteImagen($idImagen);
        $this->utils->eliminarImagenCarpeta($nombreImg);
        $this->redirigir();
    }
 

}
