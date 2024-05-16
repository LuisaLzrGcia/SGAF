<?php
include_once "../Conexion.php"; // Agregar "once" para evitar problemas de inclusión múltiple.
if (session_status() != 2) {
    session_start();
}
class Usuarios
{
    public function loginUsuarios($rfc, $password)
    {
        global $conexion; // Acceder a la conexión establecida fuera de la clase

        $sql = "SELECT * FROM `usuario_carpeta` 
                WHERE `rfc` = '$rfc' AND `password` = '$password'";

        $respuesta = mysqli_query($conexion, $sql);

        if ($respuesta && mysqli_num_rows($respuesta) > 0) {
            $datosUsuario = mysqli_fetch_array($respuesta);
            $_SESSION['nombre'] = $datosUsuario['nombre_usuario'];
            $_SESSION['apellido_pa'] = $datosUsuario['apellido_pa'];
            $_SESSION['apellido_ma'] = $datosUsuario['apellido_ma'];
            $_SESSION['rfc'] = $datosUsuario['rfc'];
            $_SESSION['rol'] = $datosUsuario['rol'];
            $_SESSION['url'] = $datosUsuario['url'] . "\\";
            $_SESSION['actualDireccion'] = $datosUsuario['url']. "\\";
            $_SESSION['subir'] = $datosUsuario['subir'];
            $_SESSION['eliminar'] = $datosUsuario['eliminar'];
            $_SESSION['descargar'] = $datosUsuario['descargar'];
            $_SESSION['user'] = true;
            $_SESSION['btnRegresar'] = false;
            return true;
        } else {
            return false;
        }
    }
}
?>