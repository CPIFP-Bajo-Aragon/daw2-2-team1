<?php
    cabecera($this->datos);
?>



    <div class="row">
        <?php foreach ($this->datos['negocioslistar'] as $negocio):?>
            
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $negocio->titulo; ?></h5>
                        <p class="card-text">Codigo de negocio: <?php echo $negocio->codigo_negocio; ?></p>
                        <p class="card-text">Motivo traspaso: <?php echo $negocio->motivo_traspaso; ?></p>
                        <p class="card-text">Coste traspaso: <?php echo $negocio->coste_traspaso; ?></p>
                        <p class="card-text">Coste mensual: <?php echo $negocio->coste_mensual; ?></p>
                        <p class="card-text">Descipcion: <?php echo $negocio->descripcion; ?></p>
                        <p class="card-text">Capital minimo: <?php echo $negocio->capital_minimo; ?></p>
                    </div>
                
                <div class="card-body">
                    <button><a href="<?php echo RUTA_URL ?>/negociosControlador<?php echo $negocio->id_negocio; ?>" class="nav-link active" aria-current="page" >Editar</a></button>
                    <button>Eliminar</button>
                    <button>Ver Mas</button>
                </div>
            </div>
            </div>
        <?php endforeach; ?>
    </div>


<?php 

require_once RUTA_APP.'/vistas/inc/footer.php'
?>
