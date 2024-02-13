<?php
    cabecera($datos);
?>

<div class="container content">
  <div class="row justify-content-center pt-5 mt-5">
    <div class="col-md-6 col-sm-8 col-xl-4 col-lg-4 formulario rounded-3">
      <form action="" method="POST" onsubmit="return ValidateCrearUsuario();">

        <div class="form-group mx-sm-4 pb-3">
          <label for="nif">NIF</label>
          <input type="text" class="form-control" id="nif" name="nif" required onblur="validateInput(this, validateNIF)">
        </div>

        <div class="form-group mx-sm-4 pb-3">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required onblur="validateInput(this, validateNombre)">
        </div>

        <div class="form-group mx-sm-4 pb-3">
          <label for="apellido">Apellido</label>
          <input type="text" class="form-control" id="apellido" name="apellido" required onblur="validateInput(this, validateApellido)">
        </div>

        <div class="form-group mx-sm-4 pb-3">
          <label for="correo">Correo</label>
          <input type="email" class="form-control" id="correo" name="correo" required onblur="validateInput(this, validateCorreo)">
        </div>

        <div class="form-group mx-sm-4 pb-3">
          <label for="contrasena">Contraseña</label>
          <input type="password" class="form-control" id="contrasena" name="contrasena" required onblur="validateInput(this, validateContrasena)">
        </div>

        <div class="form-group mx-sm-4 pb-3">
          <label for="fecha_nacimiento">fecha nacimiento</label>
          <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required">
        </div>

        <div class="form-group mx-sm-4 pb-3">
          <label for="telefono">telefono:</label>
          <input type="text" class="form-control" id="telefono" name="telefono" required">
        </div>
        
        <div class="form-group mx-sm-4 pb-3 col-12">
        <label for="" class="form-label">Localidad</label>

                <select class="col-11" id="municipio" name="municipio">
                    <?php foreach ($this->datos['municipioslistar'] as $municipio){ ?>
                    <option value="<?php echo $oferta->id_municipio ?>"><?php echo $oferta->nombre_usuario ?></option>    
                    <?php }?>
                </select>
        </div>

        <div class="form-group mx-sm-4 pb-3">
          <input type="submit" class="btn btn-block w-100 ingresar" value="INGRESAR">
        </div>
      </form>
    </div>
  </div>
</div>



<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
<script src="<?php echo RUTA_URL ?>/js/RegistrarUsuario.js"></script>
</body>
</html>