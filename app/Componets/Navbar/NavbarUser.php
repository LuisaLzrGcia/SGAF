<?php
if (session_status() !== 2)
    session_start();

include_once ("../utils/ConsultadeNombre.php");
//include_once("../utils/Generar_folio.php");

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../public/CSS/style.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />

<nav class="navbar navbar-expand-lg bg-body-tertiary px-5 fondoNav justify-content-between">
    <div class="d-flex ">
        <div class="">
            <img class="logo-image rounded-circle" src="" alt="" srcset="../../public/images/logoF.png">
        </div>



        <div class="d-flex mx-4">
            <div class="mx-2 d-flex justify-content-center align-items-center">
                <a class="nav-link d-flex justify-content-center align-items-center " href="../Main/Cliente.php"
                    onclick="bttnSelecionado(`Inicio`)">
                    <div class="d-flex justify-content-center align-items-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-house-fill" viewBox="0 0 16 16">
                            <path
                                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                        </svg>
                    </div>
                    <div class="ps-1" id="btnNavegadorInicio">
                        Inicio
                    </div>
                </a>
            </div>

            <div class="mx-2 d-flex justify-content-center align-items-center">
                <a class="nav-link d-flex justify-content-center align-items-center" href="#"
                    onclick="abrirModalFunciones(`Funciones`)">
                    <div class="d-flex justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-megaphone" viewBox="0 0 16 16">
                            <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 
                                1-3 0v-.214c-2.162-1.241-4.49-1.843-6.912-2.083l.405 
                                2.712A1 1 0 0 1 5.51 15.1h-.548a1 1 0 0 1-.916-.599l-1.85-3.49-.202-.003A2.014 2.014 
                                0 0 1 0 9V7a2.02 2.02 0 0 1 1.992-2.013 75 75 0 0 0 2.483-.075c3.043-.154 6.148-.849 8.525-2.199zm1 
                                0v11a.5.5 0 0 0 1 0v-11a.5.5 0 0 0-1 0m-1 1.35c-2.344 1.205-5.209 1.842-8 
                                2.033v4.233q.27.015.537.036c2.568.189 5.093.744 7.463 1.993zm-9
                                 6.215v-4.13a95 95 0 0 1-1.992.052A1.02 1.02 0 0 0 1 7v2c0 
                                 .55.448 1.002 1.006 1.009A61 61 0 0 1 4 10.065m-.657.975
                                  1.609 3.037.01.024h.548l-.002-.014-.443-2.966a68 68 0 0 0-1.722-.082z" />
                        </svg>
                    </div>
                    <div class="ps-1" id="btnNavegadorFunciones">
                        Funciones
                    </div>
                </a>
            </div>

            <div class="mx-2 d-flex justify-content-center align-items-center">
                <a class="nav-link d-flex justify-content-center align-items-center" href="../Main/Acerca.php"
                    onclick="bttnSelecionado(`Acerca`)">
                    <div class="d-flex justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 
                                0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703
                                 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381
                                  2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
                        </svg>
                    </div>
                    <div class="ps-1" id="btnNavegadorAcerca">
                        Acerca de
                    </div>
                </a>
            </div>

            <div class="mx-2 d-flex justify-content-center align-items-center">
                <a class="nav-link d-flex justify-content-center align-items-center" href="#"
                    onclick="abrirModalSoporte(`Soporte`)">
                    <div class="d-flex justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-headset" viewBox="0 0 16 16">
                            <path d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 
                                6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1
                                 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 
                                 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5" />
                        </svg>
                    </div>
                    <div class="ps-1" id="btnNavegadorSoporte">
                        Soporte
                    </div>
                </a>
            </div>

            <div class="nav-item dropdown my-auto ">

                <a class="nav-link dropdown-toggle ps-1" id="Rol" data-bs-toggle="dropdown" style="color:#FF0000;"
                    href="#" onclick="bttnSelecionado(`rol`)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 
                            4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg>
                    <?php echo $_SESSION['rol']; ?>
                </a>
                <ul class="dropdown-menu mt-2 p-0 " style="font-size: 15;">
                    <li class="text-center ">
                        <!-- Clase para centrar horizontalmente -->
                        <a class="dropdown-item" href="../utils/salir.php" style="text-align: left;  ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0
                                     0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5
                                      1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0
                                     0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                            </svg>
                            Cerrar sesion</a>
                    </li>
                </ul>
            </div>
            <!-- Modal de Funciones -->
            <div class="modal fade" id="funcionesModal" tabindex="-1" aria-labelledby="funcionesModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="funcionesModalLabel" style="text-align: center;">Informacion de
                                funciones del sistema</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body border" style="text-align: justify;">
                            <p>En SGAF, entendemos la importancia de tener una gestión financiera eficiente para el
                                éxito de tu empresa, por eso que ofrecemos soluciones
                                integrales diseñadas para simplificar tus procesos contables y optimizar tus operaciones
                                financieras.
                            </p>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#home">Organiza tus
                                        documentos</a>
                                </li>
                                <p></p>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#menu1">Sube tus documentos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#menu2">Descarga documentos </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane container active" id="home">Nuestro sistema te permite organizar
                                    tus documentos de manera inteligente y eficiente.
                                    Clasifica tus archivos en categorías específicas como: facturas, recibos, estados de
                                    cuenta y más, para una gestión ordenada y sin complicaciones.
                                    <li>Ingresa a la carpeta donde subiras tus documentos para una mejor organizacion
                                    </li>
                                    <li>En caso de que no veas la carpeta correspondiente puedes crear una nueva</li>
                                    <li>Supervisa que tus archivos esten organizados correctamente.</li>
                                </div>
                                <div class="tab-pane container fade" id="menu1">Con nuestra plataforma, subir tus
                                    documentos es un proceso rápido y sencillo. Simplemente arrastra y suelta tus
                                    archivos en el área designada o selecciona los
                                    documentos desde tu dispositivo, y nosotros nos encargaremos del resto.
                                    <li>Ahora con un solo clic puedes subir tus archivos para que trabajemos por ti.
                                    </li>
                                    <li>Si subes un archivo por error, no te preocupes ya que podras eliminarlo si asi
                                        lo requieres.</li>
                                    <li>Si no tienes los permisos, contacta a soporte.</li>
                                </div>
                                <div class="tab-pane container fade" id="menu2">Con nuestra plataforma, descargar tus
                                    documentos es rápido y sencillo solo encuentra el archivo que necesitas en nuestra
                                    interfaz intuitiva y descárgalo con un solo clic.
                                    <li>Busca el archivo y decarga el archivo que tengas disponible.
                                    </li>
                                    <li>En caso de no contar con los permisos, contacta a soporte.
                                    </li>
                                </div>
                            </div>



                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal de Soporte -->
            <div class="modal fade" id="SoporteModal" tabindex="-1" aria-labelledby="SoporteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="SoporteModalLabel" style="text-align: center;">Informacion de
                                funciones del sistema</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body border" style="text-align: justify;">
                            <!-- Aquí va el formulario de inicio de sesión -->
                            <form method="post" action="../utils/Registrar_soporte.php ">
                                <div class="container border">
                                    <div class="row">
                                        <div class="col-md-6 offset-md-3 ">
                                            <div class="signup-form">
                                                <form action="" class="p-4 bg-light shadow">
                                                    <div class="row">
                                                        <div class="mb-2 col-md-12">

                                                            <label>Nombre: </label>
                                                            <input type="text" id="nombre_completo"
                                                                name="nombre_completo"
                                                                value="<?php echo isset($_SESSION['nombre_completo']) ? $_SESSION['nombre_completo'] : ''; ?>"
                                                                readonly>
                                                        </div>
                                                        <div class="mb-2 col-md-12">
                                                            <label>Empresa<span>*</span></label>
                                                            <input type="text" id="empresa" name="empresa"
                                                                value="<?php echo isset($_SESSION['empresa']) ? $_SESSION['empresa'] : ''; ?>"
                                                                readonly>
                                                        </div>

                                                        <div class="mb-2 col-md-12">
                                                            <label>RFC<span>*</span></label>
                                                            <input type="text" id="rfc" name="rfc"
                                                                value="<?php echo isset($_SESSION['rfc']) ? $_SESSION['rfc'] : ''; ?>"
                                                                readonly>
                                                        </div>

                                                        <div class="mb-2 col-md-12">
                                                            <label>Tipo de problema: <span>*</span></label>
                                                            <select class="form-select" name="etiqueta"
                                                                aria-label="Default select example" required>
                                                                <option value="">Seleccionar</option>
                                                                <option value="Subir archivos">Subir archivo</option>
                                                                <option value="Descargar archivos">Descargar Archivo
                                                                </option>
                                                                <option value="Carpetas">Carpetas</option>
                                                            </select>
                                                        </div>


                                                        <div class="mb-2 col-md-12">
                                                            <label>Detalles del problema que
                                                                presentas:<span>*</span></label>
                                                            <textarea name="mensaje" class="form-control"
                                                                required></textarea>
                                                        </div>

                                                        <div class="mb-2 col-md-12">
                                                            <label>Folio<span>*</span></label>
                                                            <input type="text" id="folio" name="folio"
                                                                value="<?php echo isset($_SESSION['folio']) ? $_SESSION['folio'] : ''; ?>"
                                                                readonly>
                                                        </div>
                                                        <div class="mb-2 col-md-12">
                                                            <label>Fecha de reporte<span>*</span></label>
                                                            <input type="date" name="FechaReporte" class="form-control"
                                                                required>
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
                        </div>
                    </div>
</nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
<script>
    function abrirModalFunciones() {
        $('#funcionesModal').modal('show'); // Esto abre el modal
    }

    function abrirModalSoporte() {
        $('#SoporteModal').modal('show'); // Esto abre el modal
    }
</script>

<script>
    // Función para agregar la clase 'active' al enlace que se hizo clic
    function bttnSelecionado(value) {
        sessionStorage.setItem("bttnSelecionado", value)
    }

    let valorBtn = sessionStorage.getItem('bttnSelecionado');
    let btnSelecionado = "";
    // Iterar sobre la lista de elementos obtenidos
    if (valorBtn === 'Funciones') {
        btnSelecionado = document.getElementById("btnNavegadorFunciones");
        btnSelecionado.classList.remove('fw-bold');
        btnSelecionado.classList.add('text-white');
    } else if (valorBtn === 'Inicio') {
        btnSelecionado = document.getElementById("btnNavegadorInicio");
        btnSelecionado.classList.remove('fw-bold');
        btnSelecionado.classList.add('text-white');
    } else if (valorBtn === 'Acerca') {
        btnSelecionado = document.getElementById("btnNavegadorAcerca");
        btnSelecionado.classList.remove('fw-bold');
        btnSelecionado.classList.add('text-white');
    } else if (valorBtn === 'Soporte') {
        btnSelecionado = document.getElementById("btnNavegadorSoporte");
        btnSelecionado.classList.remove('fw-bold');
        btnSelecionado.classList.add('text-white');
    } else if (valorBtn === 'Motor') {
        btnSelecionado = document.getElementById("btnNavegadorMotor");
        btnSelecionado.classList.remove('fw-bold');
        btnSelecionado.classList.add('text-white');
    }
