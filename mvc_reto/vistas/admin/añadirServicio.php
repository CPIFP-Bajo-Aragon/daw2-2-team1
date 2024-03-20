<?php
    cabecera($this->datos);
?>



<div class="container mt-5 text-center">
    <form action="" method="POST" class="mb-4">
        <h3>Datos del Negocio</h3>
        <div class="mb-3">
            <input type="text"  id="nombre_servicio" name="nombre_servicio" class="form-control" placeholder="Nombre Servicio">
        </div> 
        <div class="mb-3">
            <input type="text"  id="descripcion_servicio" name="descripcion_servicio" class="form-control" placeholder="Descripcion servicio">
        </div>
        <div class="mb-3">
            <input type="text" id="id_tipo_servicio" name="id_tipo_servicio" class="form-control" placeholder="Tipo Servicio">
        </div>
        <div class="mb-3">
            <input type="text" id="id_municipio" name="id_municipio" class="form-control" placeholder="Municipio">
        </div>
        <div class="mb-3">
            <input type="text" id="longitud_servicio" name="longitud_servicio" class="form-control" placeholder="Longitud">
        </div>
        <div class="mb-3">
            <input type="text" id="latitud_servicio" name="latitud_servicio" class="form-control" placeholder="Latitud">
        </div>
        <div class="mb-3">
            <input type="text" id="telefono_servicio" name="telefono_servicio" class="form-control" placeholder="Telefono">
        </div>

        <div class="mb-3">
            <input type="text" id="direccion_servicio" name="direccion_servicio" class="form-control" placeholder="Direccion">
        </div>

          <div class="form-group mx-sm-4 pb-3">
        <input type="submit" class="btn btn-success btn-block" value="Añadir">
    </div>
       
    </form>
  
</div>


<?php
require_once RUTA_APP . '/vistas/inc/footer.php';
?>

