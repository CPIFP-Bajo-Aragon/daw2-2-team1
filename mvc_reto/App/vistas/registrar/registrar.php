<?php
    cabecera($datos);
?>

        <div class="container content">
            <div class="row justify-content-center pt-5 mt-5">
                <div class="col-md-6 col-sm-8 col-xl-4 col-lg-4 formulario rounded-3">
                    <form action="" method="POST" >
                      

                    <div class="form-group mx-sm-4 pb-3">
                        <label for="nif">NIF</label>
                        <input type="text" class="form-control" id="nif" name="nif" required>
                    </div>

                    <div class="form-group mx-sm-4 pb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>

                    <div class="form-group mx-sm-4 pb-3">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                    </div>

                    <div class="form-group mx-sm-4 pb-3">
                        <label for="correo">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>

                    <div class="form-group mx-sm-4 pb-3">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                    </div>

                    <div class="form-group mx-sm-4 pb-3">
                        <input type="submit" class="btn btn-block w-100 ingresar" value="INGRESAR">
                    </div>
                    
                    </form>
                </div>
            </div>
        </div>



<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>