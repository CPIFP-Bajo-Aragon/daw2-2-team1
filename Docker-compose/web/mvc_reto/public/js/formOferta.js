//VALIDACIONES

let span = document.createElement("span");


function validarPrecio() {
  let mensaje_precio=document.getElementById("mensaje_precio");
  let inputPrecio=document.getElementById("precio_oferta");
  let precio=document.getElementById("precio_oferta").value;
 if(contieneSoloNumeros(inputPrecio, precio, mensaje_precio)){
    return true;
 }else{
    return false;
 }

}

function validar(inputId){
    span.style.color = "red"; 
    var input = document.getElementById(inputId);
    var mensaje = document.getElementById("mensaje_"+inputId);

    var valor = document.getElementById(inputId).value;
    if(valor===""){
        input.style.border="1px solid red";
        span.textContent = "El campo no puede estar vacio."; 
        mensaje.appendChild(span);
        return false;
    }else{
        if (span) {
            span.textContent = ""; 
        }
        input.style.border="1px solid green";

        return true;
    }
}

function contieneSoloNumeros(input, valor, mensaje) {
  
  span.style.color = "red"; 


  re=/^[0-9]+$/;
  if(re.test(valor) && valor!=""){
    input.style.border="1px solid green";
    if (span) {
        span.textContent = ""; 
    }
    return true;

  }else if(valor===""){
    input.style.border="1px solid red";
    span.textContent = "El campo no puede estar vacio."; 
    mensaje.appendChild(span);
    return false;
  }else{
    input.style.border="1px solid red";
    span.textContent="El campo solo puede contener números";
    mensaje.appendChild(span);
    return false;
  }
  
}


//VALIDAR AL ENVIAR

function validateForm(){
if (validarPrecio() && validar()) {
    // Si todos los campos están validados, enviar el formulario
    document.querySelector('form').submit();
} else {
    event.preventDefault();

    // Si hay campos mal validados, mostrar un mensaje o realizar otra acción
    alert("Por favor, complete correctamente todos los campos del formulario.");
}
}    




// Función para guardar los datos del formulario en cookies
var inputs = document.querySelectorAll('input, textarea, select, input[type=radio], input[type=checkbox]');

inputs.forEach(function(input) {
    input.addEventListener('change', guardarDatosFormulario);
});

function guardarDatosFormulario(event) {
    var inputs = document.querySelectorAll('input, textarea, select, input[type=radio], input[type=checkbox]'); // Obtener todos los inputs del formulario
    
    // Tiempo de expiración de media hora
    var fechaExpiracion = new Date();
    fechaExpiracion.setTime(fechaExpiracion.getTime() + (30 * 60 * 1000));
    var fechaExpiracionUTC = fechaExpiracion.toUTCString();

    // Guardar los datos del formulario en cookies
    inputs.forEach(function(input) {
        var nombre = input.id;
        var valor = input.value;
    
        document.cookie = nombre + "=" + encodeURIComponent(valor) + "; expires=" + fechaExpiracionUTC + "; path=/";
        
    });
}

//Función para cargar los datos de las cookies en el formulario

function cargarDatosFormulario() {
    var cookies = document.cookie.split(';');

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();
        var cookieParts = cookie.split('=');
        var nombre = cookieParts[0];
        var valor = decodeURIComponent(cookieParts[1]);

        // Buscar el input correspondiente y establecer su valor
        var input = document.getElementById(nombre);
        if (input) {
        // Si es un checkbox, establece su estado según el valor de la cookie
        if (input.type === "checkbox") {
            input.checked = (valor === "true");
        } else {
            // Para otros tipos de elementos de entrada (texto, textarea, select), establece su valor
            input.value = valor;
        }
    }
    }
}

//PASOS DEL FORMULARIO

document.getElementById("pasoNegocio").style.display = "none";

document.getElementById("tipo_vivienda").style.display = "none";


//Crea un formulario para insertar una nueva entidad si se selecciona una nueva entidad ofertante
var selectEntidad = document.getElementById("entidad");
selectEntidad.addEventListener("change", function() {
    if (this.value === "NuevaEntidad") {
        var formularioHTML = `
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre_entidad" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="cif">CIF</label>
                <input type="text" id="cif" name="cif_entidad" class="form-control" placeholder="CIF">
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" id="direccion" name="direccion_entidad" class="form-control" placeholder="Dirección">
            </div>
            <div class="form-group">
                <label for="sector">Sector</label>
                <input type="text" id="sector" name="sector_entidad" class="form-control" placeholder="Sector">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" id="telefono" name="telefono_entidad" class="form-control" placeholder="Teléfono">
            </div>
            <div class="form-group">
                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo_entidad" class="form-control" placeholder="Correo electrónico">
            </div>
            <div class="form-group">
                <label for="web">Página web</label>
                <input type="text" id="web" name="pagina_web" class="form-control" placeholder="Página web">
            </div>
        `;
        nuevoFormulario.innerHTML = formularioHTML;
        nuevoFormulario.style.display = "block";
    } else {
        nuevoFormulario.style.display = "none";
    }
});


