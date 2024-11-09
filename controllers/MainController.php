<?php
class MainController extends Controller { //extenderemos de controller para poder acceder a sus funciones
    public $view;
    public $model;
    function __construct()
    {
        //parent::__construct(); codigo de la primera parte de la guia
        //$this->view->mensaje1= "Parametro enviado a la vista";
        //$this->view->renderView('main/main.php');
    }

    function dashboard()
    {
        parent::__construct();
        $this->view->renderView('adminServices/dashboard.php'); //llamando al metodo renderView para pintar la vista

    }

    function login()
    {
        parent::__construct();
        $this->view->renderView('adminServices/login.php');
    }

    function cambiarContra()
    {
        parent::__construct();
        $this->view->renderView('adminServices/cambiarContra.php');
    }

    function categorias()
    {
        parent::__construct();
        $this->view->renderView('adminServices/categorias.php');
    }


    function clientes()
    {
        parent::__construct();
        $this->view->renderView('adminServices/usuarios.php');
    }

    function inicioContra()
    {
        parent::__construct();
        $this->view->renderView('adminServices/inicioContra.php');
    }

    function pedidos()
    {
        parent::__construct();
        $this->view->renderView('adminServices/pedidos.php');
    }

    function productos()
    {
        parent::__construct();
        $this->view->renderView('adminServices/productos.php');
    }

    function reportes()
    {
        parent::__construct();
        $this->view->renderView('adminServices/reportes.php');
    }

    function agregarPersona()
    {
        parent::__construct();
        $nombre = $_POST["nombre"];
        $edad = $_POST["edad"];
        $telefono = $_POST["telefono"];
        $sexo = $_POST["sexo"];
        $ocupacion = $_POST["ocupacion"];
        $fecha = $_POST["fecha"];
        $this->model->agregarPersona($nombre, $edad, $telefono, $sexo, $ocupacion, $fecha); //invocamos al model y a la funcion del modelo
        $mensaje = "
            <div class='alert alert-success' role='alert'>
            Se ha agregado correctamente a " . $nombre . " !!
            </div>
            ";
        $this->enviarMensaje($mensaje);
    }

    function modificarPersona()
    {
        parent::__construct();
        $nombre = $_POST["nombre"];
        $edad = $_POST["edad"];
        $telefono = $_POST["telefono"];
        $sexo = $_POST["sexo"];
        $ocupacion = $_POST["ocupacion"];
        $fecha = $_POST["fecha"];
        $id = $_POST["id"];
        $this->model->modificarPersona($nombre, $edad, $telefono, $sexo, $ocupacion, $fecha, $id); //invocamos al model y a la funcion del modelo
        $mensaje = "
            <div class='alert alert-success' role='alert'>
            Se ha modificado correctamente a la persona con id:" . $id . " !!
            </div>
            ";
        $this->enviarMensaje($mensaje);
    }

    function eliminarPersona()
    {
        parent::__construct();
        $id = $_POST["id"];
        $this->model->eliminarPersona($id);
        $mensaje = "
            <div class='alert alert-success' role='alert'>
            Se ha eliminado correctamente!!
            </div>
            ";
        $this->enviarMensaje($mensaje);
    }

    function enviarMensaje($contMensaje)
    {
        parent::__construct(); //llamamos el constructor de Controller, para poder acceder a la instancia de view
        $this->view->listaPersonas = $this->model->listaPersonas(); //enviamos arreglos de objetos a las vistas
        $this->view->listaOcupaciones = $this->model->listaOcupaciones();
        $this->view->persona = $this->model->obtenerPersona(); //enviamos un objeto en particular a la vista
        $this->view->listaOcupaciones2 = $this->model->listaOcupaciones();
        $this->view->Valimensaje = false;
        $this->view->mensaje = $contMensaje;
        $this->view->renderView('main/main.php'); //llamando al metodo renderView para pintar la vista
    }
}
