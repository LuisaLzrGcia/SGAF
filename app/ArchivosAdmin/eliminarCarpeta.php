<?php
session_start();
if (isset($_GET['file'])) {
    $nombre = $_GET['file'];
    $ruta = $_SESSION['actualDireccion'] . "/" . $nombre;

    // Verifica si es un archivo
    if (is_file($ruta)) {
        // Elimina el archivo
        if (unlink($ruta)) {
            $previousPage = $_SERVER['HTTP_REFERER'];
                        header("Location: $previousPage");
        } else {
            echo "Hubo un error al intentar eliminar el archivo.";
            sleep(3);
            $previousPage = $_SERVER['HTTP_REFERER'];
                        header("Location: $previousPage");
        }
    } elseif (is_dir($ruta)) { // Verifica si es un directorio (carpeta)
        // Elimina el directorio y su contenido
        if (rmdir($ruta)) {
            include_once ("../Conexion.php");

            $nombreCarpeta = $nombre;
            // Preparar la consulta SQL
            $sql = "DELETE FROM carpetas WHERE nombre = ?";
            // Preparar la declaración SQL
            if ($stmt = mysqli_prepare($conexion, $sql)) {
                // Vincular variables a la declaración preparada como parámetros
                mysqli_stmt_bind_param($stmt, "s", $nombreCarpeta);
                // Ejecutar la declaración
                if (mysqli_stmt_execute($stmt)) {
                    $previousPage = $_SERVER['HTTP_REFERER'];
                        header("Location: $previousPage");
                    exit(); // Termina la ejecución del script después de redirigir
                } else {
                    echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
                }
                // Cerrar la declaración
                mysqli_stmt_close($stmt);
            } else {
                echo "Error al preparar la consulta: " . mysqli_error($conexion);
            }

        } else {
            echo "Hubo un error al intentar eliminar la carpeta.";
            sleep(3);
            $previousPage = $_SERVER['HTTP_REFERER'];
                        header("Location: $previousPage");
        }
    } else {
        echo "El elemento no es ni un archivo ni una carpeta.";
    }
} else {
    echo "Acceso no autorizado.";
}
?>