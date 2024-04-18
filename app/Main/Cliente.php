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
            include_once "../Componets/Navbar/NavbarUser.php"
                ?>
    <div class="container-fluid w-100 ">
        <div class="mx-5 mb-2">
            <h1>
                Bievenido <?php echo $_SESSION['rol']?>
            </h1>
        </div>

        <div class="container mx-3 ">
            <div class="" style="max-width: 200px;">
                <h3>MIS CARPETAS</h3>
            </div>
            <div class="d-flex flex-row  justify-content-around ">
                <div class="text-center  ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="100" fill="currentColor"
                        class="bi bi-folder-fill   mt-3" viewBox="0 0 16 16">
                        <path
                            d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a2 2 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3m-8.322.12q.322-.119.684-.12h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981z" />
                    </svg>
                    <div style="color: white;">Constancia de situacion fiscal</div>
                </div>
                <div class="text-center ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="100" fill="currentColor"
                        class="bi bi-folder-fill  mt-3" viewBox="0 0 16 16">
                        <path
                            d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a2 2 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3m-8.322.12q.322-.119.684-.12h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981z" />
                    </svg>
                    <div style="color: white;">32D</div>
                </div>
                <div class="text-center ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="100" fill="currentColor"
                        class="bi bi-folder-fill mt-3" viewBox="0 0 16 16">
                        <path
                            d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a2 2 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3m-8.322.12q.322-.119.684-.12h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981z" />
                    </svg>
                    <div style="color: white;">Facturas</div>
                </div>
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="100" fill="currentColor"
                        class="bi bi-folder-fill mt-3" viewBox="0 0 16 16">
                        <path
                            d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a2 2 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3m-8.322.12q.322-.119.684-.12h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981z" />
                    </svg>
                    <div style="color: white;">Estados de cuenta</div>
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