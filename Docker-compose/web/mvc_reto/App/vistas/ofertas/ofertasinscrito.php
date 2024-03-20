<?php
    cabecera($this->datos);

?>


<!-- Menú de Filtros a la Izquierda -->
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
                    <input class="form-check-input" type="radio" value="0" name="habitaciones" id="habitaciones" onchange="ordenarHabitaciones(this.value)">
                    <label class="form-check-label" for="0">0 habitaciones (estudios)</label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="1" name="habitaciones" id="habitaciones" onchange="ordenarHabitaciones(this.value)">
                    <label class="form-check-label" for="1">1</label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="2" name="habitaciones" id="habitaciones" onchange="ordenarHabitaciones(this.value)">
                    <label class="form-check-label" for="1">2</label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="3" name="habitaciones" id="habitaciones" onchange="ordenarHabitaciones(this.value)">
                    <label class="form-check-label" for="1">3</label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="4" name="habitaciones" id="habitaciones" onchange="ordenarHabitaciones(this.value)">
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

    <!-- Listado de Anuncios a la Derecha -->
        <div class="col-md-9 " id="ads">
            <div class="input-group mb-5 d-flex justify-content-end">
                <h2 class="col-6">Ofertas Inscrito</h2>

                <select class="custom-select col-3" id="ordenar">
                    <option value="1">Ordenar por: fecha</option>
                    <option value="2">Precio: De mayor a menor</option>
                    <option value="3">Precio: De menor a mayor</option>
                </select>
            </div>
            <!-- Otra Tarjeta de Anuncio -->
            <div id="card-container">
                <!-- This is where the dynamically generated cards will be added -->
            </div>
            <!-- Puedes seguir añadiendo más tarjetas de anuncios -->
            <div class="col-12 mt-3">
                <button class="btn btn-primary mr-0" id="btnAnterior">Anterior</button>
                <button class="btn btn-primary ml-0" id="btnSiguiente">Siguiente</button>
            </div>
        </div>
       


<?php 

require_once RUTA_APP.'/vistas/inc/footer.php'

