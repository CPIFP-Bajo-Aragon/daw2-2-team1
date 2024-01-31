<?php
    cabecera($this->datos);
?>


<h1>VER INMUEBLES</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">NIF</th>
            <th scope="col">nombre</th>
            <th scope="col">apellido</th>
            <th scope="col"> correo</th>
            <th scope="col">Contraseña</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos['usuarioslistar'] as $usuario): ?>
            <tr>
                <td><?php echo $usuario->NIF; ?></td>
                <td><?php echo $usuario->nombre; ?></td>
                <td><?php echo $usuario->apellido; ?></td>
                <td><?php echo $usuario->correo; ?></td>
                <td><?php echo $usuario->contrasena; ?></td>
               
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