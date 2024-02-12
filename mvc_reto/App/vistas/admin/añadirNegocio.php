<?php
    cabecera($this->datos);
?>



<div class="container mt-5 text-center">

<form action="" class="mb-4">
    <h3>Selecciona el tipo de entidad o usuario:</h3>

    <div class="mb-3">
    <label for="activo_oferta">Tipo Usuario: </label>
    <div class="form-check form-check-inline">
        <input type="radio" id="activo_oferta_si" name="activo_oferta" class="form-check-input" value="1">
        <label class="form-check-label" for="activo_oferta_si">Sí</label>
    </div>
    <div class="form-check form-check-inline">
        <input type="radio" id="activo_oferta_no" name="activo_oferta" class="form-check-input" value="0">
        <label class="form-check-label" for="activo_oferta_no">No</label>
    </div>


    <div class="form-check">
        <input class="form-check-input" type="radio" name="tipo" id="entidadRadio" value="entidad" onclick="mostrarSelect('entidad')">
        <label class="form-check-label line-start d-inline" for="entidadRadio">Entidad</label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="tipo" id="usuarioRadio" value="usuario" onclick="mostrarSelect('usuario')">
        <label class="form-check-label d-inline" for="usuarioRadio">Usuario</label>
    </div>

    <div id="selectEntidad" class="mt-3" style="display:none;">
        <label for="entidadSelect" class="form-label">Selecciona entidad:</label>
        <select id="entidadSelect" class="form-select" name="entidad">
            <option value="entidad1">Entidad 1</option>
            <option value="entidad2">Entidad 2</option>
        </select>
    </div>

    <div id="selectUsuario" class="mt-3" style="display:none;">
        <label for="usuarioSelect" class="form-label">Selecciona usuario:</label>
        <select id="usuarioSelect" class="form-select" name="usuario">
            <option value="usuario1">Usuario 1</option>
            <option value="usuario2">Usuario 2</option>
        </select>
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
  

    <form action="" method="POST" class="mb-4">
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
    <label for="activo_oferta">Activa: </label>
    <div class="form-check form-check-inline">
        <input type="radio" id="activo_oferta_si" name="activo_oferta" class="form-check-input" value="1">
        <label class="form-check-label" for="activo_oferta_si">Sí</label>
    </div>
    <div class="form-check form-check-inline">
        <input type="radio" id="activo_oferta_no" name="activo_oferta" class="form-check-input" value="0">
        <label class="form-check-label" for="activo_oferta_no">No</label>
    </div>
</div>

  <!--  <div class="mb-3">
        <input type="text" id="id_negocio" name="id_negocio" class="form-control" placeholder="ID del negocio">
    </div>-->
    
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
            <input type="text" id="capital_minimo_negocio" name="capital_minimo_negocio" class="form-control" placeholder="Descripcion">
        </div>


       
       
    </form>

    <form action=""  class="mb-4">
    <h3>Datos del Inmueble</h3>
<form action="" method="POST" class="mb-4">
    
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
</form>



    <h3>Complete los datos del local:</h3>
 <form action="" class="mb-4">
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

        <div class="form-group mx-sm-4 pb-3">
        <input type="submit" class="btn btn-success btn-block" value="Añadir">
    </div>
    </form>
  
</div>


<?php
require_once RUTA_APP . '/vistas/inc/footer.php';
?>
