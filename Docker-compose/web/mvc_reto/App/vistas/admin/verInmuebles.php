
 <?php
    $inmueblesPorPagina = 6;
    $fragmentosinmuebles = array_chunk($datos['inmuebleslistar'], $inmueblesPorPagina);
    $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $inmueblesEnPagina = isset($fragmentosinmuebles[$paginaActual - 1]) ? $fragmentosinmuebles[$paginaActual - 1] : [];
    $numPaginas = count($fragmentosinmuebles);
?>

<?php
    cabecera($this->datos);
?>
<div class="container mt-5">
<div class="modal" tabindex="-1" role="dialog" id="modalInmueble">
        <div class="modal-dialog" role="document">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title">Datos del Inmueble: <span id="id_inmueble_label"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo RUTA_URL; ?>/adminControlador/editarInmueble" method="POST">
                        <input type="hidden" id="id_inmueble_editar" name="id_inmueble">
                        <div class="mb-3">
                            <label class="form-label" id="id_inmueble_label"></label>
                        </div>

                        <div id="Inmueble"></div>

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
            <li class="breadcrumb-item active" aria-current="page">Ver Inmuebles</li>
        </ol>
    </nav>

    <div class="col-sm-12 mb-1 text-center mb-5">
        <h3>VER INMUEBLES <i class="bi bi-houses"></i></h3>
    </div>
    

    <div class="row row-cols-1 row-cols-md-2 g-4">
    <?php foreach ($inmueblesEnPagina as $inmueble): ?>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <p class="card-title">CODIGO: <?php echo $inmueble->id_inmueble; ?></p>
                <strong>INFROMACION OFERTA</strong><br>
                <strong>Título:</strong> <?php echo $inmueble->titulo_oferta; ?><br>
                <strong>Fecha Fin:</strong> <?php echo $inmueble->fecha_fin_oferta; ?><br>
                <strong>Fecha Publicación:</strong> <?php echo $inmueble->fecha_publicacion_oferta; ?><br><br>
                <p class="card-text">
                    <strong>DETALLES INMUEBLE</strong><br>
                    <strong>Precio:</strong> <?php echo $inmueble->precio_inmueble; ?><br>

                    <strong>Descripción:</strong> <?php echo $inmueble->descripcion_inmueble; ?><br>
            
                    <span id="extraInfo<?php echo $inmueble->id_inmueble; ?>" style="display: none;">
                    <strong>Fecha Inicio:</strong> <?php echo $inmueble->fecha_inicio_oferta; ?><br>
                    <strong>Condiciones:</strong> <?php echo $inmueble->condiciones_oferta; ?><br>
                     <strong>Descripción:</strong> <?php echo $inmueble->descripcion_oferta; ?><br>

                     <strong>Metros Cuadrados:</strong> <?php echo $inmueble->metros_cuadrados_inmueble; ?><br>
                     <strong>Distribución:</strong> <?php echo $inmueble->distribucion_inmueble; ?><br>
                     <strong>Equipamento:</strong> <?php echo $inmueble->equipamiento_inmueble; ?><br>
                     <strong>Distribución:</strong> <?php echo $inmueble->distribucion_inmueble; ?><br>
                     <strong>Latitud:</strong> <?php echo $inmueble->latitud_inmueble; ?><br>
                     <strong>Longitud:</strong> <?php echo $inmueble->longitud_inmueble; ?><br>


                        <strong>Dirección:</strong> <?php echo $inmueble->direccion_inmueble; ?><br>
                        <strong>Municipio:</strong> <?php echo $inmueble->nombre_municipio; ?><br>
                        <strong>Estado:</strong> <?php echo $inmueble->estado; ?><br>
                        <strong>Entidad:</strong> <?php echo $inmueble->nombre_entidad; ?><br>
                        <strong>Características:</strong> <?php echo $inmueble->caracteristicas_inmueble; ?><br><br>

                        <?php
                        $esLocal = !empty($inmueble->nombre_local);
                        if ($esLocal): ?>
                        <strong>DETALLES LOCAL</strong><br>
                            <strong>Nombre Local:</strong> <?php echo $inmueble->nombre_local; ?><br>
                            <strong>Capacidad:</strong> <?php echo $inmueble->capacidad_local; ?><br>
                            <strong>Recursos:</strong> <?php echo $inmueble->recursos_local; ?><br><br>
                        <?php else: ?>
                            <strong>DETALLES VIVIENDA</strong><br>
                            <strong>Habitaciones:</strong> <?php echo $inmueble->habitaciones_vivienda; ?><br>
                            <strong>Tipo:</strong> <?php echo $inmueble->tipo_vivienda; ?><br><br>
                        <?php endif; ?>

                        
                    </span>
                    <a href="#" class="btn btn-link" onclick="toggleInfo(<?php echo $inmueble->id_inmueble; ?>)">Ver más</a>
                </p>

                <div class="btn-group" role="group" aria-label="Opciones">
                    <a href="#" class="btn btn-outline-primary mr-1" onclick="EditarInmueble(<?php echo $inmueble->id_inmueble; ?>)"><i class="fas fa-pencil-alt"></i></a>

                    <?php if ($inmueble->activo_inmueble == 1): ?>
                        <a class="btn btn-outline-success" onclick="DesactivarInmueble(<?php echo $inmueble->id_inmueble; ?>)"><i class="bi bi-check-lg"></i></a>
                    <?php else: ?>
                        <a class="btn btn-outline-danger" onclick="ActivarInmueble(<?php echo $inmueble->id_inmueble; ?>)"><i class="bi bi-x-lg"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<nav aria-label="Paginación">
        <ul class="pagination text-right">
            <?php for ($i = 1; $i <= $numPaginas; $i++): ?>
                <li class="page-item <?php echo ($i == $paginaActual) ? 'active' : ''; ?>">
                <a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>


