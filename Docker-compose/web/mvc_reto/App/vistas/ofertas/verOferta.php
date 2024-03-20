
<?php
    cabecera($this->datos);
    $ubicaciones_php = ['coord' => ['lat' =>  (float)$this->datos['inmueble']->latitud_inmueble, 'lng' => (float)$this->datos['inmueble']->longitud_inmueble], /*'tipo' => $this->datos['inmueble']->tipo,*/ 'info' => $this->datos['inmueble']->descripcion_inmueble];
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
    <h1><p class="card-text mt-5"><?php echo $this->datos['inmueble']->titulo_oferta; ?></p></h1>

    <div class="col-6 mx-auto row">
        <div id="myCarousel6" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                <?php
                $primerRegistro=true;
                       foreach ($this->datos['imagen'] as $img) {
                            $carouselItem = '<div class="contenedorOferta carousel-item ' . ($primerRegistro ? 'active' : '') . '">';
                            
                            $imgElement = '<img src="' . RUTA_URL . $img->ruta_imagen . $img->id_inmueble . '/' . $img->nombre_imagen . '.' . $img->formato_imagen . '" style="width: 100%; height: 50vh; margin: 0 auto;  object-fit: contain;" alt="Imagen">';
                            
                            
                            $carouselItem .= $imgElement  . '</div>';
                            
                            echo $carouselItem;
                    
                            $primerRegistro = false;
                        
                    }
                    
                ?>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel6" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" style="background-color:black" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel6" data-bs-slide="next">
                    <span class="carousel-control-next-icon" style="background-color:black" aria-hidden="true"></span>
                </button>
        </div>
    </div>
    <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-body">
                        <div class="justify-content-between">
                            <div class="fs-1 fw-bold">
                                <p class="card-text text-primary"><?php echo htmlspecialchars($this->datos['inmueble']->precio_inm); ?>€</p>
                            </div>
                            <p class="card-text">Descripcion : <?php echo htmlspecialchars($this->datos['inmueble']->descripcion_inmueble); ?></p>

                           
                        </div>                   
                    </div>
                </div>
            </div>
    </div>


    <div class="row ">
        <div class="col-md-12 mb-3 ">
            <div class="card ">
                <div class="card-body">
                    <h3>Información de oferta</h3>
                    <div class="card-text d-flex align-items-center">
    <i class="bi bi-calendar"></i>
    <div class="ms-2 d-flex gap-5 mb-2">
        <p class="m-0"><strong>Fecha de Inicio:</strong> <?php echo htmlspecialchars($datos['oferta']->fecha_inicio_oferta); ?></p>
        <p class="m-0"><strong>Fecha de Fin:</strong> <?php echo htmlspecialchars($datos['oferta']->fecha_fin_oferta); ?></p>
    </div>
</div>
<p class="card-text"><strong>Condiciones:</strong> <?php echo htmlspecialchars($datos['oferta']->condiciones_oferta); ?></p>
<p class="card-text"><strong>Descripción:</strong> <?php echo ($datos['oferta']->descripcion_oferta); ?></p>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <h3>Características</h3>
                    <p class="card-text">Metros Cuadrados: <?php echo htmlspecialchars($this->datos['inmueble']->metros_cuadrados_inmueble); ?></p>
                    <p class="card-text">Distribucion: <?php echo htmlspecialchars($this->datos['inmueble']->distribucion_inmueble); ?></p>
                    <p class="card-text">Caracteristicas: <?php echo htmlspecialchars($this->datos['inmueble']->caracteristicas_inmueble); ?></p>
                    <p class="card-text">Direccion: <?php echo htmlspecialchars($this->datos['inmueble']->direccion_inmueble); ?></p>
                    <p class="card-text">Equipamiento: <?php echo htmlspecialchars($this->datos['inmueble']->equipamiento_inmueble); ?></p>
                    <!--<p class="card-text">Municipio: <?php echo htmlspecialchars($this->datos['inmueble']->id_municipio); ?></p> -->
                </div>
            </div>
        </div>
    </div>

   
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <h1>Localizar</h1>
                    
	                <div id="mi_mapa" class="col-6 " style=" height:50vh;">

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
<script src="<?php echo RUTA_URL ?>/js/verOferta.js"></script>
<script>
    iniciarMap();
    function iniciarMap() {
        var ubicaciones = [
            <?php echo json_encode($ubicaciones_php);?>
        ];

      

      
        // Agrega marcadores al mapa
        ubicaciones.forEach(function (ubicacion) {
            // Crea el mapa Leaflet
                let map = L.map('mi_mapa').setView([ubicacion.coord.lat, ubicacion.coord.lng], 16);

            // Agrega la capa de OpenStreetMap al mapa
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
                
                let marker = L.marker(ubicacion.coord).addTo(map).bindPopup(ubicacion.info);
        });

        // Escucha el evento de clic en el mapa
        map.on('click', onMapClick);

        // Función que se ejecuta al hacer clic en el mapa
        function onMapClick(e) {
        alert("Posición: " + e.latlng);
        }
    }
   

  // Llama a la función para inicializar el mapa cuando la página esté lista
  document.addEventListener('DOMContentLoaded', iniciarMapa);
</script>
</body>
</html>
