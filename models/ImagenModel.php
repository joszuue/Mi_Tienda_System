<?php
    require_once "beans/Categoria.php"; //llamamos los recursos beans, para acceder a sus clases.
    //llamamos los recursos beans, para acceder a sus clases.
    class ImagenModel extends Model{
        public $conexion;

        function __construct(){
            parent::__construct();//accedemos al constructor de Model, para poder usar la bdd
        }

        function insertImagen($codProducto, $nombreImg, $estado) {
            try {
                $query = "INSERT INTO imagenes (codProducto, imagen, estado) 
                VALUES (:codProducto, :imagen,:estado)";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
        
                // Enviamos parámetros a la consulta, esto evita inyecciones SQL
                $stmt->bindParam(':codProducto', $codProducto);
                $stmt->bindParam(':imagen', $nombreImg);
                $stmt->bindParam(':estado', $estado);
        
                // Ejecutamos la consulta y devolvemos el resultado
                return $stmt->execute();
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        function selectImagenes() {
            try {
                $query = "SELECT idImagen, imagen, codProducto from imagenes where estado = 'Disponible'";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
                // Ejecutamos la consulta
                $stmt->execute();
        
                $array = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $imagen = new Imagen();
                    $imagen->setIdImagen($row['idImagen']);
                    $imagen->setImagen($row['imagen']);
                    $imagen->setCodProducto($row['codProducto']);
                    $array[] = $imagen; // Cargamos el arreglo
                }
        
                $this->con->desconectar($this->conexion);
                return $array;
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return array();
            }
        }

        
        function selectImagenesProduc($codigo) {
            try {
                $query = "SELECT imagen from imagenes where codProducto =:codProducto";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
                $stmt->bindParam(':codProducto', $codigo);
                // Ejecutamos la consulta
                $stmt->execute();
        
                $array = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $imagen = new Imagen();
                    $imagen->setImagen($row['imagen']);
                    $array[] = $imagen; // Cargamos el arreglo
                }
        
                $this->con->desconectar($this->conexion);
                return $array;
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return array();
            }
        }
        
        function deleteImagenes($codigo) {
            try {
                $query = "DELETE FROM imagenes WHERE codProducto = :codigo";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
        
                // Enviamos parámetros a la consulta, esto evita inyecciones SQL
                $stmt->bindParam(':codigo', $codigo);
        
                // Ejecutamos la consulta y devolvemos el resultado
                return $stmt->execute();
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        function deleteImagen($idImagen) {
            try {
                $query = "DELETE FROM imagenes WHERE idImagen = :id";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
        
                // Enviamos parámetros a la consulta, esto evita inyecciones SQL
                $stmt->bindParam(':id', $idImagen);
        
                // Ejecutamos la consulta y devolvemos el resultado
                return $stmt->execute();
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
        

       
    }
?>