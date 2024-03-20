<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/css/estilos.css">
    <link rel="stylesheet" href="/css/estilos.scss">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <title>RevitaliZona</title>
    <style>
        #ContenedorHeader{
            max-height:10vh;
        }
        #ConetendorPrincipal{
            max-height: 80vh;
            overflow: auto;
        }
        #ConetendorFooter{
            max-height:10vh;
        }

        .submenu {
            display: none;
            position: absolute;
            top: 0;
            left: 100%;
            min-width: 160px;
            background-color: #f9f9f9;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }

    </style>
</head>

<body class="h-100 d-flex flex-column" style="overflow-x: hidden;">
<header class="col-12 m-0 p-0" id="ContenedorHeader">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark pr-5">
            <div class="container-fluid">
            <a class=" row navbar-brand" href="/">
                <img src="/images/logonaranja.png" class="img-fluid rounded-circle col-5 me-2" style="width: 23%; height: 23%; object-fit: cover;" alt="">
                <strong style="font-size: 1.5rem; color:  #bb5511;" class="col-7">RevitaliZona</strong>
            </a>

                        <!-- User actions -->
                        <div class="d-flex flex-column flex-lg-row justify-content-end align-items-center gap-3 mr-5">
                           
                            <div class="dropdown">
                                <a href="#" class="me-5 " role="button" id="userDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img id="previewFoto" src="/images/perfil_<?php echo $_SESSION['usuarioSesion']['id_usuario'] ?>/Perfil.jpg" alt="User Photo" class="img-fluid rounded-circle ml-5" style="width: 40px; height: 40px; object-fit: cover; margin-right: 60px;">
                                </a>

                                <div class="dropdown-menu" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="<?php echo RUTA_URL ?>/UserControlador/perfil">Perfil</a>
                                    <!-- <a class="dropdown-item" href="<?php echo RUTA_URL ?>/DocumentosControlador">Documentos</a> -->
                                    <a class="dropdown-item" href="<?php echo RUTA_URL ?>/LoginControlador/cerrar">Cerrar Sesion</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</body>
</html>