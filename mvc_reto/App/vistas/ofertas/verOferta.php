<?php
    cabecera($this->datos);
    $ubicaciones_php = ['coord' => ['lat' =>  $this->datos['inmueble']->latitud, 'lng' => $this->datos['inmueble']->longitud], 'tipo' => $this->datos['inmueble']->tipo, 'info' => $this->datos['inmueble']->descripcion];
?>


<div class="container mt-4">

    <button href="<?php echo RUTA_URL ?>" class="btn btn-primary mb-4">Volver</button>
                                


    <h1><p class="card-text"><?php echo $this->datos['inmueble']->titulo; ?></p></h1>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/../images/fondo.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/../images/logover.png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="fs-1 fw-bold">
                                <p class="card-text text-primary"><?php echo $this->datos['inmueble']->precio; ?>€</p>
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

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1>Descripción</h1>
                    <p class="card-text">Descripcion: <?php echo $this->datos['inmueble']->descripción; ?></p>

                </div>
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col-md-12 ">
            <div class="card ">
                <div class="card-body">
                    <h1>Información</h1>
                    <h3>Titulo</h3>
                    <p class="card-text">Tipo de Oferta: <?php echo $datos['oferta']->tipo_oferta; ?></p>
                    <p class="card-text">Fecha de Inicio: <?php echo $datos['oferta']->fecha_inicio; ?></p>
                    <p class="card-text">Fecha de Fin: <?php echo $datos['oferta']->fecha_fin; ?></p>
                    <p class="card-text">Fecha de Publicación: <?php echo $datos['oferta']->fecha_publicacion; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1>Características</h1>
                    <p class="card-text">Codigo Inmueble: <?php echo $this->datos['inmueble']->codigo_inmueble; ?></p>
                    <p class="card-text">Metros Cuadrados: <?php echo $this->datos['inmueble']->metros_cuadrados; ?></p>
                    <p class="card-text">Distribucion: <?php echo $this->datos['inmueble']->distribucion; ?></p>
                    <p class="card-text">Caracteristicas: <?php echo $this->datos['inmueble']->características; ?></p>
                    <p class="card-text">Direccion: <?php echo $this->datos['inmueble']->direccion; ?></p>
                    <p class="card-text">Ubicacion: <?php echo $this->datos['inmueble']->ubicacion; ?></p>
                    <p class="card-text">Tipo Alquiler: <?php echo $this->datos['inmueble']->tipo_alquiler; ?></p>
                    <p class="card-text">Planta: <?php echo $this->datos['inmueble']->planta; ?></p>
                    <p class="card-text">Equipamento: <?php echo $this->datos['inmueble']->equipamiento; ?></p>
                    <p class="card-text">Etstado: <?php echo $this->datos['inmueble']->estado; ?></p>
                    <p class="card-text">Municipio: <?php echo $this->datos['inmueble']->id_municipio; ?></p>


                  
                </div>
            </div>
        </div>
    </div>

   
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1>Localizar</h1>
                    
	                <div id="map" class="vh-100 w-100-">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 pb-5">
            <div class="card">
                <div class="card-body">
                    <h1>Comentarios</h1>
                    <?php
                        if (is_array($this->datos['comentario'])) {
                            foreach ($this->datos['comentario'] as $comentario) {
                                ?>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $comentario->nombre . ' ' . $comentario->apellido; ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $comentario->fecha_valoracion; ?></h6>
                                        <p class="card-text"><?php echo $comentario->comentario; ?></p>
                                        <p class="card-text"><strong>Puntuación: </strong><?php echo $comentario->puntuacion; ?></p>
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

</div>

<?php 
require_once RUTA_APP.'/vistas/inc/footer.php';
?>
</body>
</html>