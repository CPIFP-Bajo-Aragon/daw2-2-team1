<?php
    cabecera($this->datos);
?>


    <div class="col-md-12">
        <div class="card-container row">
            <?php 
            foreach ($this->datos['negocioslistar'] as $negocio):?>
                
                <div class="col-xl-3 col-md-6 col-12 h-50">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title"><strong><?php echo $negocio->titulo_oferta; ?></strong></h2>
                            <p class="card-text"><strong>Motivo traspaso:</strong> <?php echo $negocio->motivo_traspaso_negocio; ?></p>
                            <p class="card-text"><strong>Coste traspaso:</strong> <?php echo $negocio->coste_traspaso_negocio; ?></p>
                            <p class="card-text"><strong>Coste mensual:</strong> <?php echo $negocio->coste_mensual_negocio; ?></p>
                            <p class="card-text"><strong>Descipcion:</strong> <?php echo $negocio->descripcion_negocio; ?></p>
                            <p class="card-text"><strong>Capital minimo:</strong> <?php echo $negocio->capital_minimo_negocio; ?></p>
                        </div>

                        <div class="card-body d-flex gap-3">
                            <form action="<?php echo RUTA_URL ?>/NegocioControlador/verusuariosinscritosNegocio" method="POST">
                                <input type="hidden" name="id_oferta" value="<?php echo $negocio->id_oferta ?>">
                                <button type="submit" class="btn btn-outline-primary"><i class="bi bi-people"></i> Ver Inscritos</button>
                            </form>
                            <form action="<?php echo RUTA_URL ?>/NegocioControlador/editarnegocio" method="POST">
                                <input type="hidden" name="id_negocio" value="<?php echo $negocio->id_oferta ?>">
                                <button type="submit" class="btn btn-outline-warning"><i class="bi bi-pencil"></i> Editar</button>
                            </form>
                             <?php if($negocio->activo_oferta == 0): ?>
                            <a href="<?php echo RUTA_URL ?>/NegocioControlador/activarnegocio/<?php echo $negocio->id_oferta; ?>" class="nav-link active col-1" aria-current="page"><button class="btn btn-outline-success"><i class="bi bi-check"></i></button></a>
                            <?php else: ?>
                                <a onclick="confirmarEliminacion(<?php echo $negocio->id_oferta; ?>)" class="nav-link active col-1" aria-current="page">
                                    <button class="btn btn-outline-danger"><i class="bi bi-x"></i> Eliminar</button>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div> 
    </div>

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
                window.location.href = "<?php echo RUTA_URL ?>/NegocioControlador/eliminarnegocio/" + idNegocio;
            }
        });
    }
</script>
</body>
</html>