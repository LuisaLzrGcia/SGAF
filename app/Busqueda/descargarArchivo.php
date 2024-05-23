<?php
session_start();

// Verifica si se ha pasado un archivo como parámetro
if (isset($_POST['file'])) {
    $file = urldecode($_POST['file']); // Decodifica la URL si es necesario

    // Verifica si el archivo existe
    if (file_exists($file)) {
        // Establece las cabeceras para descargar el archivo
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=" . basename($file));
        header("Content-Length: " . filesize($rutaArchivo));

        // Lee el archivo y lo envía al cliente
        readfile($file);
        exit;
    } else {
        // Si el archivo no existe, muestra un mensaje de error
        echo "El archivo no existe.";
    }
} else {
    // Si no se proporciona un archivo, muestra un mensaje de error
    echo "No se ha proporcionado ningún archivo.";
}
?>
