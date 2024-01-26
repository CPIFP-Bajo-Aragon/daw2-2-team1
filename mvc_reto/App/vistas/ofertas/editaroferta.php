<?php
    cabecera();
?>

    <div class="contenedor w-50 bg-light p-4">
        <form  method="post">
            <input type="hidden" name="id_oferta" value="<?php echo $this->datos['OfertaEditar']->id_oferta; ?>">

            <div class="mb-3">
                <label for="tipo_oferta" class="form-label">Tipo de oferta:</label>
                <input type="text" class="form-control" name="tipo_oferta" value="<?php echo $this->datos['OfertaEditar']->tipo_oferta; ?>">
            </div>

            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha de inicio:</label>
                <input type="date" class="form-control" name="fecha_inicio" value="<?php echo $this->datos['OfertaEditar']->fecha_inicio; ?>">
            </div>

            <div class="mb-3">
                <label for="fecha_fin" class="form-label">Fecha de fin:</label>
                <input type="date" class="form-control" name="fecha_fin" value="<?php echo $this->datos['OfertaEditar']->fecha_fin; ?>">
            </div>

            <div class="mb-3">
                <label for="condiciones" class="form-label">Condiciones:</label>
                <textarea class="form-control" name="condiciones"><?php echo $this->datos['OfertaEditar']->condiciones; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="fecha_publicacion" class="form-label">Fecha de publicación:</label>
                <input type="date" class="form-control" name="fecha_publicacion" value="<?php echo $this->datos['OfertaEditar']->fecha_publicacion; ?>">
            </div>

            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo:</label>
                <input type="text" class="form-control" name="tipo" value="<?php echo $this->datos['OfertaEditar']->tipo; ?>">
            </div>

            <div class="mb-3">
                <label for="NIF" class="form-label">NIF:</label>
                <input type="text" class="form-control" name="NIF" value="<?php echo $this->datos['OfertaEditar']->NIF; ?>">
            </div>

            <div class="mb-3">
                <label for="id_entidad" class="form-label">ID de entidad:</label>
                <input type="text" class="form-control" name="id_entidad" value="<?php echo $this->datos['OfertaEditar']->id_entidad; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>


<?php 


require_once RUTA_APP.'/vistas/inc/footer.php'
?>
