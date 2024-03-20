<?php
    cabecera($this->datos);
?>



<div class="container mt-5 text-center">

<form action="" method="POST" class="mb-4">


   

<div id="selectEntidad" class="mt-3">
    <label for="entidadSelect" class="form-label">Selecciona Entidad:</label>
    <select class="form-select col-11" id="id_entidad" name="id_entidad">
        <?php foreach ($this->datos['entidadlistar'] as $entidad) { ?>
            <option value="<?php echo $entidad->id_entidad ?>"><?php echo $entidad->nombre_entidad ?></option>
        <?php } ?>
    </select>
</div>




   
<h3>Datos del Negocio</h3>
 
<div class="mb-3">
    <input type="text"  id="titulo_negocio" name="titulo_negocio" class="form-control" placeholder="Titulo">
</div>
<div class="mb-3">
    <input type="text" id="motivo_traspaso_negocio" name="motivo_traspaso_negocio" class="form-control" placeholder="Motivo traspaso">
</div>
<div class="mb-3">
    <input type="text" id="coste_traspaso_negocio" name="coste_traspaso_negocio" class="form-control" placeholder="coste Traspaso">
</div>
<div class="mb-3">
    <input type="text" id="coste_mensual_negocio" name="coste_mensual_negocio" class="form-control" placeholder="Coste Mensual">
</div>
<div class="mb-3">
    <input type="text" id="descripcion_negocio" name="descripcion_negocio" class="form-control" placeholder="Ubicacion">
</div>
<div class="mb-3">
    <input type="text" id="local_id_inmueble" name="local_id_inmueble" class="form-control" placeholder="Ubicacion">
</div>
<div class="mb-3">
    <input type="text" id="capital_minimo_negocio" name="capital_minimo_negocio" class="form-control" placeholder="Descripcion">
</div>




    <h3>Datos de la Oferta</h3>

        <div class="mb-3">
        <input type="text" id="titulo_oferta" name="titulo_oferta" class="form-control" placeholder="Titulo de la oferta">
    </div>
    <div class="mb-3">
        <input type="text" id="fecha_inicio_oferta" name="fecha_inicio_oferta" class="form-control" placeholder="Fecha de inicio de la oferta">
    </div>
    <div class="mb-3">
        <input type="text" id="fecha_fin_oferta" name="fecha_fin_oferta" class="form-control" placeholder="Fecha de fin de la oferta">
    </div>
    <div class="mb-3">
        <input type="text" id="condiciones_oferta" name="condiciones_oferta" class="form-control" placeholder="Condiciones de la oferta">
    </div>
    <div class="mb-3">
        <input type="text" id="descripcion_oferta" name="descripcion_oferta" class="form-control" placeholder="Descripcion de la oferta">
    </div>
    <div class="mb-3">
        <input type="text" id="fecha_publicacion_oferta" name="fecha_publicacion_oferta" class="form-control" placeholder="Fecha de publicacion de la oferta">
    </div>
    <div class="mb-3">
        <input type="text" id="activo_oferta" name="activo_oferta" class="form-control" placeholder="activo_oferta">
    </div>
 

    <h3>Tiene inmueble:</h3>

<div class="mb-3">

<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="tipo" id="usuarioRadio" value="usuario" onclick="mostrarSelect('usuario')">
    <label class="form-check-label" for="usuarioRadio">Si</label>
</div>

<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="tipo" id="entidadRadio" value="entidad" onclick="mostrarSelect('entidad')">
    <label class="form-check-label" for="entidadRadio">No</label>
</div>



<div id="selectUsuario" class="mt-3" style="display:none;">
<h3>Datos del Inmueble</h3>

    
<div class="mb-3">
    <input type="text" name="metros_cuadrados_inmueble" class="form-control" placeholder="Metros Cuadrados">
</div>

<div class="mb-3">
    <textarea name="descripcion_inmueble" class="form-control" placeholder="Descripción"></textarea>
</div>

<div class="mb-3">
    <input type="text" name="distribucion_inmueble" class="form-control" placeholder="Distribución">
</div>

<div class="mb-3">
    <input type="text" name="precio_inmueble" class="form-control" placeholder="Precio">
</div>

<div class="mb-3">
    <input type="text" name="direccion_inmueble" class="form-control" placeholder="Dirección">
</div>

<div class="mb-3">
    <input type="text" name="caracteristicas_inmueble" class="form-control" placeholder="Características">
</div>

<div class="mb-3">
    <input type="text" name="equipamiento_inmueble" class="form-control" placeholder="Equipamiento">
</div>
<div class="mb-3">
    <input type="text" name="estado_inmueble" class="form-control" placeholder="Estado">
</div>
<div class="mb-3">
    <input type="text" name="latitud_inmueble" class="form-control" placeholder="Latitud">
</div>
<div class="mb-3">
    <input type="text" name="longitud_inmueble" class="form-control" placeholder="Longitud">
</div>


<div id="selectEntidad" class="mt-3">
    <label for="entidadSelect" class="form-label">Selecciona Municipio:</label>
    <select class="form-select col-11" id="municipio" name="municipio">
        <?php foreach ($this->datos['municipioslistar'] as $municipio) { ?>
            <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
        <?php } ?>
    </select>
</div>

<div class="mb-3 mt-5">
    <input type="text" name="id_estado" class="form-control" placeholder="Longitud">
</div>
<div class="mb-3">
    <input type="text" name="id_entidad" class="form-control" placeholder="Longitud">
</div>




<h3>Complete los datos del local:</h3>

    <h3>Local</h3>
    <div class="mb-3">
        <input type="text" class="form-control" name="nombre_local" placeholder="Nombre">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="capacidad_local" placeholder="Capacidad">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="recursos_local" placeholder="Recursos">
    </div>

   
</div>

<div class="form-group mx-sm-4 pb-3">
    <input type="submit" class="btn btn-success btn-block" value="Añadir">
</div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function mostrarSelect(tipo) {
    var selectEntidad = document.getElementById('selectEntidad');
    var selectUsuario = document.getElementById('selectUsuario');

    if (tipo === 'entidad') {
        selectEntidad.style.display = 'block';
        selectUsuario.style.display = 'none';
    } else if (tipo === 'usuario') {
        selectEntidad.style.display = 'none';
        selectUsuario.style.display = 'block';
    }
}
</script>
   



</form>
</div>


   

 
   
  



<?php
require_once RUTA_APP . '/vistas/inc/footer.php';
?>
