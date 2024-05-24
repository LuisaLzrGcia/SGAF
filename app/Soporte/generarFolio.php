<?php 
include "../Conexion.php"; // Agregar punto y coma al final

function generateUniqueFolio($length = 12) { // Agregar la palabra clave 'function'
    global $conexion; // Agregar para acceder a la conexión

    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    do {
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        // Verificar si el folio generado ya existe en la base de datos
        $sql = "SELECT COUNT(*) AS count FROM tickets WHERE num_seguimiento = '$randomString'";
        $result = $conexion->query($sql);
        $row = $result->fetch_assoc();
        $count = $row['count'];
    } while ($count > 0); // Repetir hasta que se genere un folio único
    return $randomString;
}
?>
