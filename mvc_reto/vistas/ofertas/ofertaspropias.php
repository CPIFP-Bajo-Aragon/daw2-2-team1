<?php
    cabecera($this->datos);
?>



        <?php foreach ($this->datos['ofertaslistar'] as $oferta):?>
            
            <div class="col-3 h-50">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">ID de Oferta: <?php echo $oferta->id_oferta; ?></h5>
                        <p class="card-text">Tipo de Oferta: <?php echo $oferta->titulo_oferta; ?></p>
                        <p class="card-text">Fecha de Inicio: <?php echo $oferta->fecha_inicio_oferta; ?></p>
                        <p class="card-text">Fecha de Fin: <?php echo $oferta->fecha_fin_oferta; ?></p>
                        <p class="card-text">Condiciones: <?php echo $oferta->condiciones_oferta; ?></p>
                        <p class="card-text">Fecha de Publicación: <?php echo $oferta->fecha_publicacion_oferta; ?></p>
                        <p class="card-text">Entidad: <?php echo $oferta->id_entidad; ?></p>
                    </div>
                
                <div class="card-body">
                <a href="<?php echo RUTA_URL ?>/OfertasControlador/editoferta/<?php echo $oferta->id_oferta; ?>" class="nav-link active col-1" aria-current="page" ><button>Editar</button></a>
                <a onclick="confirmarEliminacion(<?php echo $oferta->id_oferta; ?>)" class="nav-link active col-1" aria-current="page"><button>Eliminar</button></a>
            </div>
            </div>
            </div>
        <?php endforeach; ?>
    

<?php 

require_once RUTA_APP.'/vistas/inc/footer.php'
?>
<script>
function confirmarEliminacion(idOferta) {
    Swal.fire({
        title: "¿Estas seguro de eliminar esta oferta?",
        text: "No podras recuperarla, puedes simplemente desactivarla",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Estoy seguro!"
    }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "<?php echo RUTA_URL ?>/OfertasControlador/eliminaroferta/" + idOferta;
        }
    });
}
</script>
</body>
</html>