//Deshabilita vivienda en caso de hacer un traspaso de negocio

document.getElementById("traspaso").addEventListener("change", function() {
    var vivienda = document.getElementById("vivienda");
    var local = document.getElementById("local");
    var tipo_vivienda = document.getElementById("tipo_vivienda");
    var DespuesDeOfertaTraspaso = document.getElementById("DespuesDeOfertaTraspaso");
    var DespuesDeOfertaInmueble = document.getElementById("DespuesDeOfertaInmueble");
    var AntesDeOfertaTraspaso = document.getElementById("AntesDeOfertaTraspaso");
    var AntesDeOfertaInmueble = document.getElementById("AntesDeOfertaInmueble");
    
    if (this.checked) {
        vivienda.disabled = true;
        vivienda.checked = false;
        local.checked= true;
        DespuesDeOfertaTraspaso.style.display = "none";
        DespuesDeOfertaInmueble.style.display = "block";

        AntesDeOfertaTraspaso.style.display = "none";
        AntesDeOfertaInmueble.style.display = "block";
        tipo_vivienda.style.display= "none";

    } else {
        
        vivienda.disabled = false;

    }
});

document.getElementById("alquiler").addEventListener("change", function() {
    var vivienda = document.getElementById("vivienda");
    if (this.checked) {
        DespuesDeOfertaTraspaso.style.display = "block";
        DespuesDeOfertaInmueble.style.display = "none";

        AntesDeOfertaTraspaso.style.display = "block";
        AntesDeOfertaInmueble.style.display = "none";

        vivienda.disabled = false;

    } else {
        DespuesDeOfertaTraspaso.style.display = "block";
        DespuesDeOfertaInmueble.style.display = "none";

        AntesDeOfertaTraspaso.style.display = "block";
        AntesDeOfertaInmueble.style.display = "none";

        vivienda.disabled = false;
    }
});

//Aparece el campo piso solo si la oferta es de piso

document.getElementById("piso").addEventListener("change", function() {
    var puerta = document.getElementById("puerta");

    if (this.checked) {
        puerta.style.display = 'block';
    } else {
        puerta.style.display = 'none';
    }
});

document.getElementById("casa").addEventListener("change", function() {
    var puerta = document.getElementById("puerta");

    if (this.checked) {
        puerta.style.display = 'none';
    } else {
        puerta.style.display = 'block';
    }
});

//Oculta los datos de negocio si no se va a publicar un negocio

document.getElementById("traspaso").addEventListener("change", function() {
    var paso2 = document.getElementById("pasoNegocio");
    if (this.checked) {
        paso2.style.display = 'block';

    } else {
        paso2.style.display = 'none';

    }
});

document.getElementById("alquiler").addEventListener("change", function() {
    var paso2 = document.getElementById("pasoNegocio");

    if (this.checked) {
        paso2.style.display = 'none';
    } else {
        paso2.style.display = 'block';
    }
});

document.getElementById("vivienda").addEventListener("change", function() {
    var tipo_vivienda = document.getElementById("tipo_vivienda");

    if (this.checked) {
        tipo_vivienda.style.display = 'block';
    } 
});

document.getElementById("local").addEventListener("change", function() {
    var tipo_vivienda = document.getElementById("tipo_vivienda");

    if (this.checked) {
        tipo_vivienda.style.display = 'none';
    } 
});


//Formulario dividido en pasos


function mostrarPaso(target) {
    // Oculta todos los tabs
    document.querySelectorAll('.tab-pane').forEach(function(tab){
        tab.classList.remove('show', 'active');
    });

    // Muestra el tab correspondiente
    var tabActivo = document.querySelector(target).classList.add('show', 'active');

    document.querySelectorAll('.nav-link').forEach(function(tab){
        tab.classList.remove('active');
    });

    // Activa la píldora correspondiente
    document.querySelectorAll(`a[href="${target}"].nav-link`).forEach(a => {
    a.classList.add("active");
    a.setAttribute("aria-current", "page");
});
}
