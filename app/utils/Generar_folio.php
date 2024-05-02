<?php
include_once ("../Conexion.php");

if (session_status() != 2) {
    session_start();
} 

// Función para generar un folio único
function generarFolio() {
    // Generar un folio único (por ejemplo, un UUID)
     // Generar un número aleatorio de 6 dígitos como parte del folio
     $numero_aleatorio = mt_rand(100000, 999999);

     // Combinar el prefijo "SGAF" con el número aleatorio para formar el folio completo
     $folio = "SGAF-" . $numero_aleatorio;
    return $folio;
}

// Función para verificar si el folio existe en la base de datos
function folioExiste($folio) {
    // Realizar la consulta para verificar si el folio existe en la base de datos
    global $conexion;
    $query = "SELECT COUNT(*) FROM soporte WHERE id_etiqueta = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("s", $folio);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    return $count > 0;
}

// Generar el folio único y verificar si existe en la base de datos
do {
    $folio = generarFolio();
} while (folioExiste($folio));

// Almacenar el folio en una variable de sesión
$_SESSION['folio'] = $folio;
?>