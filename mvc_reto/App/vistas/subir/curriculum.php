<?php
    cabecera($this->datos);
?>


<div class="container mt-4">
    <h2 class="mb-4">Subir Archivos</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="archivo" name="archivo">
            <label class="custom-file-label" for="archivo">Elige Archivo</label>
        </div>
        <button type="submit" class="btn btn-primary">Subir Archivo</button>
    </form>

    <h2 class="mt-4">Archivos en la Carpeta</h2>
    <ul class="list-unstyled">
        <?php
        $carpeta_destino = 'archivos/curriculum/';
        $archivos = scandir($carpeta_destino);

        foreach ($archivos as $archivo) {
            if ($archivo != '.' && $archivo != '..' && strpos($archivo, $_SESSION['usuarioSesion']['NIF'].'_') === 0) {
                $nombreSinPrefijo = str_replace($_SESSION['usuarioSesion']['NIF'].'_', '', $archivo);
                echo "<li><a href=/DocumentosControlador/descargarCurriculum/$archivo download='$nombreSinPrefijo' class='text-dark'>$nombreSinPrefijo</a></li>";
            }
        }
        ?>
    </ul>

    <div class="button-container mt-4">
        <button onclick="location.reload()" class="btn btn-primary">Recargar Lista</button>
    </div>
</div>

<?php 
require_once RUTA_APP . '/vistas/inc/footer.php';
?>
