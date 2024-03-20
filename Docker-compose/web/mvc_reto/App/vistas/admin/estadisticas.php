<?php
    cabecera($this->datos);
// print_r($this->datos['usuarioslistar']);
?>
<script>
    var usuarios = <?php echo json_encode($this->datos['usuarioslistar']) ?>;
    document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('toggleButton');
    const dropdownForm = document.getElementById('dropdownForm');

    toggleButton.addEventListener('click', function () {
        dropdownForm.classList.toggle('hidden');
    });
});
  </script>
</head>
<body>

<div class="container-fluid">

    <div class="row">
        <div id="Opciones" class="col-5">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title bg-success" onclick="toggleOptions('hidden-option-usuario')">Usuario</h5>
                            <form id="usuarioGraficoForm">
                            <button type="button" onclick="mostrarGrafico(usuarios, 'numOfertaApunt')" style="display:none;" class="btn btn-secondary w-100 hidden-option-usuario">Por Numero de ofertas apuntado</button>
                            <button type="button" onclick="mostrarGrafico(usuarios, 'numOfertapubli')" style="display:none;" class="btn btn-secondary w-100 hidden-option-usuario">Por Numero de ofertas publicadas</button>
                            <button type="button" onclick="mostrarGrafico(usuarios, 'notificar_avisos')" style="display:none;" class="btn btn-secondary w-100 hidden-option-usuario">Por tener activado notificar_avisos</button>
                            <button type="button" onclick="mostrarGrafico(usuarios, 'notificar_mensajes')" style="display:none;" class="btn btn-secondary w-100 hidden-option-usuario">Por tener activado notificar_mensajes</button>
                            <button type="button" onclick="mostrarGrafico(usuarios, 'notificar_notificaciones')" style="display:none;" class="btn btn-secondary w-100 hidden-option-usuario">Por tener activado notificar_notificaciones</button>
                            <button type="button" onclick="mostrarGrafico(usuarios, 'activo_usuario')" style="display:none;" class="btn btn-secondary w-100 hidden-option-usuario">Por tener el usuario activo</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title bg-success" onclick="toggleOptions()">inmueble</h5>
                            <form id="usuarioGraficoForm">
                            <button type="button" onclick="mostrarGrafico(inmueble, 'nombre_usuario')" style="display:none;" class="btn btn-secondary w-100 hidden-option">Por Nombre de Usuario</button>
                            <button type="button" onclick="mostrarGrafico(inmueble, 'nif')" style="display:none;" class="btn btn-secondary w-100 hidden-option">Por NIF</button>
                            <button type="button" onclick="mostrarGrafico(inmueble, 'apellidos_usuario')" style="display:none;" class="btn btn-secondary w-100 hidden-option">Por apellidos_usuario</button>
                            <button type="button" onclick="mostrarGrafico(inmueble, 'correo_usuario')" style="display:none;" class="btn btn-secondary w-100 hidden-option">Por correo_usuario</button>
                            <button type="button" onclick="mostrarGrafico(inmueble, 'fecha_nacimiento_usuario')" style="display:none;" class="btn btn-secondary w-100 hidden-option">Por fecha_nacimiento_usuario</button>
                            <button type="button" onclick="mostrarGrafico(inmueble, 'telefono_usuario')" style="display:none;" class="btn btn-secondary w-100 hidden-option">Por telefono_usuario</button>
                            <button type="button" onclick="mostrarGrafico(inmueble, 'notificar_avisos')" style="display:none;" class="btn btn-secondary w-100 hidden-option">Por notificar_avisos</button>
                            <button type="button" onclick="mostrarGrafico(inmueble, 'notificar_mensajes')" style="display:none;" class="btn btn-secondary w-100 hidden-option">Por notificar_mensajes</button>
                            <button type="button" onclick="mostrarGrafico(inmueble, 'notificar_notificaciones')" style="display:none;" class="btn btn-secondary w-100 hidden-option">Por notificar_notificaciones</button>
                            <button type="button" onclick="mostrarGrafico(inmueble, 'activo_usuario')" style="display:none;" class="btn btn-secondary w-100 hidden-option">Por activo_usuario</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title bg-success" onclick="toggleOptions()">Usuario</h5>
                            <form id="usuarioGraficoForm">
                            <button type="button" onclick="mostrarGrafico(usuarios, 'nombre_usuario')" style="display:none;" class="btn btn-secondary w-100 hidden-option">Por Nombre de Usuario</button>
                            <button type="button" onclick="mostrarGrafico(usuarios, 'nif')" style="display:none;" class="btn btn-secondary w-100 hidden-option">Por NIF</button>
                            <button type="button" onclick="mostrarGrafico(usuarios, 'apellidos_usuario')" style="display:none;" class="btn btn-secondary w-100 hidden-option">Por apellidos_usuario</button>
                            <button type="button" onclick="mostrarGrafico(usuarios, 'correo_usuario')" style="display:none;" class="btn btn-secondary w-100 hidden-option">Por correo_usuario</button>
                            <button type="button" onclick="mostrarGrafico(usuarios, 'fecha_nacimiento_usuario')" style="display:none;" class="btn btn-secondary w-100 hidden-option">Por fecha_nacimiento_usuario</button>
                            <button type="button" onclick="mostrarGrafico(usuarios, 'telefono_usuario')" style="display:none;" class="btn btn-secondary w-100 hidden-option">Por telefono_usuario</button>
                            <button type="button" onclick="mostrarGrafico(usuarios, 'notificar_avisos')" style="display:none;" class="btn btn-secondary w-100 hidden-option">Por notificar_avisos</button>
                            <button type="button" onclick="mostrarGrafico(usuarios, 'notificar_mensajes')" style="display:none;" class="btn btn-secondary w-100 hidden-option">Por notificar_mensajes</button>
                            <button type="button" onclick="mostrarGrafico(usuarios, 'notificar_notificaciones')" style="display:none;" class="btn btn-secondary w-100 hidden-option">Por notificar_notificaciones</button>
                            <button type="button" onclick="mostrarGrafico(usuarios, 'activo_usuario')" style="display:none;" class="btn btn-secondary w-100 hidden-option">Por activo_usuario</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>


        <!-- User Content -->
        <div class="col-6" id="chartdiv">
        </div>
    </div>
