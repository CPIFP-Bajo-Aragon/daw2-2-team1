<?php
    cabecera($this->datos);
?>



        <?php foreach ($this->datos['negocioslistar'] as $negocio):?>
            
                <div class="col-md-3 h-50 ">
                    <div class="card mb-4">
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
                        <button><a href="<?php echo RUTA_URL ?>/NegocioControlador/editarnegocio/<?php echo $negocio->id_negocio; ?>" class="nav-link active" aria-current="page" >Editar</a></button>
                        <a onclick="confirmarEliminacion(<?php echo $negocio->id_negocio; ?>)" class="nav-link active col-1" aria-current="page"><button>Eliminar</button></a>    
                        <button>Ver Mas</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


<?php 

require_once RUTA_APP.'/vistas/inc/footer.php'
?>

<script>
    function confirmarEliminacion(idNegocio) {
        Swal.fire({
            title: "¿Estas seguro de eliminar este negocio?",
            text: "No podras recuperarla, puedes simplemente desactivarla",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Estoy seguro!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo RUTA_URL ?>/OfertasControlador/eliminarnegocio/" + idNegocio;
            }
        });
    }
</script>
</body>
</html>