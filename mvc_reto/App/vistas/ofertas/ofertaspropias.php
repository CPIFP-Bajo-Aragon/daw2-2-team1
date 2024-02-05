<?php
    cabecera($this->datos);
?>



    <div class="row">
        <?php foreach ($this->datos['ofertaslistar'] as $oferta):?>
            
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">ID de Oferta: <?php echo $oferta->id_oferta; ?></h5>
                        <p class="card-text">Tipo de Oferta: <?php echo $oferta->tipo_oferta; ?></p>
                        <p class="card-text">Fecha de Inicio: <?php echo $oferta->fecha_inicio; ?></p>
                        <p class="card-text">Fecha de Fin: <?php echo $oferta->fecha_fin; ?></p>
                        <p class="card-text">Condiciones: <?php echo $oferta->condiciones; ?></p>
                        <p class="card-text">Fecha de Publicación: <?php echo $oferta->fecha_publicacion; ?></p>
                        <p class="card-text">NIF: <?php echo $oferta->NIF; ?></p>
                        <p class="card-text">ID de Entidad: <?php echo $oferta->id_entidad; ?></p>
                    </div>
                
                <div class="card-body">
                <a href="<?php echo RUTA_URL ?>/OfertasControlador/editoferta/<?php echo $oferta->id_oferta; ?>" class="nav-link active col-1" aria-current="page" ><button>Editar</button></a>
                <a href="<?php echo RUTA_URL ?>/OfertasControlador/eliminaroferta/<?php echo $oferta->id_oferta; ?>" class="nav-link active col-1" aria-current="page" ><button>Eliminar</button></a>
                </div>
            </div>
            </div>
        <?php endforeach; ?>
    </div>


<?php 

require_once RUTA_APP.'/vistas/inc/footer.php'
?>
</body>
</html>