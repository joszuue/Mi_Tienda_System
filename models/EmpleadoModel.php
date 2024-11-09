<?php
    require_once "beans/Operador.php"; //llamamos los recursos beans, para acceder a sus clases.
    //llamamos los recursos beans, para acceder a sus clases.
    class EmpleadoModel extends Model{
        public $conexion;

        function __construct(){
            parent::__construct();//accedemos al constructor de Model, para poder usar la bdd
        }

        function selectEmpleado() {
            try {
                $query = "SELECT * from Operadores WHERE estado = 'Activo'";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
                $stmt->execute();
        
                $array = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $operador = new Operador();
                    $operador->setCodOperadores($row['codOperadores']);
                    $operador->setNombre1($row['nombre1']);
                    $operador->setNombre2($row['nombre2']);
                    $operador->setApellido1($row['apellido1']);
                    $operador->setApellido2($row['apellido2']);
                    $operador->setRol($row['rol']);
                    $array[] = $operador; // Cargamos el arreglo
                }
        
                $this->con->desconectar($this->conexion);
                return $array;
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return array();
            }
        }
        

        function insertEmpleado($codOperadores, $contrasena, $nombre1, $nombre2, $apellido1, $apellido2, $rol, $estado) {
            try {
                $query = "INSERT INTO operadores (codOperadores, contrasena, nombre1, nombre2, apellido1, apellido2, rol, estado) 
                VALUES (:codOperadores, :contrasena, :nombre1, :nombre2, :apellido1, :apellido2, :rol, :estado)";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
        
                // Enviamos parámetros a la consulta, esto evita inyecciones SQL
                $stmt->bindParam(':codOperadores', $codOperadores);
                $stmt->bindParam(':contrasena', $contrasena);
                $stmt->bindParam(':nombre1', $nombre1);
                $stmt->bindParam(':nombre2', $nombre2);
                $stmt->bindParam(':apellido1', $apellido1);
                $stmt->bindParam(':apellido2', $apellido2);
                $stmt->bindParam(':rol', $rol);
                $stmt->bindParam(':estado', $estado);
                // Ejecutamos la consulta y devolvemos el resultado
                return $stmt->execute();
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
        

        function updateEmpleado($codOperadores, $nombre1, $nombre2, $apellido1, $apellido2, $rol) {
            try {
                $query = "UPDATE operadores SET nombre1 =:nombre1, nombre2 =:nombre2, apellido1 =:apellido1, apellido2 =:apellido2, rol =:rol WHERE codOperadores = :codOperadores";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
        
                // Enviamos parámetros a la consulta, esto evita inyecciones SQL
                $stmt->bindParam(':codOperadores', $codOperadores);
                $stmt->bindParam(':nombre1', $nombre1);
                $stmt->bindParam(':nombre2', $nombre2);
                $stmt->bindParam(':apellido1', $apellido1);
                $stmt->bindParam(':apellido2', $apellido2);
                $stmt->bindParam(':rol', $rol);
        
                // Ejecutamos la consulta y devolvemos el resultado
                return $stmt->execute();
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
        

        function deleteEmpleado($codigo, $estado) {
            try {
                $query = "UPDATE operadores SET estado = :estado WHERE codOperadores = :codigo";
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
          
    }
?>