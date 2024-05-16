<?php
session_start();
$rutaArchivo = $_POST['file'];
echo $rutaArchivo;

// // Verifica si el archivo existe
// if (file_exists($rutaArchivo)) {
//     // Establece las cabeceras para descargar el archivo
//     header("Content-Type: application/octet-stream");
//     header("Content-Disposition: attachment; filename=" . basename($rutaArchivo));
//     header("Content-Length: " . filesize($rutaArchivo));

//     // Lee el archivo y lo envía al cliente
//     readfile($rutaArchivo);
//     exit;
// } else {
//     // Si el archivo no existe, muestra un mensaje de error
//     echo "El archivo no existe.";
// }
?>