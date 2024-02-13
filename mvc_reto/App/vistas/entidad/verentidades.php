<?php
    cabecera($this->datos);
?>

<?php
    foreach ($this->datos['ent'] as $entidad) {
    ?>
        <div class="card mt-4 col-4">
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
    <?php
    }
    ?>
     <div>
        <a href="/EntidadesControlador/addentidades" class="btn btn-primary">
                +
        </a>
    </div>
<?php 
    require_once RUTA_APP.'/vistas/inc/footer.php'
?>
</body>
</html>