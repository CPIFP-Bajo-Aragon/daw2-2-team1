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
    <div class="mb-3 col-11" id="ContenedorServicios">
        
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
                contenedorpueblo.classList.add("col-12");
                contenedorpueblo.setAttribute("id", "pueblo" + i);

                var NombrePueblo = document.createElement('h1');
                NombrePueblo.textContent = serviciosFiltrados[i].nombre_municipio;

                contenedorpueblo.appendChild(NombrePueblo);
                contenedorSer.appendChild(contenedorpueblo);

            
                for (var j = 0; j < serviciosFiltrados[i].servicios.length; j++) {

                    var servi = serviciosFiltrados[i].servicios[j];

                    var contenedorservicio = document.createElement('div');
                    contenedorservicio.classList.add("col-4");
                    contenedorservicio.setAttribute("id", "servicio" + i+j);

                    var nombreservicio = document.createElement('h1');
                    nombreservicio.textContent = servi.nombre_servicio;

                    contenedorservicio.appendChild(nombreservicio);

                    contenedorSer.appendChild(contenedorservicio);

                }


            
        }
    }
</script>
</body>
</html>
