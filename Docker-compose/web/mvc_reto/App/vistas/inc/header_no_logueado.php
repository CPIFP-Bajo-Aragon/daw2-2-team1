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

    <title>RevitaliZona</title>
  
</head>
<body class="h-100 d-flex flex-column" style="overflow-x: hidden;" >
    
       
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark " style="font-size: 1rem">
            <div class="container-fluid">
              <!--logo-->
              <img src="../images/logonaranja.png" width="50"  class="d-inline-block align-top font-weight-bold " alt="">
              <a class="navbar-brand fs-4 font-weight-bold pt-4 text-white"  style=" " href="/">
                
                <strong style="color:  #bb5511;">RevitaliZona</strong></a>
            

              <!--btn-->
              <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <!--Menu lateral-->
              <div class=" sidebar offcanvas offcanvas-start " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
              
              
                <div class="offcanvas-header border-bottom text-white">
                  <h5 class="offcanvas-title" id="offcanvasNavbarLabel">RevitaliZona</h5>
                  <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <!--Barra lateral Contenido-->
                <div class="offcanvas-body d-flex flex-column flex-lg-row p-4 lg-0 ">
                <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                <li class="nav-item-active mx-2">
                    <a href="<?php echo RUTA_URL ?>/" class="nav-link"  style="color:  #bb5511;">Inicio</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#servicios">Nuestros Servicios</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#about">Sobre Nosotros</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#contacto">Contacto</a>
                </li>
            </ul>

                  
                  <!--login-->
                  <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
                      <?php if(isset($_SESSION["usuarioSesion"]) && !empty($_SESSION["usuarioSesion"])): ?>
                        <a href="<?php echo RUTA_URL ?>/loginControlador/sesion" class="text-white text-decoration-none px-3 py-1  rounded-4"  style="background-color:  #bb5511;">Acceder</a>
                      <?php else: ?>
      
                        <li class="nav-item text-white " style="list-style: none; text-decoration: underline;" >
                          <a href="<?php echo RUTA_URL ?>/loginControlador/sesion" class="nav-link col-2" aria-current="page" >Login</a>
                        </li>
                        <li class="nav-item text-white " style="list-style: none; text-decoration: underline;" >
                          <a href="<?php echo RUTA_URL ?>/LoginControlador/registro" class="text-white col-2 text-decoration-none px-3 py-1  rounded-4"  style="background-color:  #bb5511;">Registro</a>
                        </li>
                        <?php endif ?>
                  </li>
                  </div>
                </div> 
              </div>
            </div>
          </nav>
        
    
               