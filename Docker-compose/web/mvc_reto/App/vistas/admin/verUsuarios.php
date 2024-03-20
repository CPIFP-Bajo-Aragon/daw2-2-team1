<?php
    cabecera($this->datos);
    
    

?>

<div class="container mt-5">
   <!-- Modal -->
   <div class="modal" tabindex="-1" role="dialog" id="modalUsuario">
        <div class="modal-dialog" role="document">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title">AVISOS: </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <h5>AVISOS DEL USUARIO: </h5>

                    <div id="AvisosUsuario">

                    </div>

                    <form action="<?php echo RUTA_URL; ?>/adminControlador/anadirAviso" method="POST">
                        <input type="hidden" id="id_usuario" name="id_usuario">
                        <div class="mb-3">
                            <label id="id_usuario_label" class="form-label"></label>
                        </div>
                        <h5>AÑADIR AVISO:</h5>
                        <div class="mb-3">
                            <input type="text" id="titulo_aviso" name="titulo_aviso" class="form-control" placeholder="Titulo">
                        </div>
                        <div class="mb-3">
                            <input type="text" id="contenido_aviso" name="contenido_aviso" class="form-control" placeholder="Descripcion">
                        </div>
                        <div class="mb-3">
                            <input type="date" id="fecha_creacion" name="fecha_creacion_aviso" class="form-control" placeholder="Fecha">
                        </div>
                        <div class="form-group mx-sm-4 pb-3">
                            <input type="submit" class="btn btn-block col-12" style="background-color: #222A3F; color: white;" value="Añadir">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" tabindex="-1" role="dialog" id="modalOfertas">
        <div class="modal-dialog" role="document">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title">OFERTAS: </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <h5>INSCRIPCIONES USUARIO: </h5>

                    <div id="OfertasUsuario">

                    </div>

                    <form action="<?php echo RUTA_URL; ?>/adminControlador/anadirUsuarioOferta" method="POST">
                        <input type="hidden" id="id_usuario_inscribir" name="id_usuario">
                        <div class="mb-3">
                            <label id="id_usuario_label" class="form-label"></label>
                        </div>
                        <h5>AÑADIR NUEVA INSCRPCION:</h5>
                        <div class="col-md-12 mb-3">
                            <label for="">Selecciona una nueva oferta:</label>
                            <select class="form-select" id="id_oferta" name="id_oferta">
                                <option value="" selected>Selecciona una opcion</option>
                                <?php foreach ($this->datos['ofertaslistar'] as $oferta): ?>
                                    <option value="<?php echo $oferta->id_oferta ?>"><?php echo $oferta->titulo_oferta ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group mx-sm-4 pb-3">
                            <input type="submit" class="btn btn-block col-12" style="background-color: #222A3F; color: white;" value="Inscribir">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" tabindex="-1" role="dialog" id="modalUsuarios">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title">Usuario: </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

            
                <h5>Datos usuario: </h5>


                <form action="<?php echo RUTA_URL; ?>/adminControlador/editarUsuario" method="POST">
                    <input type="text" id="id_usuario_editar" name="id_usuario">
                    <div class="mb-3">
                        <label id="id_usuario_label" class="form-label"></label>
                    </div>

                    <div id="Usuario">

                    </div>



                    <div class="form-group mx-sm-4 pb-3">
                        <input type="submit" class="btn btn-block col-12" style="background-color: #222A3F; color: white;" value="Guardar Cambios">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>/AdminControlador">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ver Usuarios </li>
    </ol>
</nav>

<div class="col-sm-12 mb-1 text-center mb-5">
    <h3>LISTADO USUARIOS <i class="fas fa-user"></i></h3>

</div>


<div class="d-flex justify-content-between mb-3">
    <div class="row text-center w-100">
        <div class="col-md-6 ">
            <input type="search" id="search" class="form-control" placeholder="Buscar...">
        </div>
        <div class="col-md-6 text-md-end">
            <a href="<?php echo RUTA_URL; ?>/adminControlador/listarEntidades" class="btn btn-primary">
                <i class="fas fa-search"></i> Ver Entidades
            </a>
        </div>
    </div>
