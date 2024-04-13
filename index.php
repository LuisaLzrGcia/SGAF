<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="public/CSS/style.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    />

    <style>
      body {
          margin: 0;
          padding: 0;
          overflow: hidden; /* Evita el desplazamiento de la barra de desplazamiento */
          background: linear-gradient(90deg,#ff0000, #ff8000, #ffff00, #80ff00, #00ff00, #00ff80, #00ffff, #0080ff, #0000ff, #8000ff, #ff00ff, #ff0080); /* Gradiente multicolor */
          background-size: 600% 100%; /* Tamaño del gradiente */
          animation: moveWave 10s linear infinite; /* Animación para mover la ola */
      }

      @keyframes moveWave {
          0% { background-position: 0% 50%; } /* Posición inicial */
          100% { background-position: 100% 50%; } /* Posición final */
      }
  </style>

  </head>
  <body >
    <div class="d-flex vh-100 vw-100 justify-content-center align-items-center">
      <section class="container m-5 p-5 ">
        <div class="container-fluid " >
          <h4 class="mb-5 text-center title-gradient">INICIAR SESION</h4>
          <div
            class="row d-flex justify-content-center align-items-center h-100  w-50 mx-auto  ">
            
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mx-auto">
              <form method="POST" action="./app/Login/Login.php">

                
                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="text" id="user" name="user" class="form-control form-control-lg"  placeholder="Ingresa tu correo " style="width: 250px;" />
                  <label class="form-label title-gradient" for="form3Example3"
                    >Correo electronico</label
                  >
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-3">
                  <input
                    type="password"
                    id="form3Example4"
                    name="password"
                    class="form-control form-control-lg"
                    placeholder="Ingresa contraseña"
                    style="width: 250px;" 
                  />
                  <label class="form-label title-gradient" for="form3Example4">Contraseña</label>
                </div>

                <div class="text-center text-lg-start mt-4 pt-2 ">
                  <button
                    type="submit"
                    data-mdb-button-init
                    data-mdb-ripple-init
                    class="btn btn-primary btn-lg ms-auto"
                    style="padding-left: 2.5rem; padding-right: 2.5rem"
                  >
                    Login
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
  </body>
</html>
