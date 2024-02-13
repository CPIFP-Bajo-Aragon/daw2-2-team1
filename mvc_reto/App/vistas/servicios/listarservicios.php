<?php
    cabecera($this->datos);
?>

<div class="container mt-4 row min-vh-100 min-vw-100">
    <div class="mb-3 col-1">
        <label for="municipio" class="form-label">Localidad</label>
        <select class="form-select" id="municipio" >
            <?php foreach ($this->datos['municipioslistar'] as $municipio){ ?>
                <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>    
            <?php }?>
        </select>
    </div>
    <div class="mb-3 col-11" id="ContenedorServicios">
        
    </div>
</div>


<?php 
require_once RUTA_APP . '/vistas/inc/footer.php';
?>
<script>
    var infoservicios = <?php echo json_encode($this->datos['municipioslistar']); ?>;
    var map;
    var idMunicipio = 2<?php //echo json_encode($_SESSION['usuarioSesion']['id_municipio']); ?>;
    filtrar(idMunicipio);

    // Escuchar cambios en el select y filtrar automáticamente
    document.getElementById('municipio').onchange = function() {
        var selectMunicipio = document.getElementById('municipio');
        selectedMunicipioId = selectMunicipio.value;
        filtrar(selectedMunicipioId)
    };

    function filtrar(selectedMunicipioId){
        // Filtrar los servicios por id_municipio seleccionado
        var serviciosFiltrados = infoservicios.filter(function (servicio) {
            return servicio.id_municipio == selectedMunicipioId;
        });

        // Limpiar el contenedor antes de agregar nuevos elementos
        var contenedorSer = document.getElementById('ContenedorServicios');
        contenedorSer.innerHTML = '';

        // Añadir elementos filtrados al contenedor
        for (var i = 0; i < serviciosFiltrados.length; i++) {
                var contenedorpueblo_mapa = document.createElement('div');
                contenedorpueblo_mapa.setAttribute("id", "pueblo_mapa");
                contenedorpueblo_mapa.setAttribute("class", "row col-12 h-50");
            
                var contenedorpueblo = document.createElement('div');
                contenedorpueblo.classList.add("col-6", "h-25", "w-25");
                contenedorpueblo.setAttribute("id", "pueblo" + i);

                var contenedormapa = document.createElement('div');
                contenedormapa.setAttribute("id", "mi_mapa");
                contenedormapa.setAttribute("class", "float-right h-100 w-50 ");

                var NombrePueblo = document.createElement('h1');
                NombrePueblo.textContent = serviciosFiltrados[i].nombre_municipio;

                contenedorpueblo.appendChild(NombrePueblo);
                contenedorpueblo_mapa.appendChild(contenedorpueblo);
                contenedorpueblo_mapa.appendChild(contenedormapa);
                contenedorSer.appendChild(contenedorpueblo_mapa);
                map = L.map('mi_mapa').setView([infoservicios[0].latitud_municipio, infoservicios[0].longitud_municipio], 16);

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
            
                var contenedorservicios = document.createElement('div');
                contenedorservicios.setAttribute("id", "Todosservicios");
                contenedorservicios.setAttribute("class", "row col-12 m-5 h-50");
                for (var j = 0; j < serviciosFiltrados[i].servicios.length; j++) {

                    var servi = serviciosFiltrados[i].servicios[j];
                    var contenedorservicio = document.createElement('div');
                    contenedorservicio.setAttribute("id", "servicio" + i+j);
                    contenedorservicio.setAttribute("class", "col-5 border m-1 p-5");

                    var nombreservicio = document.createElement('h2');
                    nombreservicio.setAttribute("class", "text-center");
                    nombreservicio.textContent = servi.nombre_tipo_servicio;

                    contenedorservicio.appendChild(nombreservicio);

                    var contenedorempresas = document.createElement('div');
                    contenedorempresas.setAttribute("class", "d-flex flex-wrap");


                    for (var h = 0; h < serviciosFiltrados[i].servicios[j].empresas.length; h++) {

                        var empresa = serviciosFiltrados[i].servicios[j].empresas[h];
                        
                        var botonempresas = document.createElement('button');
                        botonempresas.setAttribute("id", "empresa" + empresa.id_servicio);
                        botonempresas.setAttribute("onclick", "centrar(" + empresa.longitud_servicio + ", " + empresa.latitud_servicio + ")");

                        var contenedorempresa = document.createElement('div');
                        contenedorempresa.setAttribute("id", "servicio" + i+j);
                        contenedorempresa.setAttribute("class", "col-5 border m-4");
                        console.log(empresa);
                        var nombreempresa = document.createElement('h3');
                        nombreempresa.setAttribute("class", "text-center");
                        nombreempresa.textContent = empresa.nombre_servicio;

                        var descripcionempresa = document.createElement('p');
                        descripcionempresa.textContent = "Descripción: "+empresa.descripcion_servicio;

                        var telefonoempresa = document.createElement('p');
                        telefonoempresa.textContent = "Telefono: "+ empresa.telefono_servicio;

                        var direccionempresa = document.createElement('p');
                        direccionempresa.textContent = "Dirección: "+empresa.direccion_servicio;

                        contenedorempresa.appendChild(nombreempresa);
                        contenedorempresa.appendChild(telefonoempresa);
                        contenedorempresa.appendChild(direccionempresa);
                        contenedorempresa.appendChild(descripcionempresa);

                        botonempresas.appendChild(contenedorempresa);
                        contenedorempresas.appendChild(botonempresas);
                        
                        L.marker([empresa.latitud_servicio, empresa.longitud_servicio]).addTo(map).bindPopup("Zócalo de la Ciudad de México");


                        map.on('click', onMapClick);

                    }
                    contenedorservicio.appendChild(contenedorempresas);
                    contenedorservicios.appendChild(contenedorservicio);
                    contenedorSer.appendChild(contenedorservicios);


                }


            
        }
    }

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

</body>
</html>