</script>
<script>
    document.getElementById("myForm").addEventListener("submit", function (event) {
        // Obtener el valor seleccionado del tipo de problema
        var tipoProblema = document.getElementById("etiqueta").value;

        // Validar si se ha seleccionado una opción válida
        if (tipoProblema === "") {
            // Evitar el envío del formulario
            event.preventDefault();

            // Mostrar un mensaje de error
            alert("Por favor selecciona un tipo de problema válido.");
        }
    });
</script>

<script>
    $(document).ready(function () {
        $('form').submit(function (e) {
            e.preventDefault(); // Evitar el envío del formulario por defecto

            // Obtener los datos del formulario
            var formData = $(this).serialize();

            // Enviar los datos del formulario mediante AJAX
            $.ajax({
                type: 'POST',
                url: '../utils/Registrar_soporte.php', // Ruta al archivo PHP que procesa el formulario
                data: formData,
                dataType: 'json', // Especificar que esperamos una respuesta JSON
                success: function (response) {
                    // Mostrar alerta basado en la respuesta del servidor
                    if (response.registro_exitoso) {
                        // Alerta de registro exitoso
                        alert("¡Registro exitoso!");
                        // Redirigir a la página inicial después de un breve retraso
                        setTimeout(function () {
                            window.location.href = '../Main/cliente.php';
                        }, 200); // Redirigir después de 2 segundos (2000 milisegundos)
                    } else {
                        alert("Error al registrar: " + response.error);
                    }
                },
                error: function (xhr, status, error) {
                    alert("Error en la solicitud AJAX: " + error);
                }
            });
        });
    });
</script>