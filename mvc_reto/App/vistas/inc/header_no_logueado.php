<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="/css/estilos.css">
    <title>RevitaliZona</title>
</head>
<body style="overflow-x: hidden;">
    
       
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark " style="font-size: 1rem">
            <div class="container-fluid">
              <!--logo-->
              <img src="../images/logol.png" width="50"  class="d-inline-block align-top font-weight-bold " alt="">
              <a class="navbar-brand fs-4 font-weight-bold pt-4 text-white"  style=" " href="/">
                
                <strong>RevitaliZona</strong></a>
            

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
                    <li class="nav-item mx-2">
                      <a href="<?php echo RUTA_URL ?>inicio" class="nav-link" aria-current="page" >Inicio</a>                    
                    </li>
                    <li class="nav-item mx-2">
                      <a class="nav-link active" href="#">Servicios</a>
                    </li>

                    <li class="nav-item mx-2">
                      <a class="nav-link active" href="#">Sobre Nosotros</a>
                    </li>

                    <li class="nav-item mx-2">
                      <a class="nav-link active" href="#">Contacto</a>
                    </li>
                    
                  </ul>
                  
                  <!--login-->
                  <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
                    <li class="nav-item text-white " style="list-style: none; text-decoration: underline;" >
                      <?php if(isset($datos['menuActivo']) && $datos['menuActivo']==1): ?>
                          <a href="<?php echo RUTA_URL ?>/loginControlador/sesion" class="nav-link active" aria-current="page" >Login</a>
                      <?php else: ?>
                          <a href="<?php echo RUTA_URL ?>/loginControlador/sesion" class="nav-link" aria-current="page" >Login</a> 
                      <?php endif ?>
                  </li>
                    <a href="<?php echo RUTA_URL ?>/LoginControlador/registro" class="text-white text-decoration-none px-3 py-1  rounded-4"  style="background-color:  #ff4f5a;">Registro</a>
                  </div>
                </div> 
              </div>
            </div>
          </nav>
        
    
               