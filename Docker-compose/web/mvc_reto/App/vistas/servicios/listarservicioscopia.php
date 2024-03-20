<?php
    cabecera($this->datos);
?>

    <div class="row col-2">
        <div id="SelectLabelLocalidad">
            <label for="municipio" class="form-label">Localidad</label>
            <select class="form-select" id="municipio" >
                <?php foreach ($this->datos['municipioslistar'] as $municipio){ ?>
                    <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>    
                <?php }?>
            </select>
        </div>
    </div>
    <div class="col-md-10 row" id="ContenedorServicios">
        
    </div>


<?php 
require_once RUTA_APP . '/vistas/inc/footer.php';
?>
<script>

    var map;
    var idMunicipio = 2<?php //echo json_encode($_SESSION['usuarioSesion']['id_municipio']); ?>;
    filtrar(idMunicipio);


    function filtrar(selectedMunicipioId){
       


        fetch('/ServiciosControlador/obtenerServicios/'+selectedMunicipioId)
        .then(response => response.json())
        .then(data => { // Inspecciona la estructura de los datos

            var contenedorSer = document.getElementById('ContenedorServicios');
            contenedorSer.innerHTML = '';
            
            // Iterar sobre el arreglo 'muni'
            data.muni.forEach(municipio => {
                // Accede a las propiedades específicas del objeto 'muni'

                var contenedorpueblo_mapa = document.createElement('div');
                contenedorpueblo_mapa.setAttribute("id", "pueblo_mapa");
                contenedorpueblo_mapa.setAttribute("class", "row");
            
                var contenedorpueblo = document.createElement('div');
                contenedorpueblo.classList.add("col-6", "h-25", "w-25");
                contenedorpueblo.setAttribute("id", "pueblo");

                var contenedormapa = document.createElement('div');
                contenedormapa.setAttribute("id", "mi_mapa");
                contenedormapa.setAttribute("class", "float-right h-100 w-50 ");

                var NombrePueblo = document.createElement('h1');
                NombrePueblo.textContent = municipio.nombre_municipio;

                var BotonInmueble = document.createElement('button');
                BotonInmueble.textContent = "Inmuebles en oferta";
                BotonInmueble.setAttribute("id", "estadoBtn");
                BotonInmueble.setAttribute("class", " class='btn btn-danger'");

console.log(municipio);
                // Crear el enlace (<a>) y establecer el atributo href
                var enlace = document.createElement('a');
                enlace.setAttribute("href", "/OfertasControlador/mostrarOfertas/"+municipio.id_municipio);  // Sustituye "tu_href_aqui" con el enlace deseado

                // Agregar el botón al enlace
                enlace.appendChild(BotonInmueble);
                contenedorpueblo.appendChild(NombrePueblo);
                contenedorpueblo.appendChild(enlace);
                contenedorpueblo_mapa.appendChild(contenedorpueblo);
                contenedorpueblo_mapa.appendChild(contenedormapa);
                contenedorSer.appendChild(contenedorpueblo_mapa);
                map = L.map('mi_mapa').setView([municipio.latitud_municipio, municipio.longitud_municipio], 16);

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
            
                
            });
            var contenedorservicios = document.createElement('div');
                contenedorservicios.setAttribute("id", "Todosservicios");
                contenedorservicios.setAttribute("class", "row");
            // Iterar sobre el arreglo 'servicios'
            data.servicios.forEach(servicio => {
                // Accede a las propiedades específicas del objeto 'servicio'
                
                    var contenedorservicio = document.createElement('div');
                    contenedorservicio.setAttribute("id", "servicio");
                    contenedorservicio.setAttribute("class", "col-xl-5 col-12 border m-1 p-5");

                    var nombreservicio = document.createElement('h2');
                    nombreservicio.setAttribute("class", "text-center");
                    nombreservicio.textContent = servicio.nombre_tipo_servicio;

                    contenedorservicio.appendChild(nombreservicio);

                    var contenedorempresas = document.createElement('div');
                    contenedorempresas.setAttribute("class", "d-flex flex-wrap");

                // Iterar sobre las empresas dentro de 'servicios'
                servicio.empresas.forEach(empresa => {
                    // Accede a las propiedades específicas del objeto 'empresa'
                        var botonempresas = document.createElement('button');
                        botonempresas.setAttribute("id", "empresa" + empresa.id_servicio);
                        botonempresas.setAttribute("onclick", "centrar(" + empresa.longitud_servicio + ", " + empresa.latitud_servicio + ")");
                        botonempresas.setAttribute("class", "row col-12 m-2");


                        var contenedorempresa = document.createElement('div');
                        contenedorempresa.setAttribute("id", "servicio");
                        contenedorempresa.setAttribute("class", "col-10 border m-4");
                        var nombreempresa = document.createElement('h3');
                        nombreempresa.setAttribute("class", "text-center");
                        nombreempresa.textContent = empresa.nombre_servicio;
                        nombreempresa.setAttribute("class", "overflow-hidden text-truncate");
                        

                        var descripcionempresa = document.createElement('p');
                        descripcionempresa.textContent = "Descripción: "+empresa.descripcion_servicio;
                        descripcionempresa.setAttribute("class", "overflow-hidden text-truncate");

                        var telefonoempresa = document.createElement('p');
                        telefonoempresa.textContent = "Telefono: "+ empresa.telefono_servicio;
                        telefonoempresa.setAttribute("class", "overflow-hidden text-truncate");

                        var direccionempresa = document.createElement('p');
                        direccionempresa.textContent = "Dirección: "+empresa.direccion_servicio;
                        direccionempresa.setAttribute("class", "overflow-hidden text-truncate");

                        contenedorempresa.appendChild(nombreempresa);
                        contenedorempresa.appendChild(telefonoempresa);
                        contenedorempresa.appendChild(direccionempresa);
                        contenedorempresa.appendChild(descripcionempresa);

                        botonempresas.appendChild(contenedorempresa);
                        contenedorempresas.appendChild(botonempresas);
                        
                        L.marker([empresa.latitud_servicio, empresa.longitud_servicio]).addTo(map).bindPopup("Zócalo de la Ciudad de México");


                        map.on('click', onMapClick);
                });
                contenedorservicio.appendChild(contenedorempresas);
                

                contenedorservicios.appendChild(contenedorservicio);
                
                contenedorSer.appendChild(contenedorservicios);
                
            });
        })
        .catch(error => {
            console.error('Error al actualizar el chat:', error);
        });
        fetch('/ofertasControlador/listar/' + selectedMunicipioId + '/0/0/0')
        .then(response => response.json())
        .then(data => {
            ofertasConInmueblesEnMunicipio=data;
            // Filtrar ofertas con inmuebles en el municipio objetivo
            // const ofertasConInmueblesEnMunicipio = data.filter(oferta => oferta.d_inmueble != null && oferta.id_municipio === selectedMunicipioId);
            

            const botonEstado = document.getElementById('estadoBtn');
            if (ofertasConInmueblesEnMunicipio.length > 0) {
                botonEstado.style.backgroundColor = 'green';
            } else {
                botonEstado.style.backgroundColor = 'red';
            }
        })
        .catch(error => console.error('Error al obtener datos:', error));
    }

    // Escuchar cambios en el select y filtrar automáticamente
    document.getElementById('municipio').onchange = function() {
        var selectMunicipio = document.getElementById('municipio');
        selectedMunicipioId = selectMunicipio.value;
        filtrar(selectedMunicipioId)
    };

    function onMapClick(e) {
        alert("Posición: " + e.latlng)
    }

    function centrar(longitud, latitud) {
        //alert(longitud + ", " + latitud);
        map.setView([latitud, longitud], 16);


        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);
    }

</script>
<style>

    #Todosservicios{
    }
    #pueblo_mapa{
        min-height: 45%
    }
</style>
</body>
</html>