?>
<script src="<?php echo RUTA_URL ?>/js/ofertasFetch.js"></script>
<script>

    //municipio=document.getElementById('municipio').value;

    document.addEventListener('DOMContentLoaded', function() {
        
            var ofertasList = <?php echo json_encode($this->datos['ofertaslistar']); ?>;
            var usuarioSesion = <?php echo json_encode($this->datos['usuarioSesion']); ?>;
            var currentIndex = 0;//

            
            document.getElementById('ordenar').addEventListener('change', function () {
                var selectedValue = this.value;
                ofertasList = sortOfertasList(ofertasList, selectedValue);
                
                 // Limpiar el contenedor antes de volver a listar las ofertas
                    clearCardContainer();

                // Volver a listar las ofertas
                    listarOfertas(ofertasList, currentIndex);
                    actualizarBotones(currentIndex);//

            });
            
            listarOfertas(ofertasList, currentIndex);
            actualizarBotones(currentIndex);//

        function clearCardContainer() {
            // Limpiar el contenido del contenedor
            var container = document.getElementById('card-container');
            container.innerHTML = '';
        }

        function sortOfertasList(ofertasList, selectedValue) {
            var sortedList = ofertasList.slice();
                switch (selectedValue) {
                    case '1': // Ordenar por fecha
                        sortedList.sort(function (a, b) {
                            return new Date(a.fecha_inicio_oferta) - new Date(b.fecha_inicio_oferta);
                        });
                        break;
                    case '2': // Precio: De mayor a menor
                        sortedList.sort(function (a, b) {
                            return b.precio_inm - a.precio_inm;
                        });
                        break;
                    case '3': // Precio: De menor a mayor
                        sortedList.sort(function (a, b) {
                            return a.precio_inm - b.precio_inm;
                        });
                        break;
                }

                return sortedList;
        }

        function listarOfertas(ofertasList, currentIndex){
            var container = document.getElementById('card-container');
            container.innerHTML = '';

            ofertasList.slice(currentIndex, currentIndex + 3).forEach(function(oferta) {
    
                var card = document.createElement('div');
                card.className = 'card mb-3';

                var row = document.createElement('div');
                row.className = 'row g-0';

                var colMd4 = document.createElement('div');
                colMd4.className = 'col-md-4';

                var carousel = document.createElement('div');
                carousel.id = 'myCarousel' + oferta.id_oferta;
                carousel.className = 'carousel slide';
                carousel.setAttribute('style', ' width: 100%; height: 100%;');


                var carouselInner = document.createElement('div');
                carouselInner.className = 'carousel-inner';
                carouselInner.setAttribute('style', ' width: 100%; height: 100%;');


                var primerRegistro = true;
                var codigo_inmueble = oferta.d_inmueble;
                var images = oferta.imagenes;
                if (images.length > 0) {
                    for (var j = 0; j < images.length; j++) {
                        var img = images[j];
                        if(img['id_inmueble']==codigo_inmueble){
                            var carouselItem = document.createElement('div');
                            carouselItem.className = 'carousel-item ' + (primerRegistro ? 'active' : '');
                            carouselItem.setAttribute('style', ' width: 100%; height: 100%;');

                            
                            var imgElement = document.createElement('img');
                            // Aquí construyes la ruta de la imagen utilizando solo JavaScript
                            imgElement.src = '<?= RUTA_URL ?>' + img['ruta_imagen'] + codigo_inmueble + '/' + img['nombre_imagen'] + '.' + img['formato_imagen'];
                            imgElement.className = 'd-block w-100 img-fluid';
                            imgElement.alt = 'Imagen';
                            imgElement.setAttribute('style', ' width: 100%; height: 100%;');
                            
                            var a = document.createElement('p');
                            a.textContent="a";
                            carouselItem.appendChild(imgElement);
                            carouselInner.appendChild(carouselItem);

                            primerRegistro = false;
                        }


                    }

                } else {
                    var noImageMessage = document.createElement('p');
                    noImageMessage.textContent = 'No hay imágenes disponibles para esta oferta.';
                    colMd4.appendChild(noImageMessage);
                }

                carousel.appendChild(carouselInner);
                var prevButton = document.createElement('button');
                prevButton.className = 'carousel-control-prev';
                prevButton.type = 'button';
                prevButton.setAttribute('data-bs-target', '#myCarousel' + oferta.id_oferta);
                prevButton.setAttribute('data-bs-slide', 'prev');
                // Create and append the previous button icon and visually hidden text

                var nextButton = document.createElement('button');
                nextButton.className = 'carousel-control-next';
                nextButton.type = 'button';
                nextButton.setAttribute('data-bs-target', '#myCarousel' + oferta.id_oferta);
                nextButton.setAttribute('data-bs-slide', 'next');
                // Create and append the next button icon and visually hidden text

                carousel.appendChild(prevButton);
                carousel.appendChild(nextButton);

                colMd4.appendChild(carousel);

                var colMd8 = document.createElement('div');
                colMd8.className = 'col-md-8';

                var cardBody = document.createElement('div');
                cardBody.className = 'card-body';

                var cardTitle = document.createElement('h5');
                cardTitle.className = 'card-title';
                cardTitle.textContent = 'Titulo de Oferta: ' + oferta.titulo_oferta;

                var cardText1 = document.createElement('p');
                cardText1.className = 'card-text';
                cardText1.textContent = 'fecha inicio: ' + oferta.fecha_inicio_oferta;

                var cardText2 = document.createElement('p');
                cardText2.className = 'card-text';
                cardText2.textContent = 'Fecha de Fin: ' + oferta.fecha_fin_oferta;

                var cardText3 = document.createElement('p');
                cardText3.className = 'card-text';
                cardText3.textContent = 'Precio: ' + oferta.precio_inm;

                var cardText4 = document.createElement('p');
                cardText4.className = 'card-text';
                cardText4.textContent = 'Entidad: ' + oferta.nombre_entidad;

                var cardText5 = document.createElement('p');
                cardText5.className = 'card-text';
                cardText5.textContent = 'Municipio: ' + oferta.nombre_municipio;

                cardBody.appendChild(cardTitle);
                cardBody.appendChild(cardText1);
                cardBody.appendChild(cardText2);
                cardBody.appendChild(cardText3);
                cardBody.appendChild(cardText4);
                cardBody.appendChild(cardText5);

                var cardBodyButtons = document.createElement('div');
                cardBodyButtons.className = 'card-body';

                var InsertLink = document.createElement('a');
                InsertLink.href = '<?php echo RUTA_URL ?>/OfertasControlador/InscripccionOferta/' + oferta.id_oferta; 
                var insertButton = document.createElement('button');
                insertButton.className = 'btn btn-info';
                insertButton.id = 'Solicitar';
                insertButton.textContent = 'Solicitar';
                InsertLink.appendChild(insertButton);

                var chatLink = document.createElement('form');
                chatLink.action = '<?php echo RUTA_URL ?>/UserControlador/chat';
                chatLink.method = 'post';

                var idOfertaInputChat = document.createElement('input');
                idOfertaInputChat.type = 'hidden';
                idOfertaInputChat.name = 'recp';
                idOfertaInputChat.value = oferta.id_entidad;

                var chatButton = document.createElement('button');
                chatButton.className = 'btn btn-outline-dark btn-lg px-4 ';
                chatButton.style.marginLeft = '10px';
                chatButton.style.marginRight = '10px';
                chatButton.type = 'submit';
                chatButton.textContent = 'Contactar';

                var chatIcon = document.createElement('i');
                chatIcon.className = 'bi bi-chat'; 
                chatButton.insertBefore(chatIcon, chatButton.firstChild);

                chatLink.appendChild(idOfertaInputChat);
                chatLink.appendChild(chatButton);


                





                var eliminarinscripcion = document.createElement('a');
                eliminarinscripcion.href = '<?php echo RUTA_URL ?>/OfertasControlador/EliminarInscripccion/' + oferta.id_oferta; 
                var insertButton = document.createElement('button');
                insertButton.className = 'btn btn-outline-danger btn-lg px-4';
                var icon = document.createElement('i');
                icon.className = 'bi bi-x'; 
                insertButton.appendChild(icon); 
                insertButton.innerHTML += ' Eliminar'; 
                eliminarinscripcion.appendChild(insertButton);








                var verMasLink = document.createElement('form');
                verMasLink.action = '<?php echo RUTA_URL ?>/OfertasControlador/verMas/';
                verMasLink.method = 'post';

                var idOfertaInput = document.createElement('input');
                idOfertaInput.type = 'hidden';
                idOfertaInput.name = 'id_oferta';
                idOfertaInput.value = oferta.id_oferta;

                var verMasButton = document.createElement('button');
                verMasButton.className = 'btn btn-outline-primary btn-lg px-4';
                verMasButton.type = 'submit';
                verMasButton.textContent = 'Ver mas';
                var iconoTresPuntos = document.createElement('i');
                iconoTresPuntos.className = 'bi bi-three-dots';
                verMasButton.prepend(iconoTresPuntos);
                verMasLink.appendChild(idOfertaInput);
                verMasLink.appendChild(verMasButton); 

                var id_user = usuarioSesion.id_usuario;
                var apuntados = oferta.apuntados;
                

                if (apuntados.length > 0) {
                    for (var j = 0; j < apuntados.length; j++) {
                        var user = apuntados[j];
                        if(user['id_usuario']==id_user){
                        }else{
                            cardBodyButtons.appendChild(InsertLink);
                        }
                    }
                }else{
                            cardBodyButtons.appendChild(InsertLink);
                        }
                cardBodyButtons.appendChild(eliminarinscripcion);
                cardBodyButtons.appendChild(chatLink);
                cardBodyButtons.appendChild(verMasLink);

                colMd8.appendChild(cardBody);
                colMd8.appendChild(cardBodyButtons);

                row.appendChild(colMd4);
                row.appendChild(colMd8);

                card.appendChild(row);

                // Assuming you have a container with id 'card-container', replace with your actual container id
                document.getElementById('card-container').appendChild(card);
            })
        }
        function actualizarBotones(currentIndex) {
                document.getElementById("btnAnterior").style.display = currentIndex === 0 ? "none" : "inline-block";//
                document.getElementById("btnSiguiente").style.display = currentIndex + 3 >= ofertasList.length ? "none" : "inline-block";//
        }

        document.getElementById("btnAnterior").addEventListener("click", function() {//
            currentIndex = Math.max(0, currentIndex - 3);//
            listarOfertas(ofertasList, currentIndex);
        
            actualizarBotones(currentIndex);//
        });

        document.getElementById("btnSiguiente").addEventListener("click", function() {//
            currentIndex = Math.min(currentIndex + 3, ofertasList.length - 3);//
            listarOfertas(ofertasList, currentIndex);
        
            actualizarBotones(currentIndex);//
        });
    });
    
</script>


</body>
</html>