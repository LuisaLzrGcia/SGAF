<?php
if (session_status() !== 2) {
    session_start();
}
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
</head>

<body class="bg-general">
    <?php
        if ($_SESSION['rol'] == "admin") {
            include_once "../Componets/Navbar/NavbarAdmin.php";
        } else {
            include_once "../Componets/Navbar/NavbarUser.php";
        }
        include_once "modalRenombrar.php";
        ?>
    <div class="bg-body-secondary m-5 p-3">
        <div class="d-flex align-items-center">
            <?php if ($_SESSION['btnRegresar']): ?>
            <div class="me-2">
                <form action="./regresarRaiz.php" method="post">
                    <button type="submit" class="btn btn-primary p-1 my-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-90deg-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4.854 1.146a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L4 2.707V12.5A2.5 2.5 0 0 0 6.5 15h8a.5.5 0 0 0 0-1h-8A1.5 1.5 0 0 1 5 12.5V2.707l3.146 3.147a.5.5 0 1 0 .708-.708z" />
                        </svg>
                    </button>
                </form>
            </div>
            <?php endif; ?>
            <div class="me-2">
                <?php
                    if ($_SESSION['btnRegresar'] != true) {
                        ?>
                <form action="crearCarpeta.php" method="post">
                    <input type="text" name="nombreCarpeta" placeholder="Nombre de la carpeta" required>
                    <button type="submit" class="btn btn-secondary p-1 my-1">Crear Carpeta</button>
                </form>
                <?php
                    }
                    ?>
            </div>
            <div>
                <form action="subirArchivo.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="archivo" id="archivo">
                    <button type="submit" class="btn btn-secondary p-1 my-1">Subir Archivo</button>
                </form>
            </div>
        </div>
        <?php
            $files = scandir($_SESSION['actualDireccion']);
            if (count($files) <= 2) { // 2 para contar "." y ".."
                echo "<p class='m-3'>No hay archivos disponibles.</p>";
            } else {
                foreach ($files as $file):
                    if ($file != "." && $file != ".."): ?>
        <div class="direccionFile">
            <a class="nombreFile w-100 ms-3" href="<?php echo $_SESSION['actualDireccion'] . "/" . $file; ?>"
                target="_blank">
                <?php if (is_dir($_SESSION['actualDireccion'] . "/" . $file)): ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder"
                    viewBox="0 0 16 16">
                    <path
                        d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a2 2 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.910l.637-7A1 1 0 0 0 13.81 4zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139q.323-.119.684-.12h5.396z" />
                </svg>
                <?php else: ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                    <path
                        d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5" />
                    <path
                        d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                </svg>
                <?php endif; ?>
                <?php echo $file; ?>
            </a>
            <?php if (!is_dir($_SESSION['actualDireccion'] . $file)): ?>
            <form action="./descargarArchivo.php?file=<?php echo $file; ?>" method="post">
                <button class="btn-files btn-descargar p-1 my-1 w-100" type="submit">Descargar</button>
            </form>
            <?php else: ?>
            <form action="./irCarpeta.php?file=<?php echo $file; ?>" method="post">
                <button class="btn-files btn-abrir p-1 my-1 w-100" type="submit">Abrir</button>
            </form>
            <button class="btn-files btn-renombrar p-1 my-1 w-100" type="button" data-bs-toggle="modal"
                data-bs-target="#modalRenombrar" data-file="<?php echo $file; ?>">Renombrar</button>
            <?php endif; ?>
            <form action="./eliminarCarpeta.php?file=<?php echo $file; ?>" method="post">
                <button class="btn-files btn-eliminar p-1 my-1 w-100" type="submit">Eliminar</button>
            </form>
        </div>
        <?php endif;
                endforeach;
            }
            ?>

    </div>

    <!-- Modal Renombrar -->
    <div class="modal fade" id="modalRenombrar" tabindex="-1" aria-labelledby="modalRenombrarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRenombrarLabel">Renombrar Archivo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formRenombrar" action="renombrarArchivo.php" method="post">
                        <div class="mb-3">
                            <label for="nuevoNombre" class="form-label">Nuevo Nombre</label>
                            <input type="text" class="form-control" id="nuevoNombre" name="nuevoNombre" required>
                        </div>
                        <input type="hidden" id="archivoActual" name="archivoActual">
                        <button type="submit" class="btn btn-primary">Renombrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script>
var modalRenombrar = document.getElementById('modalRenombrar');
modalRenombrar.addEventListener('show.bs.modal', function(event) {
    var button = event.relatedTarget;
    var file = button.getAttribute('data-file');

    var modalTitle = modalRenombrar.querySelector('.modal-title');
    var archivoActualInput = modalRenombrar.querySelector('#archivoActual');

    modalTitle.textContent = 'Renombrar [' + file + ' ]';
    archivoActualInput.value = file;
});
</script>

</html>

<?php
} else {
    header("Location: ../../index.html");
}
?>