</div>




   
    <div class="results-container">
    <table class="table" id="resultados">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>NIF</th>
                <th>Correo</th>
                <th>Fecha Nacimiento</th>
                <th>Teléfono</th>
                <th>Activo</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <div class="col-12 mt-3 mb-3 d-flex justify-content-between">
        <button class="btn btn-primary me-0" id="btnAnterior">Anterior</button>
        <button class="btn btn-primary ms-0" id="btnSiguiente">Siguiente</button>
    </div>
</div>

<?php
require_once RUTA_APP . '/vistas/inc/footer.php';
?>

<script>

var usuarioslistar = <?php echo json_encode($this->datos['usuarioslistar']); ?>;
var usuariosPorPagina = 5;
var currentIndex = 0;

const resultadosTable = document.getElementById('resultados').getElementsByTagName('tbody')[0];

function listarUsuarios(usuarioslistar, currentIndex) {
    resultadosTable.innerHTML = ''; 

    usuarioslistar.slice(currentIndex, currentIndex + usuariosPorPagina).forEach(function (usuario) {
        const newRow = document.createElement('tr');


        const nombreCell = document.createElement('td');
        nombreCell.textContent = usuario.nombre_usuario + ' ' + usuario.apellidos_usuario;

        const nifCell = document.createElement('td');
        nifCell.textContent = usuario.nif;

        const correoCell = document.createElement('td');
        correoCell.textContent = usuario.correo_usuario;

        const fechaNacimientoCell = document.createElement('td');
        fechaNacimientoCell.textContent = usuario.fecha_nacimiento_usuario;

        const telefonoCell = document.createElement('td');
        telefonoCell.textContent = usuario.telefono_usuario;

        const activoCell = document.createElement('td');
        const activoButton = document.createElement('div');
        activoButton.className = 'btn-group';
        activoButton.setAttribute('role', 'group');
        activoButton.setAttribute('aria-label', 'Opciones');

        if (usuario.activo_usuario == 1) {
            const activoBtn = document.createElement('a');
            activoBtn.className = 'btn btn-outline-success rounded-circle';
            activoBtn.setAttribute('onclick', 'DesactivarUsuario(' + usuario.id_usuario + ')');
            activoBtn.innerHTML = '<i class="bi bi-check-lg"></i>';
            activoButton.appendChild(activoBtn);
        } else {
            const inactivoBtn = document.createElement('a');
            inactivoBtn.className = 'btn btn-outline-danger rounded-circle';
            inactivoBtn.setAttribute('onclick', 'ActivarUsuario(' + usuario.id_usuario + ')');
            inactivoBtn.innerHTML = '<i class="bi bi-x-lg"></i>';
            activoButton.appendChild(inactivoBtn);
        }

        activoCell.appendChild(activoButton);

        const opcionesCell = document.createElement('td');
        const opcionesButtons = document.createElement('div');
        opcionesButtons.className = 'btn-group';
        opcionesButtons.setAttribute('role', 'group');
        opcionesButtons.setAttribute('aria-label', 'Opciones');

        const editarBtn = document.createElement('a');
        editarBtn.className = 'btn btn-outline-primary rounded-circle mr-1';
        editarBtn.setAttribute('onclick', 'EditarUsuarioModal(' + usuario.id_usuario + ')');
        editarBtn.innerHTML = '<i class="fas fa-pencil-alt"></i>';
        opcionesButtons.appendChild(editarBtn);

        const mostrarModalBtn = document.createElement('a');
        mostrarModalBtn.className = 'btn btn-outline-info btnUsuario rounded-circle';
        mostrarModalBtn.setAttribute('onclick', 'mostrarModal(' + usuario.id_usuario + ')');
        mostrarModalBtn.innerHTML = '<i class="bi bi-exclamation-triangle-fill"></i>';
        opcionesButtons.appendChild(mostrarModalBtn);

        const mostrarModalOfertasBtn = document.createElement('a');
        mostrarModalOfertasBtn.className = 'btn btn-outline-primary btnUsuario rounded-circle';
        mostrarModalOfertasBtn.setAttribute('onclick', 'mostrarModalOfertas(' + usuario.id_usuario + ')');
        mostrarModalOfertasBtn.innerHTML = '<i class="bi bi-bag-plus-fill"></i>';
        opcionesButtons.appendChild(mostrarModalOfertasBtn);

        opcionesCell.appendChild(opcionesButtons);

        newRow.appendChild(nombreCell);
        newRow.appendChild(nifCell);
        newRow.appendChild(correoCell);
        newRow.appendChild(fechaNacimientoCell);
        newRow.appendChild(telefonoCell);
        newRow.appendChild(activoCell);
        newRow.appendChild(opcionesCell);

        resultadosTable.appendChild(newRow);
    });
}

