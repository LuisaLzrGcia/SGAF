<?php
if (session_status() !== 2)
    session_start();
if ($_SESSION['user']) {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SGAF</title>
        <link rel="stylesheet" href="../../public/CSS/style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    </head>

    <body class="bg-general">
        <?php
        if ($_SESSION['rol'] == "admin") {
            include_once "../Componets/Navbar/NavbarAdmin.php";
        } else  if ($_SESSION['rol'] == "master") {
            
            include_once "../Componets/Navbar/NavbarMaster.php";

        }else{
            include_once "../Componets/Navbar/NavbarUser.php";
        }
        include_once ("./modalRegistrarUsuario.php");
        include_once ("./modalModificarUsuario.php");
        ?>
        <div class="bg-body-secondary m-5 p-3">
            <div class="pb-3">
                <button type="button" id="registrarUsuarioModal" class="btn btn-success">Registrar Usuario</button>

            </div>
            <div class="table-responsive">
                <table class="display" id="usuarios">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>RFC</th>
                            <th>Rol</th>
                            <th>Correo</th>
                            <th>Empresa</th>
                            <th>Fecha de Registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once ("../Conexion.php");
                        $sql_query = "SELECT*FROM usuarios";
                        $resultset = mysqli_query($conexion, $sql_query) or die("database error:" . mysqli_error($conn));
                        while ($usuario = mysqli_fetch_assoc($resultset)) {
                            ?>
                            <tr>
                                <td><?php echo $usuario['nombre']; ?></td>
                                <td><?php echo $usuario['apellido_pa']; ?></td>
                                <td><?php echo $usuario['apellido_ma']; ?></td>
                                <td><?php echo $usuario['rfc']; ?></td>
                                <td>
                                    <?php

                                    switch ($usuario['rol']) {
                                        case 'master':
                                            echo "<span class='badge text-bg-danger fs-6'>" . $usuario['rol'] . "</span>";
                                            break;
                                        case 'admin':
                                            echo "<span class='badge text-bg-warning fs-6'>" . $usuario['rol'] . "</span>";
                                            break;
                                        default:
                                            echo "<span class='badge text-bg-primary fs-6'>" . $usuario['rol'] . "</span>";
                                            break;
                                    }
                                    ?>

                                </td>
                                <td><?php echo $usuario['correo']; ?></td>
                                <td><?php echo $usuario['empresa']; ?></td>
                                <td><?php echo $usuario['fecha_registro']; ?></td>
                                <td>
                                    <div class="d-flex justify-content-center align-content-center">
                                        <button type="button"
                                            class="btn btn-primary modalModificarUsuarioBtn d-flex justify-content-center align-content-center"
                                            data-id-usuario="<?php echo $usuario['id_usuario']; ?>"
                                            data-nombre="<?php echo $usuario['nombre']; ?>"
                                            data-apellido-pa="<?php echo $usuario['apellido_pa']; ?>"
                                            data-apellido-ma="<?php echo $usuario['apellido_ma']; ?>"
                                            data-rfc="<?php echo $usuario['rfc']; ?>"
                                            data-empresa="<?php echo $usuario['empresa']; ?>"
                                            data-rol="<?php echo $usuario['rol']; ?>"
                                            data-email="<?php echo $usuario['correo']; ?>"
                                            data-password="<?php echo $usuario['password']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#usuarios').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se encontraron registros",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>
    <script>
        document.getElementById('registrarUsuarioModal').addEventListener('click', function () {
            var loginModal = new bootstrap.Modal(document.getElementById('modalRegistrarUsuario'));
            loginModal.show();
        });
        document.querySelectorAll('.modalModificarUsuarioBtn').forEach(function (button) {
            button.addEventListener('click', function () {
                var id_usuario = button.getAttribute('data-id-usuario');
                var nombre = button.getAttribute('data-nombre');
                var apellidoPa = button.getAttribute('data-apellido-pa');
                var apellidoMa = button.getAttribute('data-apellido-ma');
                var rfc = button.getAttribute('data-rfc');
                var empresa = button.getAttribute('data-empresa');
                var rol = button.getAttribute('data-rol');
                var email = button.getAttribute('data-email');
                var password = button.getAttribute('data-password');

                // Coloca los datos en los campos del formulario dentro del modal
                document.getElementById('id_usuarioF').value = id_usuario;
                document.getElementById('nombreF').value = nombre;
                document.getElementById('apellido_paF').value = apellidoPa;
                document.getElementById('apellido_maF').value = apellidoMa;
                document.getElementById('rfcF').value = rfc;
                document.getElementById('empresaF').value = empresa;
                document.getElementById('rolF').value = rol;
                document.getElementById('emailF').value = email;
                document.getElementById('passwordF').value = password;

                // Abre el modal
                var loginModal = new bootstrap.Modal(document.getElementById('modalModificarUsuario'));
                loginModal.show();
            });
        });


    </script>
    <?php
} else {
    header("Location: ../../index.html");
}
?>