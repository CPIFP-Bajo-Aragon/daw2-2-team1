<?php
    cabecera($this->datos);
?>

<div class="container-fluid">
    <div class="row">

<!-- Menú de Filtros a la Izquierda -->
        <div class="col-md-3 mh-100" id="filters">
            <h3 class="mt-3 mb-3">Filtros</h3>
            
            <!-- Filtro de Selección -->

            <div class="mb-3">
                <label for="municipio" class="form-label">Localidad</label>
                <select class="form-select" id="municipio">
                    <?php foreach ($this->datos['municipioslistar'] as $municipio){ ?>
                    <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre ?></option>    
                    <?php }?>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="tipoInmueble" class="form-label">Tipo de Inmueble</label>
                <select class="form-select" id="tipoInmueble">
                    <option value="casa">Casa</option>
                    <option value="apartamento">Apartamento</option>
                    <option value="terreno">Terreno</option>
                </select>
            </div>

            <!-- Filtro de Rango de Precios -->
            <div class="mb-3">
                <label for="rangoPrecios" class="form-label">Rango de Precios</label>
                <input type="range" class="form-range" id="rangoPrecios">
            </div>

            <!-- Otros Filtros -->
            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" value="" id="filtro1">
                <label class="form-check-label" for="filtro1">Filtro 1</label>
            </div>
            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" value="" id="filtro2">
                <label class="form-check-label" for="filtro2">Filtro 2</label>
            </div>

            <!-- Agregar más filtros -->

        </div>

    <!-- Listado de Anuncios a la Derecha -->
        <div class="col-md-9" id="ads">
            <div class="input-group mb-5 d-flex justify-content-end">
                <select class="custom-select" id="ordenar">
                    <option selected>Ordenar por: fecha</option>
                    <option value="1">Precio: De mayor a menor</option>
                    <option value="2">Precio: De menor a mayor</option>
                </select>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">Ordenar</button>
                </div>
            </div>

            <!-- Otra Tarjeta de Anuncio -->
            <?php foreach ($this->datos['ofertaslistar'] as $oferta): ?>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <div id="myCarousel" class="carousel slide" >
                                <div class="carousel-inner">
                                        <?php
                                            $primerRegistro = true;
                                            $id_oferta=$oferta->id_oferta;
                                            $img=imagenes($id_oferta);
                                            if (!empty($img)) {
                                                foreach ($img as $img) {
                                        ?>
                                                <div class="carousel-item <?php echo ($primerRegistro) ? 'active' : ''; ?>">
                                                    <img src="<?php echo RUTA_URL ?>../images/oferta_<?php echo $id_oferta ?>/<?php echo $img ?>" class="d-block  w-100 img-fluid" alt="Imagen">   
                                                </div>
                                        <?php
                                                $primerRegistro = false;
                                                }
                                            }else {
                                                echo "No hay imágenes disponibles para esta oferta.";
                                            }
                                        ?>
                                        
                                        
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Anterior</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Siguiente</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">ID de Oferta: <?php echo $oferta->id_oferta; ?></h5>
                                <p class="card-text">Tipo de Oferta: <?php echo $oferta->tipo_oferta; ?></p>
                                <p class="card-text">Fecha de Inicio: <?php echo $oferta->fecha_inicio; ?></p>
                                <p class="card-text">Fecha de Fin: <?php echo $oferta->fecha_fin; ?></p>
                                <p class="card-text">Fecha de Publicación: <?php echo $oferta->fecha_publicacion; ?></p>
                            </div>
                            <div class="card-body">
                                <a href="<?php echo RUTA_URL ?>/InmuebleControlador/comentar/<?php echo $oferta->id_oferta; ?>"><button class="btn btn-primary">Comentar</button></a>
                                <a href="<?php echo RUTA_URL ?>/UserControlador/chat/<?php echo $oferta->NIF; ?>" class="btn btn-success">Contactar</a>  
                                <a href="<?php echo RUTA_URL ?>/OfertasControlador/verMas/<?php echo $oferta->id_oferta; ?>" class="btn btn-info">Ver mas</a>  
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- Puedes seguir añadiendo más tarjetas de anuncios -->
        </div>
    </div>
</div>

<?php 

require_once RUTA_APP.'/vistas/inc/footer.php'
?>