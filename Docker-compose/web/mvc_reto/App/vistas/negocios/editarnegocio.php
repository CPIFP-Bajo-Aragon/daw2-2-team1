
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

    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="fs-1 fw-bold">
                                <p class="card-text text-primary">Traspaso:  <input type="text" value="<?php echo $this->datos['oferta']->Datosnegocio->coste_traspaso_negocio; ?>"></p>
                            </div>
                            
                        </div>                   
                    </div>
                </div>
            </div>
    </div>

    <div class="row ">
        <div class="col-md-12 ">
            <div class="card ">
                <form action="ruta_de_tu_controlador_y_metodo" method="post">
                    <div class="card-body">
                        <h1>Información de oferta</h1>
                        <div class="form-group">
                            <label for="titulo_oferta">Titulo de Oferta:</label>
                            <input type="text" id="titulo_oferta" name="titulo_oferta" value="<?php echo $datos['oferta']->titulo_oferta; ?>" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="fecha_inicio_oferta">Fecha de Inicio:</label>
                            <input type="text" id="fecha_inicio_oferta" name="fecha_inicio_oferta" value="<?php echo $datos['oferta']->fecha_inicio_oferta; ?>" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="fecha_fin_oferta">Fecha de Fin:</label>
                            <input type="text" id="fecha_fin_oferta" name="fecha_fin_oferta" value="<?php echo $datos['oferta']->fecha_fin_oferta; ?>" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="condiciones_oferta">Condiciones:</label>
                            <input type="text" id="condiciones_oferta" name="condiciones_oferta" value="<?php echo $datos['oferta']->condiciones_oferta; ?>" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="descripcion_oferta">Descripción:</label>
                            <input type="text" id="descripcion_oferta" name="descripcion_oferta" value="<?php echo $datos['oferta']->descripcion_oferta; ?>" class="form-control" disabled>
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="habilitarBtnOferta">Editar</button>
                            </div>
                            <button type="submit" id="enviarOfertaBtn" class="btn btn-primary" style="display:none;">Enviar Oferta</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="ruta_de_tu_controlador_y_metodo" method="post">
                    <div class="card-body">
                        <h1>Características del negocio</h1>

                        <div class="form-group">
                            <h4>Por qué se traspasa:</h4>
                            <input type="text" id="motivo_traspaso_negocio" name="motivo_traspaso_negocio" value="<?php echo $this->datos['oferta']->Datosnegocio->motivo_traspaso_negocio; ?>" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <h4>¿Cuánto te costará mensualmente mantener el negocio?</h4>
                            <input type="text" id="coste_mensual_negocio" name="coste_mensual_negocio" value="<?php echo $this->datos['oferta']->Datosnegocio->coste_mensual_negocio; ?>" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <h4>Capital recomendable para tomar el negocio:</h4>
                            <input type="text" id="capital_minimo_negocio" name="capital_minimo_negocio" value="<?php echo $this->datos['oferta']->Datosnegocio->capital_minimo_negocio; ?>" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <h4>Descripción del negocio:</h4>
                            <input type="text" id="descripcion_negocio" name="descripcion_negocio" value="<?php echo $this->datos['oferta']->Datosnegocio->descripcion_negocio; ?>" class="form-control" disabled>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="habilitarBtnNegocio">Editar</button>
                            </div>
                            <button type="submit" id="enviarNegocioBtn" class="btn btn-primary" style="display:none;">Enviar Negocio</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <?php 
        if(isset($this->datos['oferta']->DatosLocal)){
    ?>
            <div class="row" id="InformacionDelLocal">
                <div class="col-md-12">
                    <div class="card">
                    <form action="ruta_de_tu_controlador_y_metodo" method="post">
                        <div class="card-body">
                            <h1>Detalles Local</h1>

                            <div class="form-group">
                                <h4>metros_cuadrados_inmueble:</h4>
                                <input type="text" id="metros_cuadrados_inmueble" name="metros_cuadrados_inmueble" value="<?php echo $this->datos['oferta']->DatosLocal->metros_cuadrados_inmueble; ?>" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                                <h4>distribucion_inmueble</h4>
                                <input type="text" id="distribucion_inmueble" name="distribucion_inmueble" value="<?php echo $this->datos['oferta']->DatosLocal->distribucion_inmueble; ?>" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                                <h4>Precio_inmueble:</h4>
                                <input type="text" id="precio_inmueble" name="precio_inmueble" value="<?php echo $this->datos['oferta']->DatosLocal->precio_inmueble; ?>" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                                <h4>caracteristicas_inmueble:</h4>
                                <input type="text" id="caracteristicas_inmueble" name="caracteristicas_inmueble" value="<?php echo $this->datos['oferta']->DatosLocal->caracteristicas_inmueble; ?>" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                                <h4>Direccion:</h4>
                                <input type="text" id="direccion_inmueble" name="direccion_inmueble" value="<?php echo $this->datos['oferta']->DatosLocal->direccion_inmueble; ?>" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                                <h4>Equipamiento:</h4>
                                <input type="text" id="equipamiento_inmueble" name="equipamiento_inmueble" value="<?php echo $this->datos['oferta']->DatosLocal->equipamiento_inmueble; ?>" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                                <h4>Municipio:</h4>
                                <input type="text" id="id_municipio" name="id_municipio" value="<?php echo $this->datos['oferta']->DatosLocal->id_municipio; ?>" class="form-control" disabled>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="habilitarBtnLocal">Editar</button>
                                </div>
                                <button type="submit" id="enviarLocalBtn" class="btn btn-primary" style="display:none;">Enviar Local</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
    <?php
        }
    ?>



