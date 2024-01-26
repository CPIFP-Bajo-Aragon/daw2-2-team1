<?php
    cabecera();
?>

    <h2 class="mt-4 mb-4">Chat de Usuario</h2>

    <div class="mb-4">
        <?php
        foreach ($this->mensajes as $mensaje) {
            // Verifica si el NIF coincide con el usuario en sesión
            $clase = ($mensaje->NIF == $_SESSION['usuarioSesion']['NIF']) ? 'text-right bg-success' : 'text-left bg-danger';

            // Imprime el mensaje con la clase condicional
            echo '<div class="' . $clase . '">' . $mensaje->mensaje . '</div>';
        }
        ?>
    </div>


    <form method="post">
        <div class="form-group">
            <label for="mensaje">Mensaje:</label>
            <input type="text" class="form-control" id="mensaje" name="mensaje" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>




<?php 

require_once RUTA_APP.'/vistas/inc/footer.php'
?>
