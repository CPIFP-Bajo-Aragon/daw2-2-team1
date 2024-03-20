function ValidateCrearUsuario() {
  var nombre = document.getElementById("nombre").value;
  nombre=sanitizeInput(nombre);
  var apellido = document.getElementById("apellido").value;
  apellido=sanitizeInput(apellido);
  var correo = document.getElementById("correo").value;
  correo=sanitizeInput(correo);
  var contrasena = document.getElementById("contrasena").value;
  contrasena=sanitizeInput(contrasena);
  var nif = document.getElementById("nif").value;
  nif=sanitizeInput(nif);

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
function ValidateCrearEntidad() {
  var nombre = document.getElementById("nombre_entidad").value;
  nombre=sanitizeInput(nombre);

  var cif = document.getElementById("cif").value;
  cif=sanitizeInput(cif);

  var sector = document.getElementById("sector").value;
  sector=sanitizeInput(sector);
  var direccion = document.getElementById("direccion").value;
  direccion=sanitizeInput(direccion);
  var numero = document.getElementById("numero_telefonico").value;
  numero=sanitizeInput(numero);
  var correo = document.getElementById("correo").value;
  correo=sanitizeInput(correo);
  var url = document.getElementById("pagina_web").value;
  url=sanitizeInput(url);

  if (!validateNombre(nombre)) {
      return false;
  }

  if (!validateNIF(cif)) {
      return false;
  }

  if (!validateSector(sector)) {
      return false;
  }

  if (!validateDireccion(direccion)) {
      return false;
  }

  if (!validateTelefono(numero)) {
    return false;
  }
  if (!validateCorreo(correo)) {
    return false;
  }
  if (!validateUrl(url)) {
    return false;
  }

  return true;
}

  function sanitizeInput(inputValue) {
    // Utiliza expresiones regulares para eliminar cualquier etiqueta HTML
    var sanitizedValue = inputValue.replace(/<[^>]*>/g, '');

    return sanitizedValue;
  }
  function validateNombre(nombre) {
    if (nombre === "") {
        return false;
    } else if (/\d/.test(nombre)) {
        return false;
    }
    return true;
  }
  
  function validateApellido(apellido) {
    if (apellido === "") {
        return false;
    } else if (/\d/.test(apellido)) {
        return false;
    }
    return true;
  }
  
  function validateCorreo(correo) {
    if (correo === "") {
        return false;
    } else if (!isValidEmail(correo)) {
        return false;
    }
    return true;
  }
  
  function validateContrasena(contrasena) {
    if (contrasena === "") {
        return false;
    }
    return true;
  }
  
  function validateNIF(nif) {
    if (nif === "") {
        return false;
    } else if (!isValidNIF(nif)) {
        return false;
    }
    return true;
  }
  function validateTelefono(Tel) {
    if (Tel === "") {
        return false;
    }
    return true;
  }

  function validateSector(Sec) {
    if (Sec === "") {
        return false;
    }
    return true;
  }

  function validateDireccion(dir) {
    if (dir === "") {
        return false;
    }
    return true;
  }

  function validateUrl(url) {
    if (url === "") {
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