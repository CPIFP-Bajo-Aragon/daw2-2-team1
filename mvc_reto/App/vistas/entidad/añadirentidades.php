<?php
    cabecera($this->datos);
?>

<div class="container mt-4">
        <h2>Formulario de Inserción</h2>
        <form method="post">
            <div class="mb-3">
                <label for="nombre_entidad" class="form-label">Nombre de la Entidad</label>
                <input type="text" class="form-control" id="nombre_entidad" name="nombre_entidad" required>
            </div>
            <div class="mb-3">
                <label for="sector" class="form-label">Sector</label>
                <input type="text" class="form-control" id="sector" name="sector" required>
            </div>
            <div class="mb-3">
                <label for="dirección" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="dirección" name="dirección" required>
            </div>
            <div class="mb-3">
                <label for="número_telefónico" class="form-label">Número Telefónico</label>
                <input type="tel" class="form-control" id="número_telefónico" name="número_telefónico" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="mb-3">
                <label for="página_web" class="form-label">Página Web</label>
                <input type="url" class="form-control" id="página_web" name="página_web" required>
            </div>
            <button type="submit" class="btn btn-primary">Insertar Datos</button>
        </form>
    </div>
<?php 
    require_once RUTA_APP.'/vistas/inc/footer.php'
?>