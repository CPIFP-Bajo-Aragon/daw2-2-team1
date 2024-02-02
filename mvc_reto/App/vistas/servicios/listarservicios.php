<?php
    cabecera($this->datos);
?>

<div class="container mt-4 row">
    <div class="mb-3 col-1">
        <label for="municipio" class="form-label">Localidad</label>
        <select class="form-select" id="municipio" >
            <?php foreach ($this->datos['municipioslistar'] as $municipio){ ?>
                <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>    
            <?php }?>
        </select>
    </div>
    <div class="mb-3 col-11 d-flex flex-wrap" id="ContenedorServicios">
        
    </div>
</div>

<?php 
require_once RUTA_APP . '/vistas/inc/footer.php';
?>

<script>
    var infoservicios = <?php echo json_encode($this->datos['municipioslistar']); ?>;
    console.log(infoservicios);
    var idMunicipio = <?php echo json_encode($_SESSION['usuarioSesion']['id_municipio']); ?>;
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
            
                var contenedorpueblo = document.createElement('div');
                contenedorpueblo.classList.add("col-6");
                contenedorpueblo.setAttribute("id", "pueblo" + i);

                var contenedormapa = document.createElement('div');
                contenedormapa.setAttribute("id", "mi_mapa");
                contenedormapa.setAttribute("class", "col-6 w-50 h-50");

                var NombrePueblo = document.createElement('h1');
                NombrePueblo.textContent = serviciosFiltrados[i].nombre_municipio;

                contenedorpueblo.appendChild(NombrePueblo);
                contenedorSer.appendChild(contenedorpueblo);
                contenedorSer.appendChild(contenedormapa);
                
                let map = L.map('mi_mapa').setView([serviciosFiltrados[i].lat, serviciosFiltrados[i].log], 16)

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
            
                for (var j = 0; j < serviciosFiltrados[i].servicios.length; j++) {

                    var servi = serviciosFiltrados[i].servicios[j];

                    var contenedorservicio = document.createElement('div');
                    contenedorservicio.setAttribute("id", "servicio" + i+j);
                    contenedorservicio.setAttribute("class", "col-5 border m-1");

                    var nombreservicio = document.createElement('h2');
                    nombreservicio.setAttribute("class", "text-center");
                    nombreservicio.textContent = servi.nombre_servicio;

                    contenedorservicio.appendChild(nombreservicio);

                        var contenedorempresas = document.createElement('div');
                        contenedorempresas.setAttribute("class", "d-flex flex-wrap");


                    for (var h = 0; h < serviciosFiltrados[i].servicios[j].empresas.length; h++) {

                        var empresa = serviciosFiltrados[i].servicios[j].empresas[h];

                        var contenedorempresa = document.createElement('div');
                        contenedorempresa.setAttribute("id", "servicio" + i+j);
                        contenedorempresa.setAttribute("class", "col-5 border m-4");

                        var nombreempresa = document.createElement('h3');
                        nombreempresa.setAttribute("class", "text-center");
                        nombreempresa.textContent = empresa.Nombre_da_servicio;

                        var descripcionempresa = document.createElement('p');
                        descripcionempresa.textContent = "Descripción: "+empresa.descripcion;

                        var telefonoempresa = document.createElement('p');
                        telefonoempresa.textContent = "Telefono: "+empresa.telefono;

                        var direccionempresa = document.createElement('p');
                        direccionempresa.textContent = "Dirección: "+empresa.direccion;

                        contenedorempresa.appendChild(nombreempresa);
                        contenedorempresa.appendChild(telefonoempresa);
                        contenedorempresa.appendChild(direccionempresa);
                        contenedorempresa.appendChild(descripcionempresa);

                        contenedorempresas.appendChild(contenedorempresa);
                        
                        L.marker([empresa.latitud, empresa.longitud]).addTo(map).bindPopup("Zócalo de la Ciudad de México");


                        map.on('click', onMapClick);

                    }
                    contenedorservicio.appendChild(contenedorempresas);

                    contenedorSer.appendChild(contenedorservicio);

                }


            
        }
    }

function onMapClick(e) {
    alert("Posición: " + e.latlng)
}


</script>
</body>
</html>
