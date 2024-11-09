<?php
    class View{
        //Categorias
        public $listaCategorias;
        public $listaCategoriasRelacionadas;

        //Productos
        public $listaProductos;
        public $listaImagenes;
        public $listaCodProductos;

        //Empleados
        public $listaEmpleados;

        //Error
        public $mensaje;
        public $success;
        public $error;

        //Tienda
        public $listaOfertas;
        function __construct(){

        }
        function renderView($vista){//Notara que nunca hacemos un redirect puntual a una vista
            require 'views/' . $vista; // Entonces llamamos ese codigo y añadimos el recurso vista
        }
    }
?>
