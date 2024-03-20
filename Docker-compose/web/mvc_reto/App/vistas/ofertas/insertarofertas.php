<?php
    cabecera($datos);
?>
 <!-- Navegación de píldoras para los pasos del formulario -->
    <ul class="nav nav-pills mb-5 mt-4 d-flex justify-content-center" id="pills-tab">
            <li class="nav-item">
                <a class="nav-link active" href="#paso1" aria-current="page" data-toggle="pill" onclick="mostrarPaso('#paso1')">Datos de oferta</a>
            </li>
            <li class="nav-item" id="pasoNegocio">
                <a class="nav-link" href="#paso2" data-toggle="pill" onclick="mostrarPaso('#paso2')">Datos de negocio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#paso3" data-toggle="pill" onclick="mostrarPaso('#paso3')">Datos de inmueble</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#paso4" data-toggle="pill" onclick="mostrarPaso('#paso4')">Datos del ofertante</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#paso5" data-toggle="pill" onclick="mostrarPaso('#paso5')">Subir imágenes</a>
            </li>
    </ul>
    
    <form method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

        <div class="tab-content d-flex justify-content-center">
        <div class="tab-pane fade show active" id="paso1">

<!-- DATOS DE LA OFERTA -->

<h1 class="mb-4 text-center">Datos de la oferta</h1>
<div class="row">
    <div class="col-md-6 border-end pe-md-5">

        <!-- Bloque izquierdo -->
        <div class="form-group mt-5">
            <h4>Título</h4>
            <input type="text" id="nombre_oferta" name="nombre_oferta" class="form-control" placeholder="Nombre" onblur="validar(this.id)">
            <div id="mensaje_nombre_oferta" class="mensaje"></div>
        </div>

        <div class="input-group mt-5">
            <h4>Precio: </h4>
            <br>
            <input type="text" class="form-control" name="precio_oferta" id="precio_oferta" onblur="validarPrecio()">
            <span class="input-group-text">€</span>
        </div>
        <div id="mensaje_precio" class="mensaje"></div>

        <div class="input-group mt-5 ">
            <h4>Descripción: </h4>
            <textarea class="form-control" name="descripcion_oferta" placeholder="..." id="descripcion_oferta" onblur="validar(this.id)"> </textarea>
            <div id="mensaje_descripcion_oferta" class="mensaje"></div>
        </div>

        <h4 class="mt-5">Tipo de oferta</h4>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipoOferta" id="alquiler" value="Alquiler" checked>
            <label class="form-check-label" for="tipoOferta">
                Alquiler de inmueble
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipoOferta" id="traspaso" value="Traspaso">
            <label class="form-check-label" for="tipoOferta">
                Traspaso de negocio
            </label>
        </div>
        <div id="mensaje_tipo_oferta" class="mensaje"></div>

    </div>
    <div class="col-md-6 ps-md-5">

        <!-- Bloque derecho -->
        <h4 class="mt-5">Tipo de inmueble</h4>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipoInmueble" id="local" value="Local">
            <label class="form-check-label" for="tipoInmueble">
                Local
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipoInmueble" id="vivienda" value="Vivienda" checked>
            <label class="form-check-label" for="tipoInmueble">
                Vivienda
            </label>
        </div>
        <div id="mensaje_tipo_inmueble" class="mensaje"></div>

        <div id="tipo_vivienda">
            <h4 class="mt-5">Tipo de vivienda</h4>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipoVivienda" id="casa" value="Casa" checked>
                <label class="form-check-label" for="tipoVivienda">
                    Casa
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipoVivienda" id="piso" value="Piso">
                <label class="form-check-label" for="tipoVivienda">
                    Piso
                </label>
            </div>
            <div id="mensaje_tipo_vivienda" class="mensaje"></div>
        </div>

        <h4 class="mt-5">Fecha inicio</h4>
        <div class="form-group">
            <label for="fecha">Selecciona una fecha:</label>
            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" onblur="validar(this.id)">
            <div id="mensaje_fecha_inicio" class="mensaje"></div>
        </div>
        <h4 class="mt-5">Fecha fin</h4>
        <div class="form-group">
            <label for="fecha">Selecciona una fecha:</label>
            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" onblur="validar(this.id)">
            <div id="mensaje_fecha_fin" class="mensaje"></div>
        </div>
    </div>
</div>

<!-- Botones de navegación -->
<div class="d-flex justify-content-end mb-5">
    <a class="btn btn-primary mt-5" id="DespuesDeOfertaInmueble" href="#paso2" style="display:none;" onclick="mostrarPaso('#paso2')">
        Siguiente <i class="bi bi-arrow-right"></i>
    </a>
    <a class="btn btn-primary mt-5" id="DespuesDeOfertaTraspaso" href="#paso2" onclick="mostrarPaso('#paso3')">
        Siguiente <i class="bi bi-arrow-right"></i>
    </a>
