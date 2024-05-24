<?php
include_once("../Conexion.php");

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

// Verificar si los datos han sido enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario y limpiarlos
    $id_usuario = intval($_SESSION["id_usuario"]);

    // Consulta para obtener los tickets del usuario
    $consultaTickets = "SELECT * FROM tickets WHERE id_usuario = ?";
    $stmtTickets = $conexion->prepare($consultaTickets);
    $stmtTickets->bind_param("i", $id_usuario);
    $stmtTickets->execute();
    $resultado = $stmtTickets->get_result();

    // Verificar si se obtuvieron resultados
    if ($resultado) {
        // Inicializar un array para almacenar los datos de los tickets
        $tickets = array();

        // Recorrer los resultados y guardarlos en el array
        while ($fila = $resultado->fetch_assoc()) {
            $tickets[] = $fila; // Agregar la fila al array de tickets
        }

        // Guardar el array de tickets en una variable de sesión
        $_SESSION['tickets'] = $tickets;

        // Redirigir de vuelta a la página anterior
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        // Mostrar un mensaje de error si la consulta falla
        echo '<script>alert("Ocurrió un error al obtener los tickets."); window.history.back();</script>';
    }

    // Cerrar la declaración de tickets
    $stmtTickets->close();
} else {
    // Mostrar un mensaje de error si el método de solicitud no es POST
    echo '<script>alert("Método de solicitud no permitido."); window.history.back();</script>';
}

// Cerrar la conexión
$conexion->close();
?>
