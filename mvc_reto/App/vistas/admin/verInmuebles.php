<?php
    cabecera($this->datos);
?>

<div class="container">

<h1>VER INMUEBLES</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Código Inmueble</th>
            <th scope="col">Metros Cuadrados</th>
            <th scope="col">Distribución</th>
            <th scope="col">Precio</th>
            <th scope="col">Descripción</th>
            <th scope="col">Dirección</th>
            <th scope="col">Caracteristicas</th>
            <th scope="col">Equipamento</th>
            <th scope="col">Latitud</th>
            <th scope="col">Longitud</th>
            <th scope="col">Municipio</th>
            <th scope="col">Estado</th>
           
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos['inmuebleslistar'] as $inmueble): ?>
            <tr>
                <td><?php echo $inmueble->id_inmueble; ?></td>
                <td><?php echo $inmueble->metros_cuadrados_inmueble; ?></td>
                <td><?php echo $inmueble->descripcion_inmueble; ?></td>
                <td><?php echo $inmueble->distribucion_inmueble; ?></td>
                <td><?php echo $inmueble->precio_inmueble; ?></td>
                <td><?php echo $inmueble->direccion_inmueble; ?></td>
                <td><?php echo $inmueble->caracteristicas_inmueble; ?></td>
                <td><?php echo $inmueble->equipamiento_inmueble; ?></td>
                <td><?php echo $inmueble->latitud_inmueble; ?></td>
                <td><?php echo $inmueble->longitud_inmueble; ?></td>
                <td><?php echo $inmueble->id_municipio; ?></td>
                <td><?php echo $inmueble->id_estado; ?></td>
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