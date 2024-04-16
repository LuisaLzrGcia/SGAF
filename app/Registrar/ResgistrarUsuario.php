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
    <div class="container contact-form border  ; ">
        <div class="container-fluid w-50  p-0 ">
            <div class="contact-image  text-center mb-4">
                <img class="rounded-circle"  src="" alt="" srcset="../../public/images/LogoForm.png"
                    style="width: 120px; height: auto;">
            </div>
            <form method="post" action="../utils/Registrar.php">
                <div class="container title-gradient">
                    <div class="row  ">
                        <div class="col-md-6 offset-md-3">
                            <div class="signup-form">
                                <form action="" class="mt-5 border p-4 bg-light shadow">
                                    <h4 class="mb-5 text-center title-gradient">REGISTRO DE USUARIOS</h4>
                                    <div class="row">
                                        <div class="mb-3 col-md-12">
                                            <label>Nombre<span>*</span></label>
                                            <input type="text" name="nombre" class="form-control">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label>Primer Apellido<span>*</span></label>
                                            <input type="text" name="apellidoP" class="form-control">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label>Segundo Apellido<span>*</span></label>
                                            <input type="text" name="apellidoM" class="form-control">
                                        </div>

                                        <div class="mb-3 col-md-12">
                                            <label>Empresa<span>*</span></label>
                                            <input type="text" name="empresa" class="form-control">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label>RFC<span>*</span></label>
                                            <input type="text" name="rfc" class="form-control">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label>ROL<span>*</span></label>
                                            <input type="text" name="rol" class="form-control">
                                        </div>

                                        <div class="mb-3 col-md-12">
                                            <label>Correo electronico<span>*</span></label>
                                            <input type="email" name="correo" class="form-control">
                                        </div>

                                        <div class="mb-3 col-md-12">
                                            <label>Contraseña<span>*</span></label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label>Fecha de registro<span>*</span></label>
                                            <input type="date" name="fecha" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary float-end">Registrar</button>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <button onclick="history.back();">Regresar</button>
    </div>
</body>

</html>

<?php
} else {
    header("Location: ../Main/Main.php");
}
?>