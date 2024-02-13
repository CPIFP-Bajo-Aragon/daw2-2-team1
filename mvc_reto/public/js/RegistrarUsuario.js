function ValidateCrearUsuario() {
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var correo = document.getElementById("correo").value;
    var contrasena = document.getElementById("contrasena").value;
    var nif = document.getElementById("nif").value;
  
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