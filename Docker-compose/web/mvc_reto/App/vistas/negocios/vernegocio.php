<?php
    cabecera($this->datos);

?>


<!-- Menú de Filtros a la Izquierda -->
<div class="col-md-3 mt-5 mh-100" id="filters">
        <h3 class="mt-3 mb-3">Filtros</h3>
        
        <!-- Filtro de Selección -->

        <div class="mb-3 mt-5">
            <label for="municipio" class="form-label"><strong>Localidad</strong></label>
            
            <select name="municipio" id="municipio" class="form-control">
                <?php

                if($this->datos['municipioFiltro']!=0){
                    ?>
                        <option value="<?php echo $this->datos['municipioFiltro'] ?>">muni seleccionado</option>
                        <option value="0">Selecciona un municipio</option>

                    <?php
                }else{
                    ?>
                        <option value="0">Selecciona un municipio</option>
                    <?php
                }

                    foreach ($this->datos['municipioslistar'] as $municipio){ ?>

                    <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>    
                <?php }?>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="tipoInmueble" class="form-label"><strong>Tipo de Inmueble</strong></label>
            <select class="form-select" id="tipoInmueble" >
                <option value="0">Selecciona el tipo de inmueble</option>
                <option value="1">Casa</option>
                <option value="2">Piso</option>
                <option value="3">Local</option>
            </select>
        </div>


            <!-- Filtro de Rango de Precios-->

		<div class="custom-wrapper"> 

			<label for="inputPrecio"><strong>Precio</strong></label>

			<div class="price-input-container" id="inputPrecio"> 
				<div class="price-input"> 
					<div class="price-field"> 
						<span>Precio mínimo</span> 
						<input type="number"
							class="min-input"
							value="0"> 
					</div> 
					<div class="price-field"> 
						<span>Precio máximo</span> 
						<input type="number"
							class="max-input"
							value="1000"> 
					</div> 
				</div> 
				<div class="slider-container"> 
					<div class="price-slider"> 
					</div> 
				</div> 
			</div> 

			<!-- Slider -->
			<div class="range-input"> 
				<input type="range"
					class="min-range"
					min="0"
					max="1000"
					value="0"
					step="10"> 
				<input type="range"
					class="max-range"
					min="0"
					max="1000"
					value="1000"
					step="10"> 
			</div> 
        </div>
        <!-- Habitaciones -->

        <div class="mt-5" id="habitaciones">
                <label for="habitaciones"><strong>Habitaciones</strong></label>

                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="0" name="habitaciones" id="habitaciones" >
                    <label class="form-check-label" for="0">No tener en cuenta</label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="1" name="habitaciones" id="habitaciones" >
                    <label class="form-check-label" for="1">1</label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="2" name="habitaciones" id="habitaciones" >
                    <label class="form-check-label" for="1">2</label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="3" name="habitaciones" id="habitaciones" >
                    <label class="form-check-label" for="1">3</label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="4" name="habitaciones" id="habitaciones" >
                    <label class="form-check-label" for="1">4 habitaciones o más</label>
                </div>
            </div>
            <!-- Estado -->
            <div class="mt-5" id="">
            <label for="estado"><strong>Estado</strong></label>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="0" name="estado" >
                    <label class="form-check-label" for="0">No tener en cuenta</label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="1" name="estado" >
                    <label class="form-check-label" for="1">Obra nueva</label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="2" name="estado" >
                    <label class="form-check-label" for="2">Buen estado</label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="3" name="estado" >
                    <label class="form-check-label" for="3">Mal estado</label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="radio" value="4" name="estado" >
                    <label class="form-check-label" for="4">Para reformar</label>
                </div>
            </div>

        </div>

    <!-- Listado de Anuncios a la Derecha -->
    <div class="col-md-9" id="ads">
        <div class="input-group mb-5 d-flex justify-content-end">
            <h3 class="col-6 mt-4">
            <i class="bi bi-"></i> PÁGINA NEGOCIOS</h3>


            <div class="col-3 mt-4">
                <label for="ordenar" class="visually-hidden">Ordenar por:</label>
                <select class="form-select" id="ordenar">
                    <option value="0" selected>Ordenar por:</option>
                    <option value="1">Fecha</option>
                    <option value="2">Precio: De mayor a menor</option>
                    <option value="3">Precio: De menor a mayor</option>
                </select>
            </div>
        </div>

        <!-- Otra Tarjeta de Anuncio -->
        <div id="card-container">
            <!-- This is where the dynamically generated cards will be added -->
        </div>

        <!-- Puedes seguir añadiendo más tarjetas de anuncios -->
        <div class="col-12 mt-3 mb-3 d-flex justify-content-between">
            <button class="btn btn-primary me-0" id="btnAnterior">Anterior</button>
            <button class="btn btn-primary ms-0" id="btnSiguiente">Siguiente</button>
        </div>
    </div>

<?php 
require_once RUTA_APP.'/vistas/inc/footer.php'
?>


