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
                    <div class="row justify-content-center align-items-center mx-auto">
                        <div class="col-md-10 container text-center">
                            <div class="form-group row">
                                <label for="id" class="bg-white w-auto col">Id de usuario</label>
                                <input class="col" type="text" name="id" class="form-control" placeholder="ID DE USUARIO *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="NOMBRES*" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="apellidoP" class="form-control" placeholder="APELLIDO PATERNO *"
                                    value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="apellidoM" class="form-control" placeholder="APELLIDO MATERNO *"
                                    value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="empresa" class="form-control" placeholder="NOMBRE DE LA EMPRESA *"
                                    value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="gmail" class="form-control" placeholder="CORREO ELECTRONICO *"
                                    value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="rfc" class="form-control" placeholder="RFC *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="NUMERO DE TELEFONO *"
                                    value="" />
                            </div>
                            <div class="form-group title-gradient">
                                <h6 for="txtDate">FECHA DE REGISTRO:</h6>
                                <input type="date" name="fecha" class="form-control">
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