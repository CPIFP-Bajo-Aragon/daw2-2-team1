<?php
    cabecera($this->datos);
?>


<h1>VER INMUEBLES</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Id Negocio</th>
            <th scope="col">Título</th>
            <th scope="col">Motivo Traspaso</th>
            <th scope="col">Coste Traspaso</th>
            <th scope="col">Coste Mensual</th>
            <th scope="col">Descripción</th>
            <th scope="col">Capital Mínimo</th>
            <th scope="col">Local perteneciente</th>

            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos['negocioslistar'] as $negocio): ?>
            <tr>
                <td><?php echo $negocio->id_negocio; ?></td>
                <td><?php echo $negocio->titulo_negocio; ?></td>
                <td><?php echo $negocio->motivo_traspaso_negocio; ?></td>
                <td><?php echo $negocio->coste_traspaso_negocio; ?></td>
                <td><?php echo $negocio->coste_mensual_negocio; ?></td>
                <td><?php echo $negocio->descripcion_negocio; ?></td>
                <td><?php echo $negocio->capital_minimo_negocio; ?></td>
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