<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Directorio donde deseas crear la carpeta
    $directorio = $_SESSION['url'];

    // Nombre de la carpeta que proviene del formulario
    $nombreCarpeta = $_POST['nombreCarpeta'];

    // Ruta completa de la nueva carpeta
    $rutaCarpeta = $directorio . '\\' . $nombreCarpeta. '\\';

    // Verifica si la carpeta ya existe
    if (!is_dir($rutaCarpeta)) {
        // Intenta crear la carpeta
        if (mkdir($rutaCarpeta)) {

            include_once("../Conexion.php");

            // Preparar la consulta SQL
            $sql = "INSERT INTO carpetas (nombre, subir, eliminar, descargar, `url`) VALUES (?,?,?,?, ?)";
            $valorInicial = 1;
            // Preparar la declaración SQL
            if ($stmt = mysqli_prepare($conexion, $sql)) {
                // Vincular variables a la declaración preparada como parámetros
                mysqli_stmt_bind_param($stmt, "siiis", $nombreCarpeta, $valorInicial,$valorInicial,$valorInicial, $rutaCarpeta);

                // Ejecutar la declaración
                if (mysqli_stmt_execute($stmt)) {
                    header("Location: main.php");
                } else {
                    echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
                }

                // Cerrar la declaración
                mysqli_stmt_close($stmt);
            } else {
                echo "Error al preparar la consulta: " . mysqli_error($conexion);
            }
        } else {
            echo "Hubo un error al intentar crear la carpeta.";
        }
    } else {
        echo "La carpeta '$nombreCarpeta' ya existe en el directorio '$directorio'.";
    }
}
?>