<?php
session_start();
if (isset($_GET['file'])) {
    $nombreCarpeta = $_GET['file'];
    $rutaCarpeta = $_SESSION['actualDireccion'] . "/" . $nombreCarpeta;
    $_SESSION['actualDireccion'] = $rutaCarpeta;
    $_SESSION['btnRegresar']=true;

    if ($_SESSION['actualDireccion']) {
        header("Location: main.php");
    } else {
        echo "Hubo un error al intentar eliminar la carpeta.";
        sleep(3);
        header("Location: main.php");
    }
} else {
    echo "Acceso no autorizado.";
}
?>