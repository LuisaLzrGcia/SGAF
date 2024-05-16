<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include_once "../Conexion.php";

    $nombreCarpeta = $_POST['nombreCarpeta'];
    $subir = isset($_POST['checkSubir']) ? 1 : 0;
    $eliminar = isset($_POST['checkEliminar']) ? 1 : 0;
    $descargar = isset($_POST['checkDescargar']) ? 1 : 0;
    echo $subir;
    echo $eliminar;
    echo $descargar;

    // Query SQL para actualizar los datos de la carpeta
    $sql = "UPDATE carpetas SET subir = ?, eliminar = ?, descargar = ? WHERE nombre = ?";

    // Preparar la declaración SQL para actualizar permisos
    $stmt = mysqli_prepare($conexion, $sql);
    if ($stmt) {
        // Vincular los parámetros con la declaración SQL
        mysqli_stmt_bind_param($stmt, "iiis", $subir, $eliminar, $descargar, $nombreCarpeta);

        // Ejecutar la declaración
        if (mysqli_stmt_execute($stmt)) {
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