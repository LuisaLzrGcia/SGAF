<div class="modal fade " id="modalModificarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog border border-0 shadow ">
        <div class="modal-content ">
            <div class="modal-header ">
                <h5 class="modal-title" ; id="exampleModalLabel">MODIFICAR USUARIO </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body  text-center  ">
                <form method="post" id="formularioU">
                    <input type="text" name="id_usuarioF" id="id_usuarioF" hidden>
                    <div class="mb-3 text-start">
                        <label for="nombreF" class="form-label">
                            Nombre
                        </label>
                        <input type="text" class="form-control" id="nombreF" name="nombreF" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="apellido_paF" class="form-label">
                            Apellido paterno
                        </label>
                        <input type="text" class="form-control" id="apellido_paF" name="apellido_paF" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="apellido_maF" class="form-label">
                            Apellido materno
                        </label>
                        <input type="text" class="form-control" id="apellido_maF" name="apellido_maF">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="rfcF" class="form-label">
                            RFC
                        </label>
                        <input type="text" class="form-control" id="rfcF" name="rfcF" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="empresaF" class="form-label">
                            Empresa
                        </label>
                        <input type="text" class="form-control" id="empresaF" name="empresaF">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="rolF" class="form-label">
                            Rol
                        </label>
                        <select class="form-select" aria-label="Default select example" id="rolF" name="rolF" required>
                            <option value="usuario" selected>Cliente</option>
                            <option value="admin">Admin</option>
                            <option value="master">Master</option>
                        </select>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="emailF" class="form-label">
                            Correo electrónico
                        </label>
                        <input type="text" class="form-control" id="emailF" name="emailF" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="passwordF" class="form-label">
                            Contraseña
                        </label>
                        <input type="text" class="form-control" id="passwordF" name="passwordF" required>
                    </div>
                    <div class="d-flex">
                        <div class="w-50" id="guardarBtnContainer">
                            <button id="guardarBtn" type="submit" class="btn btn-success w-100 me-2">Guardar</button>
                        </div>
                        <div class="w-50 ms-2" id="eliminarBtnContainer">
                            <button id="eliminarBtn" type="submit" class="btn btn-danger w-100 ">Eliminar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('guardarBtn').addEventListener('click', function () {
        document.getElementById('formularioU').action = './Actualizar.php';
    });

    document.getElementById('eliminarBtn').addEventListener('click', function () {
        document.getElementById('formularioU').action = './Eliminar.php';
    });


    // Verificar el rol al cargar la página y mostrar/ocultar el botón "Eliminar" según corresponda

    document.addEventListener('DOMContentLoaded', function () {
        var modalModificarUsuario = document.getElementById('modalModificarUsuario');

        modalModificarUsuario.addEventListener('shown.bs.modal', function () {
            var rolSeleccionado = document.getElementById('rolF').value;
            if (rolSeleccionado == 'admin' || rolSeleccionado == 'master') {
                document.getElementById('eliminarBtnContainer').classList.remove('w-50');
                document.getElementById('eliminarBtnContainer').classList.add('d-none');
                document.getElementById('guardarBtnContainer').classList.remove('w-50');
                document.getElementById('guardarBtnContainer').classList.add('w-100');
                document.getElementById('rolF').disabled = true;
            }
        });
        modalModificarUsuario.addEventListener('hidden.bs.modal', function () {
            document.getElementById('eliminarBtnContainer').classList.add('w-50');
            document.getElementById('eliminarBtnContainer').classList.remove('d-none');
            document.getElementById('guardarBtnContainer').classList.add('w-50');
            document.getElementById('guardarBtnContainer').classList.remove('w-100');
            document.getElementById('rolF').disabled = false;
        });
    });


    //document.getElementById('inputF').value=rol;
    // var eliminarBtnContainer = document.getElementById('eliminarBtnContainer');

    // if (rol === 'admin') {
    //     eliminarBtnContainer.style.display = 'none'; // Ocultar el botón "Eliminar"
    // } else {
    //     eliminarBtnContainer.style.display = 'block'; // Mostrar el botón "Eliminar"
    // }
</script>