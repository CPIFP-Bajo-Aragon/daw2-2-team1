<?php
    cabecera($this->datos);
?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 bg-light p-4 mt-5 overflow-auto">
            <form method="post">
                <input type="hidden" name="id_oferta" value="<?php echo $this->datos['OfertaEditar']->id_oferta; ?>">

                <div class="mb-3">
                    <label for="titulo_oferta">Título de Oferta:</label>
                    <input type="text" name="titulo_oferta" value="<?php echo $this->datos['OfertaEditar']->titulo_oferta; ?>" required><br>
                </div>

                <div class="mb-3">
                    <label for="fecha_inicio">Fecha de Inicio:</label>
                    <input type="date" name="fecha_inicio" value="<?php echo $this->datos['OfertaEditar']->fecha_inicio_oferta; ?>" required><br>
                </div>

                <div class="mb-3">
                    <label for="fecha_fin">Fecha de Fin:</label>
                    <input type="date" name="fecha_fin" value="<?php echo $this->datos['OfertaEditar']->fecha_fin_oferta; ?>" required><br>
                </div>

                <div class="mb-3">
                    <label for="condiciones">Condiciones:</label>
                    <input  type="textarea" name="condiciones" rows="4" value="<?php echo $this->datos['OfertaEditar']->condiciones_oferta; ?>" required></input><br>
                </div>

                <div class="mb-3">
                    <label for="descripcion">Descripción:</label>
                    <input type="textarea" name="descripcion" rows="4" value="<?php echo $this->datos['OfertaEditar']->descripcion_oferta; ?>" required></input><br>
                </div>

                <div class="mb-3">
                    <label for="entidad">Entidad:</label>
                    <input type="text" name="entidad" value="<?php echo $this->datos['OfertaEditar']->id_entidad; ?>" required><br>
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