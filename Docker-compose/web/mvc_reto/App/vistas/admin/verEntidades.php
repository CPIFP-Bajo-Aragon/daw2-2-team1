<?php
    cabecera($this->datos);
?>
<div class="container mt-5">
    

    <!-- Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="modalUsuario">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Usuarios pertenecientes a la Entidad: </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="<?php echo RUTA_URL; ?>/adminControlador/anadirUsuarioEntidad" method="POST">
                    <h5>ENTIDAD:   <label id="id_entidad_label" name="id_entidad_label" class="form-label"></label></h5>
                <div id="AvisosUsuario">

                </div>
                <input type="hidden" id="id_entidad" name="id_entidad">
                <input type="hidden" id="id_usuario" name="id_usuario">

                <h5>AÑADIR USURIO A ENTIDAD: </h5>
                
                        <div class="mb-3">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Selecciona un nuevo Usuario</label>
                            <select class="form-select" id="id_usuario" name="id_usuario">
                                <option value="" selected>Selecciona una opcion</option>
                                <?php foreach ($this->datos['usuarioslistar'] as $usuario): ?>
                                    <option value="<?php echo $usuario->id_usuario ?>"><?php echo $usuario->nombre_usuario ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="text" id="rol" name="rol" class="form-control" placeholder="Rol del Usuario">
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

    
    <div class="modal" tabindex="-1" role="dialog" id="modalEntidad">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title">Entidad: </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

            
                <h5>Datos entidad: </h5>


                <form action="<?php echo RUTA_URL; ?>/adminControlador/editarEntidad" method="POST">
                    <input type="hidden" id="id_entidad_editar" name="id_entidad">
                    <div class="mb-3">
                        <label id="nombre_entidad_label" class="form-label"></label>
                    </div>

                    <div id="Entidad">

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
            <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>/AdminControlador/listarUsuarios">Ver Usuarios</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ver Entidades</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6 mb-3">
            <!-- Filtro de búsqueda -->
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar por nombre...">
                <button class="btn btn-outline-secondary" type="button">Buscar</button>
            </div>
        </div>
       
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>CIF</th>
                <th>Sector</th>
                <th>Direccion</th>
                <th>Correo</th>
                <th>Pagina Web</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos['entidadeslistar'] as $entidad): ?>
                <tr>
                    <td><?php echo $entidad->nombre_entidad; ?></td>
                    <td><?php echo $entidad->cif_entidad; ?></td>
                    <td><?php echo $entidad->sector_entidad; ?></td>
                    <td><?php echo $entidad->direccion_entidad; ?></td>
                    <td><?php echo $entidad->correo_entidad; ?></td>
                    <td><?php echo $entidad->pagina_web_entidad; ?></td>

                     <td>
                    <div class="btn-group" role="group" aria-label="Opciones">
                
                    <a href="#" class="btn btn-outline-primary rounded-circle mr-1" onclick = "EditarEntidadModal(<?php echo $entidad->id_entidad; ?>)" ><i class="fas fa-pencil-alt"></i></a>
                       

                        <a href="#" class="btn btn-outline-info btnUsuario rounded-circle" onclick="mostrarModal(<?php echo $entidad->id_entidad; ?>)">
                            <i class="bi bi-trash"></i>
                        </a>
                        <a href="#" class="btn btn-outline-primary btnUsuario rounded-circle" onclick="mostrarModal(<?php echo $entidad->id_entidad; ?>)"><i class="fas fa-user"></i></a>
                    
                </div>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


        <script>

