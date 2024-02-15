<?php require_once RUTA_APP.'/vistas/inc/header_no_logueado.php'?>




<div class="contenedor d-flex flex-column vh-100">
    <div class="container content flex-grow-1">
        <div class="row justify-content-center pt-5 mt-5">
            <div class="col-md-6 col-sm-8 col-xl-4 col-lg-4 formulario rounded-3">
                <form action="" method="POST" class="">
                    <div class="text-center">
                        <img src="../images/logol.png" alt="" width="60px">
                    </div>
                    <div class="form-group text-center pt-3">
                        <h1 class="text-light">INICIAR SESIÓN</h1>
                    </div>
                    <div class="form-group mx-sm-4 pt-3 mb-3">
                        <input type="email" class="form-control" name="usuario" placeholder="Correo">
                    </div>

                    <div class="form-group mx-sm-4 pb-3">
                        <input type="password" class="form-control" name="contra" placeholder="Contraseña">
                    </div>

                    <div class="form-group mx-sm-4 pb-3">
                        <input type="submit" class="btn btn-block text-white w-100 ingresar" style="background: #222A3F; font-weight: 700 !important;" value="INGRESAR">
                    </div>
                    <div class="form-check text-left text-white">
                        <input type="checkbox" name="conectado" class="form-check-input text-left" id="conectado">
                        <label for="conectado" class="form-check-label">Recordar Usuario</label>
                    </div>

                    <div class="form-group mx-sm-4 text-center text-white">
                        <span><a href="#" class="olvide" data-toggle="modal" data-target="#olvideContraseñaModal">Olvidé mi Contraseña</a></span>
                    </div>

                    <div class="form-group text-center text-white">
                        <span>No tienes cuenta? <a href="<?php echo RUTA_URL?>/LoginControlador/registro">Registrate</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="olvideContraseñaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Recuperar Contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group pb-3">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Recuperar Contraseña</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>


</body>
<script>
    $(document).ready(function() {
        $('.olvide').click(function(e) {
            e.preventDefault(); 
            $('#olvideContraseñaModal').modal('show'); 
        });
    });
</script>

</html>