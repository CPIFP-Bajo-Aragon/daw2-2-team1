<?php
    cabecera($this->datos);
    //Agregar al controlador
    //$this->datos['tipoServicioListar'] = $this->servicios->listarServicio();
?>
<div class="row">
<div class="col-2 mt-5">
    
        <h4>Filtros</h4>
        <div id="SelectLabelLocalidad">
            <label for="municipio" class="form-label">Localidad</label>
            <select class="form-select" id="municipio" >
                <option value="0">Selecciona un municipio</option>
                <?php foreach ($this->datos['municipioslistar'] as $municipio){ ?>
                    <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>    
                <?php }?>
            </select>
        </div>
        <div id="SelectLabelTipo">
            <label for="servicio" class="form-label">Tipo de servicio</label>
            <select class="form-select" id="servicio">
                <option value="0">Selecciona un tipo de servicio</option>
                <?php foreach ($this->datos['tipoServicioListar'] as $tipo_servicio){ ?>
                    <option value="<?php echo $tipo_servicio->id_tipo_servicio ?>"><?php echo $tipo_servicio->nombre_tipo_servicio?></option>    
                <?php }?>
            </select>
        </div>
 
</div>

<div class="col-10">
    <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Servicios</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Mapa</button>
        </li>
    </ul>
    <input type="text" id="buscador" class="mt-5 mb-5" placeholder="Buscar servicio...">

    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div id="table"></div>
        </div>

        <div class="tab-pane fade mb-5 show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            <!--Mapa-->
                <div id="mi_mapa" class="" style="width: 100%; height: 400px; ">
            
            </div>
        </div>
    </div>
</div>
</div>
<?php 
require_once RUTA_APP . '/vistas/inc/footer.php';
?>

<script>
    let map;
    var idMunicipio = 0;
    var tipoServicio = 0;
    var buscador="";

document.addEventListener('DOMContentLoaded', function () {

// Función para manejar cambios en los filtros
    function actualizarFiltros() {
        selectedMunicipioId = selectMunicipio.value;

        tipoServicio = selectTipoServicio.value;

        busqueda = buscador.value;

        filtrar(selectedMunicipioId, tipoServicio, busqueda);
    }

    // Escuchar cambios en el select y filtrar automáticamente
        var selectMunicipio = document.getElementById('municipio');
        selectMunicipio.addEventListener('change', actualizarFiltros);

        var selectTipoServicio = document.getElementById('servicio');
        selectTipoServicio.addEventListener('change', actualizarFiltros);  

        var buscador = document.getElementById('buscador');
        buscador.addEventListener('input', actualizarFiltros);
    
});


    filtrar(idMunicipio, tipoServicio, buscador);

    function filtrar(selectedMunicipioId, tipoServicio, buscador){
        console.log(selectedMunicipioId);
        console.log(tipoServicio);
        console.log(buscador);

        fetch('/InvitadoControlador/obtenerServicios/'+selectedMunicipioId+'/'+tipoServicio+'/'+buscador)
        .then(response => {
            if(!response.ok){
                throw new Error('Error al hacer el fetch' + response.status)
            }
            return response.json();})
        .then(data => { 
            // Crear la tabla
            var table = document.createElement("table");
            table.classList.add("table");

            // Crear el encabezado de la tabla
            var thead = document.createElement("thead");
            var headerRow = document.createElement("tr");
            ['Nombre', 'Teléfono', 'Dirección'].forEach(function(headerText) {
                var th = document.createElement("th");
                th.textContent = headerText;
                headerRow.appendChild(th);
            });
            thead.appendChild(headerRow);
            table.appendChild(thead);

            // Crear el cuerpo de la tabla
            var tbody = document.createElement("tbody");
            marcadores=[];
            if(map){
                map.eachLayer(function (layer) {
                if (layer instanceof L.Marker) {
                    map.removeLayer(layer);
                }
                });
            }

            data.forEach(function(servicio, index) {
                var row = document.createElement("tr");

                var nombreCell = document.createElement("td");
                nombreCell.textContent = servicio.nombre_servicio;
                row.appendChild(nombreCell);

                var telefonoCell = document.createElement("td");
                telefonoCell.textContent = servicio.telefono_servicio;
                row.appendChild(telefonoCell);

                var direccionCell = document.createElement("td");
                direccionCell.textContent = servicio.direccion_servicio;
                row.appendChild(direccionCell);

                tbody.appendChild(row);

                // Crear el mapa y establecer la vista
                console.log("Latitud:", servicio.latitud_servicio, "Longitud:", servicio.longitud_servicio);
                if (!map) {
                    crearMapa(servicio);
                }

                if(map){
                var marker= L.marker([servicio.latitud_servicio, servicio.longitud_servicio]).addTo(map)
                .bindPopup(servicio.nombre_servicio);
                marcadores.push(marker);
                }

                
                
                
            });
            table.appendChild(tbody);

            // Agregar la tabla al documento
            var tabPaneDiv = document.getElementById('table');
            tabPaneDiv.innerHTML = ""; 
            tabPaneDiv.appendChild(table);
             
            })
            .catch(error => {
                console.error('Error en el json:', error);
            });
    }
  
    function crearMapa(servicio) {
    // Crea el mapa Leaflet
        map = L.map('mi_mapa').setView([servicio.latitud_servicio, servicio.longitud_servicio], 16);

    // Agrega la capa de OpenStreetMap al mapa
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        
        return map;
    }

</script>

