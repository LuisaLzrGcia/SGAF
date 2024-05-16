<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include_once "../Conexion.php";

    $nombreCarpeta = $_POST['nombreCarpetaU'];
    $usuarioAsignado = $_POST['usuario'];

    // Obtener el ID del usuario si se ha seleccionado un usuario
    if (!empty($usuarioAsignado)) {
        // Query SQL para obtener el ID del usuario basado en su RFC
        $stmt = mysqli_prepare($conexion, "SELECT id_usuario FROM usuarios WHERE rfc = ?");
        mysqli_stmt_bind_param($stmt, "s", $usuarioAsignado);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $idUsuario);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    } else {
        // Si no se ha seleccionado un usuario, establece el ID de usuario como vacío
        $idUsuario = "";
    }

    // Query SQL para actualizar los datos de la carpeta
    $sql = "UPDATE carpetas SET usuario_asignado = ? WHERE nombre = ?";

    // Preparar la declaración SQL para actualizar permisos
    $stmt = mysqli_prepare($conexion, $sql);
    if ($stmt) {
        // Vincular los parámetros con la declaración SQL
        mysqli_stmt_bind_param($stmt, "is", $idUsuario, $nombreCarpeta);

        // Ejecutar la declaración
        if (mysqli_stmt_execute($stmt)) {
            // Cerrar la conexión
            mysqli_close($conexion);

            // Redireccionar a main.php
            header("Location: main.php");
            exit; // Importante: asegúrate de salir del script después de redireccionar

        } else {
            // Manejar cualquier error en la ejecución de la declaración
            echo "Error al actualizar los datos de la carpeta: " . mysqli_error($conexion);
        }

        // Cerrar la declaración
        mysqli_stmt_close($stmt);
    } else {
        echo "Error al preparar la consulta: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>