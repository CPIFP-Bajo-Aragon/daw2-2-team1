<?php
    cabecera();
?>

 <!-- Navegación de píldoras para los pasos del formulario -->
    <ul class="nav nav-pills mb-4" id="pills-tab">
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
        <div class="tab-content">
            <div class="tab-pane fade show active" id="paso1">
                <h1 class="mb-4">Paso 1: Datos de la oferta</h1>
                <form method="post">
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
                          <input class="form-check-input" type="radio" name="tipoInmueble" id="local">
                          <label class="form-check-label" for="tipoInmueble">
                          Local
                          </label>
                    </div>
                    <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipoInmueble" id="vivienda">
                          <label class="form-check-label" for="tipoInmueble">
                          Vivienda
                          </label>
                    </div>
  
                    <h4 class="mt-5">Tipo de vivienda</h4>
                    <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipoVivienda" id="casa">
                          <label class="form-check-label" for="tipoVivienda">
                          Casa
                          </label>
                    </div>
                    <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipoVivienda" id="piso">
                          <label class="form-check-label" for="tipoVivienda">
                          Piso
                          </label>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="paso2">
                <h1 class="mb-4">Paso 2: Datos del inmueble</h1>
                <form method="post">
                    <!--Tipo de local-->
                    <div class="form-group mt-5">
                        <h4>Nombre</h4>
                        <input type="text" id="ubicacion" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="form-floating mt-5">
                        <h4>Descripción</h4>
                        <textarea class="form-control" placeholder="Otros..." id="descripcion"></textarea>
                    </div>
                      
                    <div class="input-group mt-5 ">
                        <h4>Precio </h4>
                        <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                        <span class="input-group-text">€</span>
                        <span class="input-group-text">0.00</span>
                    </div>

                    <h4 class="mt-5">Ubicación</h4>
                    <div class="form-group">
                        <label for="calle">Calle</label>
                        <input type="text" id="calle" class="form-control" placeholder="p.e: Pza.España">
                    </div>
                    <div class="form-group">
                        <label for="ubicacion">Número</label>
                        <input type="text" id="ubicacion" class="form-control" placeholder="p.e: nº1">
                    </div>
                    <div class="form-group">
                        <label for="ubicacion">Puerta</label>
                        <input type="text" id="ubicacion" class="form-control" placeholder="p.e: 2ºB">
                    </div>
                    <div class="form-group">
                        <label for="ubicacion">Localidad</label>
                        <select name="localidad" id="localidad" class="form-control">
                            <option value="null">Seleccionar localidad</option>
                        </select>
                    </div>

                    <div class="form-check">
                        <h4 class="mt-5">Estado</h4>
                        <input class="form-check-input" type="radio" name="estado" id="obraNueva">
                        <label class="form-check-label" for="estado">
                        Obra nueva
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado" id="reformar">
                        <label class="form-check-label" for="estado">
                        Para reformar
                        </label>
                    </div>
                    <!--Equipamiento, metros cuadrados y distribucion-->
                    <div class="input-group mt-5 ">
                        <h4>Metros cuadrados </h4>
                        <input type="text" class="form-control">
                        <span class="input-group-text">m²</span>
                    </div>

                    <h4 class="mt-5">Equipamiento</h4>
                    <div class="form-check">
                          <input class="form-check-input" type="radio" name="equipamiento" id="amueblado">
                          <label class="form-check-label" for="equipamiento">
                          Amueblado
                          </label>
                    </div>
                    <div class="form-check">
                          <input class="form-check-input" type="radio" name="equipamiento" id="sinAmueblar">
                          <label class="form-check-label" for="equipamiento">
                          Sin amueblar
                          </label>
                    </div>

                    <div class="form-group mt-5">
                        <h4>Características</h4>
                        <div class="form-check">
                            <input type="checkbox" id="aireAcondicionado" class="form-check-input">
                            <label class="form-check-label" for="aireAcondicionado">Aire acondicionado</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="jardin" class="form-check-input">
                            <label class="form-check-label" for="jardin">Jardín</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="piscina" class="form-check-input">
                            <label class="form-check-label" for="piscina">Piscina</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="terraza" class="form-check-input">
                            <label class="form-check-label" for="terraza">Terraza</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="garaje" class="form-check-input">
                            <label class="form-check-label" for="garaje">Garaje</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="trastero" class="form-check-input">
                            <label class="form-check-label" for="trastero">Trastero</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="electrodomesticos" class="form-check-input">
                            <label class="form-check-label" for="electrodomesticos">Electrodomésticos</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="paso3">
                <h1 class="mb-4">Paso 4: Subir imágenes</h1>
                <form method="post">
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Sube aquí las imágenes de tu inmueble</label>
                        <input class="form-control" type="file" id="formFileMultiple" multiple>
                    </div>
                </form>
            </div>
        </div>
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