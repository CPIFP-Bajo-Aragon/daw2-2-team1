
<?php
    cabecera($this->datos);
    $ubicaciones_php = ['coord' => ['lat' =>  (float)$this->datos['inmueble']->latitud_inmueble, 'lng' => (float)$this->datos['inmueble']->longitud_inmueble], /*'tipo' => $this->datos['inmueble']->tipo,*/ 'info' => $this->datos['inmueble']->descripcion_inmueble];
?>
<style>
    .contenedorOferta{
    max-height:50vh;
}
</style>
                               
<div class="container mt-5">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>/OfertasControlador/listarpropios">Ofertas propias</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar Oferta</li>
  </ol>
</nav>
    <h1><p class="card-text"><?php echo $this->datos['inmueble']->titulo_oferta; ?></p></h1>

    <div class="col-md-6 mx-auto">
        <div id="myCarousel6" class="carousel slide">
                <div class="carousel-inner">
                <?php
                $primerRegistro=true;
                       foreach ($this->datos['imagen'] as $img) {
                            $carouselItem = '<div class="contenedorOferta carousel-item ' . ($primerRegistro ? 'active' : '') . '">';
                            
                            $imgElement = '<img src="' . RUTA_URL . $img->ruta_imagen . $img->id_inmueble . '/' . $img->nombre_imagen . '.' . $img->formato_imagen . '" style="width: 100%; height: 50vh; margin: 0 auto; object-fit: contain;" alt="Imagen">';
                            
                            
                            $carouselItem .= $imgElement  . '</div>';
                            
                            echo $carouselItem;
                    
                            $primerRegistro = false;
                        
                    }
                    
                ?>

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
    

    <div class="row ">
    <div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <form action="/OfertasControlador/editoferta/" method="post">
            <h1>Datos de la oferta</h1>

           
                <div class="form-group col-md-3">
                    <input type="hidden" name="id_oferta"  value="<?php echo $this->datos['oferta']->id_oferta; ?>" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="descripcion_inmueble">Descripcion:</label>
                    <input type="text" id="descripcion_inmueble" name="descripcion_inmueble" value="<?php echo $this->datos['inmueble']->descripcion_inmueble; ?>" class="form-control" disabled>                    
                </div>
                <div class="form-group col-md-3">
                    <label for="titulo_oferta">Titulo de Oferta:</label>
                    <input type="text" id="titulo_oferta" name="titulo_oferta" value="<?php echo $this->datos['oferta']->titulo_oferta; ?>" class="form-control" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label for="fecha_inicio_oferta">Fecha de Inicio:</label>
                    <input type="text" id="fecha_inicio_oferta" name="fecha_inicio_oferta" value="<?php echo $datos['oferta']->fecha_inicio_oferta; ?>" class="form-control" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label for="fecha_fin_oferta">Fecha de Fin:</label>
                    <input type="text" id="fecha_fin_oferta" name="fecha_fin_oferta" value="<?php echo $datos['oferta']->fecha_fin_oferta; ?>" class="form-control" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label for="condiciones_oferta">Condiciones:</label>
                    <input type="text" id="condiciones_oferta" name="condiciones_oferta" value="<?php echo $datos['oferta']->condiciones_oferta; ?>" class="form-control" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label for="descripcion_oferta">Descripción:</label>
                    <input type="text" id="descripcion_oferta" name="descripcion_oferta" value="<?php echo $datos['oferta']->descripcion_oferta; ?>" class="form-control" disabled>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="habilitarBtnOferta">Editar</button>
                    </div>
                    <button type="submit" id="enviarOfertaBtn" name="enviarOfertaBtn" class="btn btn-primary" style="display:none;">Enviar Oferta</button>
                </div>
            </form>
        </div>
    </div>
