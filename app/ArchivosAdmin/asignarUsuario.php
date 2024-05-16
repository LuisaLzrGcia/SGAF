<?php
if (isset($_POST['usuarioSelecionado']) && isset($_POST['direccion'])) {
    $direccion = $_POST['direccion'];
    $rfc = $_POST['usuarioSelecionado'];

    include_once ("../Conexion.php");

    // Consulta preparada para evitar inyección SQL
    $sql = "UPDATE usuarios
            SET urlCarpeta = ?
            WHERE rfc = ?";

    // Preparar la consulta
    $stmt = mysqli_prepare($conexion, $sql);

    // Vincular parámetros
    mysqli_stmt_bind_param($stmt, "ss", $direccion, $rfc);

    // Ejecutar la consulta
    $respuesta = mysqli_stmt_execute($stmt);

    if ($respuesta) {
        header("Location: main.php");
    } else {
        echo "Ocurrió un error al ejecutar la consulta.";
    }

    // Cerrar la consulta preparada
    mysqli_stmt_close($stmt);
} else {
    echo "Ocurrió un error. Los datos no están completos.";
}
?>