</div>
<?php
require_once RUTA_APP . '/vistas/inc/footer.php';
?>
<script>
  function EditarInmueble(elemento) {
    id_inmueble = elemento; 

    var inmueblesListar = <?php echo json_encode($this->datos['inmuebleslistar']); ?>;
    var modal = new bootstrap.Modal(document.getElementById('modalInmueble'));
    modal.show();

    var inmuebleLabel = modal._element.querySelector('.modal-body #id_inmueble_label');
    var id_inmuebleInput = document.getElementById('id_inmueble_editar');
    id_inmuebleInput.value = id_inmueble;

    var inmuebleContainer = document.getElementById('Inmueble');
    inmuebleContainer.innerHTML = '';
    
    inmueblesListar.forEach(function(inmueble) {
        if (inmueble.id_inmueble == id_inmueble) {
            var contenedor = document.createElement('div');

            contenedor.classList.add('form-group');

            function createTextInput(value, name) {
                var input = document.createElement('input');
                input.value = value;
                input.classList.add('form-control');
                input.setAttribute('type', 'text');
                input.setAttribute('name', name);
                input.style.marginBottom = '20px';
                return input;
            }
            var OfertasTitulo = document.createElement('P');
            OfertasTitulo.textContent = "DATOS OFERTA:";

            var tituloOferta = createTextInput(inmueble.titulo_oferta, 'titulo_oferta');
            var fechaInicioOferta = createTextInput(inmueble.fecha_inicio_oferta, 'fecha_inicio_oferta');
            var fechaPublicacionOferta = createTextInput(inmueble.fecha_publicacion_oferta, 'fecha_publicacion_oferta');
            var fechaFinOferta = createTextInput(inmueble.fecha_fin_oferta, 'fecha_fin_oferta');


            var inmuebleTitulo = document.createElement('P');
            inmuebleTitulo.textContent = "DATOS INMUEBLE:";
            var precioInmueble = createTextInput(inmueble.precio_inmueble, 'precio_inmueble');
            var descripcionInmueble = createTextInput(inmueble.descripcion_inmueble, 'descripcion_inmueble');
            var condicionesOferta = createTextInput(inmueble.condiciones_oferta, 'condiciones_oferta');
            var descripcionOferta = createTextInput(inmueble.descripcion_oferta, 'descripcion_oferta');
            var equipamentoInmueble = createTextInput(inmueble.equipamiento_inmueble, 'equipamiento_inmueble');
            var metrosCuadradosInmueble = createTextInput(inmueble.metros_cuadrados_inmueble, 'metros_cuadrados_inmueble');
            var distribucionInmueble = createTextInput(inmueble.distribucion_inmueble, 'distribucion_inmueble');
            var direccionInmueble = createTextInput(inmueble.direccion_inmueble, 'direccion_inmueble');
            var LatitudInmueble = createTextInput(inmueble.latitud_inmueble, 'latitud_inmueble');
            var LongitudInmueble = createTextInput(inmueble.longitud_inmueble, 'longitud_inmueble');


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
                
                
                var estadosListar = <?php echo json_encode($this->datos['estadoslistar']); ?>;
                var SelectEstado = document.createElement('select');
                SelectEstado.classList.add('form-select', 'w-100');
                SelectEstado.setAttribute('id', 'id_estado');
                SelectEstado.setAttribute('name', 'id_estado');
                SelectEstado.style.marginBottom = '20px';


                estadosListar.forEach(function(estado) {
                    var option = document.createElement('option');
                    option.value = estado.id_estado;
                    option.textContent = estado.estado;
                    SelectEstado.appendChild(option);
                });    

                var entidadeslistar = <?php echo json_encode($this->datos['entidadeslistar']); ?>;
                var SelectEntidad = document.createElement('select');
                SelectEntidad.classList.add('form-select', 'w-100');
                SelectEntidad.setAttribute('id', 'id_entidad');
                SelectEntidad.setAttribute('name', 'id_entidad');
                SelectEntidad.style.marginBottom = '20px';


                entidadeslistar.forEach(function(entidad) {
                    var option = document.createElement('option');
                    option.value = entidad.id_entidad;
                    option.textContent = entidad.nombre_entidad;
                    SelectEntidad.appendChild(option);
                });    
                
                
            var caracteristicasInmueble = createTextInput(inmueble.caracteristicas_inmueble, 'caracteristicas_inmueble');


            contenedor.classList.add('form-group');
            contenedor.appendChild(OfertasTitulo );
            contenedor.appendChild(tituloOferta);
            contenedor.appendChild(fechaInicioOferta);
            contenedor.appendChild(fechaPublicacionOferta);
            contenedor.appendChild(fechaFinOferta);

            contenedor.appendChild(condicionesOferta);
            contenedor.appendChild(descripcionOferta);
             contenedor.appendChild(inmuebleTitulo); 

            contenedor.appendChild(precioInmueble);
            contenedor.appendChild(descripcionInmueble);
            contenedor.appendChild(metrosCuadradosInmueble);
            contenedor.appendChild(distribucionInmueble);
            contenedor.appendChild(equipamentoInmueble);

            contenedor.appendChild(direccionInmueble);
            contenedor.appendChild(LatitudInmueble);
            contenedor.appendChild(LongitudInmueble);


            contenedor.appendChild(selectMunicipio);
            contenedor.appendChild(SelectEstado);
            contenedor.appendChild(SelectEntidad);
            contenedor.appendChild(caracteristicasInmueble);

            if (inmueble.nombre_local) {

                var localTitulo = document.createElement('P');
                 localTitulo.textContent = "DATOS LOCAL:";
                
                var nombre_local = createTextInput(inmueble.nombre_local, 'nombre_local');
                var capacidadLocal = createTextInput(inmueble.capacidad_local, 'capacidad_local');
                var recursosLocal = createTextInput(inmueble.recursos_local, 'recursos_local');

                contenedor.appendChild(localTitulo);
                contenedor.appendChild(nombre_local);
                contenedor.appendChild(capacidadLocal);
                contenedor.appendChild(recursosLocal);
            } else {
                var viviendaTitulo = document.createElement('P');
                 viviendaTitulo.textContent = "DATOS VIVIENDA:";

                var habitacionesVivienda = createTextInput(inmueble.habitaciones_vivienda, 'habitaciones_vivienda');
                var tipoVivienda = createTextInput(inmueble.tipo_vivienda, 'tipo_vivienda');

                contenedor.appendChild(viviendaTitulo);
                contenedor.appendChild(habitacionesVivienda);
                contenedor.appendChild(tipoVivienda);
            }


         

            inmuebleContainer.appendChild(contenedor);
        }
    });
}



    function toggleInfo(inmuebleId) {
        var extraInfo = document.getElementById("extraInfo" + inmuebleId);
        extraInfo.style.display = (extraInfo.style.display === 'none') ? 'inline' : 'none';
    }

    function DesactivarInmueble(id_inmueble) {
        Swal.fire({
            title: "¿Desactivar inmueble?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Estoy seguro!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo RUTA_URL ?>/adminControlador/DesactivarInmueble/" + id_inmueble;
            }
        });
    }

    function ActivarInmueble(id_inmueble) {
        Swal.fire({
            title: "¿Activar inmueble?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Estoy seguro!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo RUTA_URL ?>/adminControlador/ActivarInmueble/" + id_inmueble;
            }
        });
    }
</script>
