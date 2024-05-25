<?php
include_once "../Conexion.php"; // Agregar "once" para evitar problemas de inclusión múltiple.

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

class Usuarios
{
    public function loginUsuarios($rfc, $password)
    {
        global $conexion; // Acceder a la conexión establecida fuera de la clase

        $sql = "SELECT * FROM `usuario_carpeta` WHERE `rfc` = ? AND `password` = ?";
        
        // Preparar la consulta
        $stmt = $conexion->prepare($sql);
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $conexion->error);
        }
        $stmt->bind_param("ss", $rfc, $password);
        $stmt->execute();
        $respuesta = $stmt->get_result();

        if ($respuesta && $respuesta->num_rows > 0) {
            $datosUsuario = $respuesta->fetch_assoc();
            // Regenerar ID de sesión para prevenir ataques de fijación de sesión
            session_regenerate_id(true);

            $_SESSION['nombre'] = $datosUsuario['nombre_usuario'];
            $_SESSION['id_usuario'] = $datosUsuario['id_usuario'];
            $_SESSION['apellido_pa'] = $datosUsuario['apellido_pa'];
            $_SESSION['apellido_ma'] = $datosUsuario['apellido_ma'];
            $_SESSION['rfc'] = $datosUsuario['rfc'];
            $_SESSION['rol'] = $datosUsuario['rol'];
            $_SESSION['url'] = $datosUsuario['url'] . "\\";
            $_SESSION['actualDireccion'] = $datosUsuario['url'] . "\\";
            $_SESSION['subir'] = $datosUsuario['subir'];
            $_SESSION['eliminar'] = $datosUsuario['eliminar'];
            $_SESSION['descargar'] = $datosUsuario['descargar'];
            $_SESSION['carpeta'] = $datosUsuario['nombre_carpeta'];
            $_SESSION['user'] = true;
            $_SESSION['btnRegresar'] = false;


            // Consulta de tickets
            $consultaTickets = ($_SESSION['rol'] == 'admin' || $_SESSION['rol'] == 'master') ? 
                "SELECT * FROM usuarios_tickets" : 
                "SELECT * FROM tickets WHERE id_usuario = ?";

            $stmtTickets = $conexion->prepare($consultaTickets);
            if (!$stmtTickets) {
                die("Error en la preparación de la consulta de tickets: " . $conexion->error);
            }

            if ($_SESSION['rol'] != 'admin' && $_SESSION['rol'] != 'master') {
                $stmtTickets->bind_param("i", $datosUsuario['id_usuario']);
            }

            $stmtTickets->execute();
            $resultado = $stmtTickets->get_result();

            // Inicializar un array para almacenar los datos de los tickets
            $tickets = array();

            if ($resultado && $resultado->num_rows > 0) {
                // Recorrer los resultados y guardarlos en el array
                while ($fila = $resultado->fetch_assoc()) {
                    $tickets[] = $fila; // Agregar la fila al array de tickets
                }
            }

            // Guardar el array de tickets en una variable de sesión
            $_SESSION['tickets'] = $tickets;

            // Liberar los resultados y cerrar las declaraciones
            if ($resultado) {
                $resultado->free();
            }
            $stmtTickets->close();
            $stmt->close();
            

            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
}
?>