function actualizarBotones(currentIndex) {
    document.getElementById("btnAnterior").style.display = currentIndex === 0 ? "none" : "inline-block";
    document.getElementById("btnSiguiente").style.display = currentIndex + usuariosPorPagina >= usuarioslistar.length ? "none" : "inline-block";
}

document.getElementById("btnAnterior").addEventListener("click", function () {
    currentIndex = Math.max(0, currentIndex - usuariosPorPagina);
    listarUsuarios(usuarioslistar, currentIndex);
    actualizarBotones(currentIndex);
});

document.getElementById("btnSiguiente").addEventListener("click", function () {
    currentIndex = Math.min(currentIndex + usuariosPorPagina, usuarioslistar.length - usuariosPorPagina);
    listarUsuarios(usuarioslistar, currentIndex);
    actualizarBotones(currentIndex);
});

listarUsuarios(usuarioslistar, currentIndex);

    

    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        const resultsTable = document.getElementById('resultados').getElementsByTagName('tbody')[0].rows;
      

        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase();

            for (let i = 0; i < resultsTable.length; i++) {
                const row = resultsTable[i];
                const rowData = row.textContent.toLowerCase();

                if (rowData.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });

        
    });


    function mostrarModal(elemento) {
        var idUsuario = elemento;

        var avisoslistar = <?php echo json_encode($this->datos['avisoslistar']) ; ?>;
        console.log(avisoslistar);
        var modal = new bootstrap.Modal(document.getElementById('modalUsuario'));
        modal.show();

        var avisosUsuarioLabel = modal._element.querySelector('.modal-body #id_usuario_label');
        // avisosUsuarioLabel.textContent = "Avisos del usuario: " + idUsuario;

        var idUsuarioInput = document.getElementById('id_usuario');
        idUsuarioInput.value = idUsuario;

       var avisosusuaio = document.getElementById('AvisosUsuario');
       avisosusuaio.innerHTML='';
       
        avisoslistar.forEach(function(aviso) {
            if (aviso.id_usuario == idUsuario) {
                var contenedor = document.createElement('div');
                contenedor.innerHTML='';

                var TituloAviso = document.createElement('p');
                TituloAviso.textContent = aviso.titulo_aviso;

                var ContenidoAViso = document.createElement('p');
                ContenidoAViso.textContent = aviso.contenido_aviso;

                var fechaAviso = document.createElement('p');
                fechaAviso.textContent = aviso.fecha_creacion_aviso;

                var icono = document.createElement('span');
                icono.className = 'bi bi-exclamation-triangle-fill';
                icono.style.float = 'right';
                icono.style.marginRight = '15px';
                icono.style.marginTop = '15px';

                contenedor.appendChild(icono);
                contenedor.appendChild(TituloAviso);
                contenedor.appendChild(ContenidoAViso);
                contenedor.appendChild(fechaAviso);

                avisosusuaio.appendChild(contenedor); 

                contenedor.style.border = '1px solid black';
                contenedor.style.borderRadius = '10px';
                contenedor.style.padding = '10px';
                contenedor.style.marginBottom = '20px';

            } 
        });

    }


    function mostrarModalOfertas(elemento) {
        var idUsuario = elemento;

        var ofertaslistar = <?php echo json_encode($this->datos['usuarioofertalistar']) ; ?>;
        console.log(ofertaslistar);

        var modal = new bootstrap.Modal(document.getElementById('modalOfertas'));
        modal.show();

        var UsuarioLabel = modal._element.querySelector('.modal-body #id_usuario_label');
        UsuarioLabel.textContent = "Inscipciones del usuario: " + idUsuario;

        var idUsuarioInput = document.getElementById('id_usuario_inscribir');
        idUsuarioInput.value = idUsuario;

        var ofertasUsuario = document.getElementById('OfertasUsuario');  
        ofertasUsuario.innerHTML='';  
        
        ofertaslistar.forEach(function(oferta) {
        if (oferta.id_usuario == idUsuario) {
            var contenedor = document.createElement('div');
            contenedor.innerHTML='';

            var TituloOferta = document.createElement('span');
            TituloOferta.textContent ="ID" +"-"+ oferta.id_oferta;
            TituloOferta.style.marginRight = '10px';


            var TitulodeOferta = document.createElement('span');
            TitulodeOferta.textContent = "Oferta" + "-"+ oferta.titulo_oferta;

            var icono = document.createElement('span');
            icono.className = 'bi bi-trash'; 
            icono.style.float = 'right';




            icono.onclick = function() {
                confirmarEliminacionInscripcion(oferta.id_usuario, oferta.id_oferta);
            };


            contenedor.appendChild(TituloOferta);
            contenedor.appendChild(TitulodeOferta);
            contenedor.appendChild(icono);



            ofertasUsuario.appendChild(contenedor); 

            contenedor.style.border = '1px solid black';
            contenedor.style.borderRadius = '10px';
            contenedor.style.padding = '10px';
            contenedor.style.marginBottom = '20px';
        } 
    });
}


