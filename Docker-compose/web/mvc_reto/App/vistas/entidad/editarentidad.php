<?php
    cabecera($this->datos);
?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 bg-light p-4 mt-5 overflow-auto">
            <form method="post" onsubmit="return ValidateCrearEntidad();">
                <input type="hidden" name="id_entidad" value="<?php echo $this->datos['EntidadEditar']->id_entidad; ?>">
                <div class="form-group row col-12 m-4">
                    <label class="col-3" for="nombre_entidad">Nombre de la Entidad</label>
                    <input type="text" class="col-8" id="nombre_entidad" name="nombre_entidad" onblur="validateInput(this, validateNombre)" value="<?php echo $this->datos['EntidadEditar']->nombre_entidad; ?>"  placeholder="Nombre de ejemplo" required>
                </div>
                <div class="form-group row col-12 m-4">
                    <label class="col-3" for="cif">Cif</label>
                    <input type="text" class="col-8" id="cif" name="cif" placeholder="CIF de ejemplo" onblur="validateInput(this, validateNIF)" value="<?php echo $this->datos['EntidadEditar']->cif_entidad; ?>" required>
                </div>
                <div class="form-group row col-12 m-4">
                    <label class="col-3" for="sector">Sector</label>
                    <input type="text" class="col-8" id="sector" name="sector" onblur="validateInput(this, validateSector)"  placeholder="Sector de ejemplo" value="<?php echo $this->datos['EntidadEditar']->sector_entidad; ?>" required>
                </div>
                <div class="form-group row col-12 m-4">
                    <label class="col-3"for="dirección">Dirección</label>
                    <input type="text" class="col-8" id="direccion" name="direccion" onblur="validateInput(this, validateDireccion)" placeholder="Direccion de ejemplo" value="<?php echo $this->datos['EntidadEditar']->direccion_entidad; ?>" required>
                </div>
                <div class="form-group row col-12 m-4">
                    <label class="col-3" for="número_telefónico">Número Telefónico</label>
                    <input type="tel" class="col-8" id="numero_telefonico" name="numero_telefonico" onblur="validateInput(this, validateTelefono)"  placeholder="Telefono de ejemplo" value="<?php echo $this->datos['EntidadEditar']->numero_telefono_entidad; ?>" required>
                </div>
                <div class="form-group row col-12 m-4">
                    <label class="col-3" for="correo">Correo Electrónico</label>
                    <input type="email" class="col-8" id="correo" name="correo" onblur="validateInput(this, validateCorreo)" placeholder="Email de ejemplo" value="<?php echo $this->datos['EntidadEditar']->correo_entidad; ?>" required>
                </div>
                <div class="form-group row col-12 m-4">
                    <label class="col-3" for="página_web">Página Web</label>
                    <input type="url" class="col-8" id="pagina_web" name="pagina_web" onblur="validateInput(this, validateUrl)" placeholder="Web de ejemplo" value="<?php echo $this->datos['EntidadEditar']->pagina_web_entidad; ?>"  required>
                </div>
                <button type="submit" class="btn btn-primary">Insertar Datos</button>
            </form>
        </div>
    </div>
</div>

<?php 


require_once RUTA_APP.'/vistas/inc/footer.php'
?>
<script src="<?php echo RUTA_URL ?>/js/RegistrarUsuario.js"></script>

</body>
</html>