<script>
    var municipioSelect = document.getElementById('municipio');
    var municipioValor = 0;
    listarNegocios(municipioValor);


    

    document.addEventListener('DOMContentLoaded', function () {
        function actualizarFiltros() {
            municipioValor = municipioSelect.value;
            listarNegocios(municipioValor);

        }
        municipioSelect.addEventListener('change', actualizarFiltros);

    });

    function listarNegocios(municipioValor){
        fetch('/NegocioControlador/listnegocio/'+municipioValor)
        .then(response=> {
            if(!response.ok){
                throw new Error('Error al hacer el fetch' + response.status)
            }
            return response.json();
        })
        .then(data =>{

            var ofertasList = data;
            var usuarioSesion = <?php echo json_encode($this->datos['usuarioSesion']); ?>;
            var currentIndex = 0;//

            if (municipioValor != 0) {
                ofertasList = ofertasList.filter(function(oferta) {
                    return oferta.id_municipio == municipioValor;
                });
            }

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
                console.log(oferta);
                var prevButton = document.createElement('button');
                prevButton.className = 'carousel-control-prev';
                prevButton.type = 'button';
                prevButton.setAttribute('data-bs-target', '#myCarousel' + oferta.id_oferta);
                prevButton.setAttribute('data-bs-slide', 'prev');

                var nextButton = document.createElement('button');
                nextButton.className = 'carousel-control-next';
                nextButton.type = 'button';
                nextButton.setAttribute('data-bs-target', '#myCarousel' + oferta.id_oferta);
                nextButton.setAttribute('data-bs-slide', 'next');

                carousel.appendChild(prevButton);
                carousel.appendChild(nextButton);

                colMd4.appendChild(carousel);

                var colMd8 = document.createElement('div');
                colMd8.className = 'col-md-8';

                var cardBody = document.createElement('div');
                cardBody.className = 'card-body';

                var tituloContainer = document.createElement('div');
                tituloContainer.className = 'd-flex';
                var cardTitle = document.createElement('h5');
                cardTitle.className = 'card-title';
                

                cardTitle.textContent =  oferta.titulo_oferta;
                cardTitle.style.fontSize = '1.5rem'; 
                cardTitle.style.textAlign = 'center';
                var cardText4 = document.createElement('p');
                cardText4.className = 'card-text font-weight-bold position-absolute top-0.5 end-0'; 
                cardText4.innerHTML = '<strong>Entidad:</strong> ' + oferta.nombre_entidad;
                cardText4.style.marginRight = '15px';
                tituloContainer.appendChild(cardTitle);
                tituloContainer.appendChild(cardText4);
                cardBody.appendChild(tituloContainer);


                var fechaContainer = document.createElement('div');
                fechaContainer.className = 'd-flex';
                var cardText1 = document.createElement('p');
                cardText1.className = 'card-text mr-3';
                cardText1.innerHTML = '<i class="bi bi-calendar"></i> <strong>Fecha inicio:</strong> ' + oferta.fecha_inicio_oferta;
                var cardText2 = document.createElement('p');
                cardText2.className = 'card-text';
                cardText2.innerHTML = '<i class="bi bi-calendar"></i> <strong>Fecha de Fin:</strong> ' + oferta.fecha_fin_oferta;
                cardText1.style.marginRight = '30px';
                fechaContainer.appendChild(cardText1);
                fechaContainer.appendChild(cardText2);

                var descripcion = document.createElement('p');
                descripcion.className = 'card-text';
                descripcion.textContent = oferta.descripcion_oferta;

                var cardText3 = document.createElement('p');
                cardText3.className = 'card-text';
                cardText3.textContent = oferta.coste_traspaso_negocio + ' €';
                cardText3.style.fontWeight = 'bold'; 
                cardText3.style.fontSize = '1.8rem'; 
                cardText3.style.color = '#28a745'; 


                
                

                var cardText5 = document.createElement('p');
                cardText5.className = 'card-text';
                cardText5.innerHTML = '<i class="bi bi-geo-alt"></i> <strong>'+oferta.nombre_municipio+'</strong> ';
                cardText5.style.fontSize = '1.5rem'; 
                cardBody.appendChild(cardText5);
console.log(oferta);

                
                
                cardBody.appendChild(tituloContainer);
                cardBody.appendChild(cardText3);
                cardBody.appendChild(descripcion);

                cardBody.appendChild(fechaContainer);
                cardBody.appendChild(cardText5);

                var cardBodyButtons = document.createElement('div');
                cardBodyButtons.className = 'card-body d-flex';

                var InsertLink = document.createElement('a');
                InsertLink.href = '<?php echo RUTA_URL ?>/OfertasControlador/InscripccionOferta/' + oferta.id_oferta; 
                var insertButton = document.createElement('button');
                insertButton.className = 'btn btn-outline-info btn-lg px-4';
                var icon = document.createElement('i');
                icon.className = 'bi bi-hand-index-thumb'; 
                insertButton.appendChild(icon); 
                insertButton.innerHTML += ' Solicitar'; 
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

                
                var verMasLink = document.createElement('form');
                verMasLink.action = '<?php echo RUTA_URL ?>/NegocioControlador/verMas/';
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
                console.log(apuntados);
                

                if (apuntados.length > 0) {
                    console.log(id_user);
                    var userFound = false;

                    apuntados.forEach(function(user) {
                        if (user['id_usuario'] === id_user) {
                            // Código para el caso en que id_usuario sea igual a id_user
                            userFound = true;
                        }
                    });

                    if (!userFound) {
                        cardBodyButtons.appendChild(InsertLink);
                    }
                } else {
                    cardBodyButtons.appendChild(InsertLink);
                }
     

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
    }
        
           
    
    
</script>

</body>
</html>