function EditarUsuarioModal(elemento) {
    var id_usuario = elemento;

    var usuariolistar = <?php echo json_encode($this->datos['usuarioslistar']); ?>;
    console.log(usuariolistar);

    var modal = new bootstrap.Modal(document.getElementById('modalUsuarios'));
    modal.show();

    var UsuarioLabel = modal._element.querySelector('.modal-body #id_usuario_label');
    // UsuarioLabel.textContent = "Datos del usuario: " + id_usuario;

    var idUsuarioInput = document.getElementById('id_usuario_editar');
    idUsuarioInput.value = id_usuario;

    var usuariosUsuario = document.getElementById('Usuario');

    usuariosUsuario.innerHTML = '';

    usuariolistar.forEach(function(usuario) {
        if (usuario.id_usuario == id_usuario) {
            var contenedor = document.createElement('div');
            contenedor.innerHTML = '';

            var nif = document.createElement('input');
            nif.value = usuario.nif;
            nif.classList.add('form-control');
            nif.setAttribute('type', 'text');
            nif.setAttribute('name', 'nif');
            nif.style.marginBottom = '20px';


            var nombre_usuario = document.createElement('input');
            nombre_usuario.value = usuario.nombre_usuario;
            nombre_usuario.classList.add('form-control');
            nombre_usuario.setAttribute('type', 'text');
            nombre_usuario.setAttribute('name', 'nombre_usuario');
            nombre_usuario.style.marginBottom = '20px';

            var apellidos_usuario = document.createElement('input');
            apellidos_usuario.value = usuario.apellidos_usuario;
            apellidos_usuario.classList.add('form-control');
            apellidos_usuario.setAttribute('type', 'text');
            apellidos_usuario.setAttribute('name', 'apellidos_usuario');
            apellidos_usuario.style.marginBottom = '20px';

            var correo_usuario = document.createElement('input');
            correo_usuario.value = usuario.correo_usuario;
            correo_usuario.classList.add('form-control');
            correo_usuario.setAttribute('type', 'text');
            correo_usuario.setAttribute('name', 'correo_usuario');
            correo_usuario.style.marginBottom = '20px';

            var fecha_nacimiento_usuario = document.createElement('input');
            fecha_nacimiento_usuario.value = usuario.fecha_nacimiento_usuario;
            fecha_nacimiento_usuario.classList.add('form-control');
            fecha_nacimiento_usuario.setAttribute('type', 'text');
            fecha_nacimiento_usuario.setAttribute('name', 'fecha_nacimiento_usuario');
            fecha_nacimiento_usuario.style.marginBottom = '20px';

            var telefono_usuario = document.createElement('input');
            telefono_usuario.value = usuario.telefono_usuario;
            telefono_usuario.classList.add('form-control');
            telefono_usuario.setAttribute('type', 'text');
            telefono_usuario.setAttribute('name', 'telefono_usuario');
            telefono_usuario.style.marginBottom = '20px';

            contenedor.classList.add('form-group');
            contenedor.appendChild(nombre_usuario);
            contenedor.appendChild(apellidos_usuario);
            contenedor.appendChild(correo_usuario);
            contenedor.appendChild(nif);
            contenedor.appendChild(apellidos_usuario);
            contenedor.appendChild(fecha_nacimiento_usuario);
            contenedor.appendChild(telefono_usuario);

            usuariosUsuario.appendChild(contenedor);
        }
    });
}






