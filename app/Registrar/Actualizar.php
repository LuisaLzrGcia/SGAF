<?php
include_once ("../Conexion.php");

// Obtener los datos del formulario
$id_usuario = $_POST["id_usuarioF"]; // Asumiendo que se está pasando el ID del usuario a través de un campo oculto en el formulario
$nombre = $_POST["nombreF"];
$apellidoP = $_POST["apellido_paF"];
$apellidoM = $_POST["apellido_maF"];
$empresa = $_POST["empresaF"];
$rfc = $_POST["rfcF"];
$rol = $_POST["rolF"];
$correo = $_POST["emailF"]; // Corregido: 'emailF' en lugar de 'email'
$password = $_POST["passwordF"];

// Query SQL para actualizar los datos en la base de datos
$sql = "UPDATE usuarios SET 
        nombre = '$nombre',
        apellido_pa = '$apellidoP',
        apellido_ma = '$apellidoM',
        empresa = '$empresa',
        rfc = '$rfc',
        rol = '$rol',
        correo = '$correo',
        password = '$password'
        WHERE id_usuario = $id_usuario";
if ($conexion->query($sql) === TRUE) {
    header("Location:  {$_SERVER['HTTP_REFERER']}");
} else {
    echo '<script>alert("Ocurrió un error al actualizar los datos");</script>';
    header("Location:  {$_SERVER['HTTP_REFERER']}");
}

// Cerrar la conexión
$conexion->close();
?>