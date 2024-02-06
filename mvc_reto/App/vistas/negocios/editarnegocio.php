<?php
    cabecera($this->datos);
?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 bg-light p-4 mt-5 overflow-auto">
            <form method="post">
                <input type="hidden" name="id_oferta" value="<?php echo $this->datos['OfertaEditar']->id_oferta; ?>">

                <div class="mb-3">
                    <label for="tipo_oferta" class="form-label">Codigo inmueble:</label>
                    <input type="text" class="form-control" name="tipo_oferta" value="<?php echo $this->datos['OfertaEditar']->tipo_oferta; ?>">
                </div>

                <div class="mb-3">
                    <label for="fecha_inicio" class="form-label">Titulo:</label>
                    <input type="date" class="form-control" name="fecha_inicio" value="<?php echo $this->datos['OfertaEditar']->fecha_inicio; ?>">
                </div>

                <div class="mb-3">
                    <label for="fecha_fin" class="form-label">Motivo de traspaso:</label>
                    <input type="date" class="form-control" name="fecha_fin" value="<?php echo $this->datos['OfertaEditar']->fecha_fin; ?>">
                </div>

                <div class="mb-3">
                    <label for="condiciones" class="form-label">Coste de traspaso:</label>
                    <textarea class="form-control" name="condiciones"><?php echo $this->datos['OfertaEditar']->condiciones; ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="tipo" class="form-label">Coste de mensual:</label>
                    <input type="text" class="form-control" name="tipo" value="<?php echo $this->datos['OfertaEditar']->tipo; ?>">
                </div>

                <div class="mb-3">
                    <label for="longitud" class="form-label">Longitud:</label>
                    <input type="text" class="form-control" name="Longitud" value="<?php echo $this->datos['OfertaEditar']->tipo; ?>">
                </div>

                <div class="mb-3">
                    <label for="latitud" class="form-label">Latitud:</label>
                    <input type="text" class="form-control" name="latitud" value="<?php echo $this->datos['OfertaEditar']->tipo; ?>">
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion:</label>
                    <input type="text" class="form-control" name="descripcion" value="<?php echo $this->datos['OfertaEditar']->tipo; ?>">
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Capital Minimo:</label>
                    <input type="text" class="form-control" name="descripcion" value="<?php echo $this->datos['OfertaEditar']->tipo; ?>">
                </div>


                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
        </div>
    </div>
</div>

<?php 


require_once RUTA_APP.'/vistas/inc/footer.php'
?>
</body>
</html>