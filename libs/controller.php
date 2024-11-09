<?php
    class Controller{
        public $utils;
        public $model;
        public $view;
        public $controller;
        
        function __construct(){//cada instacia de controller o invocacion a este instanciara una nueva vista
            $this->view = new View();
            $this->utils = new Utils();
        }

        function loadModel($model){//se manda a llamar para cargar el modelo, notara que cada controller esta ligado a cada model
            $url = 'models/'.$model.'Model.php';// Para este caso el MainController y MainModel estan estrechamente ligados
            if(file_exists($url)){
                require_once $url; //require
                $modelName = $model. 'Model';
                $this->model = new $modelName;
            }
        }

        function loadController($controller) {
            $url = 'controllers/' . $controller . 'Controller.php';
            if (file_exists($url)) {
                require_once $url;
                $controllerName = $controller . 'Controller';
                return new $controllerName; // Devolver la instancia del controlador
            }
            return null; // Si el archivo no existe, retornar null
        }
    }
?>