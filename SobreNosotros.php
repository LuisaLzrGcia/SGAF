<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="public/CSS/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />

  <style>
    .card-text {
      text-align: justify;
    }


    .offcanvas-header {
      text-align: center;
    }

    .texto-negro {
      color: #000000;
      /* Un tono más oscuro de negro */
      font-weight: bold;
      /* Opcional: para hacer el texto más destacado */
    }
  </style>
</head>

<body
  style="background-image: url('../SGAF/public/images/FondoIndex.'); background-repeat:no-repeat; background-size: cover; background-attachment: fixed; background: position center;;">
  <div class="container-fluid m-0 p-0 border">
    <nav class="navbar navbar-expand-lg  px-4 justify-content-between bg-dark navbar-dark ">
      <div class="container-fluid">
        <div class="d-flex align-items-center p-0 ">
          <a class="navbar-brand" href="#">
            <img src="../SGAF/public/images/logoF.png" alt="" style="width:80px; " class="rounded-pill">
          </a>
          <h4 class="navbar-text  text-white  p-0 ">SISTEMA GESTIÓN DE ARCHIVOS FISCALES</h4>
        </div>
        <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link title-gradient" style="color: #15dcff" href="../SGAF/Index.html">Inicio</a>
          </li>

          <li class="nav-item">
            <a class="nav-link title-gradient" style="color: #15dcff; cursor: pointer;"
              onclick="openBenefitsOffcanvas()">Beneficios</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle title-gradient" data-bs-toggle="dropdown" style="color: #15dcff"
              href="#">¿Para quien?</a>
            <ul class="dropdown-menu ">
              <li><a class="dropdown-item " href="#" data-modal="modalEmpresas">Empresas</a></li>
              <li><a class="dropdown-item" href="#" data-modal="modalIndividual">Individual</a></li>
            </ul>
          <li class="nav-item">
            <a class="nav-link title-gradient" style="color: #15dcff" href="#">Sobre nosotros</a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link title-gradient" style="color: #15dcff" href="#">Contactanos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active btn btn-primary   cursor: pointer;" id="openLoginModal">Iniciar sesión</a>
          </li>
        </ul>
      </div>
    </nav>




    <!-- Modal de inicio de sesión -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">INICIAR SESIÓN </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body  text-center  ">
            <!-- Aquí va el formulario de inicio de sesión -->
            <form method="POST" action="./app/Login/Login.php">
              <!-- Email input -->
              <div data-mdb-input-init class="d-flex justify-content-center align-items-center">
                <div>
                  <input type="text" id="user" name="user" class="form-control form-control-lg "
                    placeholder="Ingresa tu correo " style="width: 250px;" />
                  <label class="form-label title-gradient" for="form3Example3">Correo electronico</label>
                </div>
              </div>
              <!-- Password input -->
              <div data-mdb-input-init class="d-flex justify-content-center align-items-center">
                <div>
                  <input type="password" id="form3Example4" name="password" class="form-control form-control-lg"
                    placeholder="Ingresa contraseña" style="width: 250px;" />
                  <label class="form-label title-gradient" for="form3Example4">Contraseña</label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </form>
          </div>

        </div>
      </div>
    </div>

 <!-- Modal de empresas -->
 <div class="modal fade" id="modalEmpresas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Soluciones Integrales para la Gestión Financiera de tu Empresa con SGAF</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body border" style="text-align: justify;">
        <p>En SGAF, entendemos la importancia de tener una gestión financiera eficiente para el éxito de tu empresa, por eso que ofrecemos soluciones 
          integrales diseñadas para simplificar tus procesos contables y optimizar tus operaciones financieras.
        </p>
        <ul style="text-align: justify;">
          <p ><span class="texto-negro">¿Por Qué Elegirnos?</span></p>
          <li><span class="texto-negro"> Experiencia Probada:</span> Con años de experiencia en el sector, 
            hemos ayudado a numerosas empresas a alcanzar sus metas financieras.
          </li>
          <li> <span class="texto-negro">Enfoque Personalizado:</span> Entendemos que cada empresa es única, 
            por lo que adaptamos nuestras soluciones para satisfacer tus necesidades específicas.
          </li>
          <li><span class="texto-negro">Soporte Continuo:</span> Nuestro compromiso no termina con la implementación; 
            estamos aquí para brindarte soporte continuo y asistencia cuando lo necesites.
          </li>

        </ul>
        <p class="texto-negro" style="text-align: center;">¡Contáctanos Hoy!</p>
        <p>No importa el tamaño o la industria de tu empresa, en SGAF tenemos la solución perfecta para tus necesidades financieras. ¡Contáctanos hoy mismo para programar 
          una consulta y descubrir cómo podemos ayudarte a alcanzar tus objetivos empresariales!</p>

      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary">Contactanos</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal de individual -->
