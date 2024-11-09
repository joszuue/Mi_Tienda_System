<?php
    class Utils{
        function __construct(){
        }

        function generarCodigo($nombre){
            $numero = rand(1, 999);
            return $nombre . str_pad($numero, 3, '0', STR_PAD_LEFT); // Asegura que el número tenga 3 dígitos
        }

        function fechaActual(){
            date_default_timezone_set('America/El_Salvador');
            $fecha = new DateTime();
            return $fecha->format('Y-m-d H:i:s');
        }

        function guardarImagen($codProducto, $imagen, $ruta){
            // Verifica si la imagen fue subida correctamente
            if (!empty($imagen) && isset($ruta)) {
                $extension = explode(".", $imagen); // Separa el nombre y la extensión
                $exte = strtolower(end($extension)); // Obtiene la extensión en minúsculas
        
                // Validar si la extensión es permitida
                if ($exte == "jpg" || $exte == "png") {
                    $nombreImg = $codProducto . mt_rand(1, 10000).".".$exte;
        
                    // Verifica si el archivo temporal existe
                    if (!empty($ruta) && file_exists($ruta)) {
                        // Obtener el directorio raíz de la aplicación
                        $rootDir = realpath(__DIR__ . '/..'); // Ajusta según la estructura de tus carpetas
                        $destino = $rootDir . "/public/imgProductos/" . $nombreImg;
        
                        // Copia la imagen al destino
                        if (copy($ruta, $destino)) {
                            return $nombreImg; // La imagen fue guardada exitosamente
                        } else {
                            echo "Error: No se pudo copiar el archivo.";
                            return false;
                        }
                    } else {
                        echo "Error: El archivo temporal no existe.";
                        return false;
                    }
                } else {
                    echo "Error: Formato de imagen no permitido. Solo se aceptan JPG y PNG.";
                    return false;
                }
            } else {
                echo "Error: No se ha seleccionado ningún archivo.";
                return false;
            }
        }
    
        function eliminarImagenCarpeta($nombreImg){
            $currentDir = dirname(__FILE__);
    
            // Encontrar el directorio raíz de la aplicación
            $rootDir = realpath(__DIR__ . '/..'); // ajusta según la estructura de tus carpetas
    
            $relativePath = $rootDir . "/" . $nombreImg;
            $absolutePath = realpath($relativePath);
    
            if ($absolutePath === false) {
                
            } else {
                // Verifica si el archivo existe
                if (file_exists($absolutePath)) {
                    // Intenta eliminar el archivo
                    if (unlink($absolutePath)) {
                       
                    }
                }
            }
        }
    }
?>