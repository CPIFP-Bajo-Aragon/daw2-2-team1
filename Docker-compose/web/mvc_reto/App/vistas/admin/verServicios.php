<?php
    cabecera($this->datos);
?>

<div class="container mt-5">
    
    <div class="modal" tabindex="-1" role="dialog" id="modalServicio">
        <div class="modal-dialog" role="document">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title">Datos del Servicio: <span id="id_servicio_label"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    

                    <form action="<?php echo RUTA_URL; ?>/adminControlador/editarServicio" method="POST">
                        <input type="hidden" id="id_servicio_editar" name="id_servicio">
                        <div class="mb-3">
                            <label class="form-label" id="id_servicio_label"></label>
                        </div>

                        <div id="Servicio"></div>

                        <div class="form-group mx-sm-4 pb-3">
                            <input type="submit" class="btn btn-block col-12" style="background-color: #222A3F; color: white;" value="Guardar Cambios">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>/AdminControlador">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ver Servicios</li>
        </ol>
    </nav>

    <div class="col-sm-12 mb-1 text-center mb-5">
    <h3>LISTADO SERVICIOS <i class="bi bi-shop"></i></h3>
    </div>

    <div class="d-flex justify-content-between mb-3">
        <div class="row w-100">
            <div class="col-md-6 mb-3">
                <!-- Filtro de búsqueda -->
                <input type="search" id="search" class="form-control" placeholder="Buscar...">
            </div>
           
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped w-100" id="resultados">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre Servicio</th>
                    <th>Descripcion</th>
                    <th>Tipo servicio</th>
                    <th>Municipio</th>
                    <th>Latitud</th>
                    <th>Longitud</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos['servicioslistar'] as $servicio): ?>
                    <tr>
                        <td><?php echo $servicio->nombre_servicio; ?></td>
                        <td><?php echo $servicio->descripcion_servicio; ?></td>
                        <td><?php echo $servicio->nombre_tipo_servicio; ?></td>
                        <td><?php echo $servicio->nombre_municipio; ?></td>
                        <td><?php echo $servicio->longitud_servicio; ?></td>
                        <td><?php echo $servicio->latitud_servicio; ?></td>
                        <td><?php echo $servicio->telefono_servicio; ?></td>
                        <td><?php echo $servicio->direccion_servicio; ?></td>
                        <td>
                            <a href="#" class="btn btn-outline-primary rounded-circle mr-1" onclick="EditarServicioModal(<?php echo $servicio->id_servicio; ?>)"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-outline-danger rounded-circle" onclick="DesactivarUsuario(<?php echo $servicio->id_servicio; ?>)">
                            <i class="bi bi-trash"></i>
                        </a>           
                </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="col-12 mt-3 mb-3 d-flex justify-content-between">
        <button class="btn btn-primary me-0" id="btnAnterior">Anterior</button>
        <button class="btn btn-primary ms-0" id="btnSiguiente">Siguiente</button>
    </div>
    </div>
