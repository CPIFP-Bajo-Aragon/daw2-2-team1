function iniciarMap() {
  
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: ubicaciones[0].coord
    });
  
    var infoPanel = document.getElementById('info-panel');
    var infoWindow = new google.maps.InfoWindow();
  
    ubicaciones.forEach(function (ubicacion) {
      var marker = new google.maps.Marker({
        position: ubicacion.coord,
        map: map,
        icon: {
          url: obtenerIcono(ubicacion.tipo),
          scaledSize: new google.maps.Size(50, 50)
        }
      });
    });
  
    function obtenerIcono(tipo) {
      switch (tipo) {
        case 'casa':
          return '/images/iconos/casa.png';
        // Agrega más casos según los tipos de ubicación y sus iconos
        default:
          return '/images/iconos/otro.png'; // Icono predeterminado si el tipo no coincide
      }
    }
}





function validateInput(input, validationFunction) {
  var value = input.value;
  if (!validationFunction(value)) {
    input.classList.add("border-danger");
  } else {
    input.classList.remove("border-danger");
  }
}
