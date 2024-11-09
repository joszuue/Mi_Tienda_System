<?php 
    require_once "beans/Categoria.php"; //llamamos los recursos beans, para acceder a sus clases.
    require_once "beans/Producto.php"; //llamamos los recursos beans, para acceder a sus clases.
    require_once "beans/Oferta.php"; //llamamos los recursos beans, para acceder a sus clases.
    require_once "beans/Imagen.php"; //llamamos los recursos beans, para acceder a sus clases.
    //llamamos los recursos beans, para acceder a sus clases.
    class ProductoModel extends Model{
        public $conexion;

        function __construct(){
            parent::__construct();//accedemos al constructor de Model, para poder usar la bdd
        }
        
        //Productos 

        function selectProductos() {
            try {
                $query = "SELECT p.codProducto, p.nombre AS nombreProducto, p.descripcion AS descripcionProducto, p.precio AS precioProducto, p.sexo, p.stock, p.estado AS estadoProducto, 
                c.nombre AS nombreCategoria, c.codCategoria AS codigoCategoria, o.codOferta,o.fechaCreacion, o.fechaInicio, o.fechaFin, o.precioOferta, o.estado AS estadoOferta
                FROM productos p 
                LEFT JOIN categorias c ON p.codCategoria = c.codCategoria 
                LEFT JOIN oferta o ON p.codProducto = o.codProducto AND o.estado = 'Disponible'
                WHERE p.estado <> 'delete' ";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
                $stmt->execute();
        
                $array = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $categoria = new Categoria();
                    $categoria->setCodCategoria($row['codigoCategoria']);
                    $categoria->setNombre($row['nombreCategoria']);

                    $oferta = new Oferta();
                    $oferta->setCodOferta($row['codOferta']);
                    $oferta->setFechaCreacion($row['fechaCreacion']);
                    $oferta->setFechaInicio($row['fechaInicio']);
                    $oferta->setFechaFin($row['fechaFin']);
                    $oferta->setPrecioOferta($row['precioOferta']);

                    $producto = new Producto();
                    $producto->setCodProducto($row['codProducto']);
                    $producto->setNombre($row['nombreProducto']);
                    $producto->setDescripcion($row['descripcionProducto']);
                    $producto->setPrecio($row['precioProducto']);
                    $producto->setSexo($row['sexo']);
                    $producto->setStock($row['stock']);
                    $producto->setEstado($row['estadoProducto']);
                    $producto->setCategoria($categoria);
                    $producto->setOferta($oferta);


                    $array[] = $producto; // Cargamos el arreglo
                }
        
                $this->con->desconectar($this->conexion);
                return $array;
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return array();
            }
        }


        function selectCodProductos() {
            try {
                $query = "SELECT p.codProducto, p.nombre FROM productos p WHERE p.estado <> 'delete' ";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
                $stmt->execute();
        
                $array = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $producto = new Producto();
                    $producto->setCodProducto($row['codProducto']);
                    $producto->setNombre($row['nombre']);
                    $array[] = $producto; // Cargamos el arreglo
                }
        
                $this->con->desconectar($this->conexion);
                return $array;
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return array();
            }
        }


        function insertProducto($codigo, $codCate, $nombre, $descripcion, $precio, $sexo, $stock, $estado) {
            try {
                $query = "INSERT INTO productos (codProducto,codCategoria, nombre, descripcion, precio, sexo, stock, estado) 
                VALUES (:codigo, :codCate, :nombre, :descripcion, :precio, :sexo, :stock, :estado)";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
        
                // Enviamos parámetros a la consulta, esto evita inyecciones SQL
                $stmt->bindParam(':codigo', $codigo);
                $stmt->bindParam(':codCate', $codCate);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':descripcion', $descripcion);
                $stmt->bindParam(':precio', $precio);
                $stmt->bindParam(':sexo', $sexo);
                $stmt->bindParam(':stock', $stock);
                $stmt->bindParam(':estado', $estado);
        
                // Ejecutamos la consulta y devolvemos el resultado
                return $stmt->execute();
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
        

        function updateProducto($codigo, $codCate, $nombre, $descripcion, $precio, $sexo, $stock, $estado) {
            try {
                $query = "UPDATE productos SET codCategoria=:codCate, nombre=:nombre, descripcion=:descripcion, precio=:precio, sexo=:sexo, stock=:stock, estado=:estado WHERE codProducto = :codigo";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
        
                // Enviamos parámetros a la consulta, esto evita inyecciones SQL
                $stmt->bindParam(':codigo', $codigo);
                $stmt->bindParam(':codCate', $codCate);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':descripcion', $descripcion);
                $stmt->bindParam(':precio', $precio);
                $stmt->bindParam(':sexo', $sexo);
                $stmt->bindParam(':stock', $stock);
                $stmt->bindParam(':estado', $estado);
        
                // Ejecutamos la consulta y devolvemos el resultado
                return $stmt->execute();
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
        

        function deleteProducto($codigo, $estado) {
            try {
                $query = "UPDATE productos SET estado = :estado WHERE codProducto = :codigo";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
        
                // Enviamos parámetros a la consulta, esto evita inyecciones SQL
                $stmt->bindParam(':estado', $estado);
                $stmt->bindParam(':codigo', $codigo);
        
                // Ejecutamos la consulta y devolvemos el resultado
                return $stmt->execute();
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        //Lista de productos para la tienda
        function productosRamdon() {
            try {
                $query = "SELECT * FROM productos WHERE estado = 'mostrar' ORDER BY RAND() LIMIT 3";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
                $stmt->execute();
        
                $array = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    
                    $producto = new Producto();
                    $producto->setCodProducto($row['codProducto']);
                    $producto->setNombre($row['nombre']);
                    $producto->setDescripcion($row['descripcion']);
                    $producto->setPrecio($row['precio']);

                    $array[] = $producto; // Cargamos el arreglo
                }
        
                $this->con->desconectar($this->conexion);
                return $array;
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return array();
            }
        }

        function selectProductosTienda() {
            try {
                $query = "SELECT p.codProducto, p.nombre AS nombreProducto, p.descripcion AS descripcionProducto, p.precio AS precioProducto, p.sexo, p.stock, p.estado AS estadoProducto, 
                c.nombre AS nombreCategoria, c.codCategoria AS codigoCategoria, o.codOferta,o.fechaCreacion, o.fechaInicio, o.fechaFin, o.precioOferta, o.estado AS estadoOferta
                FROM productos p 
                LEFT JOIN categorias c ON p.codCategoria = c.codCategoria 
                LEFT JOIN oferta o ON p.codProducto = o.codProducto AND o.estado = 'Disponible'
                WHERE p.estado = 'Mostrar' ";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
                $stmt->execute();
        
                $array = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $categoria = new Categoria();
                    $categoria->setCodCategoria($row['codigoCategoria']);
                    $categoria->setNombre($row['nombreCategoria']);

                    $oferta = new Oferta();
                    $oferta->setCodOferta($row['codOferta']);
                    $oferta->setFechaCreacion($row['fechaCreacion']);
                    $oferta->setFechaInicio($row['fechaInicio']);
                    $oferta->setFechaFin($row['fechaFin']);
                    $oferta->setPrecioOferta($row['precioOferta']);

                    $producto = new Producto();
                    $producto->setCodProducto($row['codProducto']);
                    $producto->setNombre($row['nombreProducto']);
                    $producto->setDescripcion($row['descripcionProducto']);
                    $producto->setPrecio($row['precioProducto']);
                    $producto->setSexo($row['sexo']);
                    $producto->setStock($row['stock']);
                    $producto->setEstado($row['estadoProducto']);
                    $producto->setCategoria($categoria);
                    $producto->setOferta($oferta);


                    $array[] = $producto; // Cargamos el arreglo
                }
        
                $this->con->desconectar($this->conexion);
                return $array;
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return array();
            }
        }


        function productosOferta() {
            try {
                $query = "SELECT p.codProducto, p.nombre, p.descripcion, p.precio, o.precioOferta, o.fechaInicio, o.fechaFin FROM productos p 
                JOIN oferta o ON p.codProducto = o.codProducto 
                WHERE p.estado = 'Mostrar' AND o.estado = 'Disponible' AND o.fechaInicio <= NOW() AND o.fechaFin >= NOW()";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
                $stmt->execute();
        
                $array = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    
                    $producto = new Producto();
                    $producto->setCodProducto($row['codProducto']);
                    $producto->setNombre($row['nombre']);
                    $producto->setDescripcion($row['descripcion']);
                    $producto->setPrecio($row['precio']);

                    $array[] = $producto; // Cargamos el arreglo
                }
        
                $this->con->desconectar($this->conexion);
                return $array;
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return array();
            }
        }

        

    }
?>