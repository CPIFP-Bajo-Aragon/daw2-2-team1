
<?php
    cabecera($this->datos);
    $ubicaciones_php = ['coord' => ['lat' =>  (float)$this->datos['inmueble']->latitud_inmueble, 'lng' => (float)$this->datos['inmueble']->longitud_inmueble], /*'tipo' => $this->datos['inmueble']->tipo,*/ 'info' => $this->datos['inmueble']->descripcion_inmueble];
?>

   <button href="<?php echo RUTA_URL ?>" class="btn btn-primary mb-4">Volver</button>
                                


    <h1><p class="card-text"><?php echo $this->datos['inmueble']->titulo_oferta; ?></p></h1>

    <div class="col-12 row">
        <div id="myCarousel6" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="/../images/inmueble_1/fondo.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/../images/inmueble_1/casa2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../images/inmueble_1/dormir.jpg" alt="Third slide"">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel6" data-bs-slide="prev"></button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel6" data-bs-slide="next"></button>
        </div>
    </div>
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="fs-1 fw-bold">
                                <p class="card-text text-primary"><?php echo $this->datos['inmueble']->precio_inm; ?>€</p>
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
                    <p class="card-text">Descripcion : <?php echo $this->datos['inmueble']->descripcion_inmueble; ?></p>

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
                    <h1>Características</h1>
                    <p class="card-text">Codigo Inmueble: <?php echo $this->datos['inmueble']->id_inmueble; ?></p>
                    <p class="card-text">Metros Cuadrados: <?php echo $this->datos['inmueble']->metros_cuadrados_inmueble; ?></p>
                    <p class="card-text">Distribucion: <?php echo $this->datos['inmueble']->distribucion_inmueble; ?></p>
                    <p class="card-text">Precio inmueble: <?php echo $this->datos['inmueble']->precio_inmueble; ?></p>
                    <p class="card-text">Caracteristicas: <?php echo $this->datos['inmueble']->caracteristicas_inmueble; ?></p>
                    <p class="card-text">Direccion: <?php echo $this->datos['inmueble']->direccion_inmueble; ?></p>
                    <p class="card-text">Equipamiento: <?php echo $this->datos['inmueble']->equipamiento_inmueble; ?></p>
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
                    
	                <div id="mi_mapa" class="vh-100 w-100-">

                    </div>
                    <div id="info-panel">

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


<?php 
require_once RUTA_APP.'/vistas/inc/footer.php';
?>
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
