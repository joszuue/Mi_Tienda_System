<?php
    require_once "beans/Categoria.php"; //llamamos los recursos beans, para acceder a sus clases.
    //llamamos los recursos beans, para acceder a sus clases.
    class CategoriaModel extends Model{
        public $conexion;

        function __construct(){
            parent::__construct();//accedemos al constructor de Model, para poder usar la bdd
        }

        function selectCategorias() {
            try {
                $query = "SELECT c.*, COUNT(p.codCategoria) AS cantidad_productos FROM categorias c 
                LEFT JOIN productos p ON c.codCategoria = p.codCategoria WHERE c.estado = 'Disponible' GROUP BY c.codCategoria";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
                $stmt->execute();
        
                $array = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $categoria = new Categoria();
                    $categoria->setCodCategoria($row['codCategoria']);
                    $categoria->setNombre($row['nombre']);
                    $categoria->setDescripcion($row['descripcion']);
                    $categoria->setCantidadProductos($row['cantidad_productos']);
                    $array[] = $categoria; // Cargamos el arreglo
                }
        
                $this->con->desconectar($this->conexion);
                return $array;
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return array();
            }
        }
        

        function insertCategoria($codigo, $nombre, $descripcion, $estado) {
            try {
                $query = "INSERT INTO categorias (codCategoria, nombre, descripcion, estado) VALUES (:codigo, :nombre, :descripcion, :estado)";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
        
                // Enviamos parámetros a la consulta, esto evita inyecciones SQL
                $stmt->bindParam(':codigo', $codigo);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':descripcion', $descripcion);
                $stmt->bindParam(':estado', $estado);
        
                // Ejecutamos la consulta y devolvemos el resultado
                return $stmt->execute();
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
        

        function updateCategoria($codigo, $nombre, $descripcion) {
            try {
                $query = "UPDATE categorias SET nombre = :nombre, descripcion = :descripcion WHERE codCategoria = :codigo";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
        
                // Enviamos parámetros a la consulta, esto evita inyecciones SQL
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':descripcion', $descripcion);
                $stmt->bindParam(':codigo', $codigo);
        
                // Ejecutamos la consulta y devolvemos el resultado
                return $stmt->execute();
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
        

        function deleteCategoria($codigo, $estado) {
            try {
                $query = "UPDATE categorias SET estado = :estado WHERE codCategoria = :codigo";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
        
                // Enviamos parámetros a la consulta, esto evita inyecciones SQL
                $stmt->bindParam(':estado', $estado);;
                $stmt->bindParam(':codigo', $codigo);
        
                // Ejecutamos la consulta y devolvemos el resultado
                return $stmt->execute();
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        function selectCategoriasRelacionadas() {
            try {
                $query = "SELECT DISTINCT c.codCategoria, c.nombre, c.descripcion FROM Categorias c INNER JOIN Productos p ON c.codCategoria = p.codCategoria WHERE c.estado = 'Disponible'";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
                $stmt->execute();
        
                $array = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $categoria = new Categoria();
                    $categoria->setCodCategoria($row['codCategoria']);
                    $categoria->setNombre($row['nombre']);
                    $categoria->setDescripcion($row['descripcion']);
                    $array[] = $categoria; // Cargamos el arreglo
                }
        
                $this->con->desconectar($this->conexion);
                return $array;
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return array();
            }
        }


        //Categorias para la tienda en linea
        function selectCategoriasTop4() {
            try {
                $query = "SELECT DISTINCT c.codCategoria, c.nombre, c.descripcion FROM Categorias c INNER JOIN Productos p ON c.codCategoria = p.codCategoria WHERE c.estado = 'Disponible' ORDER BY RAND() LIMIT 4";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
                $stmt->execute();
        
                $array = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $categoria = new Categoria();
                    $categoria->setCodCategoria($row['codCategoria']);
                    $categoria->setNombre($row['nombre']);
                    $categoria->setDescripcion($row['descripcion']);
                    $array[] = $categoria; // Cargamos el arreglo
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