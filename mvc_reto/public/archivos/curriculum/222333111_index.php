<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        [class^="col"] {
            border: 1px solid black;
            background-color: lightgray;
            font-size: 1.5rem;
        }

        .container {
            background-color: antiquewhite;
            margin: 0;
            padding: 0;
        }

        body,
        html {
            height: 100%;
            margin: 0;
        }

        header,
        footer {
            min-height: 12.5%;
        }

        .ofertas {
            overflow: auto; 
        }

        .ofertas > div {
            height: 33%; 
        }

        .filtros {
            overflow: auto; 
        }

        .filtros > div {
            height: 33%; 
        }
    </style>
</head>
<body>
    
    <div class="container-fluid ">
        <header class="sticky-top bg-light">
            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
        </header>
        <div class="row h-100">
            <div class="col-3 vh-100 filtros" style="background-color:white;">
                <div class="row-4 m-3 p-3 border ">
                    1
                </div>
                <div class="row-4 m-3 p-3 border ">
                    2
                </div>
                <div class="row-4 m-3 p-3 border ">
                    3
                </div>
                <div class="row-4 m-3 p-3 border ">
                    4
                </div>
                <div class="row-4 m-3 p-3 border ">
                    5
                </div>
            </div>  
            <div class="col-9 vh-100 ofertas" style="background-color:black;">
                <div class="col-3 h-auto m-3 border">
                    <select class="col-11" name="" id="">
                        <option value="">opcion</option>
                        <option value="">opcion</option>
                        <option value="">opcion</option>
                        <option value="">opcion</option>
                    </select>
                </div>
                <div class="row-4 m-3 border p-3"> 
                    <div class="row w-100 h-100 m-1">
                        <div class="border col-4 row-12">
                            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="imagen1.jpeg" class="d-block w-100" alt="Imagen 1">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="imagen2.jpeg" class="d-block w-100" alt="Imagen 2">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Anterior</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Siguiente</span>
                                </button>
                            </div>
                        </div>
                        <div class="border col-8 row-12">
                            <p>Caracteristicas</p>
                            <p>Precio</p>
                            <p>A</p>
                        </div>
                    </div>
                </div>
                <div class="row-4 m-3 border p-3">
                    malditos
                </div>
                <div class="row-4 m-3 border p-3">
                    descendientes
                </div>
                <div class="row-4 m-3 border p-3">
                    mierda
                </div>
                <div class="row-4 m-3 border p-3">
                    nginx
                </div>
                <div class="h-auto m-3 border">
                    Paginar
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-light">
        bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
