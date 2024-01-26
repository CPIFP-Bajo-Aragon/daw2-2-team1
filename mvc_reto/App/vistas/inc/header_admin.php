<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="/css/estilos.css">

    <title>RevitaliZona</title>

  </head>
  <body class="">
    <div class="container-fluid vh-100" >
    <div class="row-vh-100">
    <header class="col-12 vh-10">
      <!--navBar-->
      <nav class="navbar navbar-expand-lg navbar-light bg-light " style="font-size: 1.5rem">
        <div class="container-fluid">
          <!--logo-->
          <img src="../images/logover.png" width="50"  class="d-inline-block align-top font-weight-bold " alt="">
          <a class="navbar-brand fs-4 font-weight-bold pt-4"  style=" color: #568C98; " href="#">
            
            <strong>RevitaliZona</strong></a>
        

          <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          
          <div class=" sidebar offcanvas offcanvas-start " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          
          
            <div class="offcanvas-header border-bottom text-dark">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">RevitaliZona</h5>
              <button type="button" class="btn-close btn-close-dark shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            
            <div class="offcanvas-body d-flex flex-column flex-lg-row p-4 lg-0 ">
              <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                <li class="nav-item mx-2"> <a href="<?php echo RUTA_URL ?>/OfertasControlador/listar" class="nav-link" aria-current="page" >Inicio</a> </li>
                <li class="nav-item mx-2"> <a href="<?php echo RUTA_URL ?>/OfertasControlador/listarpropios" class="nav-link active" aria-current="page" >Mis anunciados</a></li>
                <li class="nav-item mx-2"> <a href="<?php echo RUTA_URL ?>/UserControlador/perfil" class="nav-link active" aria-current="page" >Perfil</a></li>
                <li class="nav-item mx-2"> <a href="<?php echo RUTA_URL ?>/NegocioControlador/addnegocio" class="nav-link active" aria-current="page" >Ver Negocios</a></li>
              </ul>
              <a href="/OfertasControlador/addoferta" class="text-white text-decoration-none px-3 py-1  rounded-4 m-2"  style="background-color: #568C98;">Publicar Inmueble +</a>
              <a href="/NegocioControlador/addnegocio" class="text-white text-decoration-none px-3 py-1  rounded-4 m-2"  style="background-color: #568C98;">Publicar Negocio +</a>

            
              <div class="d-flex flex-column flex-lg-row justify-content-end align-items-center gap-3">

                  <a href="#" class="me-5"><i class="bi bi-bell"></i></a>
                  <a href="#" class="me-5"><i class="bi bi-envelope"></i></a>
                  <a href="#" class="me-5"><i class="bi bi-chat"></i></a>
              
                  <div class="dropdown">
                      <a href="#" class="me-5 dropdown-toggle" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="bi bi-person-circle"></i>
                      </a>
              
                
                      <div class="dropdown-menu " aria-labelledby="userDropdown">
                          <a class="dropdown-item" href="#">Perfil</a>
                          <a class="dropdown-item" href="#">Documentos</a>
                          <a class="dropdown-item" href="#">Cerrar Sesion</a>
                          <a class="dropdown-item" href="#">Documentos</a>
                          <a class="dropdown-item" href="#">Favoritos</a>
                      </div>
                  </div>
              </div>
              

              
            </div> 
          </div>
        </div>
      </nav>
    </header>
