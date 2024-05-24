<?php
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
</head>

<body class="bg-general">

    <?php
    include_once "../Componets/Navbar/NavbarAdmin.php";
    include_once "ModalNuevoTicket.php";
    include_once "generarFolio.php";
    include_once "DetallesTicket.php";
    echo $_SESSION['tickets']
    ?>
    <div class="bg-body-secondary m-5 p-3">
        <div class="pb-3 d-flex justify-content-between">
            <button type="button" id="nuevoTicketBtn" class="btn btn-success">Registrar Ticket</button>
            <form action="ActualizarTickets.php" method="post">
                <button type="submit" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                        class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                        <path
                            d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                    </svg>
                </button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="display" id="tickets">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Fecha Creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                // Verificar si la variable de sesión 'tickets' está definida y no está vacía
                if (isset($_SESSION['tickets']) && !empty($_SESSION['tickets'])) {
                    // Iterar sobre los tickets almacenados en la variable de sesión
                    foreach ($_SESSION['tickets'] as $ticket) {
                        ?>
                    <tr>
                        <td><?php echo $ticket['num_seguimiento']; ?></td>
                        <td><?php echo $ticket['titulo']; ?></td>
                        <td><?php echo $ticket['descripcion']; ?></td>
                        <td>
                            <?php
                                // Mostrar el estado con una etiqueta de color
                                switch ($ticket['estado']) {
                                    case 'cerrado':
                                        echo "<span class='badge text-bg-danger fs-6'>" . $ticket['estado'] . "</span>";
                                        break;
                                    case 'abierto':
                                        echo "<span class='badge text-bg-success fs-6'>" . $ticket['estado'] . "</span>";
                                        break;
                                    default:
                                        echo "<span class='badge text-bg-secondary fs-6'>" . $ticket['estado'] . "</span>";
                                        break;
                                }
                                ?>
                        </td>
                        <td><?php echo $ticket['fecha_creacion']; ?></td>
                        <td>
                            <div class="d-flex justify-content-center align-content-center">
                                <button type="button" class="btn btn-primary modalVerDetalleBtn" data-bs-toggle="modal"
                                    data-bs-target="#modalDetalleTicket" data-id="<?php echo $ticket['num_seguimiento']; ?>"
                                    data-titulo="<?php echo $ticket['titulo']; ?>"
                                    data-descripcion="<?php echo $ticket['descripcion']; ?>"
                                    data-solucion="<?php echo $ticket['solucion']; ?>"
                                    data-fechaCreacion="<?php echo $ticket['fecha_creacion']; ?>"
                                    data-fechaCierre="<?php echo $ticket['fecha_cierre']; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-eye" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                        <path d="M8 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>No se encontraron tickets.</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#tickets').DataTable({
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

document.querySelectorAll('#nuevoTicketBtn').forEach(function(button) {
    button.addEventListener('click', function() {
        var loginModal = new bootstrap.Modal(document.getElementById('nuevoTicket'));
        loginModal.show();
    });
});

document.querySelectorAll('.modalVerDetalleBtn').forEach(function(button) {
    button.addEventListener('click', function() {

        var id = button.getAttribute('data-id')
        document.getElementById('numeroT').value = id;
        
        var titulo = button.getAttribute('data-titulo')
        document.getElementById('tituloT').value = titulo;

        var descripcion = button.getAttribute('data-descripcion')
        document.getElementById('descripcionT').value = descripcion;
        
        var solucion = button.getAttribute('data-solucion')
        document.getElementById('solucionT').value = solucion;

        var fechaCreacion = button.getAttribute('data-fechaCreacion')
        document.getElementById('fechaCreacionT').value = fechaCreacion;

        var fechaCierre = button.getAttribute('data-fechaCierre')
        document.getElementById('fechaCierreT').value = fechaCierre;

        var loginModal = new bootstrap.Modal(document.getElementById('detallesTicket'));
        loginModal.show();
    });
});
</script>

</html>
<?php
} else {
    header("Location: ../../index.html");
}
?>