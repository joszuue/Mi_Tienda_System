<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class CategoriaController extends Controller { //extenderemos de controller para poder acceder a sus funciones
    public $view;
    public $model;
    public $utils;

    function __construct()
    {
        parent::__construct();
        $this->loadModel('Categoria');
        
    }

    function Show(){
        $this->view->listaCategorias = $this->model->selectCategorias();
        $this->view->renderView('adminServices/categorias.php');
    }

    function redirigir(){
        header("Location: " . constant("URL") . "Categoria/Show");
        exit();
    }
    
    function nuevaCategoria()
    {
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $estado = "Disponible";
        $codigo = $this->utils->generarCodigo("CATE");
        $validacion = $this->model->insertCategoria($codigo, $nombre, $descripcion, $estado); //invocamos al model y a la funcion del modelo
        if($validacion){
            $this->view->success = 'Se ha agregado una nueva categoria.'; // Mensaje de error
        }else{
            $this->view->error = 'Ha ocurrido un error al agregar la categoria.'; // Mensaje de error
        }
        $this->redirigir();
    }

    function modificarCategoria()
    {
        $codigo = $_POST["codigo"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $this->model->updateCategoria($codigo, $nombre, $descripcion); //invocamos al model y a la funcion del modelo
        $this->redirigir();
    }

    function eliminarCategoria()
    {
        $codigo = $_POST["codigo"];
        $estado = "delete";
        $this->model->deleteCategoria($codigo, $estado);
        $this->redirigir();
    }
}
