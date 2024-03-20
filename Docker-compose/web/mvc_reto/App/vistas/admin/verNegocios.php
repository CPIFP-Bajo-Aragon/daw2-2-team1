 <?php
    $negociosPorPagina = 4;
    $fragmentosNegocios = array_chunk($datos['negocioslistar'], $negociosPorPagina);
    $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $negociosEnPagina = isset($fragmentosNegocios[$paginaActual - 1]) ? $fragmentosNegocios[$paginaActual - 1] : [];
    $numPaginas = count($fragmentosNegocios);
?>

<?php
    cabecera($this->datos);
?>

<div class="container mt-5">

<div class="modal" tabindex="-1" role="dialog" id="modalNegocio">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title">Negocio: </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form action="<?php echo RUTA_URL; ?>/adminControlador/editarNegocio" method="POST">
                    <input type="hidden" id="id_negocio_editar" name="id_negocio">
                    <div class="">
                        <label id="id_negocio_label" class="form-label"></label>
                    </div>

                    <div id="Negocio">

                    </div>



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
            <li class="breadcrumb-item active" aria-current="page">Ver Negocios</li>
        </ol>
    </nav>
    <div class="col-sm-12 mb-1 text-center mb-5">
        <h3>VER NEGOCIOS <i class="bi bi-buildings"></i></h3>
    </div>
    <div class="row">
      
       
    </div>
    <div class="row row-cols-1 row-cols-md-2 g-4 mb-3">
    <?php foreach ($negociosEnPagina as $negocio): ?>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $negocio->titulo_negocio; ?></h5>
                <p class="card-text">
                    <?php if (!empty($negocio->titulo_oferta)): ?>
                        <strong>Título Oferta:</strong> <?php echo $negocio->titulo_oferta; ?><br>
                        <strong>Fecha Inicio Oferta:</strong> <?php echo $negocio->fecha_inicio_oferta; ?><br>
                        <strong>Fecha Fin Oferta:</strong> <?php echo $negocio->fecha_fin_oferta; ?><br>
                        <strong>Condiciones Oferta:</strong> <?php echo $negocio->condiciones_oferta; ?><br>
                        <strong>Descripción Oferta:</strong> <?php echo $negocio->descripcion_oferta; ?><br>
                        <strong>Fecha Publicación Oferta:</strong> <?php echo $negocio->fecha_publicacion_oferta; ?><br>
                    <?php else: ?>
                        <strong>El negocio no pertenece a ninguna oferta.</strong><br><br>
                    <?php endif; ?>

                    <strong>Motivo Traspaso:</strong> <?php echo $negocio->motivo_traspaso_negocio; ?><br>
                    <strong>Coste Traspaso:</strong> <?php echo $negocio->coste_traspaso_negocio; ?><br>
                    <strong>Coste Mensual:</strong> <?php echo $negocio->coste_mensual_negocio; ?><br>
                    <strong>Descripción:</strong> <?php echo $negocio->descripcion_negocio; ?><br>
                    <strong>Capital Mínimo:</strong> <?php echo $negocio->capital_minimo_negocio; ?><br>
                   
                    <strong>Entidad:</strong> <?php echo $negocio->nombre_entidad; ?><br>

                    <?php if (!empty($negocio->local_id_inmueble)): ?>
                        <strong>Nombre Local:</strong> <?php echo $negocio->nombre_local; ?><br>
                        <strong>Capacidad:</strong> <?php echo $negocio->capacidad_local; ?><br>
                        <strong>Recursos:</strong> <?php echo $negocio->recursos_local; ?><br>

                        
                    <?php else: ?>
                        <strong>El negocio no tiene local</strong><br>
                    <?php endif; ?>
                </p>
                <div class="btn-group" role="group" aria-label="Opciones">
                    <a href="#" class="btn btn-outline-primary mr-1" onclick="EditarNegocio(<?php echo $negocio->id_negocio; ?>)"><i class="fas fa-pencil-alt"></i></a>

                    

                    <?php if ($negocio->activo_negocio == 1): ?>
                        <a class="btn btn-outline-success" onclick="DesactivarNegocio(<?php echo $negocio->id_negocio; ?>)"><i class="bi bi-check-lg"></i></a>
                    <?php else: ?>
                        <a class="btn btn-outline-danger" onclick="ActivarNegocio(<?php echo $negocio->id_negocio; ?>)"><i class="bi bi-x-lg"></i></a>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    </div>

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
  
  function EditarNegocio(elemento) {
    var id_negocio = elemento;
    var negocioslistar = <?php echo json_encode($this->datos['negocioslistar']); ?>;
    console.log(negocioslistar);

    var modal = new bootstrap.Modal(document.getElementById('modalNegocio'));
    modal.show();

    var negocioLabel = modal._element.querySelector('.modal-body #id_negocio_label');
    var id_negocioInput = document.getElementById('id_negocio_editar');
    id_negocioInput.value = id_negocio;

    var negocioContainer = document.getElementById('Negocio');
    negocioContainer.innerHTML = '';

    negocioslistar.forEach(function (negocio) {
        if (negocio.id_negocio == id_negocio) {
           

if (negocio.titulo_oferta) {
    var tituloOfertaInput = createInput('Título Oferta', 'titulo_oferta', negocio.titulo_oferta);
    var fechaInicioInput = createInput('Fecha Inicio Oferta', 'fecha_inicio_oferta', negocio.fecha_inicio_oferta);
    var fechaFinInput = createInput('Fecha Fin Oferta', 'fecha_fin_oferta', negocio.fecha_fin_oferta);
    var condicionesOfertaInput = createInput('Condiciones Oferta', 'condiciones_oferta', negocio.condiciones_oferta);
    var descripcionOfertaInput = createInput('Descripción Oferta', 'descripcion_oferta', negocio.descripcion_oferta);
    var fechaPublicacionInput = createInput('Fecha Publicación Oferta', 'fecha_publicacion_oferta', negocio.fecha_publicacion_oferta);

    negocioContainer.appendChild(tituloOfertaInput);
    negocioContainer.appendChild(fechaInicioInput);
    negocioContainer.appendChild(fechaFinInput);
    negocioContainer.appendChild(condicionesOfertaInput);
    negocioContainer.appendChild(descripcionOfertaInput);
    negocioContainer.appendChild(fechaPublicacionInput);
} else {
    var strong = document.createElement('strong');
    strong.innerHTML = 'El negocio no pertenece a ninguna oferta.'+ '<br>' ;  
     negocioContainer.appendChild(strong);
}

            var motivoTraspasoInput = createInput('Motivo Traspaso', 'motivo_traspaso_negocio', negocio.motivo_traspaso_negocio);
            var costeTraspasoInput = createInput('Coste Traspaso', 'coste_traspaso_negocio', negocio.coste_traspaso_negocio);
            var costeMensualInput = createInput('Coste Mensual', 'coste_mensual_negocio', negocio.coste_mensual_negocio);
            var descripcionNegocioInput = createInput('Descripción', 'descripcion_negocio', negocio.descripcion_negocio);
            var capitalMinimoInput = createInput('Capital Mínimo', 'capital_minimo_negocio', negocio.capital_minimo_negocio);

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
            

            negocioContainer.appendChild(motivoTraspasoInput);
            negocioContainer.appendChild(costeTraspasoInput);
            negocioContainer.appendChild(costeMensualInput);
            negocioContainer.appendChild(descripcionNegocioInput);
            negocioContainer.appendChild(capitalMinimoInput);

            negocioContainer.appendChild(SelectEntidad);
            var IdLInput = createInput('Local', 'local_id_inmueble', negocio.local_id_inmueble);

            var nombreLocalInput = createInput('Nombre Local', 'nombre_local', negocio.nombre_local);
            var capacidadLocalInput = createInput('Capacidad', 'capacidad_local', negocio.capacidad_local);
            var recursosLocalInput = createInput('Recursos', 'recursos_local', negocio.recursos_local);

            if (negocio.local_id_inmueble) {
                negocioContainer.appendChild(IdLInput);

                negocioContainer.appendChild(nombreLocalInput);
                negocioContainer.appendChild(capacidadLocalInput);
                negocioContainer.appendChild(recursosLocalInput);
            }
        }
    });
}

// Función para crear un input
function createInput(labelText, inputName, inputValue) {
    var contenedor = document.createElement('div');
    contenedor.classList.add('form-group');

    var label = document.createElement('label');
    label.innerHTML = '<strong>' + labelText + ':</strong>';
    contenedor.appendChild(label);

    var input = document.createElement('input');
    input.value = inputValue || '';
    input.classList.add('form-control');
    input.setAttribute('type', 'text');
    input.setAttribute('name', inputName);
    input.style.marginBottom = '20px';

    contenedor.appendChild(input);

    return contenedor;
}


   




    function DesactivarNegocio(id_negocio) {
        Swal.fire({
            title: "¿Desactivar negocio?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Estoy seguro!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo RUTA_URL ?>/adminControlador/DesactivarNegocio/" + id_negocio;
            }
        });
    }

    function ActivarNegocio(id_negocio) {
        Swal.fire({
            title: "¿Activar negocio?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Estoy seguro!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo RUTA_URL ?>/adminControlador/ActivarNegocio/" + id_negocio;
            }
        });
    }
</script>
