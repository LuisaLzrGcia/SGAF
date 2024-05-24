<?php
session_start();
    // Directorio base donde están las carpetas
    $directorio = $_SESSION['url'];

    // Nombre actual de la carpeta y el nuevo nombre de la carpeta del formulario
    $nombreActual = $_POST['carpetaActualN'];
    $nuevoNombre = $_POST['carpetaNombre'];

    // Rutas completas de las carpetas
    $rutaActual = $directorio .  $nombreActual . '\\';
    $rutaNueva = $directorio .  $nuevoNombre . '\\';

    // Verifica si la carpeta actual existe
    if (is_dir($rutaActual)) {
        // Verifica si la nueva carpeta ya existe
        if (!is_dir($rutaNueva)) {
            // Intenta renombrar la carpeta
            if (rename($rutaActual, $rutaNueva)) {
                include_once("../Conexion.php");

                // Preparar la consulta SQL para actualizar el registro
                $sql = "UPDATE carpetas SET nombre = ?, url = ? WHERE nombre = ?";
                
                // Preparar la declaración SQL
                if ($stmt = mysqli_prepare($conexion, $sql)) {
                    // Vincular variables a la declaración preparada como parámetros
                    mysqli_stmt_bind_param($stmt, "sss", $nuevoNombre, $rutaNueva, $nombreActual);

                    // Ejecutar la declaración
                    if (mysqli_stmt_execute($stmt)) {
                        $previousPage = $_SERVER['HTTP_REFERER'];
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
                echo "Hubo un error al intentar renombrar la carpeta.";
            }
        } else {
            echo "La carpeta con el nombre '$nuevoNombre' ya existe en el directorio '$directorio'.";
        }
    } else {
        echo "La carpeta con el nombre '$nombreActual' no existe en el directorio '$directorio'.";
    }
?>