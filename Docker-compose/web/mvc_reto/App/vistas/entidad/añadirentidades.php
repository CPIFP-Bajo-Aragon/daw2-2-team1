<?php
    cabecera($this->datos);
?>

<div class="container mt-4 text-center">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>/EntidadesControlador/listarentidades">Mis Entidades</a></li>
            <li class="breadcrumb-item active" aria-current="page">Añadir Entidad</li>
        </ol>
    </nav>
    <h2>Formulario de Inserción de Entidad <i class="bi bi-briefcase-fill" style="font-size: 2rem;"></i>
</h2>
    <form method="post" onsubmit="return ValidateCrearEntidad();" class="mt-4 p-4 rounded mb-5" style="max-width: 600px; margin: 0 auto; border: 2px solid #222A3F;">
        <div class="form-group row mb-3">
            <input type="text" class="form-control col-8" id="nombre_entidad" name="nombre_entidad" onblur="validateInput(this, validateNombre)"  placeholder="Nombre de la entidad" required>
        </div>
        <div class="form-group row mb-3">
            <input type="text" class="form-control col-8" id="cif" name="cif" placeholder="CIF de la entidad" onblur="validateInput(this, validateNIF)" required>
        </div>
        <div class="form-group row mb-3">
            <input type="text" class="form-control col-8" id="sector" name="sector" onblur="validateInput(this, validateSector)"  placeholder="Sector de la entidad" required>
        </div>
        <div class="form-group row mb-3">
            <input type="text" class="form-control col-8" id="direccion" name="direccion" onblur="validateInput(this, validateDireccion)" placeholder="Dirección de la entidad" required>
        </div>
        <div class="form-group row mb-3">
            <input type="tel" class="form-control col-8" id="numero_telefonico" name="numero_telefonico" onblur="validateInput(this, validateTelefono)"  placeholder="Teléfono de la entidad" required>
        </div>
        <div class="form-group row mb-3">
            <input type="email" class="form-control col-8" id="correo" name="correo" onblur="validateInput(this, validateCorreo)" placeholder="Correo electrónico de la entidad" required>
        </div>
        <div class="form-group row mb-3">
            <input type="url" class="form-control col-8" id="pagina_web" name="pagina_web" onblur="validateInput(this, validateUrl)" placeholder="Página web de la entidad" required>
        </div>
        <div class="form-group mx-sm-4 pb-3">
          <input type="submit" class="btn btn-block col-12" style="background-color: #222A3F; color: white;" value="Añadir Entidad">
        </div>
    </form>
</div>

<?php 
    require_once RUTA_APP.'/vistas/inc/footer.php'
?>
<script src="<?php echo RUTA_URL ?>/js/RegistrarUsuario.js"></script>
