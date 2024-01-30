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



function ValidateCrearUsuario() {
  var nombre = document.getElementById("nombre").value;
  var apellido = document.getElementById("apellido").value;
  var correo = document.getElementById("correo").value;
  var contrasena = document.getElementById("contrasena").value;
  var nif = document.getElementById("NIF").value;

  if (!validateNombre(nombre)) {
      return false;
  }

  if (!validateApellido(apellido)) {
      return false;
  }

  if (!validateCorreo(correo)) {
      return false;
  }

  if (!validateContrasena(contrasena)) {
      return false;
  }

  if (!validateNIF(nif)) {
      return false;
  }

  return true;
}

function validateNombre(nombre) {
  if (nombre === "") {
      alert("Por favor, ingrese su nombre");
      return false;
  } else if (/\d/.test(nombre)) {
      alert("El nombre no puede contener números");
      return false;
  }
  return true;
}

function validateApellido(apellido) {
  if (apellido === "") {
      alert("Por favor, ingrese su apellido");
      return false;
  } else if (/\d/.test(apellido)) {
      alert("El apellido no puede contener números");
      return false;
  }
  return true;
}

function validateCorreo(correo) {
  if (correo === "") {
      alert("Por favor, ingrese su correo electrónico");
      return false;
  } else if (!isValidEmail(correo)) {
      alert("Por favor, ingrese una dirección de correo electrónico válida");
      return false;
  }
  return true;
}

function validateContrasena(contrasena) {
  if (contrasena === "") {
      alert("Por favor, ingrese su contraseña");
      return false;
  }
  return true;
}

function validateNIF(nif) {
  if (nif === "") {
      alert("Por favor, ingrese su NIF");
      return false;
  } else if (!isValidNIF(nif)) {
      alert("Por favor, ingrese un NIF válido");
      return false;
  }
  return true;
}

// Function to validate email format
function isValidEmail(email) {
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

// Function to validate NIF format
function isValidNIF(nif) {
  var nifRegex = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i;
  return nifRegex.test(nif);
}