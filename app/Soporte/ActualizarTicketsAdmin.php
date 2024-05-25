<?php
include_once("../Conexion.php");

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

// Verificar si los datos han sido enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario y limpiarlos
    $num_seguimiento = $_POST["numeroT"];
    $solucion = htmlspecialchars(trim($_POST["solucionT"]));

    // Preparar la consulta SQL
    $stmt = $conexion->prepare("UPDATE tickets SET estado = 'cerrado', solucion = ?, fecha_cierre = NOW() WHERE num_seguimiento = ?");

    // Verificar si la preparación fue exitosa
    if ($stmt) {
        // Enlazar los parámetros
        $stmt->bind_param("ss", $solucion, $num_seguimiento);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            include_once "ActualizarTickets.php";
            // Redirigir a la página anterior si la ejecución es exitosa
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        } else {
            // Mostrar un mensaje de error si la ejecución falla
            echo '<script>alert("Ocurrió un error al ejecutar la consulta."); window.history.back();</script>';
        }

        // Cerrar el statement
        $stmt->close();
    } else {
        // Mostrar un mensaje de error si la preparación falla
        echo '<script>alert("Ocurrió un error al preparar la consulta."); window.history.back();</script>';
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    // Mostrar un mensaje de error si el método de solicitud no es POST
    echo '<script>alert("Método de solicitud no permitido."); window.history.back();</script>';
}
?>
