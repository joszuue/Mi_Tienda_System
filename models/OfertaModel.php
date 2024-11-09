<?php 
    require_once "beans/Oferta.php"; //llamamos los recursos beans, para acceder a sus clases.
    //llamamos los recursos beans, para acceder a sus clases.
    class OfertaModel extends Model{
        public $conexion;

        function __construct(){
            parent::__construct();//accedemos al constructor de Model, para poder usar la bdd
        }
        
        function insertOferta($codigo, $codProducto, $fecha, $fechaInicio, $fechaFin, $nuevoPrecio, $estado) {
            try {
                $query = "INSERT INTO oferta (codOferta, codProducto, fechaCreacion, fechaInicio, fechaFin, precioOferta, estado) 
                VALUES (:codOferta, :codProducto, :fechaCreacion, :fechaInicio, :fechaFin, :precioOferta, :estado)";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
        
                // Enviamos parámetros a la consulta, esto evita inyecciones SQL
                $stmt->bindParam(':codOferta', $codigo);
                $stmt->bindParam(':codProducto', $codProducto);
                $stmt->bindParam(':fechaCreacion', $fecha);
                $stmt->bindParam(':fechaInicio', $fechaInicio);
                $stmt->bindParam(':fechaFin', $fechaFin);
                $stmt->bindParam(':precioOferta', $nuevoPrecio);
                $stmt->bindParam(':estado', $estado);
        
                // Ejecutamos la consulta y devolvemos el resultado
                return $stmt->execute();
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        function updateOferta($codigo, $fechaInicio, $fechaFin, $nuevoPrecio) {
            try {
                $query = "UPDATE oferta SET fechaInicio = :fechaInicio, fechaFin =:fechaFin, precioOferta =:precioOferta WHERE codOferta = :codOferta";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
        
                // Enviamos parámetros a la consulta, esto evita inyecciones SQL
                $stmt->bindParam(':codOferta', $codigo);
                $stmt->bindParam(':fechaInicio', $fechaInicio);
                $stmt->bindParam(':fechaFin', $fechaFin);
                $stmt->bindParam(':precioOferta', $nuevoPrecio);
        
                // Ejecutamos la consulta y devolvemos el resultado
                return $stmt->execute();
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        function deleteOferta($codigo, $estado) {
            try {
                $query = "UPDATE oferta SET estado = :estado WHERE codOferta = :codigo";
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


       
    }
?>