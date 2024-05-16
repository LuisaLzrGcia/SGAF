<div class="modal fade " id="modalRegistrarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog border border-0 shadow ">
        <div class="modal-content ">
            <div class="modal-header ">
                <h5 class="modal-title" ; id="exampleModalLabel">REGISTRAR USUARIO </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body  text-center  ">
                <form method="post" action="../Registrar/Registrar.php">
                    <div class="mb-3 text-start">
                        <label for="nombre" class="form-label">
                            Nombre
                        </label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="apellido_pa" class="form-label">
                            Apellido paterno
                        </label>
                        <input type="text" class="form-control" id="apellido_pa" name="apellido_pa" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="apellido_ma" class="form-label">
                            Apellido materno
                        </label>
                        <input type="text" class="form-control" id="apellido_ma" name="apellido_ma">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="rfc" class="form-label">
                            RFC
                        </label>
                        <input type="text" class="form-control" id="rfc" name="rfc" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="empresa" class="form-label">
                            Empresa
                        </label>
                        <input type="text" class="form-control" id="empresa" name="empresa">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="rol" class="form-label">
                            Rol
                        </label>
                        <select class="form-select" aria-label="Default select example" id="rol" name="rol" required>
                            <option value="usuario" selected>Cliente</option>
                            <option value="admin">Admin</option>
                            <option value="master">Master</option>
                        </select>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="email" class="form-label">
                            Correo electrónico
                        </label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="password" class="form-label">
                            Contraseña
                        </label>
                        <input type="text" class="form-control" id="password" name="password" required>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-100">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>