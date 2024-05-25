<div class="modal fade" id="detallesTicketA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog w-50">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalles del ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="ActualizarTicketsAdmin.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="tituloT" class="form-label">Número de seguimiento</label>
                        <input type="text" class="form-control" id="numeroT" name="numeroT" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tituloT" class="form-label">Título</label>
                        <input type="text" class="form-control" id="tituloT" name="tituloT" disabled readonly>
                    </div>
                    <div class="mb-3">
                        <label for="descripcionT" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcionT" name="descripcionT" rows="3" disabled
                            readonly></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="solucionT" class="form-label">Solución</label>
                        <textarea class="form-control" id="solucionT" name="solucionT" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="fechaCreacionT" class="form-label">Fecha creación</label>
                        <input type="text" class="form-control" id="fechaCreacionT" name="fechaCreacionT" disabled
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="fechaCierreT" class="form-label">Fecha cierre</label>
                        <input type="text" class="form-control" id="fechaCierreT" name="tituloT" disabled readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Cerrar Ticket</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>