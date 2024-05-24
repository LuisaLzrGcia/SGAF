<?php
include_once("../Conexion.php");

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

// Verify if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the database connection is successful
    if ($conexion->connect_error) {
        die("Connection failed: " . $conexion->connect_error);
    }

    // Query to get the tickets
    $consultaTickets = "SELECT * FROM usuarios";
    $stmtTickets = $conexion->prepare($consultaTickets);

    if ($stmtTickets) {
        $stmtTickets->execute();
        $resultado = $stmtTickets->get_result();

        if ($resultado) {
            // Initialize an array to store the ticket data
            $tickets = array();

            // Loop through the results and store them in the array
            while ($fila = $resultado->fetch_assoc()) {
                $tickets[] = $fila;
            }
            $ticket = array('Apple', 'Banana', 'Cherry');

            // Store the array of tickets in a session variable
            $_SESSION['tickets'] = $tickets;

            // Redirect back to the previous page
            $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'default_page.php';
            header("Location: $referer");
            exit();
        } else {
            // Show an error message if the query fails
            echo '<script>alert("Ocurrió un error al obtener los tickets."); window.history.back();</script>';
        }

        // Close the ticket statement
        $stmtTickets->close();
    } else {
        // Show an error message if the statement preparation fails
        echo '<script>alert("Ocurrió un error al preparar la consulta."); window.history.back();</script>';
    }
} else {
    // Show an error message if the request method is not POST
    echo '<script>alert("Método de solicitud no permitido."); window.history.back();</script>';
}

// Close the database connection
$conexion->close();
?>
