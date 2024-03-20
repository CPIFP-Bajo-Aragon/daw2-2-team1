<?php
    cabecera($this->datos);
?>
<div class="container mt-5">

 <!-- Modal -->
 <div class="modal" tabindex="-1" role="dialog" id="modalUsuario">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Añadir valoración Inmueble:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo RUTA_URL; ?>/adminControlador/anadirValoracionInmueble" method="POST">
                    <!-- Selecciona un usuario -->
                    <div class="mb-3">
                        <label for="id_usuario" class="form-label">Selecciona un usuario:</label>
                        <select class="form-select col-11" id="id_usuario" name="id_usuario">
                            <?php foreach ($this->datos['usuarioslistar'] as $usuario) : ?>
                                <option value="<?php echo $usuario->id_usuario ?>"><?php echo $usuario->nif.'-'.$usuario->nombre_usuario ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Selecciona un negocio -->
                    <div class="mb-3">
                        <label for="id_inmueble" class="form-label">Selecciona un negocio:</label>
                        <select class="form-select col-11" id="id_inmueble" name="id_inmueble">
                            <?php foreach ($this->datos['inmuebleslistar'] as $inmueble) : ?>
                                <option value="<?php echo $inmueble->id_inmueble ?>"><?php echo $inmueble->id_inmueble.'-'.$inmueble->descripcion_inmueble ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <input type="date" id="fecha_valoracion_inm" name="fecha_valoracion_inm" class="form-control" placeholder="Fecha" max="5" min="1">
                    </div>

                    <div class="mb-3">
                        <input type="number" id="puntuacion_inm" name="puntuacion_inm" class="form-control" placeholder="Puntuacion" max="5" min="1">
                    </div>

                    <div class="mb-3">
                        <input type="text" id="comentario_inm" name="comentario_inm" class="form-control" placeholder="Descripcion">
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
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>/AdminControlador">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ver Valoraciones</li>
        </ol>
    </nav>
    <div class="col-sm-12 mb-3 text-center mt-5 mb-5">
        <h3>VER VALORACIONES</h3>
        <div class="row text-center">
            <div class="col-sm-2 mb-5 mx-auto">
                <a href="<?php echo RUTA_URL; ?>/adminControlador/listarValoracionesInmueble" class="btn btn-outline-dark btn-lg px-4">
                    <i class="fas fa-home"></i> INMUEBLES
                </a>
            </div>
            <div class="col-sm-2 mb-5 mx-auto">
                <a href="<?php echo RUTA_URL; ?>/adminControlador/listarValoracionesNegocio" class="btn btn-outline-dark btn-lg px-4">
                    <i class="fas fa-building"></i> NEGOCIOS
                </a>
            </div>
        </div>

        <div class="col-md-6 mb-5 d-flex ">
            <div class="input-group col-md-6">
                <input type="text" class="form-control ml-5" placeholder="Buscar por valoracion...">
                <button class="btn btn-outline-secondary " type="button">Buscar</button>
                
            </div>
            <div class="col-md-6">
            <button class="btn btn-outline-secondary btnUsuario" type="button">+</button>
            </div>
           
            
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Inmueble</th>
                    <th><i class="fas fa-star"></i></th>

                    <th>Descripcion</th>
                    <th>Fecha Valoracion</th>
                    <th>Opciones</th>

                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos['valoracionesInmueblelistar'] as $valoracion): ?>
                    <tr>
                        <td><?php echo $valoracion->id_usuario?></td>
                        <td><?php echo $valoracion->id_inmueble; ?></td>
                        <td><?php echo $valoracion->puntuacion_inm; ?></td>
                        <td><?php echo $valoracion->comentario_inm; ?></td>
                       

                        <td><?php echo $valoracion->fecha_valoracion_inm; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Opciones">
                                <!-- <a href="#" class="btn btn-outline-primary"><i class="fas fa-pencil-alt"></i></a> -->
                                <a onclick="confirmarEliminacion(<?php echo $valoracion->id_valoracion_inmueble; ?>)" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        function confirmarEliminacion(id_valoracion_inmueble) {
            Swal.fire({
                title: "¿Estás seguro de eliminar esta valoracion?",
                text: "No podrás recuperarlo.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Estoy seguro!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?php echo RUTA_URL ?>/adminControlador/eliminarValoracionInm/" + id_valoracion_inmueble;
                }
            });
        }
    </script>
     <script>
           var btnUsuarios = document.querySelectorAll('.btnUsuario');
    btnUsuarios.forEach(function(btnUsuario) {
        btnUsuario.addEventListener('click', function () {
            var modal = new bootstrap.Modal(this.closest('.container').querySelector('.modal'));
            modal.show();
        });
    });
    </script>
</div>
