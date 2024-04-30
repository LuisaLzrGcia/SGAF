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

<body
    style="background-image: url('../../public/images/FondoIndex.png'); background-size: cover;
     background-position: center; background-repeat: no-repeat; margin: 0; padding: 0; height: 100vh;">

    <?php
            include_once "../Componets/Navbar/NavbarUser.php"
                ?>
    <div class="container-fluid w-100 ">
        <h1 class="mx-2 mt-2 my-3  text-center " style="color:white">Acerca de Nosotros</h1>

        <!-- Carousel -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner " style="max-width: 650px; margin: 0 auto; height: 400px; ">
                <!-- Establecer una altura fija -->
                <div class="carousel-item active ">
                    <img src="../../public/images/FondoAcerca.jpeg" alt="Nuestra Misión" class="d-block w-100">
                    <div class="carousel-caption text-start mb-5 ">
                        <h1 class="title-gradient">Nuestra Misión:</h1>
                        <p class="title-gradient text-justify" style="font-size: 17px;">Facilitar la vida de empresas y
                            contadores al ofrecer una herramienta
                            intuitiva y completa para la gestión de archivos fiscales, permitiendo un acceso rápido,
                            organizado y seguro a la información financiera y contable.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../../public/images/FondoAcerca2.jpeg" alt="Chicago" class="d-block w-100">
                    <div class="carousel-caption text-start mb-5 ">
                        <h1 class="title-gradient">Nuestra Visión:</h1>
                        <p class=" title-gradient text-justify" style="font-size: 17px;">Convertirnos en el referente
                            líder en soluciones de gestión de archivos
                            fiscales,
                            brindando a nuestros usuarios la tranquilidad y confianza de contar con una plataforma
                            confiable y
                            eficaz para sus necesidades empresariales y contables.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../../public/images/FondoAcerca3.jpg" alt="New York" class="d-block w-100">
                    <div class="carousel-caption text-start ">
                        <h1 class="title-gradient">Nuestros Valores:</h1>
                        <ul class="text-justify" style="font-size: 17px;">
                            <!-- Reducir el tamaño del texto -->
                            <li><span class="title-gradient">Excelencia:</span> Nos esforzamos por ofrecer productos y
                                servicios de
                                la más alta calidad, superando las expectativas de nuestros usuarios en cada
                                interacción.</li>
                            <li><span class="title-gradient">Integridad:</span> Actuamos con honestidad, transparencia y
                                ética en
                                todas nuestras operaciones y relaciones con los clientes.</li>
                            <li><span class="title-gradient">Compromiso:</span> Estamos comprometidos con el éxito y la
                                satisfacción
                                de nuestros usuarios, brindando un servicio excepcional y un soporte dedicado en todo
                                momento.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
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