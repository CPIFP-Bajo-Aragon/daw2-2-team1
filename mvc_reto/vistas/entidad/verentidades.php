<?php
    cabecera($this->datos);
?>
    <div class="col-3">
        <a href="/EntidadesControlador/addentidades" class="btn btn-primary">
                + añadir nueva
        </a>
        <a href="" class="btn btn-primary">
               + Entidaddes existentes 
        </a>
        <div id="Buscador" class="mt-5">
            <label for="">Buscar</label>
            <input type="text">
        </div>
    </div>
<?php

    foreach ($this->datos['ent'] as $entidad) {
    ?>
        <div class="col-md-3 h-50 ">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title"><?php echo $entidad->nombre_entidad; ?></h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Sector:</strong> <?php echo $entidad->sector_entidad; ?></p>
                    <p class="card-text"><strong>Dirección:</strong> <?php echo $entidad->direccion_entidad; ?></p>
                    <p class="card-text"><strong>Número Telefónico:</strong> <?php echo $entidad->numero_telefono_entidad; ?></p>
                    <p class="card-text"><strong>Correo:</strong> <?php echo $entidad->correo_entidad; ?></p>
                    <p class="card-text"><strong>Página Web:</strong> <?php echo $entidad->pagina_web_entidad; ?></p>
                    <p class="card-text"><strong>NIF:</strong> <?php echo $entidad->cif_entidad; ?></p>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
     
<?php 
    require_once RUTA_APP.'/vistas/inc/footer.php'
?>
</body>
</html>