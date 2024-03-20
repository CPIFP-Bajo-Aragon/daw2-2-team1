<?php
    cabecera($this->datos);
?>


<div class=" container text-center align-items-center mt-5">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>/AdminControlador">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Añadir Servicio</li>
  </ol>
</nav>
    <div>
        <h3 style="margin-right: 10px;" class="mb-5">FORMULARIO AÑADIR SERVICIO <i class="bi bi-shop" style="font-size: 3rem;"></i></h3>
    </div>


<form action="" method="POST" class="mb-4 p-4 rounded" style="max-width: 600px; margin: 0 auto; border: 2px solid #222A3F;">
        <h3>Datos del Servicio:</h3>
        <div class="mb-3">
            <input type="text"  id="nombre_servicio" name="nombre_servicio" class="form-control" placeholder="Nombre Servicio" required>
        </div> 
        <div class="mb-3">
            <input type="text"  id="descripcion_servicio" name="descripcion_servicio" class="form-control" placeholder="Descripcion servicio" required>
        </div>
        <div id="selectTipoServicio" class="mt-3 mb-5">
    <label for="entidadSelect" class="form-label">Selecciona Tipo Servicio:</label>
    <select class="form-select col-11" id="id_tipo_servicio" name="id_tipo_servicio">
        <?php foreach ($this->datos['tiposerviciolistar'] as $tipo) { ?>
            <option value="<?php echo $tipo->id_tipo_servicio ?>"><?php echo $tipo->nombre_tipo_servicio ?></option>
        <?php } ?>
    </select>
</div>
        <div class="col-md-12 mb-3">
        <label for="tipoServicio">Seleccionar municipio: </label>

            <select class="form-select" id="id_municipio" name="id_municipio">
                <?php foreach ($this->datos['municipioslistar'] as $municipio): ?>
                    <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <input type="number" id="longitud_servicio" name="longitud_servicio" class="form-control" placeholder="Longitud" required>
        </div>
        <div class="mb-3">
            <input type="number" id="latitud_servicio" name="latitud_servicio" class="form-control" placeholder="Latitud" required>
        </div>
        <div class="mb-3">
            <input type="number" id="telefono_servicio" name="telefono_servicio" class="form-control" placeholder="Telefono" required>
        </div>

        <div class="mb-3">
            <input type="text" id="direccion_servicio" name="direccion_servicio" class="form-control" placeholder="Direccion" required>
        </div>

          <div class="form-group mx-sm-4 pb-3">
          <input type="submit" class="btn btn-block col-12" style="background-color: #222A3F; color: white;" value="Añadir">
        </div>

       
    </form>
  
</div>

<?php
require_once RUTA_APP . '/vistas/inc/footer.php';
?>




