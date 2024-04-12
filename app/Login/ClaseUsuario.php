<?php
include_once "../Conexion.php"; // Agregar "once" para evitar problemas de inclusión múltiple.
if (session_status() != 2) {
    session_start();
}
class Usuarios
{
    public function loginUsuarios($usuario, $password)
    {
        global $conexion; // Acceder a la conexión establecida fuera de la clase

        $sql = "SELECT * FROM `usuarios` 
                WHERE `user` = '$usuario' AND `password` = '$password'";
        
        $respuesta = mysqli_query($conexion, $sql);

        if ($respuesta && mysqli_num_rows($respuesta) > 0) {
            $datosUsuario = mysqli_fetch_array($respuesta);
            $_SESSION['user'] = $datosUsuario['user'];
            $_SESSION['rol'] = $datosUsuario['rol'];
            return true;
        } else {
            return false;
        }
    }
}
?>