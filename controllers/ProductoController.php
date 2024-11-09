<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class ProductoController extends Controller { //extenderemos de controller para poder acceder a sus funciones
    public $view;
    public $model;
    public $utils;

    // Controladores que vamos a conectar
    private $categoriaController;
    private $ofertaController;
    private $imagenController;

    function __construct()
    {
        parent::__construct();
        $this->loadModel('Producto');
        $this->categoriaController = $this->loadController("Categoria");
        $this->ofertaController = $this->loadController("Oferta");
        $this->imagenController = $this->loadController("Imagen");
        
    }

    function Show(){
        $this->view->listaCategorias = $this->categoriaController->model->selectCategorias();
        $this->view->listaCategoriasRelacionadas = $this->categoriaController->model->selectCategoriasRelacionadas();
        $this->view->listaProductos = $this->model->selectProductos();
        $this->view->listaImagenes = $this->imagenController->model->selectImagenes();
        $this->view->listaCodProductos = $this->model->selectCodProductos();
        $this->view->renderView('adminServices/productos.php');
    }

    function redirigir(){
        header("Location: " . constant("URL") . "Producto/Show");
        exit();
    }


    function nuevoProducto()
    {
        $imagen  = $_FILES["imagen"]["name"]; 
        $ruta = $_FILES['imagen']['tmp_name'];
        $codigo = $this->utils->generarCodigo("PROD");
        $codCate = $_POST["codCategoria"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $sexo = $_POST["sexo"];
        $stock = $_POST["stock"];
        $estado = $_POST["estado"];
        $validacion = $this->model->insertProducto($codigo, $codCate, $nombre, $descripcion, $precio, $sexo, $stock, $estado); // Invocamos al modelo y a la función del modelo

        if ($validacion) {
            if ($this->imagenController->nuevaImagen($codigo, $imagen, $ruta)) {
                if ($_POST["oferta"] == "Sí") {
                    if ( $this->ofertaController->nuevaOferta($codigo)) {
                        $this->view->success = 'Se ha agregado un nuevo producto.';
                    } else {
                        $this->view->error = 'Ha ocurrido un error al agregar la oferta.';
                    }
                } else {
                    $this->view->success = 'Se ha agregado un nuevo producto.';
                }
            } else {
                $this->view->error = 'Ha ocurrido un error al agregar la imagen.';
            }
        } else {
            $this->view->error = 'Ha ocurrido un error al agregar el producto.';
        }
        
        $this->redirigir();
    }

    function modificarProducto()
    {
        $codigo = $_POST["codigo"];
        $codOferta = $_POST["codOferta"];
        $codCate = $_POST["codCategoria"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $sexo = $_POST["sexo"];
        $stock = $_POST["stock"];
        $estado = $_POST["estado"];

        if ($_POST["oferta"] == "Sí"){
            if($codOferta == "false"){
                if ( $this->ofertaController->nuevaOferta($codigo)) {
                    $this->view->success = 'Se ha modificado el producto.';
                } else {
                    $this->view->error = 'Ha ocurrido un error al modificar la oferta.';
                }
            }else{
                $fechaInicio = $_POST["fechaInicio"];
                $fechaFin = $_POST["fechaFin"];
                $nuevoPrecio = $_POST["nuevoPrecio"];
                if ($this->ofertaController->updateOferta($codOferta, $fechaInicio, $fechaFin, $nuevoPrecio)) {
                    $this->view->success = 'Se ha modificado el producto.';
                } else {
                    $this->view->error = 'Ha ocurrido un error al modificar la oferta.';
                }
            }
        }else if($_POST["oferta"] == "No"){
            if ($this->ofertaController->model->deleteOferta($codOferta, "delete")) {
                $this->view->success = 'Se ha modificado la oferta del producto.';
            } else {
                $this->view->error = 'Ha ocurrido un error al modificar la oferta del producto.';
            }
        }

        $this->model->updateProducto($codigo, $codCate, $nombre, $descripcion, $precio, $sexo, $stock, $estado); //invocamos al model y a la funcion del modelo
        $this->redirigir();
    }

    function eliminarProducto()
    {
        $codigo = $_POST["codigo"];
        $estado = "delete";
        $imagenes = $this->imagenController->model->selectImagenesProduc($codigo);
        foreach($imagenes as $imagen){
            $direccionImg = "public/imgProductos/".$imagen->getImagen();
            $this->utils->eliminarImagenCarpeta($direccionImg);
        }
        $this->imagenController->model->deleteImagenes($codigo);
        $this->model->deleteProducto($codigo, $estado);
        $this->redirigir();
    }

}
