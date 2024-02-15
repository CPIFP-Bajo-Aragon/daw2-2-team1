<?php
    cabecera($this->datos);
?>



<div class="container mt-5 text-center">
    <form action="" method="POST" class="mb-4">
        <h3>Datos del Usuario</h3>
        <div class="mb-3">
            <input type="text"  id="NIF" name="NIF" class="form-control" placeholder="NIF">
        </div> 
        <div class="mb-3">
            <input type="text"  id="nombre" name="nombre" class="form-control" placeholder="nombre">
        </div>
        <div class="mb-3">
            <input type="text" id="apellido" name="apellido" class="form-control" placeholder="apellido">
        </div>
        <div class="mb-3">
            <input type="text" id="correo" name="correo" class="form-control" placeholder="correo">
        </div>
        <div class="mb-3">
            <input type="text" id="contrasena" name="contrasena" class="form-control" placeholder="contrasena">
        </div>
        <div class="mb-3">
            <input type="text" id="id_municipio" name="id_municipio" class="form-control" placeholder="id_municipio">
        </div>
        

          <div class="form-group mx-sm-4 pb-3">
        <input type="submit" class="btn btn-success btn-block" value="Añadir">
    </div>
       
    </form>
  
</div>


<?php
require_once RUTA_APP . '/vistas/inc/footer.php';
?>

