<?php
session_start();
class LoginController extends Controller { //extenderemos de controller para poder acceder a sus funciones
    public $view;
    public $model; 

    function __construct()
    {
        parent::__construct();
    }

    function Show(){
        $this->view->renderView('adminServices/login.php');
    }

    function redirigir(){
        header("Location: " . constant("URL" . "Login/Show"));
        exit();
    }


    function login()
    {
        // Validar si las variables POST están definidas
        if (isset($_POST["codigo"]) && isset($_POST["contra"])) {
            $codigo = $_POST["codigo"];
            $pass = $_POST["contra"];

            // Obtener la contraseña de la base de datos
            $contraBdd = $this->model->findPass($codigo);

            if ($contraBdd !== null && password_verify($pass, $contraBdd)) {
                $usu = $this->model->findUser($codigo, $contraBdd);

                if ($usu !== null) {
                    $_SESSION['codigo'] = $usu->getCodOperadores();
                    $_SESSION['nombre1'] = $usu->getNombre1();
                    $_SESSION['nombre2'] = $usu->getNombre2();
                    $_SESSION['apellido1'] = $usu->getApellido1();
                    $_SESSION['apellido2'] = $usu->getApellido2();
                    $_SESSION['rol'] = $usu->getRol();

                    switch ($usu->getRol()) {
                        case "Administrador":
                            header("Location: " . constant("URL") . "Dashboard/Show");
                            exit();
                            break;
                        case "Catalogador":
                            header("Location: " . constant("URL") . "Producto/Show");
                            exit();
                            break;
                        default:
                           /*$this->view->modalClass = "bg-danger";
                            $this->view->mensaje = "Rol desconocido.";*/
                            $this->redirigir();
                            break;
                    }
                    return;
                } else {
                    /*$this->view->modalClass = "bg-danger";
                    echo "Usuario o contraseña inválido.";*/
                }
            } else {
                /*/$this->view->modalClass = "bg-danger";
                $this->view->mensaje = "Usuario o contraseña inválido.";*/
            }
        } else {
            /*$this->view->modalClass = "bg-danger";
            $this->view->mensaje = "Datos de inicio de sesión no proporcionados.";*/
        }
        $this->redirigir();
    }

    function logOut(){

        // Eliminar todas las variables de sesión
        $_SESSION = array();

        // Destruir la cookie de sesión si es necesario
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Destruir la sesión
        session_destroy();
        $this->redirigir();
    }

}
