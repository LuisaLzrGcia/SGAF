<?php
include_once ("../Conexion.php");



if (isset($_POST['rfc']) && isset($_POST['password'])) {
    // Obtener usuario y contraseña del formulario
    $rfc = ($_POST['rfc']);
    $password = ($_POST['password']);

    // Incluir el archivo de la clase Usuarios
    include ("../Login/ClaseUsuario.php");

    // Instanciar la clase Usuarios
    $Usuarios = new Usuarios();

    // Intentar iniciar sesión
    $login_result = $Usuarios->loginUsuarios($rfc, $password);

    // Verificar si el inicio de sesión fue exitoso
    if ($login_result) {
        
        if ($_SESSION['rol'] == "admin") {
            echo $login_result;
            header("Location: ../Main/Main.php");
            exit; // Salir del script para evitar ejecución adicional
        }else if($_SESSION['rol']=="master"){
            header("Location: ../Main/Master.php");
            exit;
        }
        else {
            header("Location: ../Main/Cliente.php");
            exit; // Salir del script para evitar ejecución adicional
        }
        
        
    } else {
        // Si el inicio de sesión falló, devolver un mensaje de error en formato JSON
        $response = array("success" => false, "error" => "Usuario o contraseña incorrectos.");
        echo json_encode($response);
    }
} else {
    // Manejar el caso en que los datos del formulario no se hayan enviado correctamente
    $response = array("success" => false, "error" => "Datos de inicio de sesión no recibidos correctamente.");
    echo json_encode($response);
}
?>