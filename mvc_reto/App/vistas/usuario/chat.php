<?php
    cabecera($this->datos);
?>


<div class="container mt-4 d-flex justify-content-center align-items-center">
    <div class="w-50">
        <h2 class="text-center mb-4">Chat de Usuario</h2>

        <div class="mb-4">
        <div class="d-flex flex-column">
            <?php foreach ($this->datos['mensajes'] as $mensaje): ?>
                <?php
                    // Verifica si el NIF coincide con el usuario en sesión
                    $clase = ($mensaje->id_usuario == $_SESSION['usuarioSesion']['id_usuario']) ? 'text-right text-white bg-success' : 'text-left bg-danger';
                ?>
                <div class="d-flex justify-content-<?php echo ($mensaje->id_usuario == $_SESSION['usuarioSesion']['id_usuario']) ? 'end' : 'start'; ?> p-2 rounded mb-2 w-25 <?php echo $clase; ?>">
                    <?php echo $mensaje->mensaje_chat; ?>
                </div>
            <?php endforeach; ?>
        </div>



        </div>

        <form method="post">
            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <input type="text" class="form-control" id="mensaje" name="mensaje" required>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>

<?php 
    require_once RUTA_APP.'/vistas/inc/footer.php'
?>
</body>
</html>