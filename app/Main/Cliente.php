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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
</head>

<body class="bg-general">

    <?php
        include_once "../Componets/Navbar/NavbarUser.php"
            ?>
    <div class="container-fluid w-100 ">
        <div class="mt-5 mx-5 mb-3">
            <h1 style="color:white">
                Bievenido
                <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido_pa'] . " " . $_SESSION['apellido_ma'] ?>
            </h1>
        </div>
    </div>
    <div class="bg-body-secondary p-3 m-5">
        <h3>Se te asigno la carpeta: <span class='text-white bg-black p-1'><?php echo $_SESSION['carpeta'];?></span>
        </h3>
        <div class="d-flex align-items-center">
            <div>
                <?php 
                if (isset($_SESSION['subir']) && $_SESSION['subir'] == 1) {
                    ?>
                <form action="../ArchivosAdmin/subirArchivoCliente.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="archivoC" id="archivoC">
                    <button type="submit" class="btn btn-secondary p-1 my-1">Subir Archivo</button>
                </form>
                <?php
                } ?>
            </div>
        </div>
        <?php
            $files = scandir($_SESSION['url']);
            if (count($files) <= 2) { // 2 para contar "." y ".."
                echo "<p class='m-3'>No hay archivos disponibles.</p>";
            } else {
                foreach ($files as $file):
                    if ($file != "." && $file != ".."): ?>
        <div class="direccionFile">
            <a class="nombreFile w-100 ms-3" href="<?php echo $_SESSION['url'] . "/" . $file; ?>" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                    <path
                        d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5" />
                    <path
                        d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                </svg>
                <?php echo $file; ?>
            </a>
            <?php 
                if (isset($_SESSION['descargar']) && $_SESSION['descargar'] == 1) {
                    ?>
            <form action="../ArchivosAdmin/descargarArchivo.php?file=<?php echo $file; ?>" method="post">
                <button class="btn-files btn-descargar p-1 my-1 w-100" type="submit">Descargar</button>
            </form>
            <?php
                } 
                if (isset($_SESSION['eliminar']) && $_SESSION['eliminar'] == 1) {
                    ?>
            <form action="../ArchivosAdmin/eliminarCarpeta.php?file=<?php echo $file; ?>" method="post">
                <button class="btn-files btn-eliminar p-1 my-1 w-100" type="submit">Eliminar</button>
                </form>
                <?php
                } ?>
        </div>
        <?php endif;
                endforeach;
            }
            ?>

    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>


</html>

<?php
} else {
    header("Location: ../../index.html");
}
?>