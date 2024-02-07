<?php
    cabecera($this->datos);
?>



        <?php foreach ($this->datos['negocioslistar'] as $negocio):?>
            
                <div class="col-md-3 h-50 row border">
                    <div class="card-body col-12 h-75">
                        <h5 class="card-title"><?php echo $negocio->titulo_oferta; ?></h5>
                        <p class="card-text">Titulo de negocio: <?php echo $negocio->titulo_negocio; ?></p>
                        <p class="card-text">Motivo traspaso: <?php echo $negocio->motivo_traspaso_negocio; ?></p>
                        <p class="card-text">Coste traspaso: <?php echo $negocio->coste_traspaso_negocio; ?></p>
                        <p class="card-text">Coste mensual: <?php echo $negocio->coste_mensual_negocio; ?></p>
                        <p class="card-text">Descipcion: <?php echo $negocio->descripcion_negocio; ?></p>
                        <p class="card-text">Capital minimo: <?php echo $negocio->capital_minimo_negocio; ?></p>
                    </div>
                
                <div class="card-body col-12 h-25">
                    <button><a href="<?php echo RUTA_URL ?>/NegocioControlador/editarnegocio/<?php echo $negocio->codigo_negocio; ?>" class="nav-link active" aria-current="page" >Editar</a></button>
                    <button>Eliminar</button>
                    <button>Ver Mas</button>
                </div>
            </div>
        <?php endforeach; ?>


<?php 

require_once RUTA_APP.'/vistas/inc/footer.php'
?>
</body>
</html>