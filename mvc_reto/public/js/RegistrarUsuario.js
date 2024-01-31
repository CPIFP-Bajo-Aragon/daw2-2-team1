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