<?php
    cabecera($datos);
?>

<div class="contenedor h-100 d-flex flex-column">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4 formulario rounded-3 text-center mt-5">
            <form action="" method="POST" onsubmit="return ValidateCrearUsuario();">
                <div class="text-center">
                    <img src="../images/logol.png" alt="" width="60px">
                </div>
                <div class="form-group text-center pt-3">
                    <h1 class="text-light">REGISTRO</h1>
                </div>
                <div class="form-group mx-3 pb-3">
                   
                    <input type="text" class="form-control" id="nif" name="nif" required onblur="validateInput(this, validateNIF)" placeholder="NIF">
                </div>
                <div class="form-group mx-3 pb-3">
                    <input type="text" class="form-control" id="nombre" name="nombre" required onblur="validateInput(this, validateNombre)" placeholder="Nombre">
                </div>
                <div class="form-group mx-3 pb-3">
                    <input type="text" class="form-control" id="apellido" name="apellido" required onblur="validateInput(this, validateApellido)" placeholder="Apellido">
                </div>
                <div class="form-group mx-3 pb-3">
                    <input type="email" class="form-control" id="correo" name="correo" required onblur="validateInput(this, validateCorreo)" placeholder="Correo">
                </div>
                <div class="form-group mx-3 pb-3">
                    <input type="password" class="form-control" id="contrasena" name="contrasena" required onblur="validateInput(this, validateContrasena)" placeholder="Contraseña">
                </div>
                <div class="form-group mx-3 pb-3">
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required placeholder="Fecha Nacimiento">
                </div>
                <div class="form-group mx-3 pb-3">
                   
                    <input type="text" class="form-control" id="telefono" name="telefono" required placeholder="Teléfono">
                </div>
                <div class="form-group mx-3 pb-3">
                    <input type="submit" class="btn btn-block text-white ingresar" style="background: #222A3F; font-weight: 700 !important;" value="INGRESAR">
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
<script src="<?php echo RUTA_URL ?>/js/RegistrarUsuario.js"></script>
</body>
</html>