function EditarEntidadModal(elemento) {
    var id_entidad = elemento;

    var entidadesListar = <?php echo json_encode($this->datos['entidadeslistar']); ?>;
    console.log(entidadesListar);

    var modal = new bootstrap.Modal(document.getElementById('modalEntidad'));
    modal.show();

    var nombreEntidadLabel = modal._element.querySelector('.modal-body #nombre_entidad_label');
    // nombreEntidadLabel.textContent = "Datos de la entidad: " + id_entidad;

    var idEntidadInput = document.getElementById('id_entidad_editar');
    idEntidadInput.value = id_entidad;

    var entidadDiv = document.getElementById('Entidad');

    entidadDiv.innerHTML = '';

    entidadesListar.forEach(function(entidad) {
        if (entidad.id_entidad == id_entidad) {
            var contenedor = document.createElement('div');
            contenedor.innerHTML = '';

            var nombre_entidad = document.createElement('input');
            nombre_entidad.value = entidad.nombre_entidad; 
            nombre_entidad.classList.add('form-control');
            nombre_entidad.setAttribute('type', 'text');
            nombre_entidad.setAttribute('name', 'nombre_entidad');
            nombre_entidad.style.marginBottom = '20px';

            
            var cif = document.createElement('input');
            cif.value = entidad.cif_entidad;
            cif.classList.add('form-control');
            cif.setAttribute('type', 'text');
            cif.setAttribute('name', 'cif_entidad');
            cif.style.marginBottom = '20px';

            var sector = document.createElement('input');
            sector.value = entidad.sector_entidad;
            sector.classList.add('form-control');
            sector.setAttribute('type', 'text');
            sector.setAttribute('name', 'sector_entidad');
            sector.style.marginBottom = '20px';

            var direccion = document.createElement('input');
            direccion.value = entidad.direccion_entidad;
            direccion.classList.add('form-control');
            direccion.setAttribute('type', 'text');
            direccion.setAttribute('name', 'direccion_entidad');
            direccion.style.marginBottom = '20px';

            var correo = document.createElement('input');
            correo.value = entidad.correo_entidad;
            correo.classList.add('form-control');
            correo.setAttribute('type', 'text');
            correo.setAttribute('name', 'correo_entidad');
            correo.style.marginBottom = '20px';

            var paginaWeb = document.createElement('input');
            paginaWeb.value = entidad.pagina_web_entidad;
            paginaWeb.classList.add('form-control');
            paginaWeb.setAttribute('type', 'text');
            paginaWeb.setAttribute('name', 'pagina_web_entidad');
            paginaWeb.style.marginBottom = '20px';

            contenedor.classList.add('form-group');
            
            contenedor.appendChild(nombre_entidad);
            contenedor.appendChild(cif);
            contenedor.appendChild(sector);
            contenedor.appendChild(direccion);
            contenedor.appendChild(correo);
            contenedor.appendChild(paginaWeb);

            entidadDiv.appendChild(contenedor);
        }
    });
}

function mostrarModal(elemento) {
    var idEntidad = elemento;

    var usuarioslistar = <?php echo json_encode($this->datos['usuariosentidadeslistar']); ?>;
    console.log(usuarioslistar);

    var modal = new bootstrap.Modal(document.getElementById('modalUsuario'));
    modal.show();

    var idEntidadLabel = modal._element.querySelector('.modal-body #id_entidad_label');
    idEntidadLabel.textContent = idEntidad;

    

    var idEntidadInput = document.getElementById('id_entidad');
    idEntidadInput.value = idEntidad;

    var avisosUsuario = document.getElementById('AvisosUsuario');
    avisosUsuario.innerHTML = '';

    usuarioslistar.forEach(function (entidad) {
        if (entidad.id_entidad == idEntidad) {
            var contenedor = document.createElement('p');
            contenedor.innerHTML = '';
           
            var id_usuario = document.createElement('span');
            id_usuario.textContent = entidad.id_usuario;
            id_usuario.style.marginLeft = '1%';


            var tituloAviso = document.createElement('span');
            tituloAviso.textContent = entidad.nif;
            tituloAviso.style.marginLeft = '1%';

            var nombreUsuario = document.createElement('span');
            nombreUsuario.textContent = entidad.nombre_usuario;
            nombreUsuario.style.marginLeft = '1%';

            var rolUsuario = document.createElement('span');
            rolUsuario.textContent = entidad.rol;
            rolUsuario.style.marginLeft = '1%';

            var btnEliminar = document.createElement('button');
            btnEliminar.textContent = 'Eliminar';
            btnEliminar.className = 'btn btn-danger';
            btnEliminar.style.marginLeft = '14%';

            btnEliminar.onclick = function () {
                confirmarEliminacion(entidad.id_usuario);
            };

            contenedor.appendChild(id_usuario);

            contenedor.appendChild(tituloAviso);
            contenedor.appendChild(nombreUsuario);
            contenedor.appendChild(rolUsuario);
            contenedor.appendChild(btnEliminar);

            avisosUsuario.appendChild(contenedor);

            contenedor.style.border = '1px solid black';
            contenedor.style.borderRadius = '10px';
            contenedor.style.padding = '10px';
            contenedor.style.marginBottom = '20px';
        }
    });
}


function confirmarEliminacion(id_usuario) {
    console.log(id_usuario);  // Agrega esto para verificar el valor

    Swal.fire({
        title: "¿Estás seguro de eliminar esta entidad?",
        text: "No podrás recuperarla.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Estoy seguro!"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "<?php echo RUTA_URL ?>/adminControlador/eliminarUsuarioEntidad/" + id_usuario;
        }
    });
}
       
    </script>
   
</div>