<?php 
require_once RUTA_APP.'/vistas/inc/footer.php';
?>
<script>
    function toggleDisabled(input) {
        if (input.disabled) {
            input.removeAttribute('disabled');
        } else {
            input.setAttribute('disabled', 'true');
        }
    }
 document.addEventListener('DOMContentLoaded', function () {
        var tituloOfertaInput = document.getElementById('titulo_oferta');
        var fechaInicioOfertaInput = document.getElementById('fecha_inicio_oferta');
        var fechaFinOfertaInput = document.getElementById('fecha_fin_oferta');
        var condicionesOfertaInput = document.getElementById('condiciones_oferta');
        var descripcionOfertaInput = document.getElementById('descripcion_oferta');
        var habilitarBtnOferta = document.getElementById('habilitarBtnOferta');
        var enviarOfertaBtn = document.getElementById('enviarOfertaBtn');
        var metrosCuadradosInmuebleInput = document.getElementById('metros_cuadrados_inmueble');
        var distribucionInmuebleInput = document.getElementById('distribucion_inmueble');
        var precioInmuebleInput = document.getElementById('precio_inmueble');
        var caracteristicasInmuebleInput = document.getElementById('caracteristicas_inmueble');
        var direccionInmuebleInput = document.getElementById('direccion_inmueble');
        var equipamientoInmuebleInput = document.getElementById('equipamiento_inmueble');
        var idMunicipioInput = document.getElementById('id_municipio');
        var habilitarBtnLocal = document.getElementById('habilitarBtnLocal');
        var enviarLocalBtn = document.getElementById('enviarLocalBtn');
        var motivoTraspasoNegocioInput = document.getElementById('motivo_traspaso_negocio');
        var costeMensualNegocioInput = document.getElementById('coste_mensual_negocio');
        var capitalMinimoNegocioInput = document.getElementById('capital_minimo_negocio');
        var descripcionNegocioInput = document.getElementById('descripcion_negocio');
        var habilitarBtnNegocio = document.getElementById('habilitarBtnNegocio');
        var enviarNegocioBtn = document.getElementById('enviarNegocioBtn');


        habilitarBtnOferta.addEventListener('click', function () {
            toggleDisabled(tituloOfertaInput);
            toggleDisabled(fechaInicioOfertaInput);
            toggleDisabled(fechaFinOfertaInput);
            toggleDisabled(condicionesOfertaInput);
            toggleDisabled(descripcionOfertaInput);

            if (tituloOfertaInput.disabled) {
                habilitarBtnOferta.textContent = 'Editar';
                enviarOfertaBtn.style.display = 'none';
            } else {
                habilitarBtnOferta.textContent = 'Cancelar Edición';
                enviarOfertaBtn.style.display = 'block';
            }
        });

        if (habilitarBtnLocal) {
            habilitarBtnLocal.addEventListener('click', function () {
                toggleDisabled(metrosCuadradosInmuebleInput);
                toggleDisabled(distribucionInmuebleInput);
                toggleDisabled(precioInmuebleInput);
                toggleDisabled(caracteristicasInmuebleInput);
                toggleDisabled(direccionInmuebleInput);
                toggleDisabled(equipamientoInmuebleInput);
                toggleDisabled(idMunicipioInput);

                if (metrosCuadradosInmuebleInput.disabled) {
                    habilitarBtnLocal.textContent = 'Editar';
                    enviarLocalBtn.style.display = 'none';
                } else {
                    habilitarBtnLocal.textContent = 'Cancelar Edición';
                    enviarLocalBtn.style.display = 'block';
                }
            });
        }

        habilitarBtnNegocio.addEventListener('click', function () {
            toggleDisabled(motivoTraspasoNegocioInput);
            toggleDisabled(costeMensualNegocioInput);
            toggleDisabled(capitalMinimoNegocioInput);
            toggleDisabled(descripcionNegocioInput);

            if (motivoTraspasoNegocioInput.disabled) {
                habilitarBtnNegocio.textContent = 'Editar';
                enviarNegocioBtn.style.display = 'none';
            } else {
                habilitarBtnNegocio.textContent = 'Cancelar Edición';
                enviarNegocioBtn.style.display = 'block';
            }
        });
    });
</script>
</body>
</html>
