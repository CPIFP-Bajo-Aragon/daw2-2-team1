<?php
    cabecera($this->datos);
?>



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white rounded p-4 shadow">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="nombre">Foto:</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputFoto" name="foto">

                        <label class="custom-file-label" for="inputFoto">Elegir archivo...</label>
                    </div>
                    <img id="previewFoto" src="/images/perfil_<?php echo $_SESSION['usuarioSesion']['NIF'] ?>/Perfil.jpg" alt="User Photo" class="img-fluid rounded-circle mt-2" style="width: 150px; height: 150px; object-fit: cover;">
                </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $_SESSION['usuarioSesion']['nombre']?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $_SESSION['usuarioSesion']['apellido']?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['usuarioSesion']['correo']?>">
                    </div>
                </div>
                <input type="hidden" name="nif" value="<?php echo $_SESSION['usuarioSesion']['NIF']?>">
                <button type="submit" name="Actualizarformulario" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
            <?php 

require_once RUTA_APP.'/vistas/inc/footer.php'
?>
