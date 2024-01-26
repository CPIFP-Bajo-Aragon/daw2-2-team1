<?php
    cabecera();
?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white rounded p-4 shadow">
            <form method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Foto:</label>
                        <img src="placeholder.jpg" alt="User Photo" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $this->datos['usuarioSesion']['nombre']?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $this->datos['usuarioSesion']['apellido']?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $this->datos['usuarioSesion']['correo']?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono">
                    </div>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion">
                </div>
                <div class="form-group">
                    <label for="date">Fecha de nacimiento:</label>
                    <input type="date" class="form-control" id="date" name="date">
                </div>
                <input type="hidden" name="nif" value="<?php echo $this->datos['usuarioSesion']['NIF']?>">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
            <?php 

require_once RUTA_APP.'/vistas/inc/footer.php'
?>