</div>
<?php
require_once RUTA_APP . '/vistas/inc/footer.php';
?>
<script>
 var servicioslistar = <?php echo json_encode($this->datos['servicioslistar']); ?>;
    var serviciosPorPagina = 5;
    var currentIndex = 0;

    const resultadosTable = document.getElementById('resultados').getElementsByTagName('tbody')[0];

    function actualizarBotones(currentIndex) {
        document.getElementById("btnAnterior").style.display = currentIndex === 0 ? "none" : "inline-block";
        document.getElementById("btnSiguiente").style.display = currentIndex + serviciosPorPagina >= servicioslistar.length ? "none" : "inline-block";
    }

    function listarServicios(servicios, startIndex) {
        resultadosTable.innerHTML = '';

        for (let i = startIndex; i < startIndex + serviciosPorPagina && i < servicios.length; i++) {
            const servicio = servicios[i];
            const row = resultadosTable.insertRow();

            const cell1 = row.insertCell();
            cell1.textContent = servicio.nombre_servicio;

            const cell2 = row.insertCell();
            cell2.textContent = servicio.descripcion_servicio;

            const cell3 = row.insertCell();
            cell3.textContent = servicio.nombre_tipo_servicio;

            const cell4 = row.insertCell();
            cell4.textContent = servicio.nombre_municipio;

            const cell5 = row.insertCell();
            cell5.textContent = servicio.longitud_servicio;

            const cell6 = row.insertCell();
            cell6.textContent = servicio.latitud_servicio;

            const cell7 = row.insertCell();
            cell7.textContent = servicio.telefono_servicio;

            const cell8 = row.insertCell();
            cell8.textContent = servicio.direccion_servicio;

            const cell9 = row.insertCell();

            const editarButton = document.createElement('a');
            editarButton.href = "#";
            editarButton.classList.add('btn', 'btn-outline-primary', 'rounded-circle', 'mr-1');
            editarButton.innerHTML = '<i class="fas fa-pencil-alt"></i>';
            editarButton.onclick = function() {
                EditarServicioModal(servicio.id_servicio);
            };

            const eliminarButton = document.createElement('a');
            eliminarButton.href = "#";
            eliminarButton.classList.add('btn', 'btn-outline-danger', 'rounded-circle');
            eliminarButton.innerHTML = '<i class="bi bi-trash"></i>';
            eliminarButton.onclick = function() {
                DesactivarUsuario(servicio.id_servicio);
            };

            cell9.appendChild(editarButton);
            cell9.appendChild(eliminarButton);
        }
    }

    document.getElementById("btnAnterior").addEventListener("click", function() {
        currentIndex = Math.max(0, currentIndex - serviciosPorPagina);
        listarServicios(servicioslistar, currentIndex);
        actualizarBotones(currentIndex);
    });

    document.getElementById("btnSiguiente").addEventListener("click", function() {
        currentIndex = Math.min(currentIndex + serviciosPorPagina, servicioslistar.length - serviciosPorPagina);
        listarServicios(servicioslistar, currentIndex);
        actualizarBotones(currentIndex);
    });

    listarServicios(servicioslistar, currentIndex);
    actualizarBotones(currentIndex);

    function EditarServicioModal(elemento) {
        var id_servicio = elemento;

        var servicioslistar = <?php echo json_encode($this->datos['servicioslistar']); ?>;
        console.log(servicioslistar);

        var modal = new bootstrap.Modal(document.getElementById('modalServicio'));
        modal.show();

        var servicioLabel = modal._element.querySelector('.modal-body #id_servicio_label');

        var idServicioInput = document.getElementById('id_servicio_editar');
        idServicioInput.value = id_servicio;

        var servicioContainer = document.getElementById('Servicio');
        servicioContainer.innerHTML = '';

        servicioslistar.forEach(function(servicio) {
            if (servicio.id_servicio == id_servicio) {
                var contenedor = document.createElement('div');
                contenedor.innerHTML = '';

                var nombre_servicio = document.createElement('input');
                nombre_servicio.value = servicio.nombre_servicio;
                nombre_servicio.classList.add('form-control');
                nombre_servicio.setAttribute('type', 'text');
                nombre_servicio.setAttribute('name', 'nombre_servicio');
                nombre_servicio.style.marginBottom = '20px';

                var descripcion_servicio = document.createElement('input');
                descripcion_servicio.value = servicio.descripcion_servicio;
                descripcion_servicio.classList.add('form-control');
                descripcion_servicio.setAttribute('type', 'text');
                descripcion_servicio.setAttribute('name', 'descripcion_servicio');
                descripcion_servicio.style.marginBottom = '20px';

                var tiposServicioList = <?php echo json_encode($this->datos['tiposerviciolistar']); ?>;
                var selectTipoServicio = document.createElement('select');
                selectTipoServicio.classList.add('form-select', 'w-100');
                selectTipoServicio.setAttribute('id', 'id_tipo_servicio');
                selectTipoServicio.setAttribute('name', 'id_tipo_servicio');
                selectTipoServicio.style.marginBottom = '20px';


                tiposServicioList.forEach(function(tipo) {
                    var option = document.createElement('option');
                    option.value = tipo.id_tipo_servicio;
                    option.textContent = tipo.nombre_tipo_servicio;
                    selectTipoServicio.appendChild(option);
                });


                var municipiosList = <?php echo json_encode($this->datos['municipioslistar']); ?>;
                var selectMunicipio = document.createElement('select');
                selectMunicipio.classList.add('form-select', 'w-100');
                selectMunicipio.setAttribute('id', 'id_municipio');
                selectMunicipio.setAttribute('name', 'id_municipio');
                selectMunicipio.style.marginBottom = '20px';


                municipiosList.forEach(function(municipio) {
                    var option = document.createElement('option');
                    option.value = municipio.id_municipio;
                    option.textContent = municipio.nombre_municipio;
                    selectMunicipio.appendChild(option);
                });



                var longitud_servicio = document.createElement('input');
                longitud_servicio.value = servicio.longitud_servicio;
                longitud_servicio.classList.add('form-control');
                longitud_servicio.setAttribute('type', 'text');
                longitud_servicio.setAttribute('name', 'longitud_servicio');
                longitud_servicio.style.marginBottom = '20px';

                var latitud_servicio = document.createElement('input');
                latitud_servicio.value = servicio.latitud_servicio;
                latitud_servicio.classList.add('form-control');
                latitud_servicio.setAttribute('type', 'text');
                latitud_servicio.setAttribute('name', 'latitud_servicio');
                latitud_servicio.style.marginBottom = '20px';

                var telefono_servicio = document.createElement('input');
                telefono_servicio.value = servicio.telefono_servicio;
                telefono_servicio.classList.add('form-control');
                telefono_servicio.setAttribute('type', 'text');
                telefono_servicio.setAttribute('name', 'telefono_servicio');
                telefono_servicio.style.marginBottom = '20px';

                var direccion_servicio = document.createElement('input');
                direccion_servicio.value = servicio.direccion_servicio;
                direccion_servicio.classList.add('form-control');
                direccion_servicio.setAttribute('type', 'text');
                direccion_servicio.setAttribute('name', 'direccion_servicio');
                direccion_servicio.style.marginBottom = '20px';

                contenedor.classList.add('form-group');
                contenedor.appendChild(nombre_servicio);
                contenedor.appendChild(descripcion_servicio);
                contenedor.appendChild(selectTipoServicio);
                contenedor.appendChild(selectMunicipio);
                contenedor.appendChild(longitud_servicio);
                contenedor.appendChild(latitud_servicio);
                contenedor.appendChild(telefono_servicio);
                contenedor.appendChild(direccion_servicio);

                servicioContainer.appendChild(contenedor);
            }
        });
    }

    //BUSCADOR

    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        const resultsTable = document.getElementById('resultados').getElementsByTagName('tbody')[0].rows;
      

        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase();

            for (let i = 0; i < resultsTable.length; i++) {
                const row = resultsTable[i];
                const rowData = row.textContent.toLowerCase();

                if (rowData.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });

        
    });

    rellenar(servicios);

