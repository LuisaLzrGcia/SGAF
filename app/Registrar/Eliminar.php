<?php
include_once ("../Conexion.php");

// Obtener los datos del formulario
$id = $_POST["id_usuarioF"];
echo $id;


// Query SQL para insertar los datos en la base de datos
$sql = "DELETE FROM usuarios WHERE id_usuario = '$id'";
echo $sql;

if ($conexion->query($sql) === TRUE) {
    header("Location:  {$_SERVER['HTTP_REFERER']}");
} else {
    echo '<script>alert("Ocurrio un error");</script>';

    header("Location:  {$_SERVER['HTTP_REFERER']}");
}

// Cerrar la conexión
$conexion->close();
?>