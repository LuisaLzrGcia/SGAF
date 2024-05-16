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
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/js/dataTables.js">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/js/dataTables.bootstrap4.js">
    </head>

    <body class="bg-general">
        <?php
        if ($_SESSION['rol'] == "admin") {
            include_once "../Componets/Navbar/NavbarAdmin.php";
        } else {
            include_once "../Componets/Navbar/NavbarUser.php";

        }

        include_once ("../Conexion.php"); // Incluir el archivo de conexión
    
        // Consulta para obtener los datos de usuarios
        $usuariosConsulta = "SELECT nombre, apellido_pa, apellido_ma, rfc FROM usuarios WHERE rol = 'usuario'";

        // Ejecutar la consulta
        $resultado = mysqli_query($conexion, $usuariosConsulta);

        // Verificar si se obtuvieron resultados
        if ($resultado) {
            // Inicializar un array para almacenar los datos de los usuarios
            $usuarios = array();

            // Recorrer los resultados y guardarlos en el array
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $usuarios[] = $fila; // Agregar la fila al array de usuarios
            }

            // Guardar el array de usuarios en una variable de sesión
            $_SESSION['usuarios'] = $usuarios;

            // Liberar el resultado
            mysqli_free_result($resultado);
        } else {
            // Manejar cualquier error en la consulta
            echo "Error al obtener los usuarios: " . mysqli_error($conexion);
        }

        ?>
        <div class="bg-body-secondary m-5 p-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="bg-dark-subtle text-center" scope="col">Carpeta</th>
                        <th class="bg-dark-subtle text-center" scope="col">Usuario asignado</th>
                        <th class="bg-dark-subtle text-center" scope="col">RFC</th>
                        <th class="bg-dark-subtle text-center" scope="col">Subir archivos</th>
                        <th class="bg-dark-subtle text-center" scope="col">Eliminar archivos</th>
                        <th class="bg-dark-subtle text-center" scope="col">Descargar archivos</th>
                        <th class="bg-dark-subtle text-center" scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once ("../Conexion.php");

                    // Preparar la consulta SQL
                    $sql = "SELECT * FROM permisos_carpetas WHERE nombre_carpeta <> 'general'";

                    // Preparar la declaración SQL
                    if ($stmt = mysqli_prepare($conexion, $sql)) {
                        // Ejecutar la declaración
                        if (mysqli_stmt_execute($stmt)) {
                            // Obtener el resultado de la consulta
                            $result = mysqli_stmt_get_result($stmt);

                            // Verificar si se obtuvo algún resultado
                            if (mysqli_num_rows($result) > 0) {
                                // Iterar sobre los resultados y mostrarlos
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <th scope="row">
                                            <?php
                                            echo $row['nombre_carpeta'];
                                            ?>
                                        </th>
                                        <td>
                                            <?php
                                            echo $row['nombre_usuario'] . " " . $row['apellido_pa'] . " " . $row['apellido_ma'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $row['rfc'];
                                            ?>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center align-content-center">
                                                <div class="form-check d-flex">
                                                    <input <?php echo $row['subir'] ? 'checked' : ''; ?> disabled class="form-check-input"
                                                        type="checkbox" id="flexSwitchCheckDefault">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center align-content-center">
                                                <div class="form-check d-flex">
                                                    <input <?php echo $row['eliminar'] ? 'checked' : ''; ?> disabled
                                                        class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center align-content-center">
                                                <div class="form-check d-flex">
                                                    <input <?php echo $row['descargar'] ? 'checked' : ''; ?> disabled
                                                        class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center align-content-center">
                                                <button type="button" class="btn btn-success me-3  btnAsignar" data-bs-toggle="modal"
                                                    data-bs-target="#modalUsuario" data-nombreU="<?php echo $row['nombre_carpeta']; ?>"
                                                    data-usuarioU="<?php echo $row['nombre_usuario'] . " " . $row['apellido_pa'] . " " . $row['apellido_ma'] . " - " . $row['rfc']; ?>"
                                                    data-rfcU="<?php echo $row['rfc']; ?>">
                                                    Asignar
                                                </button>
                                                <button type="button" class="btn btn-primary btn-administrar" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" data-nombre="<?php echo $row['nombre_carpeta']; ?>"
                                                    data-eliminar="<?php echo $row['eliminar']; ?>"
                                                    data-subir="<?php echo $row['subir']; ?>"
                                                    data-descargar="<?php echo $row['descargar']; ?>">
                                                    Permisos
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "No se encontraron resultados.";
                            }
                        } else {
                            echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
                        }

                        // Cerrar la declaración
                        mysqli_stmt_close($stmt);
                    } else {
                        echo "Error al preparar la consulta: " . mysqli_error($conexion);
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- Modal permisos -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Administrar permisos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="modalForm" action="actualizarPermisos.php" method="post">
                            <div class="mb-3">
                                <label for="nombreCarpeta" class="form-label">Nombre de la Carpeta:</label>
                                <input type="text" class="form-control" id="nombreCarpeta" name="nombreCarpeta" readonly>
                            </div>
                            <div class="mb-3 form-check form-switch">
                                <label for="checkSubir" class="form-label">Permiso de subir archivos</span></label>
                                <input class="form-check-input" type="checkbox" role="switch" id="checkSubir"
                                    name="checkSubir">
                            </div>
                            <div class="mb-3 form-check form-switch">
                                <span href="" id="valorPrueba"></span>
                                <label for="checkEliminar" class="form-label">Permiso de eliminar archivos</span></label>
                                <input class="form-check-input" type="checkbox" role="switch" id="checkEliminar"
                                    name="checkEliminar">
                            </div>
                            <div class="mb-3 form-check form-switch">
                                <label for="checkDescargar" class="form-label">Permiso de descargar archivos</span></label>
                                <input class="form-check-input w-[25]" type="checkbox" role="switch" id="checkDescargar"
                                    name="checkDescargar">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal usuario -->
        <div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Asignar usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="modalForm" action="asignarUsuario.php" method="post">
                            <div class="mb-3">
                                <label for="nombreCarpeta" class="form-label">Nombre de la Carpeta:</label>
                                <input type="text" class="form-control" id="nombreCarpetaU" name="nombreCarpetaU" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="nombreUsuario" class="form-label">Asignar a:</label>
                                <select name="usuario" id="usuario" class="form-select">
                                    <option value="0">No asignar a ningun usuario</option>
                                    <?php
                                    // Verificar si existen datos de usuarios en la sesión
                                    if (isset($_SESSION['usuarios'])) {
                                        // Recorrer los datos de usuarios y crear opciones para cada uno
                                        foreach ($_SESSION['usuarios'] as $usuario) {
                                            // Crear la opción con el nombre y el RFC del usuario
                                            echo "<option value='" . $usuario['rfc'] . "'>" . $usuario['nombre'] . " " . $usuario['apellido_pa'] . " " . $usuario['apellido_ma'] . " - " . $usuario['rfc'] . "</option>";
                                        }
                                    } else {
                                        // Si no hay datos de usuarios en la sesión, mostrar un mensaje
                                        echo "<option value=''>No hay usuarios disponibles</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
        // Espera a que el documento esté completamente cargado
        document.addEventListener("DOMContentLoaded", function () {
            // Obtener todos los botones de "Asignar"
            var btnsAsignar = document.querySelectorAll('.btnAsignar');

            // Iterar sobre cada botón de "Asignar"
            btnsAsignar.forEach(function (btn) {
                // Agregar un listener para el clic en cada botón
                btn.addEventListener('click', function () {
                    // Obtener los datos de la fila asociada al botón
                    var nombreCarpeta = btn.getAttribute('data-nombreU');
                    var nombreUsuario = btn.getAttribute('data-usuarioU');
                    var rfc = btn.getAttribute('data-rfcU');

                    // Actualizar los valores en el modal de "Asignar"
                    document.getElementById('nombreCarpetaU').value = nombreCarpeta;
                    document.getElementById('nombreUsuarioU').value = nombreUsuario;

                    // Mostrar el modal de "Asignar"
                    var modalUsuario = document.getElementById('modalUsuario');
                    modalUsuario.show();
                });
            });

            // Obtener todos los botones de "Permisos"
            var btnsPermisos = document.querySelectorAll('.btn-administrar');

            // Iterar sobre cada botón de "Permisos"
            btnsPermisos.forEach(function (btn) {
                // Agregar un listener para el clic en cada botón
                btn.addEventListener('click', function () {
                    // Obtener los datos de la fila asociada al botón
                    var nombreCarpeta = btn.getAttribute('data-nombre');
                    var eliminar = btn.getAttribute('data-eliminar');
                    var subir = btn.getAttribute('data-subir');
                    var descargar = btn.getAttribute('data-descargar');

                    // Actualizar los valores en el modal de "Permisos"
                    document.getElementById('nombreCarpeta').value = nombreCarpeta;
                    document.getElementById('checkEliminar').checked = eliminar === "1";
                    document.getElementById('checkSubir').checked = subir === "1";
                    document.getElementById('checkDescargar').checked = descargar === "1";

                    // Mostrar el modal de "Permisos"
                    var modalPermisos = document.getElementById('exampleModal');
                    modalPermisos.show();
                });
            });

        });
    </script>
    <?php
} else {
    header("Location: ../../index.html");
}
?>