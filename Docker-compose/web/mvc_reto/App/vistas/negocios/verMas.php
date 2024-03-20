
<?php
    cabecera($this->datos);
?>
<style>
    .contenedorOferta{
    max-height:50vh;
}
</style>
                               

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>/OfertasControlador/mostrarOfertas">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ver mas</li>
  </ol>
</nav>
    <h1><p class="card-text"><?php echo $this->datos['oferta']->titulo_oferta; ?></p></h1>

    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="fs-1 fw-bold">
                                <p class="card-text text-primary">Traspaso: <?php echo $this->datos['oferta']->Datosnegocio->coste_traspaso_negocio; ?>€</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="" class="text-danger fs-1 pe-5"><i class="bi bi-heart"></i></a>
                                <a href="" class="text-primary fs-1 pe-5" ><i class="bi bi-share"></i></a>
                                <a href="" class="text-warning fs-1 pe-5"><i class="bi bi-star"></i></a>
                            </div>
                        </div>                   
                    </div>
                </div>
            </div>
    </div>

    <div class="row ">
        <div class="col-md-12 ">
            <div class="card ">
                <div class="card-body">
                    <h1>Información de oferta</h1>
                    <p class="card-text">Titulo de Oferta: <?php echo $datos['oferta']->titulo_oferta; ?></p>
                    <p class="card-text">Fecha de Inicio: <?php echo $datos['oferta']->fecha_inicio_oferta; ?></p>
                    <p class="card-text">Fecha de Fin: <?php echo $datos['oferta']->fecha_fin_oferta; ?></p>
                    <p class="card-text">Condiciones: <?php echo $datos['oferta']->condiciones_oferta; ?></p>
                    <p class="card-text">Descripción: <?php echo $datos['oferta']->descripcion_oferta; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1>Características del negocio</h1>
                        <h4>Por que se traspasa:</h4>
                        <p class="card-text"><?php echo $this->datos['oferta']->Datosnegocio->motivo_traspaso_negocio; ?>€</p>

                        
                        <h4>¿Cuanto te costara mensualmente Mantener el negocio?</h4>
                        <p class="card-text"><?php echo $this->datos['oferta']->Datosnegocio->coste_mensual_negocio; ?>€</p>

                        
                        <h4>Capital recomendable para tomar el negocio:</h4>
                            <p class="card-text"><?php echo $this->datos['oferta']->Datosnegocio->capital_minimo_negocio; ?>€</p>

                        
                        <h4>Descripcion del negocio:</h4>
                        <p class="card-text"><?php echo $this->datos['oferta']->Datosnegocio->descripcion_negocio; ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php 
        if(isset($this->datos['oferta']->DatosLocal)){
    ?>
            <div class="row" id="InformacionDelLocal">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h1>Detalles Local</h1>
                                
                                <h4>metros_cuadrados_inmueble:</h4>
                                    <p class="card-text"><?php echo $this->datos['oferta']->DatosLocal->metros_cuadrados_inmueble; ?>€</p>

                                
                                <h4>distribucion_inmueble</h4>
                                    <p class="card-text"><?php echo $this->datos['oferta']->DatosLocal->distribucion_inmueble; ?>€</p>

                                
                                <h4>Precio_inmueble:</h4>
                                    <p class="card-text"><?php echo $this->datos['oferta']->DatosLocal->precio_inmueble; ?>€</p>

                                
                                <h4>caracteristicas_inmueble:</h4>
                                    <p class="card-text"><?php echo $this->datos['oferta']->DatosLocal->caracteristicas_inmueble; ?></p>

                                    
                                    <p class="card-text">Direccion: <?php echo $this->datos['oferta']->DatosLocal->direccion_inmueble; ?></p>
                                    <p class="card-text">Equipamiento: <?php echo $this->datos['oferta']->DatosLocal->equipamiento_inmueble; ?></p>
                                    <p class="card-text">Municipio: <?php echo $this->datos['oferta']->DatosLocal->id_municipio; ?></p>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    ?>
    <div class="row">
        <div class="col-md-12 pb-5">
            <div class="card">
                <div class="card-body">
                    <h1>Comentarios</h1>
                    <a href="/InmuebleControlador/comentar/<?php echo $this->datos['inmueble']->id_inmueble; ?>/<?php echo $this->datos['oferta']->id_oferta?> "><button class="btn btn-primary" id="comentar">Comentar</button></a>
                    <?php
                        if (is_array($this->datos['comentario'])) {
                            foreach ($this->datos['comentario'] as $comentario) {
                                ?>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $comentario->nombre_usuario . ' ' . $comentario->apellidos_usuario; ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $comentario->fecha_valoracion_inm; ?></h6>
                                        <p class="card-text"><?php echo $comentario->comentario_inm; ?></p>
                                        <p class="card-text"><strong>Puntuación: </strong><?php echo $comentario->puntuacion_inm; ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "No hay comentarios disponibles.";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>


<?php 
require_once RUTA_APP.'/vistas/inc/footer.php';
?>
<script>

</script>
</body>
</html>
