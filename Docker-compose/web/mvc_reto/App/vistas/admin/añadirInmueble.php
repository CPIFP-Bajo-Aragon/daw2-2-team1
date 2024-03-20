<?php
    cabecera($this->datos);
?>

<div class="container text-center">
<div class=" text-center align-items-center mt-5">


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>/AdminControlador">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Añadir Inmueble</li>
  </ol>
</nav>
    <div>
        <h3 style="margin-right: 10px;" class="mb-5">FORMULARIO AÑADIR INMUEBLE <i class="bi bi-houses" style="font-size: 3rem;"></i></h3>
    </div>

<form action="" method="POST" class="mb-5 p-4 rounded" style="max-width: 600px; margin: 0 auto; border: 2px solid #222A3F;">
<h3>Datos de la entidad</h3>
<div id="selectEntidad" class="mt-3 mb-5">
    <label for="entidadSelect" class="form-label">Selecciona Entidad:</label>
    <select class="form-select col-11" id="id_entidad" name="id_entidad">
        <?php foreach ($this->datos['entidadlistar'] as $entidad) { ?>
            <option value="<?php echo $entidad->id_entidad ?>"><?php echo $entidad->nombre_entidad ?></option>
        <?php } ?>
    </select>
</div>

        <h3>Datos de la Oferta</h3>
        <div class="mb-3">
            <input type="text"  id="titulo_oferta" name="titulo_oferta" class="form-control" placeholder="Titulo Oferta" required>
        </div>
        <div class="mb-3">
            <input type="text" id="fecha_inicio_oferta" name="fecha_inicio_oferta" class="form-control" placeholder="Fecha de Inicio" required>
        </div>
        <div class="mb-3">
            <input type="text" id="fecha_fin_oferta" name="fecha_fin_oferta" class="form-control" placeholder="Fecha Fin" required>
        </div>
        <div class="mb-3">
            <input type="text" id="condiciones_oferta" name="condiciones_oferta" class="form-control" placeholder="Condiciones" required>
        </div>
        <div class="mb-3">
            <input type="text" id="descripcion_oferta" name="descripcion_oferta" class="form-control" placeholder="Descripcion" required>
        </div>
        <div class="mb-3">
            <input type="date" id="fecha_publicacion_oferta" name="fecha_publicacion_oferta" class="form-control" placeholder="Fecha publicacion" required>
        </div>
        
   

  
        <h3>Datos del Inmueble</h3>

    <div class="mb-3">
        <input type="text" id="metros_cuadrados_inmueble" name="metros_cuadrados_inmueble" class="form-control" placeholder="Metros Cuadrados" required>
    </div>
    <div class="mb-3">
        <input type="text" id="descripcion_inmueble" name="descripcion_inmueble" class="form-control" placeholder="Descripción" required>
    </div>
    <div class="mb-3">
        <input type="text" id="distribucion_inmueble" name="distribucion_inmueble" class="form-control" placeholder="Distribución" required>
    </div>
    <div class="mb-3">
        <input type="text" id="precio_inmueble" name="precio_inmueble" class="form-control" placeholder="Precio" required>
    </div>
    <div class="mb-3">
        <input type="text" id="direccion_inmueble" name="direccion_inmueble" class="form-control" placeholder="Dirección" required>
    </div>
    <div class="mb-3">
        <input type="text" id="caracteristicas_inmueble" name="caracteristicas_inmueble" class="form-control" placeholder="Características" required>
    </div>
    <div class="mb-3">
        <input type="text" id="equipamiento_inmueble" name="equipamiento_inmueble" class="form-control" placeholder="Equipamiento" required>
    </div>
    <div class="mb-3">
        <input type="text" id="latitud_inmueble" name="latitud_inmueble" class="form-control" placeholder="Latitud" >
    </div>
    <div class="mb-3">
        <input type="text" id="longitud_inmueble" name="longitud_inmueble" class="form-control" placeholder="Longitud">
    </div>

    <div id="" class="mt-3 mb-3">
    <label for="entidadSelect" class="form-label">Selecciona Municipio:</label>
    <select class="form-select col-11" id="id_municipio" name="id_municipio">
        <?php foreach ($this->datos['municipioslistar'] as $municipio) { ?>
            <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
        <?php } ?>
    </select>
</div>

<div id="" class="mt-3 mb-3">
    <label for="entidadSelect" class="form-label">Selecciona Estado:</label>
    <select class="form-select col-11" id="id_estado" name="id_estado">
        <?php foreach ($this->datos['estadoslistar'] as $estado) { ?>
            <option value="<?php echo $estado->id_estado ?>"><?php echo $estado->estado ?></option>
        <?php } ?>
    </select>
</div>

    



    <h3>Selecciona el tipo de inmueble:</h3>

    <div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="tipo" id="usuarioRadio" value="vivienda" onclick="mostrarSelect('local')">
    <label class="form-check-label" for="usuarioRadio">Vivienda</label>
</div>

<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="tipo" id="entidadRadio" value="local" onclick="mostrarSelect('vivienda')">
    <label class="form-check-label mb-5" for="entidadRadio">Local</label>
</div>

<div id="formLocal" class="mt-3" style="display:none;">

        <h3>Local</h3>
        <div class="mb-3">
            <input type="text" id="nombre_local" name="nombre_local" class="form-control" placeholder="Nombre" required>
        </div>
        <div class="mb-3">
            <input type="text" id="capacidad_local" name="capacidad_local" class="form-control" placeholder="Capacidad" required>
        </div>
        <div class="mb-3">
            <input type="text" id="recursos_local" name="recursos_local" class="form-control" placeholder="Recursos" required>
        </div>
</div>

<div id="formVivienda" class="mt-3" style="display:none;">

        <h3>Vivienda</h3>
        <div class="mb-3">
            <input type="text" id="habitaciones_vivienda" name="habitaciones_vivienda" class="form-control" placeholder="Habitaciones" required>
        </div>
        <div class="mb-3">
            <input type="text" id="tipo_vivienda" name="tipo_vivienda" class="form-control" placeholder="Tipo Vivienda" required>
        </div>
 </div>
        <div class="form-group mx-sm-4 pb-3">
            <input type="submit" class="btn btn-block col-12" style="background-color: #222A3F; color: white;" value="Añadir" required>
        </div>
    </form>
</div>
</div>
<?php
require_once RUTA_APP . '/vistas/inc/footer.php';
?>
<script>
function mostrarSelect(tipo) {
    var selectEntidad = document.getElementById('formVivienda');
    var selectUsuario = document.getElementById('formLocal');

    if (tipo === 'local') {
        selectEntidad.style.display = 'block';
        selectUsuario.style.display = 'none';
    } else if (tipo === 'vivienda') {
        selectEntidad.style.display = 'none';
        selectUsuario.style.display = 'block';
    }
}
</script>



