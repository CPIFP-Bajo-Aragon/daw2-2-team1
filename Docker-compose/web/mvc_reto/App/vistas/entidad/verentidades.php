<?php
    cabecera($this->datos);
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-3 text-center">
          <!--  <div id="Buscador" class="mb-3">
                <div class="input-group">
                    <input type="text" id="buscar" class="form-control" placeholder="Buscar entidad...">
                </div> 
            </div>-->
            <div>
                <button onclick="abrirSolicitud()" class="btn btn-primary mb-3">
                    + Entidades existentes
                </button>
            </div>
            <div>
                <a href="/EntidadesControlador/addentidades" class="btn btn-primary mb-3">
                    + añadir nueva
                </a>
            </div>
        </div>

        <div id="entidadesContainer d-flex" class="col-md-9 ">
            <div class="card-container row">
                <?php foreach ($this->datos['ent'] as $entidad): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header text-center text-primary">
                                <h5 class="card-title"><?php echo $entidad->nombre_entidad; ?></h5>
                            </div>
                            <div class="card-body text-center">
                                <p class="card-text"><strong>Sector:</strong> <?php echo $entidad->sector_entidad; ?></p>
                                <p class="card-text"><strong>Dirección:</strong> <?php echo $entidad->direccion_entidad; ?></p>
                                <p class="card-text"><strong>Número Telefónico:</strong> <?php echo $entidad->numero_telefono_entidad; ?></p>
                                <p class="card-text"><strong>Correo:</strong> <?php echo $entidad->correo_entidad; ?></p>
                                <p class="card-text"><strong>Página Web:</strong> <?php echo $entidad->pagina_web_entidad; ?></p>
                                <p class="card-text"><strong>NIF:</strong> <?php echo $entidad->cif_entidad; ?></p>
                            </div>
                            <?php if ($entidad->rol == "Administrador"): ?>
                                <div class="card-footer">
                                    <a href="/EntidadesControlador/editarentidades/<?php echo $entidad->id_entidad ?>" class="btn btn-outline-primary">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <a href="/EntidadesControlador/verSolicitudes/" class="btn btn-outline-primary">
                                        <i class="bi bi-person"></i> Ver solicitantes
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if ($entidad->sector_entidad != "autonomo" && $entidad->rol != "Administrador"): ?>
                                <div class="card-footer text-center">
                                    <button onclick="confirmarEliminacion(<?php echo $entidad->id_entidad ?>)" class="btn btn-outline-danger">
                                        <i class="bi bi-trash"></i> Abandonar
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'; ?>

