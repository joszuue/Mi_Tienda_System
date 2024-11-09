<?php
session_start();
class EmpleadoController extends Controller { //extenderemos de controller para poder acceder a sus funciones
    public $view;
    public $model;
    public $utils;

    function __construct()
    {
        parent::__construct();
        $this->loadModel('Empleado');
        
    }

    function Show(){
        $this->view->listaEmpleados = $this->model->selectEmpleado();
        $this->view->renderView('adminServices/usuarios.php');
    }

    function ChangePassword(){
        $this->view->renderView('adminServices/cambiarContra.php');
    }

    function redirigir(){
        header("Location: " . constant("URL") . "Empleado/Show");
        exit();
    }
    
    function nuevoEmpleado()
    {
        $nombre1 = $_POST["nombre1"];
        $nombre2 = $_POST["nombre2"];
        $apellido1 = $_POST["apellido1"];
        $apellido2 = $_POST["apellido2"];
        $cargo = $_POST["cargo"];
        $estado = "Activo";
        $codigo = $this->utils->generarCodigo("OPER");
        $contrasena = password_hash($codigo, PASSWORD_DEFAULT);
        $validacion = $this->model->insertEmpleado($codigo, $contrasena, $nombre1, $nombre2, $apellido1, $apellido2, $cargo, $estado); //invocamos al model y a la funcion del modelo
        if($validacion){
            $this->view->success = 'Se ha agregado a un nuevo empleado.'; // Mensaje de error
        }else{
            $this->view->error = 'Ha ocurrido un error al agregar al empleado.'; // Mensaje de error
        }
        $this->redirigir();
    }

    function modificarEmpleado()
    {
        $nombre1 = $_POST["nombre1"];
        $nombre2 = $_POST["nombre2"];
        $apellido1 = $_POST["apellido1"];
        $apellido2 = $_POST["apellido2"];
        $cargo = $_POST["cargo"];
        $codigo = $_POST["codEmple"];
        $this->model->updateEmpleado($codigo, $nombre1, $nombre2, $apellido1, $apellido2, $cargo); //invocamos al model y a la funcion del modelo
        $this->redirigir();
    }

    function eliminarEmpleado()
    {
        $codigo = $_POST["codigo"];
        $estado = "Inactivo";
        $this->model->deleteEmpleado($codigo, $estado);
        $this->redirigir();
    }


}