document.addEventListener('DOMContentLoaded', function () {
    var inputBusqueda = document.querySelector('.form-control');
    inputBusqueda.addEventListener('input', function () {
        filtrarServicios(this.value);
    });
});

function filtrarServicios(terminoBusqueda) {
    var serviciosFiltrados = servicios.filter(function (servicio) {
        return servicio.nombre_servicio.toLowerCase().includes(terminoBusqueda.toLowerCase());
    });
    rellenar(serviciosFiltrados);
}

function rellenar(servicios) {
    resultadosTable.innerHTML = '';
    servicios.forEach(function (servicio) {
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${servicio.nombre_servicio}</td>
            <td>${servicio.descripcion_servicio}</td>
            <td>${servicio.nombre_tipo_servicio}</td>
            <td>${servicio.nombre_municipio}</td>
            <td>${servicio.longitud_servicio}</td>
            <td>${servicio.latitud_servicio}</td>
            <td>${servicio.telefono_servicio}</td>
            <td>${servicio.direccion_servicio}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Opciones">
                    <a class="btn btn-primary" href="/AdminControlador/editarServicio/${servicio.id_servicio}">Editar</a>
                    <button class="btn btn-danger" onclick="eliminarServicio(${servicio.id_servicio})">Eliminar</button>
                </div>
            </td>
        `;
        resultadosTable.appendChild(newRow);
    });
}



    function DesactivarUsuario(id_servicio) {
    Swal.fire({
        title: "Eliminar Servicio?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Estoy seguro!"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "<?php echo RUTA_URL ?>/adminControlador/EliminarServicio/" + id_servicio;
        }
    });
}



</script>
