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
            margin-bottom: 10px; /* Agrega un margen inferior de 20px a todos los .form-group excepto el último */
        }

    </style>
</head>

<body class="bg-general">
    <?php
    include_once "../Componets/Navbar.php";
    ?>
    <div class="container contact-form  ; ">
        <div class="container-fluid w-50 ">
            <div class="contact-image  text-center">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact" />
            </div>
            <form method="post">
                <h3 class="text-center">REGISTRO DE USUARIO</h3>
                <div class="row justify-content-center align-items-center border">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="id" class="form-control" placeholder="ID DE USUARIO *"
                                value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="NOMBRE*" value="" />
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
                            <input type="text" name="direccion" class="form-control" placeholder="DIRECCION *"
                                value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="rfc" class="form-control" placeholder="RFC *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="NUMERO DE TELEFONO *"
                                value="" />
                        </div>
                        <div class="form-group">
                            <h6 for="txtDate">FECHA DE REGISTRO:</h6>
                            <input type="date" name="fecha" class="form-control" >
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