</div>



  <script>
    function toggleOptions(clase) {
        var options = document.getElementsByClassName(clase);
        for (var i = 0; i < options.length; i++) {
            options[i].style.display = (options[i].style.display === 'none' || options[i].style.display === '') ? 'block' : 'none';
        }
    }
    // Función para mostrar el gráfico de pastel basado en una propiedad específica
    function mostrarGrafico(datos ,propiedad) {
      // Espera a que amCharts esté listo
      am4core.ready(function() {
        // Crea una instancia de un gráfico de pastel
        var chart = am4core.create("chartdiv", am4charts.PieChart);

        // Agrupa los datos por la propiedad seleccionada
        var datosAgrupados = agruparDatosPorPropiedad(datos, propiedad);

        // Asigna los datos al gráfico
        chart.data = datosAgrupados;

        // Crea una serie de pastel
        var series = chart.series.push(new am4charts.PieSeries());
        // Asigna campos de datos
        series.dataFields.value = "value";
        series.dataFields.category = "category";
        // Personaliza el formato del tooltip
        series.slices.template.tooltipText = "{category}: [bold]{value}[/]";

        // Personaliza los colores de las porciones
        series.colors.step = 2;

        // Agrega una leyenda al gráfico
        chart.legend = new am4charts.Legend();
        chart.legend.position = "right";

        // Configura la animación de entrada del gráfico
        chart.hiddenState.properties.opacity = 0;
        chart.hiddenState.properties.radius = am4core.percent(0);
      });
    }

    // Función para agrupar datos por una propiedad específica
    function agruparDatosPorPropiedad(datos, propiedad) {
      var datosAgrupados = [];

      // Itera sobre los datos y agrupa por la propiedad seleccionada
      datos.forEach(function(usuario) {
        var valorPropiedad = usuario[propiedad];

        // Verifica si ya existe una entrada para el valor de la propiedad
        var entradaExistente = datosAgrupados.find(function(entrada) {
          return entrada.category === valorPropiedad;
        });

        // Si existe, incrementa el valor
        if (entradaExistente) {
          entradaExistente.value++;
        } else {  // Si no existe, crea una nueva entrada
          datosAgrupados.push({
            category: valorPropiedad,
            value: 1
          });
        }
      });

      return datosAgrupados;
    }
  </script>

</body>
</html>
