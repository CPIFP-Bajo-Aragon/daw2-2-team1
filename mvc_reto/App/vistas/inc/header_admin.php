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
<body class="">
   
    <div class="container-fluid vh-100">
        <div class="row vh-100">
            <header class="col-12 vh-10 m-0 p-0">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                        <!-- Logo -->
                        <a class="navbar-brand fs-4 font-weight-bold pt-4 tetx-white" href="<?php echo RUTA_URL ?>/">
                            <img src="../images/logol.png" width="50" class="d-inline-block align-top font-weight-bold" alt="">
                            <strong class="pt-2">RevitaliZona</strong>
                        </a>

                        <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                            <div class="offcanvas-header border-bottom text-white">
                                <h5 class="offcanvas-title text-white" id="offcanvasNavbarLabel">RevitaliZona</h5>
                                <button type="button" class="btn-close btn-close-dark shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>

                            <div class="offcanvas-body d-flex flex-column flex-lg-row p-4 lg-0">
                                <!-- Sidebar content -->
                                <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                                    <li class="nav-item mx-2"> <h3 class="text-light">Has accedido como administrador</h3> </li>
                                </ul>

                                <!-- User actions -->
                                <div class="d-flex flex-column flex-lg-row justify-content-end align-items-center gap-3">
                                    <div class="dropdown">
                                        <a href="#" class="me-5 dropdown-toggle" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bi bi-bell"></i>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                                            <?php
                                                  if (!empty($datos['noti'])) {
                                                    
                                                    foreach ($datos['noti'] as $notificacion) {
                                            ?>
                                                         
                                                         <a class="dropdown-item" href=""><?php echo($notificacion->tipo) ?></a>
                                            <?php
                                                    }
                                                } else {
                                                    echo "No chats available"; // or handle the case where no chats are available
                                                }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column flex-lg-row justify-content-end align-items-center gap-3">
                                    <div class="dropdown">
                                         <a class="me-5 dropdown-toggle" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="bi bi-envelope text-white"></i>
                                          </a>

                                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                                            <?php
                                                  if (!empty($datos['admin'])) {
                                                    
                                                    foreach ($datos['admin'] as $admin) {
                                            ?>
                                                         
                                                         <a class="dropdown-item" href="<?php echo RUTA_URL ?>/UserControlador/chat/<?php echo $admin->NIF; ?>"><?php echo($admin->nombre.' '. $admin->apellido) ?></a>
                                            <?php
                                                    }
                                                } else {
                                                    echo "No ahi admins"; // or handle the case where no chats are available
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    

                                    <div class="dropdown">
                                        <a href="#" class="me-5 dropdown-toggle" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bi bi-chat text-white"></i>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                                            <?php
                                                  if (!empty($datos['chats'])) {
                                                    foreach ($datos['chats'] as $chat) {
                                            ?>
                                                         
                                                         <a class="dropdown-item" href="<?php echo RUTA_URL ?>/UserControlador/chat/<?php echo $chat->NIF; ?>"><?php echo($chat->nombre . ' ' . $chat->apellido) ?></a>
                                            <?php
                                                    }
                                                } else {
                                                    echo "No chats available"; // or handle the case where no chats are available
                                                }
                                            ?>
                                        </div>
                                    </div>
                                   
                                    <div class="dropdown">
                                        <a href="#" class="me-5 dropdown-toggle" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img id="previewFoto" src="/images/perfil_<?php echo $_SESSION['usuarioSesion']['NIF'] ?>/Perfil.jpg" alt="User Photo" class="img-fluid rounded-circle mt-2" style="width: 50px; height: 50px; object-fit: cover;">                                       
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                                            <a class="dropdown-item" href="<?php echo RUTA_URL ?>/UserControlador/perfil">Perfil</a>
                                            <a class="dropdown-item" href="<?php echo RUTA_URL ?>/DocumentosControlador">Documentos</a>
                                            <a class="dropdown-item" href="<?php echo RUTA_URL ?>/LoginControlador/cerrar">Cerrar Sesion</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>