<?php
    cabecera($this->datos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tu Título</title>
    <!-- Incluye los archivos CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5 text-center">
    <form action="" method="POST" class="mb-4">
        <h3>Datos de la Oferta</h3>
        <div class="mb-3">
            <input type="text"  id="tipo_oferta" name="tipo_oferta" class="form-control" placeholder="Tipo de Oferta">
        </div>
        <div class="mb-3">
            <input type="text" id="fecha_inicio" name="fecha_inicio" class="form-control" placeholder="Fecha de Inicio">
        </div>
        <div class="mb-3">
            <input type="text" id="fecha_fin" name="fecha_fin" class="form-control" placeholder="Fecha de Publicación">
        </div>
        <div class="mb-3">
            <input type="text" id="condiciones" name="condiciones" class="form-control" placeholder="condiciones">
        </div>
        <div class="mb-3">
            <input type="text" id="fecha_publicacion" name="fecha_publicacion" class="form-control" placeholder="fecha_publicacion">
        </div>
        <div class="mb-3">
            <input type="text" id="tipo" name="tipo" class="form-control" placeholder="tipo">
        </div>

       
    </form>

    <form action=""  class="mb-4">
    <h3>Datos del Inmueble</h3>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="ID de Oferta">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Código de Inmueble">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Metros Cuadrados">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Distribución">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Título">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Características">
    </div>
    <div class="mb-3">
        <textarea class="form-control" placeholder="Descripción"></textarea>
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Fotos">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Dirección">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Precio">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Ubicación">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Tipo de Alquiler">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Planta">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Planos">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Equipamiento">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Estado">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="ID de Municipio">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Latitud">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Longitud">
    </div>
</form>


    <h3>Selecciona el tipo de inmueble:</h3>
 <form action="" class="mb-4">
        <h3>Local</h3>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nombre">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Capacidad">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Recursos">
        </div>
    </form>

    <form action="" class="mb-4">
        <h3>Vivienda</h3>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Habitaciones">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Tipo">
        </div>
    </form>
    <div class="form-group mx-sm-4 pb-3">
        <input type="submit" class="btn btn-success btn-block" value="Añadir">
    </div>
</div>


<?php
require_once RUTA_APP . '/vistas/inc/footer.php';
?>
</body>
</html>
