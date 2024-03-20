<?php
    cabecera($this->datos);
?>

<div class="container">
    <div class=" text-center align-items-center mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>/AdminControlador">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Añadir Usuario</li>
            </ol>
        </nav>
        <div>
            <h3 style="margin-right: 10px;" class="mb-5">FORMULARIO AÑADIR USUARIO <i class="bi bi-person-add" style="font-size: 3rem;"></i></h3>
        </div>

        <form action="" method="POST" onsubmit="return ValidateCrearUsuario();" class="mb-4 p-4 rounded" style="max-width: 600px; margin: 0 auto; border: 2px solid #222A3F;">

            <h3>Datos del Usuario</h3>
            <div class="mb-3">
                <input type="text" id="nif" name="nif" class="form-control" required onblur="validateInput(this, validateNIF)" placeholder="NIF">
            </div>
            <div class="mb-3">
                <input type="text" id="nombre_usuario" name="nombre_usuario" required onblur="validateInput(this, validateNombre)" class="form-control" placeholder="nombre">
            </div>
            <div class="mb-3">
                <input type="text" id="apellidos_usuario" name="apellidos_usuario" class="form-control" required onblur="validateInput(this, validateApellido)" placeholder="apellido">
            </div>
            <div class="mb-3">
                <input type="text" id="correo_usuario" name="correo_usuario" class="form-control" required onblur="validateInput(this, validateCorreo)" placeholder="correo">
            </div>
            <div class="mb-3">
                <input type="text" id="contrasena_usuario" name="contrasena_usuario" class="form-control" required onblur="validateInput(this, validateContrasena)" placeholder="contrasena">
            </div>
            <div class="mb-3">
                <input type="date" id="fecha_nacimiento_usuario" name="fecha_nacimiento_usuario" class="form-control" placeholder="Fecha Nacimiento">
            </div>
            <div class="mb-3">
                <input type="number" id="telefono_usuario" name="telefono_usuario" class="form-control" placeholder="Telefono">
            </div>

            <h3>Pertenece a Entidad:</h3>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo" id="usuarioRadio" value="existente" onclick="mostrarSelect('existente')">
                <label class="form-check-label" for="usuarioRadio">Existente</label>
            </div>
            <div id="selectEntidadExistente" class="mt-3 mb-5">
                <label for="entidadSelect" class="form-label">Selecciona Entidad:</label>
                <select class="form-select col-11 mb-3" id="id_entidad" name="id_entidad">
                    <?php foreach ($this->datos['entidadlistar'] as $entidad) { ?>
                        <option value="<?php echo $entidad->id_entidad ?>"><?php echo $entidad->nombre_entidad ?></option>
                    <?php } ?>
                </select>

                <div class="mb-3">
                    <input type="text" id="rol" name="rol" class="form-control" placeholder="Rol">
                </div>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo" id="entidadRadio" value="nueva" onclick="mostrarSelect('nueva')">
                <label class="form-check-label mb-5" for="entidadRadio">Nueva</label>
            </div>

            <div id="selectUsuarioNueva" class="mt-3" style="display:none;">
                 <h3>Datos de la Entidad</h3>

                <div id="formularioNuevaEntidad" class="mt-3">
                    <div class="mb-3">
                        <input type="text" id="nombre_entidad" name="nombre_entidad" onblur="validateInput(this, validateNombre)" class="form-control" placeholder="Nombre de la Entidad">
                    </div>
                    <div class="mb-3">
                        <input type="text" id="cif_entidad" name="cif_entidad" onblur="validateInput(this, validateNIF)" class="form-control" placeholder="CIF">
                    </div>
                    <div class="mb-3">
                        <input type="text" id="sector_entidad" name="sector_entidad" onblur="validateInput(this, validateSector)"  class="form-control" placeholder="Sector">
                    </div>
                    <div class="mb-3">
                        <input type="text" id="direccion_entidad" name="direccion_entidad" onblur="validateInput(this, validateDireccion)" class="form-control" placeholder="Dirección">
                    </div>
                    <div class="mb-3">
                        <input type="text" id="numero_telefono_entidad" name="numero_telefono_entidad" onblur="validateInput(this, validateTelefono)" class="form-control" placeholder="Teléfono">
                    </div>
                    <div class="mb-3">
                        <input type="text" id="correo_entidad" name="correo_entidad" onblur="validateInput(this, validateCorreo)" class="form-control" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input type="text" id="pagina_web_entidad" name="pagina_web_entidad" onblur="validateInput(this, validateUrl)" class="form-control" placeholder="Pagina web">
                    </div>

                    <div id="selectEntidadNueva" class="mt-3 mb-5">
                        <label for="entidadSelect" class="form-label">Selecciona rol usuario:</label>
                        <select class="form-select col-11" id="id_rol" name="id_rol">
                            <?php foreach ($this->datos['roleslistar'] as $rol) { ?>
                                <option value="<?php echo $rol->id_rol ?>"><?php echo $rol->nombre_rol ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="form-group mx-sm-4 pb-3">
                <input type="submit" class="btn btn-block col-12" style="background-color: #222A3F; color: white;" value="Añadir">
            </div>
        </form>
    </div>
</div>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
<script src="<?php echo RUTA_URL ?>/js/RegistrarUsuario.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function mostrarSelect(tipo) {
        var selectEntidadExistente = document.getElementById('selectEntidadExistente');
        var selectUsuarioNueva = document.getElementById('selectUsuarioNueva');
        var tipoEntidadInput = document.getElementById('tipo_entidad');

        if (tipo === 'existente') {
            selectEntidadExistente.style.display = 'block';
            selectUsuarioNueva.style.display = 'none';
            tipoEntidadInput.value = 'existente';
        } else if (tipo === 'nueva') {
            selectEntidadExistente.style.display = 'none';
            selectUsuarioNueva.style.display = 'block';
            tipoEntidadInput.value = 'nueva';
        }
    }
</script>