<script>
    var inputBusqueda = document.getElementById('buscar');

    function confirmarEliminacion(idEntidad) {
        Swal.fire({
            title: "¿Estas seguro de abandonar esta entidad?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Estoy seguro!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo RUTA_URL ?>/EntidadesControlador/abandonarentidad/"+idEntidad;
            }
        });
    }

    function abrirSolicitud() {
        var entidadesnoincrito = <?php echo json_encode($this->datos['entno']) ?>;
        var mainModal = document.getElementById('mainModal');

        // Clear the existing content
        mainModal.innerHTML = '';

        // Create elements
        var modalDialog = document.createElement('div');
        modalDialog.className = 'modal-dialog';
        modalDialog.setAttribute('role', 'document');

        var modalContent = document.createElement('div');
        modalContent.className = 'modal-content';

        var modalHeader = document.createElement('div');
        modalHeader.className = 'modal-header';

        var modalTitle = document.createElement('h5');
        modalTitle.className = 'modal-title';
        modalTitle.id = 'exampleModalLabel';
        modalTitle.textContent = 'Entidades';

        var closeButton = document.createElement('button');
        closeButton.type = 'button';
        closeButton.className = 'close';
        closeButton.setAttribute('data-dismiss', 'modal');
        closeButton.setAttribute('aria-label', 'Close');
        closeButton.addEventListener('click', closeMainModal);

        var closeIcon = document.createElement('span');
        closeIcon.setAttribute('aria-hidden', 'true');
        closeIcon.innerHTML = '&times;';

        closeButton.appendChild(closeIcon);
        modalHeader.appendChild(modalTitle);
        modalHeader.appendChild(closeButton);

        var modalBody = document.createElement('div');
        modalBody.className = 'modal-body';
        var selectHtml = `
            <h2 class="mb-4">Formulario de Inserción</h2>
            <form method="post" action="/EntidadesControlador/solicitarentidades/">
                <div class="form-group row mb-4">
                    <label class="col-md-3 col-form-label" for="id_entidad">Nombre de la Entidad</label>
                    <div class="col-md-8">
                        <select name="id_entidad" id="id_entidad" class="form-control" required>`;

        // Recorre el array de entidades en JavaScript
        entidadesnoincrito.forEach(function (ent) {
            selectHtml += `<option value="${ent.id_entidad}">${ent.nombre_entidad}</option>`;
        });

        selectHtml += `</select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Solicitar Participacion</button>
            </form>`;

        modalBody.innerHTML = selectHtml;

        // Appending elements to modalContent
        modalContent.appendChild(modalHeader);
        modalContent.appendChild(modalBody);

        // Appending modalContent to modalDialog
        modalDialog.appendChild(modalContent);

        // Appending modalDialog to mainModal
        mainModal.appendChild(modalDialog);

        // Display the modal
        mainModal.style.display = 'block';
        mainModal.classList.add('show');
    }

    var entidades = <?php echo json_encode($this->datos['ent']); ?>;
    var entidadesContainer = document.getElementById('entidadesContainer');

    rellenar(entidades);

    document.addEventListener('DOMContentLoaded', function () {
        inputBusqueda.addEventListener('input', function () {
            filtrarEntidades(this.value);
        });
    });

    function filtrarEntidades(terminoBusqueda) {
        var entidadesFiltradas = entidades.filter(function (entidad) {
            return entidad.nombre_entidad.toLowerCase().includes(terminoBusqueda.toLowerCase());
        });
        rellenar(entidadesFiltradas);
    }

    function rellenar(entidades) {
        entidadesContainer.innerHTML =``;
        entidades.forEach(function(entidad) {
            const newCard = document.createElement('div');
            newCard.classList.add('col-md-4', 'mb-4');
            newCard.innerHTML = `
                <div class="card">
                    <div class="card-header text-center text-primary">
                        <h5 class="card-title">${entidad.nombre_entidad}</h5>
                    </div>
                    <div class="card-body text-center">
                        <p class="card-text"><strong>Sector:</strong> ${entidad.sector_entidad}</p>
                        <p class="card-text"><strong>Dirección:</strong> ${entidad.direccion_entidad}</p>
                        <p class="card-text"><strong>Número Telefónico:</strong> ${entidad.numero_telefono_entidad}</p>
                        <p class="card-text"><strong>Correo:</strong> ${entidad.correo_entidad}</p>
                        <p class="card-text"><strong>Página Web:</strong> ${entidad.pagina_web_entidad}</p>
                        <p class="card-text"><strong>NIF:</strong> ${entidad.cif_entidad}</p>
                    </div>
                    ${entidad.rol == "Administrador" ? `
                        <div class="card-footer">
                            <a href="/EntidadesControlador/editarentidades/${entidad.id_entidad}" class="btn btn-outline-primary">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                            <a href="/EntidadesControlador/verSolicitudes/" class="btn btn-outline-primary">
                                <i class="bi bi-person"></i> Ver solicitantes
                            </a>
                        </div>
                    ` : ''}
                    ${entidad.sector_entidad != "autonomo" && entidad.rol != "Administrador" ? `
                        <div class="card-footer text-center">
                            <button onclick="confirmarEliminacion(${entidad.id_entidad})" class="btn btn-outline-danger">
                                <i class="bi bi-trash"></i> Abandonar
                            </button>
                        </div>
                    ` : ''}
                </div>
            `;
            entidadesContainer.appendChild(newCard);
        });
    }
</script>
</body>
</html>
