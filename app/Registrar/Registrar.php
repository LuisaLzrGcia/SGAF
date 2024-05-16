<?php
include_once ("../Conexion.php");

// Obtener los datos del formulario
$nombre = $_POST["nombre"];
$apellidoP = $_POST["apellido_pa"];
$apellidoM = $_POST["apellido_ma"];
$empresa = $_POST["empresa"];
$rfc = $_POST["rfc"];
$rol = $_POST["rol"];
$correo = $_POST["email"]; // Corregido: 'email' en lugar de 'correo'
$password = $_POST["password"];

// Query SQL para insertar los datos en la base de datos
$sql = "INSERT INTO usuarios
VALUES (null, '$nombre', '$apellidoP', '$apellidoM', '$rfc', '$rol', '$correo', '$password', '$empresa', now())";

if ($conexion->query($sql) === TRUE) {
    header("Location:  {$_SERVER['HTTP_REFERER']}");
} else {
    echo '<script>alert("Ocurrio un error");</script>';

    header("Location:  {$_SERVER['HTTP_REFERER']}");
}

// Cerrar la conexión
$conexion->close();
?>