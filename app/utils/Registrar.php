<?php
include_once ("../Conexion.php");

        // Obtener los datos del formulario
        $nombre = $_POST["nombre"];
        $apellidoP = $_POST["apellidoP"];
        $apellidoM = $_POST["apellidoM"];
        $empresa = $_POST["empresa"];
        $rfc = $_POST["rfc"];
        $rol = $_POST["rol"];
        $correo = $_POST["correo"];
        $password = $_POST["password"];
        $fecha = $_POST["fecha"];
    
        // Query SQL para insertar los datos en la base de datos
        $sql = "INSERT INTO usuarios (user, apellidoP, apellidoM, empresa, rfc, rol, gmail, password, fecha) 
                VALUES ('$nombre', '$apellidoP', '$apellidoM', '$empresa', '$rfc', '$rol', '$correo', '$password', '$fecha')";
    
       if ($conexion->query($sql) === TRUE) {
    // Registro exitoso
    echo '<div class="alert alert-success" role="alert">Registro exitoso. ¡Gracias por registrarte!</div>';
} else {
    // Error al registrar
    echo '<div class="alert alert-danger" role="alert">Error al registrar: ' . $conexion->error . '</div>';
}
    
        // Cerrar la conexión
        $conexion->close();
    ?>