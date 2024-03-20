<?php
    cabecera($this->datos);
?>
 <div class="col-md-3  mh-100" id="filters">
            <h3 class="mt-3 mb-3">Filtros</h3>
            
            <!-- Filtro de Selección -->

            <div class="mb-3">
                <label for="municipio" class="form-label">Localidad</label>
               
                <select name="municipio" id="municipio" class="form-control">
                    <?php foreach ($this->datos['municipioslistar'] as $municipio){ ?>
                        <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>    
                    <?php }?>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="tipoInmueble" class="form-label">Tipo de Inmueble</label>
                <select class="form-select" id="tipoInmueble" onchange="ordenarTipoInmueble(this.value)">
                    <option value="casa">Casa</option>
                    <option value="piso">Piso</option>
                    <option value="local">Local</option>
                </select>
            </div>


            <!-- Filtro de Rango de Precios pepino-->
            <div id="form-wrapper">
                <form action="/p/quote.php" method="GET">
                    <h4 id="form-title">Rango de precios</h4>
                    <div id="debt-amount-slider">
                        <input type="radio" name="debt-amount" id="1" value="1" required>
                        <label for="1" data-debt-amount="<€50k"></label>
                        <input type="radio" name="debt-amount" id="2" value="2" required>
                        <label for="2" data-debt-amount="€50k-75k"></label>
                        <input type="radio" name="debt-amount" id="3" value="3" required>
                        <label for="3" data-debt-amount="€75k-100k"></label>
                        <input type="radio" name="debt-amount" id="4" value="4" required>
                        <label for="4" data-debt-amount="€100k-200k"></label>
                        <input type="radio" name="debt-amount" id="5" value="5" required>
                        <label for="5" data-debt-amount="€200k+"></label>
                        <div id="debt-amount-pos"></div>
                    </div>
                </form>  
            </div>

            <!-- Habitaciones -->
            <div class="mt-5">
                <h4>Habitaciones</h4>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="0" name="habitaciones" onchange="ordenarHabitaciones(this.value)">
                    <label class="form-check-label" for="0">0 habitaciones (estudios)</label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="1" name="habitaciones" onchange="ordenarHabitaciones(this.value)">
                    <label class="form-check-label" for="1">1</label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="2" name="habitaciones" onchange="ordenarHabitaciones(this.value)">
                    <label class="form-check-label" for="1">2</label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="3" name="habitaciones" onchange="ordenarHabitaciones(this.value)">
                    <label class="form-check-label" for="1">3</label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="4" name="habitaciones" onchange="ordenarHabitaciones(this.value)">
                    <label class="form-check-label" for="1">4 habitaciones o más</label>
                </div>
            </div>
            <!-- Estado -->
            <div class="mt-5">
                <h4>Estado</h4>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="Obra nueva" name="estado">
                    <label class="form-check-label" for="0">Obra nueva</label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="Buen estado" name="estado">
                    <label class="form-check-label" for="1">Buen estado</label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="Para reformar" name="estado">
                    <label class="form-check-label" for="1">Para reformar</label>
                </div>
            </div>

        </div>


    <div class="col-md-9 mt-5 mb-5">
        <div class="text-center mb-3">
        <h3 >Mis Ofertas Publicadas</h3>

        </div>

        <div class="card-container row">
            <?php foreach ($this->datos['ofertaslistar'] as $oferta):?>
                <div class="col-xl-12 col-md-12 h-50">
                    <div class="card mb-4">
                        <div class="card-body">
                        <h5 class="card-title"><strong>Titulo de Oferta:</strong> <?php echo $oferta->titulo_oferta; ?></h5>
                        <p class="card-text"><strong>Precio de Oferta:</strong> <?php echo $oferta->precio_inm; ?></p>
                        <p class="card-text"><strong>Fecha de publicación de la oferta:</strong> <?php echo $oferta->fecha_publicacion_oferta; ?></p>
                        <p class="card-text"><strong>Entidad:</strong> <?php echo $oferta->nombre_entidad; ?></p>
                        <p class="card-text"><strong>Municipio:</strong> <?php echo $oferta->nombre_municipio; ?></p>

                        </div>
                    
                        <div class="card-body d-flex gap-3">
                        <form action="<?php echo RUTA_URL ?>/OfertasControlador/verusuariosinscritos" method="POST">
                            <input type="hidden" name="id_oferta" value="<?php echo $oferta->id_oferta ?>">
                            <button type="submit" class="btn btn-outline-primary"><i class="bi bi-people"></i> Ver Inscritos</button>
                        </form>
                        <form action="<?php echo RUTA_URL ?>/OfertasControlador/editoferta/" method="POST">
                            <input type="hidden" name="id_oferta" value="<?php echo $oferta->id_oferta ?>">
                            <button type="submit" class="btn btn-outline-warning"><i class="bi bi-pencil"></i>Editar</button>
                        </form>
                        <?php if($oferta->activo_oferta == 0): ?>
                            <a href="<?php echo RUTA_URL ?>/OfertasControlador/activaroferta/<?php echo $oferta->id_oferta; ?>" class="nav-link active col-1" aria-current="page"><button class="btn btn-outline-success"><i class="bi bi-check"></i></button></a>
                        <?php else: ?>
                            <a onclick="confirmarEliminacion(<?php echo $oferta->id_oferta; ?>)" class="nav-link active col-1" aria-current="page"><button class="btn btn-outline-danger"><i class="bi bi-x"></i></button></a>
                        <?php endif; ?>
                    </div>


                </div>
            <?php endforeach; ?>
        </div>
        <div class="pagination">
    <?php
    $total_ofertas = $this->datos['total_ofertas']; // Obtener el total de ofertas
    $pagina_actual = isset($_POST['pagina']) ? $_POST['pagina'] : 1;
    $total_paginas = ceil($total_ofertas / 5); // Calcular el total de páginas

    // Enlaces a cada página
    for ($i = 1; $i <= $total_paginas; $i++) {
        ?> 
        <form action="<?php echo RUTA_URL ?>/OfertasControlador/listarpropios" method="POST" class="d-inline">
            <input type="hidden" name="pagina" value="<?php echo $i ?>">
            <button type="submit" class="btn btn-outline-primary"><?php echo $i ?></button>    
        </form>
        <?php
    }
    ?>
</div>

    </div>
</div>
</div>
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