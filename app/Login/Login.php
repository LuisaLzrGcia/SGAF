<?php
include_once ("../Conexion.php");

if (isset($_POST['user']) && isset($_POST['password'])) {
    // Obtener usuario y contraseña del formulario
    $usuario = ($_POST['user']);
    $password = ($_POST['password']);


    // // Incluir el archivo de la clase Usuarios
    include ("../Login/ClaseUsuario.php");

    // // Instanciar la clase Usuarios
    $Usuarios = new Usuarios();

    // // Intentar iniciar sesión
    $login_result = $Usuarios->loginUsuarios($usuario, $password);

    // Verificar si el inicio de sesión fue exitoso
    if ($login_result) {
        // Redireccionar a inicio.php
        header("Location: ../Main/Main.php");
        exit; // Salir del script para evitar ejecución adicional
    } else {
        // Mostrar mensaje de error
        echo "Error: Usuario o contraseña incorrectos.";
    }
} else {
    // Manejar el caso en que los datos del formulario no se hayan enviado correctamente
    echo "Error: Datos de inicio de sesión no recibidos correctamente.";
}
?>