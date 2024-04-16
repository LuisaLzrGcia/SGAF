<?php
if (session_status() !== 2)
    session_start();
?>

<link rel="stylesheet" href="/SGAF/public/CSS/style.css" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />


<style>
    .nav-link.active svg {
        fill: black;
    }

    .nav-link.active .ps-1 {
        color: black;
        font-weight: bold;
    }
</style>

<nav class="navbar navbar-expand-lg bg-body-tertiary px-5 fondoNav justify-content-between">
    <div class="d-flex">
        <div class="">
            <img class="logo-image rounded-circle" src="" alt="" srcset="../../public/images/logoF.png">
        </div>
        <div class="d-flex mx-4">
            <div class="mx-2 d-flex justify-content-center align-items-center">
                <a class="nav-link d-flex justify-content-center align-items-center" href="../Main/Main.php"
                    onclick="bttnSelecionado(`Inicio`)">
                    <div class="d-flex justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-house" viewBox="0 0 16 16" style="color: black;">
                            <path
                                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                        </svg>
                    </div>
                    <div class="ps-1" id="btnNavegadorInicio" ;>
                        Inicio
                    </div>
                </a>
            </div>
            <div class="mx-2 d-flex justify-content-center align-items-center">
                <a class="nav-link d-flex justify-content-center align-items-center"
                    href="../Registrar/ResgistrarUsuario.php" onclick="bttnSelecionado(`Usuarios`)">
                    <div class="d-flex justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-gear" viewBox="0 0 16 16" style="color: black;">
                            <path
                                d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0" />
                        </svg>
                    </div>
                    <div class="ps-1" id="btnNavegadorUsuarios">
                        Usuarios
                    </div>
                </a>
            </div>

            <div class="mx-2 d-flex justify-content-center align-items-center">
                <a class="nav-link d-flex justify-content-center align-items-center" href="http://"
                    onclick="bttnSelecionado(`Administrar`)">
                    <div class="d-flex justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-folder" viewBox="0 0 16 16" style="color: black;">
                            <path
                                d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a2 2 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139q.323-.119.684-.12h5.396z" />
                        </svg>
                    </div>
                    <div class="ps-1" id="btnNavegadorAdministrar">
                        Administrar usuarios
                    </div>
                </a>
            </div>

            <div class="mx-2 d-flex justify-content-center align-items-center">
                <a class="nav-link d-flex justify-content-center align-items-center" href="http://"
                    onclick="bttnSelecionado(`Permisos`)">
                    <div class="d-flex justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-check" viewBox="0 0 16 16" style="color: black;">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                            <path
                                d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                        </svg>
                    </div>

                    <div class="ps-1" id="btnNavegadorPermisos">
                        Permisos
                    </div>
                </a>
            </div>

            <div class="mx-2 d-flex justify-content-center align-items-center">
                <a class="nav-link d-flex justify-content-center align-items-center" href="http://"
                    onclick="bttnSelecionado(`Motor`)">
                    <div class="d-flex justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16" style="color: black;">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </div>

                    <div class="ps-1" id="btnNavegadorMotor">
                        Motor de busqueda
                    </div>
                </a>
            </div>
        </div>
    </div>
    </div>
    <div class="d-flex">
        <h1 class="text-white">
            <?php
            echo $_SESSION['user']
                ?>
        </h1>
        <div class="mx-2 d-flex justify-content-center align-items-center">
            <a class="btn btn-info d-flex justify-content-center align-items-center" href="../utils/salir.php">
                <div class="d-flex justify-content-center align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                        <path fill-rule="evenodd"
                            d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                    </svg>
                </div>
                <div class="ps-1">
                    Salir
                </div>
            </a>
        </div>
    </div>
</nav>

<script>
    // Función para agregar la clase 'active' al enlace que se hizo clic
    function bttnSelecionado(value) {
        sessionStorage.setItem("bttnSelecionado", value)
    }

    let valorBtn = sessionStorage.getItem('bttnSelecionado');
    let btnSelecionado = "";
    // Iterar sobre la lista de elementos obtenidos
    if (valorBtn === 'Usuarios') {
        btnSelecionado = document.getElementById("btnNavegadorUsuarios");
        btnSelecionado.classList.remove('fw-bold');
        btnSelecionado.classList.add('fw-bold');
    } else if (valorBtn === 'Inicio') {
        btnSelecionado = document.getElementById("btnNavegadorInicio");
        btnSelecionado.classList.remove('fw-bold');
        btnSelecionado.classList.add('fw-bold');
    } else if (valorBtn === 'Motor') {
        btnSelecionado = document.getElementById("btnNavegadorMotor");
        btnSelecionado.classList.remove('fw-bold');
        btnSelecionado.classList.add('fw-bold');
    }

</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>