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
        </div>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <!-- Aquí se insertará el formulario -->
            </div>
        </div>
    </div>
</div>


<?php 

require_once RUTA_APP.'/vistas/inc/footer.php'

?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
            var ofertasList = <?php echo json_encode($this->datos['ofertaslistar']); ?>;
            
            document.getElementById('ordenar').addEventListener('change', function () {
                var selectedValue = this.value;
                ofertasList = sortOfertasList(ofertasList, selectedValue);
                
                 // Limpiar el contenedor antes de volver a listar las ofertas
                    clearCardContainer();

                // Volver a listar las ofertas
                    listarOfertas(ofertasList);
            });
            
            listarOfertas(ofertasList);
    });

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
                        return new Date(a.fecha_inicio) - new Date(b.fecha_inicio);
                    });
                    break;
                case '2': // Precio: De mayor a menor
                    sortedList.sort(function (a, b) {
                        return b.precio - a.precio;
                    });
                    break;
                case '3': // Precio: De menor a mayor
                    sortedList.sort(function (a, b) {
                        return a.precio - b.precio;
                    });
                    break;
            }

            return sortedList;
            console.log(sortedOfertasList);
    }

    function listarOfertas(ofertasList){
        var container = document.getElementById('card-container'); // Corrected ID


        for (var i = 0; i < ofertasList.length; i++) {
            var oferta = ofertasList[i];
            console.log(ofertasList);
            

            var card = document.createElement('div');
            card.className = 'card mb-3';

            var row = document.createElement('div');
            row.className = 'row g-0';

            var colMd4 = document.createElement('div');
            colMd4.className = 'col-md-4';

            var carousel = document.createElement('div');
            carousel.id = 'myCarousel' + i;
            carousel.className = 'carousel slide';

            var carouselInner = document.createElement('div');
            carouselInner.className = 'carousel-inner';

            var primerRegistro = true;
            var codigo_inmueble = oferta.codigo_inmueble;
            var images = <?php echo json_encode($this->datos['ofertaslistarimagenes']); ?>; // Replace with the actual function to fetch images

            if (images.length > 0) {
                for (var j = 0; j < images.length; j++) {
                    var img = images[j];

                    if(img['codigo_inmueble']==codigo_inmueble){
                        var carouselItem = document.createElement('div');
                        carouselItem.className = 'carousel-item ' + (primerRegistro ? 'active' : '');
                        
                        var imgElement = document.createElement('img');
                        imgElement.src = '<?php echo RUTA_URL ?>' + img['ruta'] + codigo_inmueble + '/' + img['nombre'] + '.' + img['formato'];
                        imgElement.className = 'd-block w-100 img-fluid';
                        imgElement.alt = 'Imagen';

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
            prevButton.setAttribute('data-bs-target', '#myCarousel' + i);
            prevButton.setAttribute('data-bs-slide', 'prev');
            // Create and append the previous button icon and visually hidden text

            var nextButton = document.createElement('button');
            nextButton.className = 'carousel-control-next';
            nextButton.type = 'button';
            nextButton.setAttribute('data-bs-target', '#myCarousel' + i);
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
            cardTitle.textContent = 'ID de Oferta: ' + oferta.precio;

            var cardText1 = document.createElement('p');
            cardText1.className = 'card-text';
            cardText1.textContent = 'Tipo de Oferta: ' + oferta.tipo_oferta;

            var cardText2 = document.createElement('p');
            cardText2.className = 'card-text';
            cardText2.textContent = 'Fecha de Inicio: ' + oferta.fecha_inicio;

            var cardText3 = document.createElement('p');
            cardText3.className = 'card-text';
            cardText3.textContent = 'Fecha de Fin: ' + oferta.fecha_fin;

            var cardText4 = document.createElement('p');
            cardText4.className = 'card-text';
            cardText4.textContent = 'Fecha de Publicación: ' + oferta.fecha_publicacion;

            cardBody.appendChild(cardTitle);
            cardBody.appendChild(cardText1);
            cardBody.appendChild(cardText2);
            cardBody.appendChild(cardText3);
            cardBody.appendChild(cardText4);

            var cardBodyButtons = document.createElement('div');
            cardBodyButtons.className = 'card-body';

            var commentButton = document.createElement('button');
            commentButton.className = 'btn btn-primary';
            commentButton.id = 'comentar';
            commentButton.textContent = 'Comentar';

            
            // Obtener el contenedor de la modal
            var modalContainer = document.getElementById('myModal');

            // Añadir evento de clic al botón
                commentButton.addEventListener('click', function() {
                     // Mostrar la modal
                            modalContainer.style.display = 'block';

                        // Crear el formulario
                        var formulario = document.createElement('div');
                        formulario.className = 'container mt-4 bg-light';

                        var titulo = document.createElement('h2');
                        titulo.className = 'mb-4';
                        titulo.textContent = 'Formulario de Valoración de Inmueble';

                        var form = document.createElement('form');
                        form.method = 'post';
                        form.action = '';

                        // Crear los elementos del formulario
                        var puntuacionLabel = document.createElement('label');
                        puntuacionLabel.textContent = 'Puntuación';
                        puntuacionLabel.setAttribute('for', 'puntuacion');

                        var puntuacionInput = document.createElement('input');
                        puntuacionInput.type = 'number';
                        puntuacionInput.className = 'form-control';
                        puntuacionInput.id = 'puntuacion';
                        puntuacionInput.name = 'puntuacion';
                        puntuacionInput.required = true;

                        // Repetir el proceso para otros elementos del formulario

                        var comentarioLabel = document.createElement('label');
                        comentarioLabel.textContent = 'Comentario';
                        comentarioLabel.setAttribute('for', 'comentario');

                        var comentarioTextarea = document.createElement('textarea');
                        comentarioTextarea.className = 'form-control';
                        comentarioTextarea.id = 'comentario';
                        comentarioTextarea.name = 'comentario';
                        comentarioTextarea.rows = '4';
                        comentarioTextarea.required = true;

                        var nifinput = document.createElement('input');
                        nifinput.type = 'hidden';
                        nifinput.className = 'form-control';
                        nifinput.id = 'nif';
                        nifinput.name = 'nif';
                        nifinput.value = <?php echo ($_SESSION['usuarioSesion']['NIF']) ?>;

                        var idinmueble = document.createElement('input');
                        idinmueble.type = 'hidden';
                        idinmueble.className = 'form-control';
                        idinmueble.id = 'nif';
                        idinmueble.name = 'nif';
                        idinmueble.value = codigo_inmueble;

                        var enviarButton = document.createElement('button');
                        enviarButton.type = 'submit';
                        enviarButton.className = 'btn btn-primary';
                        enviarButton.textContent = 'Enviar Valoración';

                        // Agregar los elementos al formulario
                        form.appendChild(puntuacionLabel);
                        form.appendChild(puntuacionInput);
                        form.appendChild(comentarioLabel);
                        form.appendChild(comentarioTextarea);
                        form.appendChild(nifinput);
                        form.appendChild(idinmueble);
                        form.appendChild(enviarButton);

                        // Agregar el formulario a la modal
                        formulario.appendChild(titulo);
                        formulario.appendChild(form);
                        modalContainer.appendChild(formulario);
                });
                


            var chatLink = document.createElement('a');
            chatLink.href = '<?php echo RUTA_URL ?>/UserControlador/chat/' + oferta.NIF;
            var chatButton = document.createElement('button');
            chatButton.className = 'btn btn-success';
            chatButton.textContent = 'Contactar';
            chatLink.appendChild(chatButton);

            var verMasLink = document.createElement('a');
            verMasLink.href = '<?php echo RUTA_URL ?>/OfertasControlador/verMas/' + oferta.id_oferta;
            var verMasButton = document.createElement('button');
            verMasButton.className = 'btn btn-info';
            verMasButton.textContent = 'Ver mas';
            verMasLink.appendChild(verMasButton);

            cardBodyButtons.appendChild(commentButton);
            cardBodyButtons.appendChild(chatLink);
            cardBodyButtons.appendChild(verMasLink);

            colMd8.appendChild(cardBody);
            colMd8.appendChild(cardBodyButtons);

            row.appendChild(colMd4);
            row.appendChild(colMd8);

            card.appendChild(row);

            // Assuming you have a container with id 'card-container', replace with your actual container id
            document.getElementById('card-container').appendChild(card);
        }
    }


</script>


</body>
</html>