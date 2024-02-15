<?php
    cabecera($this->datos);
?>


<h1>VER USUARIOS</h1>
<div>
<select class="col-11" id="municipio" name="municipio">
     <?php foreach ($this->datos['municipioslistar'] as $municipio){ ?>
     <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>    
     <?php }?>
</select>
</div>


<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">NIF</th>
            <th scope="col">nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col"> Correo</th>
            <th scope="col">Contraseña</th>
            <th scope="col">Fecha nacimiento</th>
            <th scope="col">telefono</th>

            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos['usuarioslistar'] as $usuario): ?>
            <tr>
                <td><?php echo $usuario->nif; ?></td>
                <td><?php echo $usuario->nombre_usuario; ?></td>
                <td><?php echo $usuario->apellidos_usuario; ?></td>
                <td><?php echo $usuario->correo_usuario; ?></td>
                <td><?php echo $usuario->contrasena_usuario; ?></td>
                <td><?php echo $usuario->fecha_nacimiento_usuario; ?></td>
                <td><?php echo $usuario->telefono_usuario; ?></td>

               
                <td>
                    <a href="#"><i class="fas fa-pencil-alt"></i></a>
                    <a href="#"><i class="fas fa-trash-alt"></i></a>
                    <a href="#"><i class="fas fa-envelope"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
require_once RUTA_APP . '/vistas/inc/footer.php';
?>
</body>
</html>