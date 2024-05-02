<?php
include_once ("../Conexion.php");

        // Obtener los datos del formulario
        $folio = $_POST["folio"];
        $nombre = $_POST["nombre_completo"];
        $empresa = $_POST["empresa"];
        $rfc = $_POST["rfc"];
        $etiqueta= $_POST["etiqueta"];
        $mensaje = $_POST["mensaje"];
        $fechaReporte = $_POST["FechaReporte"];
     
    
        // Query SQL para insertar los datos en la base de datos
        $sql = "INSERT INTO soporte (id_etiqueta, cliente, empresa, rfc, problema, detalles, fecha) 
                VALUES ('$folio', '$nombre', '$empresa', '$rfc', '$etiqueta', '$mensaje', '$fechaReporte')";
    // Ejecutar la consulta SQL
$response = array();
if ($conexion->query($sql) === TRUE) {
    // Registro exitoso
    $response['registro_exitoso'] = true;
} else {
    // Error al registrar
    $response['registro_exitoso'] = false;
    $response['error'] = $conexion->error;
}

// Cerrar la conexión
$conexion->close();

// Enviar la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>