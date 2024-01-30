<?php
    cabecera($this->datos);
?>


<h1>VER INMUEBLES</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID Oferta</th>
            <th scope="col">Código Inmueble</th>
            <th scope="col">Metros Cuadrados</th>
            <th scope="col">Distribución</th>
            <th scope="col">Título</th>
            <th scope="col">Características</th>
            <th scope="col">Descripción</th>
            <th scope="col">Fotos</th>
            <th scope="col">Dirección</th>
            <th scope="col">Precio</th>
            <th scope="col">Ubicación</th>
            <th scope="col">Tipo Alquiler</th>
            <th scope="col">Planta</th>
            <th scope="col">Planos</th>
            <th scope="col">Equipamiento</th>
            <th scope="col">Estado</th>
            <th scope="col">ID Municipio</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos['inmuebleslistar'] as $inmueble): ?>
            <tr>
                <td><?php echo $inmueble->id_oferta; ?></td>
                <td><?php echo $inmueble->codigo_inmueble; ?></td>
                <td><?php echo $inmueble->metros_cuadrados; ?></td>
                <td><?php echo $inmueble->distribucion; ?></td>
                <td><?php echo $inmueble->titulo; ?></td>
                <td><?php echo $inmueble->características; ?></td>
                <td><?php echo $inmueble->descripción; ?></td>
                <td><?php echo $inmueble->fotos; ?></td>
                <td><?php echo $inmueble->direccion; ?></td>
                <td><?php echo $inmueble->precio; ?></td>
                <td><?php echo $inmueble->ubicacion; ?></td>
                <td><?php echo $inmueble->tipo_alquiler; ?></td>
                <td><?php echo $inmueble->planta; ?></td>
                <td><?php echo $inmueble->planos; ?></td>
                <td><?php echo $inmueble->equipamiento; ?></td>
                <td><?php echo $inmueble->estado; ?></td>
                <td><?php echo $inmueble->id_municipio; ?></td>
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
