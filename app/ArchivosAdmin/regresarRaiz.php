<?php
session_start();
$cadena = $_SESSION['actualDireccion'];
$posicion = strrpos($cadena, "/"); // Encuentra la posición del último /
if ($posicion !== false) { // Si se encontró el carácter /
    $nuevaCadena = substr($cadena, 0, $posicion); // Extrae la subcadena desde el inicio hasta la posición del último /
    $_SESSION['actualDireccion'] = $nuevaCadena;
    $_SESSION['btnRegresar'] = false;
    header("Location: main.php");
} else {
    echo "No se encontró el carácter '/' en la cadena.";
}
?>