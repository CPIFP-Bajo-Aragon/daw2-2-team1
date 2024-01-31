<?php
    cabecera($this->datos);
?>

<div class="container mt-4">
    <h2 class="mb-4">Formulario de Valoración de Negocio</h2>
    <form method="post" action=""> <!-- Asegúrate de ajustar la acción al script que manejará el envío del formulario -->

        <div class="mb-3">
            <label for="puntuacion" class="form-label">Puntuación</label>
            <input type="number" class="form-control" id="puntuacion" name="puntuacion" required>
        </div>

        <div class="mb-3">
            <label for="comentario" class="form-label">Comentario</label>
            <textarea class="form-control" id="comentario" name="comentario" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <input type="hidden" class="form-control" id="NIF" name="NIF" value="<?php echo ($_SESSION['usuarioSesion']['NIF']) ?>" required>
        </div>

        <div class="mb-3">
            <input type="hidden" class="form-control" id="codigo_negocio" name="codigo_negocio" value=" <?php  print_r($this->datos['negocio']['id']);?>" >
        </div>

        <button type="submit" class="btn btn-primary">Enviar Valoración</button>
    </form>
</div>

<?php 
    require_once RUTA_APP.'/vistas/inc/footer.php'
?>
</body>
</html>