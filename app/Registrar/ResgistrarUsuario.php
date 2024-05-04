<?php
if (session_status() !== 2)
    session_start();
if ($_SESSION['user'] && $_SESSION['rol'] == "admin" || $_SESSION['rol'] == "master") {
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
    style="background-image: url('../../public/images/FondoSGAF.png'); 
    background-size: cover; background-position: center; background-repeat: no-repeat; margin: 0; padding: 0; height: 100vh;">
    <?php
    if ($_SESSION['rol'] == "admin") {
        include_once "../Componets/Navbar/NavbarAdmin.php";
    }else 
    include_once "../Componets/Navbar/NavbarMaster.php"
        ?>
    <div class="container-fluid border  ; ">

        <div class="card border-0 shadow my-5 mx-auto" style="width: 50rem;">
            <div class="card-body">
                <h1> USUARIOS </h1>
                <button type="button" class="btn btn-primary  text-center cursor: pointer;" id="openLoginModal">Agregar
                    Usuario
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg>


                </button>


            </div>

        </div>


        <!-- Modal de inicio de sesión -->
        <div class="modal fade " id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog border border-0 shadow ">
                <div class="modal-content "
                    style="background: linear-gradient(to right, #8ad4e0, #31caf8); color:black;">
                    <div class="modal-header ">
                        <h5 class="modal-title" ; id="exampleModalLabel">REGISTRO </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body  text-center  ">
                        <!-- Aquí va el formulario de inicio de sesión -->
                        <form method="post" action="../utils/Registrar.php ">
                            <div class="container ">
                                <div class="row">
                                    <div class="col-md-6 offset-md-3 ">
                                        <div class="signup-form">
                                            <form action="" class="p-4 bg-light shadow">

                                                <div class="row">
                                                    <div class="mb-2 col-md-12">
                                                        <label>Nombre<span>*</span></label>
                                                        <input type="text" name="nombre" class="form-control">
                                                    </div>

                                                    <div class="mb-2 col-md-6">
                                                        <label>Primer Apellido<span>*</span></label>
                                                        <input type="text" name="apellidoP" class="form-control">
                                                    </div>

                                                    <div class="mb-2 col-md-6">
                                                        <label>Segundo Apellido<span>*</span></label>
                                                        <input type="text" name="apellidoM" class="form-control">
                                                    </div>

                                                    <div class="mb-2 col-md-12">
                                                        <label>Empresa<span>*</span></label>
                                                        <input type="text" name="empresa" class="form-control" required>
                                                    </div>

                                                    <div class="mb-2 col-md-12">
                                                        <label>RFC<span>*</span></label>
                                                        <input type="text" name="rfc" class="form-control" required>
                                                    </div>

                                                    <div class="mb-2 col-md-12">
                                                        <label>ROL<span>*</span></label>
                                                        <select class="form-select" name="rol"
                                                            aria-label="Default select example">
                                                            <option selected>Seleccionar</option>
                                                            <option value="user">Cliente</option>
                                                            <option value="admin">Administrador</option>

                                                        </select>
                                                    </div>
                                                    <div class="mb-2 col-md-12">
                                                        <label>Correo electronico<span>*</span></label>
                                                        <input type="email" name="correo" class="form-control" required
                                                            pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
                                                        <span id="error-correo" class="text-danger"
                                                            style="display: none; ">Por favor, introduce un correo
                                                            electrónico válido.</span>
                                                    </div>

                                                    <div class="mb-2 col-md-12">
                                                        <label>Contraseña<span>*</span></label>
                                                        <input type="password" name="password" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class="mb-2 col-md-12">
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


                </div>
            </div>
        </div>


        <button onclick="history.back();">Regresar</button>
    </div>

    <script>
    // JavaScript para abrir el modal de inicio de sesión al hacer clic en el enlace de la barra de navegación
    document.getElementById('openLoginModal').addEventListener('click', function() {
        var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
        loginModal.show();
    });
    document.addEventListener("DOMContentLoaded", (event) => {
        sessionStorage.setItem("bttnSelecionado", "Inicio")
    });
    </script>

    <script>
    document.querySelector('input[name="correo"]').addEventListener('input', function() {
        var correo = this.value;
        var regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        var errorCorreo = document.getElementById('error-correo');

        if (!regex.test(correo)) {
            errorCorreo.style.display = 'block';
        } else {
            errorCorreo.style.display = 'none';
        }
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
} else {
    header("Location: ../Main/Main.php");
}
?>