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
</head>

<body class="bg-general">

    <?php
            include_once "../Componets/Navbar/NavbarMaster.php"
                ?>
    <div class="container-fluid w-100 ">
        <div class="mx-5 mb-2">
            <h1 style="color:white">
                Bievenido <?php echo $_SESSION['user']?>
            </h1>
        </div>

        <div class="container mx-3 ">
            <div class="mb-5" style="max-width: 200px;">
                
            </div>
            <div class="d-flex flex-row  justify-content-left ">
                <div class="text-center  ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="100" fill="currentColor"
                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd"
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                    </svg>
                    <div style="color: white;">Editar Anuncios de la pagina principal</div>
                </div>
               
              
            </div>
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