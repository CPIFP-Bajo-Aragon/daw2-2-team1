<?php
    cabecera($this->datos);
?>

<?php
    foreach ($this->datos['ent'] as $entidad) {
    ?>
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title"><?php echo $entidad->nombre_entidad; ?></h5>
            </div>
            <div class="card-body">
                <p class="card-text"><strong>Sector:</strong> <?php echo $entidad->sector; ?></p>
                <p class="card-text"><strong>Dirección:</strong> <?php echo $entidad->dirección; ?></p>
                <p class="card-text"><strong>Número Telefónico:</strong> <?php echo $entidad->número_telefónico; ?></p>
                <p class="card-text"><strong>Correo:</strong> <?php echo $entidad->correo; ?></p>
                <p class="card-text"><strong>Página Web:</strong> <?php echo $entidad->página_web; ?></p>
                <p class="card-text"><strong>NIF:</strong> <?php echo $entidad->NIF; ?></p>
            </div>
        </div>
    <?php
    }
    ?>
      <a href="/EntidadesControlador/addentidades" class="btn btn-primary">
        <div>
            +
        </div>
    </a>
<?php 
    require_once RUTA_APP.'/vistas/inc/footer.php'
?>
</body>
</html>