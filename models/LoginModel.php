<?php
    require_once "beans/Operador.php"; //llamamos los recursos beans, para acceder a sus clases.
    //llamamos los recursos beans, para acceder a sus clases.
    class LoginModel extends Model{
        public $conexion;

        function __construct(){
            parent::__construct();//accedemos al constructor de Model, para poder usar la bdd
        }

        function findPass($codigo) {
            try {
                $query = "SELECT contrasena FROM operadores WHERE estado = :estado AND codOperadores = :codigo";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
                $stmt->bindValue(':estado', "Activo");
                $stmt->bindParam(':codigo', $codigo);
                $stmt->execute();
        
                $contra = null;
                if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $contra = $row['contrasena'];
                }
        
                $this->con->desconectar($this->conexion);
                return $contra; // Retorna la contraseña o null si no se encontró
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return null;
            }
        }

        function findUser($codigo, $contra) {
            try {
                $query = "SELECT * FROM operadores WHERE estado = :estado AND codOperadores = :codigo AND contrasena = :contra";
                $this->conexion = $this->con->conectar();
                $stmt = $this->conexion->prepare($query);
                $stmt->bindValue(':estado', "Activo");
                $stmt->bindParam(':codigo', $codigo);
                $stmt->bindParam(':contra', $contra);
                $stmt->execute();
        
                // Inicializa $usu como null
                $usu = null;
                if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // Solo crea el objeto si se encuentra un resultado
                    $usu = new Operador();
                    $usu->setCodOperadores($row['codOperadores']);
                    $usu->setNombre1($row['nombre1']);
                    $usu->setNombre2($row['nombre2']);
                    $usu->setApellido1($row['apellido1']);
                    $usu->setApellido2($row['apellido2']);
                    $usu->setRol($row['rol']);
                    $usu->setEstado($row['estado']);
                }
        
                $this->con->desconectar($this->conexion);
                return $usu; // Retorna el objeto o null si no se encontró
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error: " . $e->getMessage();
                return null;
            }
        }
        
        

      
          
    }
?>