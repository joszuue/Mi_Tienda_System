<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class ZayController extends Controller { //extenderemos de controller para poder acceder a sus funciones
    public $view;
    public $model;
    public $utils;

    private $categoriaController;
    private $ofertaController;
    private $imagenController;
    private $productoController;

    function __construct()
    {
        parent::__construct();
        //$this->loadModel('Zay');
        $this->categoriaController = $this->loadController("Categoria");
        //$this->ofertaController = $this->loadController("Oferta");
        $this->imagenController = $this->loadController("Imagen");
        $this->productoController = $this->loadController("Producto");
    }
    
    function Inicio(){
        $this->view->listaImagenes = $this->imagenController->model->selectImagenes();
        $this->view->listaProductos = $this->productoController->model->productosRamdon();
        $this->view->listaCategorias = $this->categoriaController->model->selectCategoriasTop4();
        $this->view->renderView('tienda/index.php');
    }

    function Shop(){
        $this->view->listaImagenes = $this->imagenController->model->selectImagenes();
        $this->view->listaProductos = $this->productoController->model->selectProductosTienda();
        $this->view->listaOfertas = $this->productoController->model->productosOferta();
        $this->view->listaCategorias = $this->categoriaController->model->selectCategoriasRelacionadas();
        $this->view->renderView('tienda/shop.php');
    }

   
}
