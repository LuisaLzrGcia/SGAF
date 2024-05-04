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
        <div class="d-flex align-items-center  p-0 ">
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
            <a class="nav-link title-gradient" style="color: #15dcff" href="../SGAF/SobreNosotros.php">Sobre nosotros</a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link title-gradient" style="color: #15dcff" cursor: pointer;"
            onclick="openContactosOffcanvas()">Contactanos</a>
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
              <button style="margin-bottom: 10px;"  type="submit" class="btn btn-primary">Iniciar sesión</button>
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
        
        <button type="button" class="btn btn-primary"style="cursor: pointer;"
        onclick="openContactosOffcanvas()">Contactanos</button>
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

        <!-- Offcanvas para Contactos -->
        <div class="offcanvas offcanvas-start w-40 " tabindex="-1" id="contactosOffcanvas" aria-labelledby="ContactosOffcanvasLabel"
        style="background: linear-gradient(to right, rgb(221, 76, 235), rgb(30, 245, 120));">
        <div class="offcanvas-header  " ;>
  
          <h4 class="offcanvas-title texto-negro" id="contactosOffcanvasLabel">CONTACTOS</h4>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body   ">
          <!-- Contenido del offcanvas -->
          <ul style="text-align: justify; color: rgb(0, 0, 0);">
            <li class="my-4"> <span class="texto-negro">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z"/>
                <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648m-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
              </svg> Gmail:</span><a href="mailto: engsoltelekom@hotmail.com" style="color: black;"> engsoltelekom@hotmail.com</a>
              </li>
            <li class="my-4">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
              </svg>
              <span class="texto-negro">WhatsApp:</span> 9221831642</li>
            <li class="my-4"><span class="texto-negro">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
              </svg>
              Pagina de Facebook:</span><a href="https://www.facebook.com/share/CnpWWi83ey6bdFj4/?mibextid=qi2Omg" style="color: black;"> SGAF</a></li>
            <li><span class="texto-negro">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
              </svg>
              Telefono:</span> 921 303 8010</li>
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

     // Función para abrir el offcanvas de contacto
     function openContactosOffcanvas() {
      var offcanvas = new bootstrap.Offcanvas(document.getElementById('contactosOffcanvas'));
      offcanvas.show();
      // Ajusta la posición del offcanvas para que aparezca desde el contenedor de navegación
      document.getElementById('contactosOffcanvas').style.top = document.querySelector('.navbar').offsetHeight + 'px';
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
<script>
// Capturar el envío del formulario y manejar la respuesta
document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar que el formulario se envíe normalmente

    // Obtener los datos del formulario
    var formData = new FormData(this);

    // Realizar una solicitud POST al servidor
    fetch('./app/Login/Login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.redirected) {
            // Si la respuesta incluye una redirección, redirigir al destino
            window.location.href = response.url;
        } else {
            // Convertir la respuesta a JSON
            return response.json();
        }
    })
    .then(data => {
        // Eliminar cualquier alerta existente
        var existingAlert = document.querySelector('.alert');
        if (existingAlert) {
            existingAlert.remove();
        }

        // Verificar si la autenticación fue exitosa
        if (data.success) {
            // Redireccionar a la página de inicio
            window.location.href = '../Main/Main.php';
        } else {
            // Crear una alerta de Bootstrap
            var alertDiv = document.createElement('div');
            alertDiv.classList.add('alert', 'alert-danger');
            alertDiv.textContent = data.error;

            // Agregar la alerta al DOM
            document.querySelector('.modal-body').appendChild(alertDiv);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
 </script>


</body>

</html>