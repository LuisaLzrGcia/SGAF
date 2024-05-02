
<?php
include_once ("../Conexion.php");
if (session_status() != 2) {
    session_start();
} 

// Suponiendo que ya tienes una conexión a la base de datos establecida en $conexion

// Consulta SQL para obtener el nombre completo del usuario (nombre, apellido paterno y apellido materno concatenados)
$query = "SELECT CONCAT(user, ' ', apellidoP, ' ', apellidoM) AS nombre_completo FROM usuarios WHERE user= ?";

// Suponiendo que tienes el ID del usuario almacenado en una variable $id_usuario
$id_usuario = $_SESSION['user']; // O de donde provenga tu ID de usuario

// Preparar la consulta
if ($stmt = $conexion->prepare($query)) {
    // Vincular parámetros
    $stmt->bind_param("s", $id_usuario);
    
    // Ejecutar la consulta
    $stmt->execute();
    
    // Vincular variables de resultado
    $stmt->bind_result($nombre_completo);
    
    // Obtener el resultado
    $stmt->fetch();
    
    // Cerrar la consulta
    $stmt->close();

     // Establecer el nombre completo en una variable de sesión
     $_SESSION['nombre_completo'] = $nombre_completo;
}




// Consulta SQL para obtener la empresa y el RFC del usuario
$query = "SELECT empresa, rfc FROM usuarios WHERE user = ?";

// Suponiendo que tienes el ID del usuario almacenado en una variable $id_usuario
$id_usuario = $_SESSION['user']; // O de donde provenga tu ID de usuario

// Preparar la consulta
if ($stmt = $conexion->prepare($query)) {
    // Vincular parámetros
    $stmt->bind_param("s", $id_usuario);
    
    // Ejecutar la consulta
    $stmt->execute();
    
    // Vincular variables de resultado
    $stmt->bind_result($empresa, $rfc);
    
    // Obtener el resultado
    $stmt->fetch();
    
    // Cerrar la consulta
    $stmt->close();

     // Establecer la empresa y el RFC en variables de sesión
     $_SESSION['empresa'] = $empresa;
     $_SESSION['rfc'] = $rfc;
}
?>
