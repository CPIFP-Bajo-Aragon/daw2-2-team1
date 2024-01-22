<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/estilos.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md natbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a href="<?php echo RUTA_URL?> "class="navbar-brand">
                <?php
                echo NOMBRE_SITIO ?></a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <?php if(isset($datos['menuActivo']) && $datos['menuActivo']==1): ?>
                                <a href="<?php echo RUTA_URL ?>/SesionControlador" class="nav-link active" aria-current="page" >Inicio sesion</a>
                            <?php else: ?>
                                <a href="<?php echo RUTA_URL ?>/SesionControlador" class="nav-link" aria-current="page" >Inicio sesion</a>
                                <?php endif ?>
                        </li>


                    </ul> 
                </div>

            </div>
        </nav>
    </header>
    <div class="container mt-5 -2"> 
