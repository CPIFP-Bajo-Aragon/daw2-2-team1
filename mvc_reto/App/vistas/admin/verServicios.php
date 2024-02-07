<?php
    cabecera($this->datos);
?>


<h1>VER SERVICIOS</h1>
<div class="row">
<h3>Selecciona el tipo de servicio</h3>
<select name="" id="">
    <option value="">Selecciona un opcion</option>
</select>
<table class="table table-striped">


    <thead>
        <tr>

            <th scope="col">Nombre Servicio</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Tipo servicio</th>
            <th scope="col">Municipio</th>
            <th scope="col">Latitud</th>
            <th scope="col">Longitud</th>
            <th scope="col">Telefono</th>
            <th scope="col">Direccion</th>

            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos['servicioslistar'] as $servicio): ?>
            <tr>
                <td><?php echo $servicio->nombre_servicio; ?></td>
                <td><?php echo $servicio->descripcion_servicio; ?></td>
                <td><?php echo $servicio->id_tipo_servicio; ?></td>
                <td><?php echo $servicio->id_municipio; ?></td>
                <td><?php echo $servicio->longitud_servicio; ?></td>
                <td><?php echo $servicio->latitud_servicio; ?></td>
                <td><?php echo $servicio->telefono_servicio; ?></td>
                <td><?php echo $servicio->direccion_servicio; ?></td>

                
                <td>
                    <a href="#"><i class="fas fa-pencil-alt"></i></a>
                    <a href="#"><i class="fas fa-trash-alt"></i></a>
                    <a href="#"><i class="fas fa-envelope"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>


<?php
require_once RUTA_APP . '/vistas/inc/footer.php';
?>
</body>
</html>