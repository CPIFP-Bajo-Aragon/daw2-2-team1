<?php
    cabecera($this->datos);
?>

    <div class="container col-4 mt-4">
        <h2 class="mb-4 text-center">Formulario de Valoración de Inmueble</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="rating" class="form-label">Valoración</label>
                <div id="ratingStars" class="rating"></div>
                <input type="hidden" id="ratingInput" name="rating" value="0">
            </div>

            <div class="mb-3">
                <label for="comentario" class="form-label">Comentario</label>
                <textarea class="form-control" id="comentario" name="comentario" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <input type="hidden" class="form-control" id="NIF" name="id_usuario" value="<?php echo ($_SESSION['usuarioSesion']['id_usuario']) ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Enviar Valoración</button>
        </form>
    </div>

<?php 
    require_once RUTA_APP.'/vistas/inc/footer.php';
?>
<script src="<?php echo RUTA_URL ?>/js/comentarios.js"></script>
</body>
</html>