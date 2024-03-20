<?php
    cabecera($this->datos);
?>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mb-3">
            <!-- Filtro de búsqueda -->
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar por nombre...">
                <button class="btn btn-outline-secondary" type="button">Buscar</button>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <!-- Filtro por población -->
            <select class="form-select" id="municipio" name="municipio">
                <option value="" selected>Seleccionar una opcion</option>
                <?php foreach ($this->datos['municipioslistar'] as $municipio): ?>
                    <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4 mb-5">
        <?php foreach ($datos['usuarioslistar'] as $usuario): ?>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $usuario->nombre_usuario . ' ' . $usuario->apellidos_usuario; ?></h5>
                        <p class="card-text">
                            <strong>NIF:</strong> <?php echo $usuario->nif; ?><br>
                            <strong>Correo:</strong> <?php echo $usuario->correo_usuario; ?><br>
                            <strong>Fecha Nacimiento:</strong> <?php echo $usuario->fecha_nacimiento_usuario; ?><br>
                            <strong>Teléfono:</strong> <?php echo $usuario->telefono_usuario; ?><br>
                        </p>
                        <div class="btn-group" role="group" aria-label="Opciones">
                            <a class="btn btn-primary" href="<?php echo RUTA_URL ?>/UserControlador/chat/<?php echo $usuario->id_usuario; ?>">Contactar</a>
                          
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>





<?php 
require_once RUTA_APP.'/vistas/inc/footer.php'
?>
</body>
</html>