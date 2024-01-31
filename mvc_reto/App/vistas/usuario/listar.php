<?php
    cabecera($this->datos);
?>



    <div class="row">
        <?php foreach ($this->datos['usuariolistar'] as $usuario): ?>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">NIF: <?php echo $usuario->NIF; ?></h5>
                        <p class="card-text">Nombre: <?php echo $usuario->nombre; ?></p>
                        <p class="card-text">Apellido: <?php echo $usuario->apellido; ?></p>
                        <p class="card-text">Correo: <?php echo $usuario->correo; ?></p>
                        <p class="card-text">Contraseña: <?php echo $usuario->contrasena; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>



<?php 

require_once RUTA_APP.'/vistas/inc/footer.php'
?>
</body>
</html>