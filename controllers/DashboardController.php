<?php
session_start();
class DashboardController extends Controller { //extenderemos de controller para poder acceder a sus funciones
    public $view;
    public $model;
    public $utils;

    function __construct()
    {
        parent::__construct();
        $this->loadModel('Categoria');
        
    }

    function Show(){
        $this->view->renderView('adminServices/dashboard.php');
    }

   
}
