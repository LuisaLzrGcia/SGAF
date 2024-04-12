<?php
if (session_status() !== 2)
    session_start();
if ($_SESSION['user'] && $_SESSION['rol'] == "admin") {
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registra usuarios</title>
    <link rel="stylesheet" href="../../public/CSS/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <style>
    /* Agrega un margen inferior al contenedor de navegación */
    nav {
        margin-bottom: 20px;
        /* Ajusta el valor según el espacio deseado */
    }

    /* Estilos para la separación entre cajas de texto */
    .form-group:not(:last-child) {
        margin-bottom: 10px;
        /* Agrega un margen inferior de 20px a todos los .form-group excepto el último */
    }
    </style>
</head>

<body
    style="background-image: url('../../public/images/FondoSGAF.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <?php
        include_once "../Componets/Navbar/NavbarAdmin.php";
        ?>
    <div class="container contact-form  ; ">
        <div class="container-fluid w-50  p-0 ">
            <div class="contact-image  text-center">
                <img class="rounded-circle" src="" alt="" srcset="../../public/images/LogoForm.png"
                    style="width: 120px; height: auto;">
            </div>
            <form method="post">
                <div class="d-flex justify-content-center ">
                    <h3 class="text-center title-gradient  d-inline-block p-1 text-center">REGISTRO DE USUARIO</h3>
                </div>
                <div class="row justify-content-center align-items-center mx-auto border">
                    <div class="col-md-10 container text-center border">
                        <div class="form-group border">
                            <label for="usuario" class="bg-white w-auto col">NOMBRE DE USUARIO</label>
                            <input class="col" type="text" name="usuario" class="form-control" value="" />
                        </div>
                        <div class="form-group">
                            <label for="apellidoP" class="bg-white w-auto col">APELLIDO PATERNO :</label>
                            <input class="col" type="text" name="apellidoP" class="form-control" value="" />

                        </div>
                        <div class="form-group">
                            <label for="apellidoP" class="bg-white w-auto col">APELLIDO MATERNO :</label>
                            <input class="col" type="text" name="apellidoM" class="form-control" value="" />

                        </div>
                        <div class="form-group">
                            <label for="apellidoP" class="bg-white w-auto col">NOMBRE DE LA EMPRESA :</label>
                            <input class="col" type="text" name="empresa" class="form-control" value="" />

                            <div class="form-group">
                                <label for="empresa" class="bg-white w-auto col">RFC :</label>
                                <input class="col" type="text" name="rfc" class="form-control" value="" />

                            </div>
                            <div class="form-group">

                                <label for="rol" class="bg-white w-auto col">ROL :</label>
                                <input class="col" type="text" name="rol" class="form-control" value="" />
                            </div>
                            <div class="form-group">
                                <label for="gmail" class="bg-white w-auto col">CORREO ELECTRONICO :</label>
                                <input class="col" type="text" name="gmail" class="form-control" value="" />

                            </div>
                            <div class="form-group">

                                <label for="password" class="bg-white w-auto col">CONTRASEÑA:</label>
                                <input class="col" type="text" name="password" class="form-control" value="" />

                            </div>
                            <div class="form-group ">
                                <label for="password" class="bg-white w-auto col">FECHA DE REGISTRO:</label>
                                <input class="col" type="date" name="fecha" class="form-control" value="" />>
                            </div>

                            <div class="form-group  text-center">
                                <button type="button" class="btn btn-primary float-end" href="#">REGISTRAR</button>
                            </div>
                        </div>

                    </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php
} else {
    header("Location: ../Main/Main.php");
}
?>