function confirmarEliminacionInscripcion(idUsuario, idOferta) {
    Swal.fire({
        title: "¿Estás seguro de eliminar la inscripcion?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Estoy seguro!"
    }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "<?php echo RUTA_URL ?>/adminControlador/eliminarUsuarioOferta/" + idUsuario + "/" + idOferta;
        }
    });
}


function DesactivarUsuario(idUsuario) {
    Swal.fire({
        title: "¿Desactivar usuario?",
        icon: "warning",
        
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Estoy seguro!"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "<?php echo RUTA_URL ?>/adminControlador/DesactivarUsuario/" + idUsuario;
        }
    });
}

function ActivarUsuario(idUsuario) {
    Swal.fire({
        title: "¿Activar usuario?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Estoy seguro!"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "<?php echo RUTA_URL ?>/adminControlador/ActivarUsuario/" + idUsuario;
        }
    });
}

//BUSCADOR

var usuarios = <?php echo json_encode($this->datos['usuarioslistar']); ?>;

var userListContainer = document.getElementById('userList');

rellenar(usuarios);


document.addEventListener('DOMContentLoaded', function () {
    var inputBusqueda = document.querySelector('.form-control');
    inputBusqueda.addEventListener('input', function () {
        filtrarUsuarios(this.value);
    });
});

function filtrarUsuarios(terminoBusqueda) {
    
    var usuariosFiltrados = usuarios.filter(function (usuario) {
        return usuario.nombre_usuario.toLowerCase().includes(terminoBusqueda.toLowerCase());
    });
    rellenar(usuariosFiltrados);
};

function rellenar(usuarios){
    userListContainer.innerHTML =``;
    usuarios.forEach(function(usuario) {
        const newRow = document.createElement('tr');

        newRow.innerHTML = `
            <td>${usuario.nombre_usuario} ${usuario.apellidos_usuario}</td>
            <td>${usuario.nif}</td>
            <td>${usuario.correo_usuario}</td>
            <td>${usuario.fecha_nacimiento_usuario}</td>
            <td>${usuario.telefono_usuario}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Opciones">
                    <a class="btn btn-primary" href="/UserControlador/chat/${usuario.id_usuario}">Contactar</a>
                </div>
            </td>
        `;

        resultadosTable.appendChild(newRow);
    });
}




</script>

