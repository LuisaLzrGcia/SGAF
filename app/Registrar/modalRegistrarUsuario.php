<div class="modal fade" id="modalRegistrarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog border border-0 shadow">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">REGISTRAR USUARIO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <form id="registroForm" method="post" action="../Registrar/Registrar.php">
                    <div class="mb-3 text-start">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="apellido_pa" class="form-label">Apellido paterno</label>
                        <input type="text" class="form-control" id="apellido_pa" name="apellido_pa" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="apellido_ma" class="form-label">Apellido materno</label>
                        <input type="text" class="form-control" id="apellido_ma" name="apellido_ma">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="rfc" class="form-label">RFC</label>
                        <input type="text" class="form-control" id="rfc" name="rfc"
                            pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{13}$" required>
                        <div class="invalid-feedback">El RFC debe contener exactamente 13 caracteres, incluyendo al
                            menos una letra y un número.</div>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="empresa" class="form-label">Empresa</label>
                        <input type="text" class="form-control" id="empresa" name="empresa" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="rol" class="form-label">Rol</label>
                        <select class="form-select" aria-label="Default select example" id="rol" name="rol" required>
                            <option value="usuario" selected>Cliente</option>
                            <option value="admin">Admin</option>
                            <option value="master">Master</option>
                        </select>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">Por favor, ingrese un correo electrónico válido.</div>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="invalid-feedback">La contraseña debe tener al menos 8 caracteres.</div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-100">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const registroForm = document.getElementById('registroForm');
    const emailInput = document.getElementById('email');
    const rfcInput = document.getElementById('rfc');
    const passwordInput = document.getElementById('password');
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    const rfcPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{13}$/;

    // Validaciones en tiempo real
    emailInput.addEventListener('input', function () {
        if (emailPattern.test(emailInput.value)) {
            emailInput.setCustomValidity('');
        } else {
            emailInput.setCustomValidity('Por favor, ingrese un correo electrónico válido.');
        }
        emailInput.reportValidity();
    });

    rfcInput.addEventListener('input', function () {
        if (rfcPattern.test(rfcInput.value)) {
            rfcInput.setCustomValidity('');
        } else {
            rfcInput.setCustomValidity('El RFC debe contener exactamente 13 caracteres, incluyendo al menos una letra y un número.');
        }
        rfcInput.reportValidity();
    });

    passwordInput.addEventListener('input', function () {
        if (passwordInput.value.length >= 8) {
            passwordInput.setCustomValidity('');
        } else {
            passwordInput.setCustomValidity('La contraseña debe tener al menos 8 caracteres.');
        }
        passwordInput.reportValidity();
    });

    // Validaciones al enviar el formulario
    registroForm.addEventListener('submit', function (event) {
        let formValid = true;

        // Validación del correo electrónico
        if (!emailPattern.test(emailInput.value)) {
            formValid = false;
            emailInput.setCustomValidity('Por favor, ingrese un correo electrónico válido.');
            emailInput.reportValidity();
        } else {
            emailInput.setCustomValidity('');
        }

        // Validación del RFC
        if (!rfcPattern.test(rfcInput.value)) {
            formValid = false;
            rfcInput.setCustomValidity('El RFC debe contener exactamente 13 caracteres, incluyendo al menos una letra y un número.');
            rfcInput.reportValidity();
        } else {
            rfcInput.setCustomValidity('');
        }

        // Validación de la contraseña
        if (passwordInput.value.length < 8) {
            formValid = false;
            passwordInput.setCustomValidity('La contraseña debe tener al menos 8 caracteres.');
            passwordInput.reportValidity();
        } else {
            passwordInput.setCustomValidity('');
        }

        // Evitar el envío del formulario si alguna validación falla
        if (!formValid) {
            event.preventDefault();
        }
    });
});
</script>