</div>
</div>

            <!--DATOS DEL NEGOCIO-->
            
            <div class="tab-pane fade" id="paso2">
                <h1 class="mb-4">Datos del negocio</h1>

                <div class="form-group mt-5">
                    <h4>Nombre</h4>
                    <input type="text" id="titulo_negocio" name="titulo_negocio" class="form-control" placeholder="Nombre" onblur="validar(this.id)">
                    <div id="mensaje_titulo_negocio" class="mensaje"></div>
                </div>
                <div class="form-floating mt-5">
                    <h4>Descripción</h4>
                    <textarea class="form-control" name="descripcion_negocio" placeholder="Otros..." id="descripcion_negocio" onblur="validar(this.id)"></textarea>
                    <div id="mensaje_descripcion_negocio" class="mensaje"></div>
                </div>
                <div class="form-floating mt-5">
                    <h4>Motivo de traspaso</h4>
                    <textarea class="form-control" name="motivo_traspaso" id="motivo_traspaso"></textarea>
                    <div id="mensaje_motivo_traspaso" class="mensaje"></div>
                </div>
                <div class="input-group mt-5 ">
                    <h4>Coste de traspaso:      </h4>
                    <input type="text" class="form-control" name="coste_traspaso" id="coste_traspaso">
                    <span class="input-group-text">€</span>
                    <div id="mensaje_coste_traspaso" class="mensaje"></div>
                </div>
                <div class="input-group mt-5 ">
                    <h4>Coste mensual </h4>
                    <input type="text" class="form-control" name="coste_mensual" id="coste_mensual">
                    <span class="input-group-text">€</span>
                    <div id="mensaje_coste_mensual" class="mensaje"></div>
                </div>
                <div class="input-group mt-5 ">
                    <h4>Capital mínimo necesario</h4>
                    <input type="text" class="form-control" name="capital_minimo" id="capital_minimo">
                    <span class="input-group-text">€</span>
                    <div id="mensaje_capital_minimo" class="mensaje"></div>
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <a class="btn btn-primary mt-5" href="#paso1" onclick="mostrarPaso('#paso1')">
                        <i class="bi bi-arrow-left"> </i>Anterior
                        </a>
                    </div>
                    <div>
                        <a class="btn btn-primary mt-5" href="#paso3" onclick="mostrarPaso('#paso3')">
                        Siguiente <i class="bi bi-arrow-right"> </i>
                        </a>
                    </div>
                </div>
                
            </div>

            <!--DATOS DEL INMUEBLE-->

            <div class="tab-pane fade" id="paso3">
                <h1 class="mb-4">Datos del inmueble</h1>
                    
                    <div class="form-floating mt-5">
                        <h4>Descripción</h4>
                        <textarea class="form-control" name="descripcion" placeholder="Otros..." id="descripcion_inmueble"></textarea>
                    </div>
                      

                    <h4 class="mt-5">Ubicación</h4>
                    <div class="form-group">
                        <label for="calle">Calle</label>
                        <input type="text" id="calle" name="calle" class="form-control" placeholder="p.e: Pza.España" onblur="validar(this.id)">
                    </div>
                    <div class="form-group">
                        <label for="numero">Número</label>
                        <input type="text" id="ubicacion" name="numero" class="form-control" placeholder="p.e: nº1" onblur="validar(this.id)">
                    </div>
                    <div class="form-group" id="form-group">
                        <label for="puerta">Puerta</label>
                        <input type="text" id="puerta" name="puerta" class="form-control" placeholder="p.e: 2ºB" onblur="validar(this.id)">
                    </div>
                    <div class="form-group">
                        <label for="municipio" >Localidad</label>
                        <select name="municipio" id="municipio" class="form-control">
                            <?php foreach ($datos['municipioslistar'] as $municipio){ ?>
                                <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>    
                            <?php }?>
                        </select>
                    </div>

                    <div class="form-floating mt-5">
                        <h4>Distribución</h4>
                        <textarea class="form-control" name="distribucion" placeholder="Otros..." id="distribucion" onblur="validar(this.id)"></textarea>
                    </div>

                    <div class="form-check">
                        <h4 class="mt-5">Estado</h4>
                        <input class="form-check-input" type="radio" name="estado" id="obraNueva" value="1" >
                        <label class="form-check-label" for="estado">
                        Obra nueva
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado" id="reformar" value="2" checked>
                        <label class="form-check-label" for="estado">
                        Para reformar
                        </label>
                    </div>

                    <div class="input-group mt-5 ">
                        <h4>Metros cuadrados</h4>
                        <input type="text" id="metros_cuadrados" name="metrosCuadrados" class="form-control" onblur="validar(this.id)">
                        <span class="input-group-text">m²</span>
                    </div>

                    <div class="form-outline mt-5" style="width: 22rem;">
                        <h4>Habitaciones</h4>
                        <input min="0" type="number" id="habitaciones" class="form-control" name="habitaciones" onblur="validar(this.id)" />
                    </div>

                    <h4 class="mt-5">Equipamiento</h4>
                    <div class="form-check">
                          <input class="form-check-input" type="radio" name="equipamiento" id="amueblado" value="Amueblado">
                          <label class="form-check-label" for="equipamiento">
                          Amueblado
                          </label>
                    </div>
                    <div class="form-check">
                          <input class="form-check-input" type="radio" name="equipamiento" id="sinAmueblar" value="Sin amueblar" checked>
                          <label class="form-check-label" for="equipamiento">
                          Sin amueblar
                          </label>
                    </div>
                    <!--Local-->
                    <div class="input-group mt-5 ">
                        <h4>Capacidad</h4>
                        <input type="text" id="capacidad" name="capacidad" class="form-control" onblur="validar(this.id)">
                    </div>
                    <div class="form-floating mt-5">
                        <h4>Recursos</h4>
                        <textarea class="form-control" name="recursos" placeholder="Otros..." id="recursos" onblur="validar(this.id)"></textarea>
                    </div>

                    <div class="form-group mt-5 mb-3" id="caracteristicas">
                        <h4>Características</h4>
                        <div class="form-check">
                            <input type="checkbox" id="aireAcondicionado" class="form-check-input" name="caracteristicas[]" value="Aire acondicionado">
                            <label class="form-check-label" for="aireAcondicionado">Aire acondicionado</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="jardin" class="form-check-input" name="caracteristicas[]" value="Jardín">
                            <label class="form-check-label" for="jardin">Jardín</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="piscina" class="form-check-input" name="caracteristicas[]" value="Piscina">
                            <label class="form-check-label" for="piscina">Piscina</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="terraza" class="form-check-input" name="caracteristicas[]" value="Terraza">
                            <label class="form-check-label" for="terraza">Terraza</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="garaje" class="form-check-input" name="caracteristicas[]" value="Garaje">
                            <label class="form-check-label" for="garaje">Garaje</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="trastero" class="form-check-input" name="caracteristicas[]" value="Trastero">
                            <label class="form-check-label" for="trastero">Trastero</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="ascensor" class="form-check-input" name="caracteristicas[]" value="Ascensor">
                            <label class="form-check-label" for="ascensor">Ascensor</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="electrodomesticos" class="form-check-input" name="caracteristicas[]" value="Electrodomésticos">
                            <label class="form-check-label" for="electrodomesticos">Electrodomésticos</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <a class="btn btn-primary mt-5" id="AntesDeOfertaInmueble" href="#paso2" style="display:none;" onclick="mostrarPaso('#paso2')">
                            <i class="bi bi-arrow-left"> </i>Anterior
                            </a>

                            <a class="btn btn-primary mt-5" id="AntesDeOfertaTraspaso" href="#paso2" onclick="mostrarPaso('#paso1')">
                            <i class="bi bi-arrow-left"> </i>Anterior
                            </a>
                        </div>
                        <div>
                            <a class="btn btn-primary mt-5" href="#paso4" onclick="mostrarPaso('#paso4')">
                            Siguiente <i class="bi bi-arrow-right"> </i>
                            </a>
                        </div>
                    </div>
            </div>

            <!--DATOS DEL OFERTANTE-->
            
            <div class="tab-pane fade" id="paso4">
                <h1 class="mb-4">Datos del ofertante</h1>
                <div class="form-group">
                    <label for="entidad" >¿Cuál va a ser la entidad ofertante?</label>
                    <select name="entidad" id="entidad" class="form-control">
                        <?php foreach ($datos['ent'] as $entidad) { ?>
                            <option name="<?php echo $entidad->id_entidad ?>" value="<?php echo $entidad->id_entidad ?>"><?php echo $entidad->nombre_entidad ?></option>    
                        <?php }?>
                        <option value="NuevaEntidad">Nueva entidad</option>
                    </select>
                </div>
                <div id="nuevoFormulario">
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <a class="btn btn-primary mt-5" href="#paso3" onclick="mostrarPaso('#paso3')">
                        <i class="bi bi-arrow-left"> </i>Anterior
                        </a>
                    </div>
                    <div>
                        <a class="btn btn-primary mt-5" href="#paso5" onclick="mostrarPaso('#paso5')">
                        Siguiente <i class="bi bi-arrow-right"> </i>
                        </a>
                    </div>
                </div>
            </div>

            <!--IMÁGENES-->

            <div class="tab-pane fade" id="paso5">
                <h1 class="">Subir imágenes</h1>
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Sube aquí las imágenes de tu inmueble</label>
                    <input class="form-control" type="file" id="formFileMultiple" name="imagenes[]" multiple>
                </div>
                <div class="mt-5">
                    <button class="btn btn-primary" id="btnEnviar" type="submit" value="publicarOfertaInmueble" name="publicarOfertaInmueble">Publicar oferta</button>
                </div>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-primary mt-5" href="#paso4" onclick="mostrarPaso('#paso4')">
                        <i class="bi bi-arrow-left">Anterior</i>
                    </a>
                </div>
            </div>
        </div>
    </form>

    <?php 
        require_once RUTA_APP.'/vistas/inc/footer.php'
    ?>
    
    <script src="<?php echo RUTA_URL ?>/js/formOferta.js"></script>


    </body>
</html>