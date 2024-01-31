<?php
    cabecera($this->datos);
?>



    <h2>Formulario para Insertar en NEGOCIO</h2>
    
    <form method="post" >
        <div class="form-group">
            <label for="id_oferta">Local:</label>
            <select name="codigo_inmueble" id="">
            <?php foreach ($this->datos['localeslistar'] as $local):?>
                    <option value="<?php echo $local->codigo_inmueble;?>"><?php echo $local->titulo; ?></option>
             <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="codigo_negocio">Código de Negocio:</label>
            <input type="text" class="form-control" id="codigo_negocio" name="codigo_negocio" required>
        </div>
        
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        
        <div class="form-group">
            <label for="motivo_traspaso">Motivo de Traspaso:</label>
            <input type="text" class="form-control" id="motivo_traspaso" name="motivo_traspaso" required>
        </div>
        
        <div class="form-group">
            <label for="coste_traspaso">Coste de Traspaso:</label>
            <input type="text" class="form-control" id="coste_traspaso" name="coste_traspaso" required>
        </div>
        
        <div class="form-group">
            <label for="coste_mensual">Coste Mensual:</label>
            <input type="text" class="form-control" id="coste_mensual" name="coste_mensual" required>
        </div>
        
        <div class="form-group">
            <label for="ubicacion">Ubicación:</label>
            <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
        </div>
        
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
        </div>
        
        <div class="form-group">
            <label for="capital_minimo">Capital Mínimo:</label>
            <input type="text" class="form-control" id="capital_minimo" name="capital_minimo" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Insertar en NEGOCIO</button>
    </form>



<?php 

require_once RUTA_APP.'/vistas/inc/footer.php'
?>
</body>
</html>