</div>

    </div>

    </div>

    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card">
                <div class="card-body">
                    <h1>Datos del inmueble</h1>
                    <form action="/OfertasControlador/editoferta" method="post">
                        <input type="hidden" id="id_inmueble" name="id_inmueble" value="<?php echo $this->datos['inmueble']->id_inmueble; ?>" class="form-control" disabled>
                        <div class="form-group col-md-3">
                            <input type="hidden" name="id_oferta"  value="<?php echo $this->datos['oferta']->id_oferta; ?>" class="form-control">
                        </div>
                        <div>
                            <label for="metros_cuadrados_inmueble">Metros Cuadrados:</label>
                            <input type="text" id="metros_cuadrados_inmueble" name="metros_cuadrados_inmueble" value="<?php echo $this->datos['inmueble']->metros_cuadrados_inmueble; ?>" class="form-control" disabled>
                        </div>
                        <div>
                            <label for="distribucion_inmueble">Distribucion:</label>
                            <input type="text" id="distribucion_inmueble" name="distribucion_inmueble" value="<?php echo $this->datos['inmueble']->distribucion_inmueble; ?>" class="form-control" disabled>
                        </div>
                        <div>
                            <label for="precio_inmueble">Precio inmueble:</label>
                            <input type="text" id="precio_inmueble" name="precio_inmueble" value="<?php echo $this->datos['inmueble']->precio_inmueble; ?>" class="form-control" disabled>
                        </div>
                        <div>
                            <label for="caracteristicas_inmueble">Caracteristicas:</label>
                            <input type="text" id="caracteristicas_inmueble" name="caracteristicas_inmueble" value="<?php echo $this->datos['inmueble']->caracteristicas_inmueble; ?>" class="form-control" disabled>
                        </div>
                        <div>
                            <label for="direccion_inmueble">Direccion:</label>
                            <input type="text" id="direccion_inmueble" name="direccion_inmueble" value="<?php echo $this->datos['inmueble']->direccion_inmueble; ?>" class="form-control" disabled>
                        </div>
                        <div>
                            <label for="equipamiento_inmueble">Equipamiento:</label>
                            <input type="text" id="equipamiento_inmueble" name="equipamiento_inmueble" value="<?php echo $this->datos['inmueble']->equipamiento_inmueble; ?>" class="form-control" disabled>
                        </div>
                        <div>
                            <label for="id_municipio">Municipio:</label>
                            <input type="text" id="id_municipio" name="id_municipio" value="<?php echo $this->datos['inmueble']->id_municipio; ?>" class="form-control" disabled>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="habilitarBtnInmueble">Editar</button>
                            </div>
                            <button type="submit" name="enviarInmuebleBtn" id="enviarInmuebleBtn" class="btn btn-primary" style="display:none;">Enviar Inmueble</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

               
<?php 

require_once RUTA_APP.'/vistas/inc/footer.php';
?>
 </div>
<script>
       document.addEventListener('DOMContentLoaded', function () {
        var idInmuebleInput = document.getElementById('id_inmueble');
        var metrosCuadradosInmuebleInput = document.getElementById('metros_cuadrados_inmueble');
        var distribucionInmuebleInput = document.getElementById('distribucion_inmueble');
        var precioInmuebleInput = document.getElementById('precio_inmueble');
        var caracteristicasInmuebleInput = document.getElementById('caracteristicas_inmueble');
        var direccionInmuebleInput = document.getElementById('direccion_inmueble');
        var equipamientoInmuebleInput = document.getElementById('equipamiento_inmueble');
        var idMunicipioInput = document.getElementById('id_municipio');
        var habilitarBtnInmueble = document.getElementById('habilitarBtnInmueble');
        var enviarInmuebleBtn = document.getElementById('enviarInmuebleBtn');

        habilitarBtnInmueble.addEventListener('click', function () {
            toggleDisabled(idInmuebleInput);
            toggleDisabled(metrosCuadradosInmuebleInput);
            toggleDisabled(distribucionInmuebleInput);
            toggleDisabled(precioInmuebleInput);
            toggleDisabled(caracteristicasInmuebleInput);
            toggleDisabled(direccionInmuebleInput);
            toggleDisabled(equipamientoInmuebleInput);
            toggleDisabled(idMunicipioInput);

            if (idInmuebleInput.disabled) {
                habilitarBtnInmueble.innerText = 'Editar';
                enviarInmuebleBtn.style.display = 'none';
            } else {
                habilitarBtnInmueble.innerText = 'Cancelar Edición';
                enviarInmuebleBtn.style.display = 'block';
            }
        });

        var descripcionInput = document.getElementById('descripcion_inmueble');
        var tituloOfertaInput = document.getElementById('titulo_oferta');
        var fechaInicioOfertaInput = document.getElementById('fecha_inicio_oferta');
        var fechaFinOfertaInput = document.getElementById('fecha_fin_oferta');
        var condicionesOfertaInput = document.getElementById('condiciones_oferta');
        var descripcionOfertaInput = document.getElementById('descripcion_oferta');
        var habilitarBtnOferta = document.getElementById('habilitarBtnOferta');
        var enviarOfertaBtn = document.getElementById('enviarOfertaBtn');

        habilitarBtnOferta.addEventListener('click', function () {
            toggleDisabled(tituloOfertaInput);
            toggleDisabled(fechaInicioOfertaInput);
            toggleDisabled(fechaFinOfertaInput);
            toggleDisabled(condicionesOfertaInput);
            toggleDisabled(descripcionOfertaInput);
            toggleDisabled(descripcionInput);

            if (tituloOfertaInput.disabled) {
                habilitarBtnOferta.innerText = 'Editar';
                enviarOfertaBtn.style.display = 'none';
            } else {
                habilitarBtnOferta.innerText = 'Cancelar Edición';
                enviarOfertaBtn.style.display = 'block';
            }
        });

        function toggleDisabled(input) {
            if (input.disabled) {
                input.removeAttribute('disabled');
            } else {
                input.setAttribute('disabled', 'true');
            }
        }
        
    });
</script>
</body>
</html>