<div class="modal fade" id="modalIndividual" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-body " style="text-align: justify;">
        <p>PROXIMAMENTE</p>
      </div>
    </div>
  </div>
</div>


<div class="d-flex mt-3 my-3  title-gradient justify-content-center border" style="color: rgb(0, 0, 0);">
  <h1 style="font-size: 50px;">"Existimos para trabajar contigo"</h1>
</div>

<div class="container mb-3">
    <div class="row">
        <div class="col-md-6">
            <!-- Contenido de la primera columna -->
            <h2>Misión</h2>
            <p>Entregarle al cliente entera satisfacción de sus requerimientos, aplicando las mejores prácticas para implentar servicios
               a la medida y correcta ejecución, para posicionar nuestros desarrollos en los primeros planos.</p>
       <h2>Vision</h2>
       <p>Promover relaciones de negocios que vayan de la mano con nuestros valores éticos, se conviertan en acciones y nos permita combatir la corrupción,
         la discriminación y el apoyo a la diversidad, apegándonos a nuestros principios empresariales.</p>
       </p>
       <h2>Valores</h2>
       <ul>
       <li>Compromiso</li>
       <li>Perseverancia</li>
       <li>Objetividad</li>
       <li>Colaboración</li>
       </ul>

              </div>
        <div class="col-md-6">
            <!-- Contenido de la segunda columna -->
            <img src="./public/images/LogoEngsol.png " width="500">
           
        </div>
    </div>
</div>
<div style="text-align: center;">
  <h6>Copyright © 2021  ENGSOL TELEKOM GROUP - Todos los derechos reservados.</h6>
</div>


    <!-- Offcanvas para beneficios -->
    <div class="offcanvas offcanvas-end " tabindex="-1" id="benefitsOffcanvas" aria-labelledby="benefitsOffcanvasLabel"
      style="background: linear-gradient(to right, rgb(221, 76, 235), rgb(30, 245, 120));">
      <div class="offcanvas-header  " ;>

        <h4 class="offcanvas-title texto-negro" id="benefitsOffcanvasLabel">BENEFICIOS</h4>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body   ">
        <!-- Contenido del offcanvas -->
        <ul style="text-align: justify; color: rgb(0, 0, 0);">
          <li><span class="texto-negro">Ahorro de tiempo:</span> Con nuestro servicio, los clientes pueden ahorrar
            tiempo valioso al tener sus documentos fiscales organizados y listos para su declaración de impuestos. </li>
          <li><span class="texto-negro">Profesionalismo:</span> Nuestros contadores son expertos en el campo fiscal y
            están capacitados para maximizar las devoluciones y minimizar las posibilidades de auditoría.</li>
          <li><span class="texto-negro">Seguridad y cumplimiento:</span> Nuestra plataforma de gestión de archivos
            fiscales garantiza la seguridad y confidencialidad de los documentos del cliente, cumpliendo con todas las
            regulaciones fiscales y de privacidad vigentes. </li>
          <li><span class="texto-negro">Asesoramiento personalizado:</span> Nuestros contadores ofrecen un servicio
            personalizado y están disponibles para responder preguntas y proporcionar asesoramiento fiscal en cualquier
            momento del año, no solo durante la temporada de impuestos.</li>
          <!-- Agrega más beneficios según sea necesario -->
        </ul>
      </div>
    </div>


  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // JavaScript para abrir el modal de inicio de sesión al hacer clic en el enlace de la barra de navegación
    document.getElementById('openLoginModal').addEventListener('click', function () {
      var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
      loginModal.show();
    });
    document.addEventListener("DOMContentLoaded", (event) => {
      sessionStorage.setItem("bttnSelecionado", "Inicio")
    }
    );

  </script>
  <script>
    // Función para abrir el offcanvas de beneficios
    function openBenefitsOffcanvas() {
      var offcanvas = new bootstrap.Offcanvas(document.getElementById('benefitsOffcanvas'));
      offcanvas.show();
      // Ajusta la posición del offcanvas para que aparezca desde el contenedor de navegación
      document.getElementById('benefitsOffcanvas').style.top = document.querySelector('.navbar').offsetHeight + 'px';
    }
  </script>

<script>
  // Obtener los enlaces de la lista desplegable
  var dropdownLinks = document.querySelectorAll('.dropdown-item');

  // Iterar sobre cada enlace
  dropdownLinks.forEach(function(link) {
    // Agregar un evento de clic a cada enlace
    link.addEventListener('click', function(event) {
      // Prevenir el comportamiento predeterminado del enlace (evitar que redireccione a otra página)
      event.preventDefault();

      // Obtener el ID del enlace clicado
      var modalId = this.getAttribute('data-modal');

      // Mostrar la modal correspondiente
      var modal = new bootstrap.Modal(document.getElementById(modalId));
      modal.show();
    });
  });
</script>

</body>

</html>