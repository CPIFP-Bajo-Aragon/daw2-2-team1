<?php
    cabecera($this->datos);
?>


<h1>VER INMUEBLES</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Código Inmueble</th>
            <th scope="col">Código Negocio</th>
            <th scope="col">Título</th>
            <th scope="col">Motivo Traspaso</th>
            <th scope="col">Coste Traspaso</th>
            <th scope="col">Coste Mensual</th>
            <th scope="col">Ubicación</th>
            <th scope="col">Descripción</th>
            <th scope="col">Capital Mínimo</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos['negocioslistar'] as $negocio): ?>
            <tr>
                <td><?php echo $negocio->codigo_inmueble; ?></td>
                <td><?php echo $negocio->codigo_negocio; ?></td>
                <td><?php echo $negocio->titulo; ?></td>
                <td><?php echo $negocio->motivo_traspaso; ?></td>
                <td><?php echo $negocio->coste_traspaso; ?></td>
                <td><?php echo $negocio->coste_mensual; ?></td>
                <td><?php echo $negocio->ubicacion; ?></td>
                <td><?php echo $negocio->descripcion; ?></td>
                <td><?php echo $negocio->capital_minimo; ?></td>
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