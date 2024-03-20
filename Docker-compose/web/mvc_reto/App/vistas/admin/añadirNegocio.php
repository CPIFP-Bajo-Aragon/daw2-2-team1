<?php
    cabecera($this->datos);
?>



<div class="container">




    <div class="text-center align-items-center mt-5">

    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>/AdminControlador">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Añadir Negocios</li>
  </ol>
</nav>
    <div>
        <h3 style="margin-right: 10px;" class="mb-5">FORMULARIO AÑADIR NEGOCIO <i class="bi bi-buildings" style="font-size: 3rem;"></i></h3>
    </div>

    
  

    <form action="" method="POST" class="mb-4 p-4 rounded" style="max-width: 600px; margin: 0 auto; border: 2px solid #222A3F;">

<h3>Datos de la entidad</h3>
<div id="seleccionarEntidad" class="mt-3 mb-5">
    <label for="entidadSelect" class="form-label">Selecciona Entidad:</label>
    <select class="form-select col-11" id="id_entidad" name="id_entidad">
        <?php foreach ($this->datos['entidadlistar'] as $entidad) { ?>
            <option value="<?php echo $entidad->id_entidad ?>"><?php echo $entidad->nombre_entidad ?></option>
        <?php } ?>
    </select>
</div>




   
<h3>Datos del Negocio</h3>
 
<div class="mb-3">
    <input type="text"  id="titulo_negocio" name="titulo_negocio" class="form-control" placeholder="Titulo" required>
</div>
<div class="mb-3">
    <input type="text" id="motivo_traspaso_negocio" name="motivo_traspaso_negocio" class="form-control" placeholder="Motivo traspaso" required>
</div>
<div class="mb-3">
    <input type="text" id="coste_traspaso_negocio" name="coste_traspaso_negocio" class="form-control" placeholder="coste Traspaso" required>
</div>
<div class="mb-3">
    <input type="text" id="coste_mensual_negocio" name="coste_mensual_negocio" class="form-control" placeholder="Coste Mensual" required>
</div>
<div class="mb-3">
    <input type="text" id="descripcion_negocio" name="descripcion_negocio" class="form-control" placeholder="Descripcion" required>
</div>
<div class="mb-3">
    <input type="text" id="local_id_inmueble" name="local_id_inmueble" class="form-control" placeholder="local" required>
</div>
<div class="mb-3">
    <input type="text" id="capital_minimo_negocio" name="capital_minimo_negocio" class="form-control mb-5" placeholder="Cpaital Minimo" required>
</div>




    <h3>Datos de la Oferta</h3>

        <div class="mb-3">
        <input type="text" id="titulo_oferta" name="titulo_oferta" class="form-control" placeholder="Titulo de la oferta" required>
    </div>
    <div class="mb-3">
        <input type="date" id="fecha_inicio_oferta" name="fecha_inicio_oferta" class="form-control" placeholder="Fecha de inicio de la oferta" required>
    </div>
    <div class="mb-3">
        <input type="date" id="fecha_fin_oferta" name="fecha_fin_oferta" class="form-control" placeholder="Fecha de fin de la oferta" required>
    </div>
    <div class="mb-3">
        <input type="text" id="condiciones_oferta" name="condiciones_oferta" class="form-control" placeholder="Condiciones de la oferta" required>
    </div>
    <div class="mb-3">
        <input type="text" id="descripcion_oferta" name="descripcion_oferta" class="form-control" placeholder="Descripcion de la oferta" required>
    </div>
    <div class="mb-3">
        <input type="date" id="fecha_publicacion_oferta" name="fecha_publicacion_oferta" class="form-control" placeholder="Fecha de publicacion de la oferta" required>
    </div>
    
 

    <h3>Tiene inmueble:</h3>

<div class="">

<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="tipo" id="usuarioRadio" value="usuario" onclick="mostrarSelect('usuario')" >
    <label class="form-check-label" for="usuarioRadio">Si</label>
</div>

<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="tipo" id="entidadRadio" value="entidad" onclick="mostrarSelect('entidad')">
    <label class="form-check-label mb-5" for="entidadRadio">No</label>
</div>



<div id="selectUsuario" class="mt-3" style="display:none;">
<h3>Datos del Inmueble</h3>

    
<div class="mb-3">
    <input type="text" name="metros_cuadrados_inmueble" class="form-control" placeholder="Metros Cuadrados" required>
</div>

<div class="mb-3">
    <textarea name="descripcion_inmueble" class="form-control" placeholder="Descripción" required></textarea>
</div>

<div class="mb-3">
    <input type="text" name="distribucion_inmueble" class="form-control" placeholder="Distribución" required>
</div>

<div class="mb-3">
    <input type="text" name="precio_inmueble" class="form-control" placeholder="Precio" required>
</div>

<div class="mb-3">
    <input type="text" name="direccion_inmueble" class="form-control" placeholder="Dirección" required>
</div>

<div class="mb-3">
    <input type="text" name="caracteristicas_inmueble" class="form-control" placeholder="Características" required>
</div>

<div class="mb-3">
    <input type="text" name="equipamiento_inmueble" class="form-control" placeholder="Equipamiento" required>
</div>
<div id="" class="mt-3 mb-3">
    <label for="entidadSelect" class="form-label">Selecciona Estado:</label>
    <select class="form-select col-11" id="id_estado" name="id_estado">
        <?php foreach ($this->datos['estadoslistar'] as $estado) { ?>
            <option value="<?php echo $estado->id_estado ?>"><?php echo $estado->estado ?></option>
        <?php } ?>
    </select>
</div>
<div class="mb-3">
    <input type="text" name="latitud_inmueble" class="form-control" placeholder="Latitud" >
</div>
<div class="mb-3">
    <input type="text" name="longitud_inmueble" class="form-control" placeholder="Longitud">
</div>


<div id="selectEntidad" class="mt-3">
    <label for="entidadSelect" class="form-label">Selecciona Municipio:</label>
    <select class="form-select col-11" id="id_municipio" name="id_municipio">
        <?php foreach ($this->datos['municipioslistar'] as $municipio) { ?>
            <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
        <?php } ?>
    </select>
</div>








    <h3>Datos del local</h3>
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
    <input type="submit" class="btn btn-block col-12" style="background-color: #222A3F; color: white;" value="Añadir">
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

</div>


   

