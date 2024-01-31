<?php
    cabecera($this->datos);
?>


 <!-- Navegación de píldoras para los pasos del formulario -->
    <ul class="nav nav-pills mb-4 mt-5" id="pills-tab">
            <li class="nav-item">
                <a class="nav-link active" href="#paso1" aria-current="page" data-toggle="pill" onclick="mostrarPaso('#paso1')">Paso 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#paso2" data-toggle="pill" onclick="mostrarPaso('#paso2')">Paso 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#paso3" data-toggle="pill" onclick="mostrarPaso('#paso3')">Paso 4</a>
            </li>
    </ul>
    <form method="post">

        <div class="tab-content">
            <div class="tab-pane fade show active" id="paso1">
                <h1 class="mb-4">Paso 1: Datos de la oferta</h1>
                    <div class="form-check">
                        <h4>Tipo de oferta</h4>
                        <input class="form-check-input" type="radio" name="tipoOferta" id="flexRadioDefault1">
                        <label class="form-check-label" for="tipoOferta">
                        Alquiler
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipoOferta" id="flexRadioDefault2">
                        <label class="form-check-label" for="tipoOferta">
                        Traspaso de empleo
                        </label>
                    </div>
                    <h4 class="mt-5">Tipo de inmueble</h4>
                    <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipoInmueble" id="local" value="Local">
                          <label class="form-check-label" for="tipoInmueble">
                          Local
                          </label>
                    </div>
                    <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipoInmueble" id="vivienda" value="Vivienda">
                          <label class="form-check-label" for="tipoInmueble">
                          Vivienda
                          </label>
                    </div>
  
                    <h4 class="mt-5">Tipo de vivienda</h4>
                    <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipoVivienda" id="casa" value="Casa">
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
            </div>
            <div class="tab-pane fade" id="paso2">
                <h1 class="mb-4">Paso 2: Datos del inmueble</h1>
                    <!--Tipo de local-->
                    <div class="form-group mt-5">
                        <h4>Nombre</h4>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="form-floating mt-5">
                        <h4>Descripción</h4>
                        <textarea class="form-control" name="descripcion" placeholder="Otros..." id="descripcion"></textarea>
                    </div>
                      
                    <div class="input-group mt-5 ">
                        <h4>Precio </h4>
                        <input type="text" class="form-control" name="precio">
                        <span class="input-group-text">€</span>
                    </div>

                    <h4 class="mt-5">Ubicación</h4>
                    <div class="form-group">
                        <label for="calle">Calle</label>
                        <input type="text" id="calle" name="calle" class="form-control" placeholder="p.e: Pza.España">
                    </div>
                    <div class="form-group">
                        <label for="numero">Número</label>
                        <input type="text" id="ubicacion" name="numero" class="form-control" placeholder="p.e: nº1">
                    </div>
                    <div class="form-group">
                        <label for="puerta">Puerta</label>
                        <input type="text" id="puerta" name="puerta" class="form-control" placeholder="p.e: 2ºB">
                    </div>
                    <div class="form-group">
                        <label for="localidad">Localidad</label>
                        <select name="localidad" id="localidad" class="form-control">
                            <option value="null">Seleccionar localidad</option>
                        </select>
                    </div>

                    <div class="form-check">
                        <h4 class="mt-5">Estado</h4>
                        <input class="form-check-input" type="radio" name="estado" id="obraNueva" value="Obra nueva">
                        <label class="form-check-label" for="estado">
                        Obra nueva
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado" id="reformar" value="Para reformar">
                        <label class="form-check-label" for="estado">
                        Para reformar
                        </label>
                    </div>
                    <!--Equipamiento, metros cuadrados y distribucion-->
                    <div class="input-group mt-5 ">
                        <h4>Metros cuadrados </h4>
                        <input type="text" name="metrosCuadrados" class="form-control">
                        <span class="input-group-text">m²</span>
                    </div>

                    <h4 class="mt-5">Equipamiento</h4>
                    <div class="form-check">
                          <input class="form-check-input" type="radio" name="equipamiento" id="amueblado" value="Amueblado">
                          <label class="form-check-label" for="equipamiento">
                          Amueblado
                          </label>
                    </div>
                    <div class="form-check">
                          <input class="form-check-input" type="radio" name="equipamiento" id="sinAmueblar" value="Sin amueblar">
                          <label class="form-check-label" for="equipamiento">
                          Sin amueblar
                          </label>
                    </div>

                    <div class="form-group mt-5 mb-3">
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
            </div>
            <div class="tab-pane fade" id="paso3">
                <h1 class="">Paso 4: Subir imágenes</h1>
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Sube aquí las imágenes de tu inmueble</label>
                        <input class="form-control" type="file" id="formFileMultiple" multiple>
                    </div>
                    <div class="mt-5">
                        <input type="hidden" name="nif" value="<?php echo $_SESSION['usuarioSesion']['NIF']?>">
                        <button class="btn btn-primary" type="submit" value="publicarOfertaInmueble" name="publicarOfertaInmueble">Publicar oferta</button>
                    </div>
            </div>
        </div>
    </form>

        <script>
            function mostrarPaso(target) {
                // Oculta todos los tabs
                document.querySelectorAll('.tab-pane').forEach(function(tab){
                    tab.classList.remove('show', 'active');
                });
        
                // Muestra el tab correspondiente
                var tabActivo = document.querySelector(target).classList.add('show', 'active');

                document.querySelectorAll('.nav-link').forEach(function(tab){
                    tab.classList.remove('active');
                });

                // Activa la píldora correspondiente
                document.querySelectorAll(`a[href="${target}"].nav-link`).forEach(a => {
                a.classList.add("active");
                a.setAttribute("aria-current", "page");
            });
            }

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <?php 
            require_once RUTA_APP.'/vistas/inc/footer.php'
        ?>
        </body>
</html>