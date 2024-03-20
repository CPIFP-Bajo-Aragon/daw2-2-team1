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
    <link rel="stylesheet" href="/css/estilos.scss">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>RevitaliZona</title>
    <style>
        /* Estilos para la cabecera en modo móvil */
        @media (max-width: 991px) {
            #MenuInterectivo {
                display: none;
            }
        }
    </style>
</head>
<?php 
$pagina_actual=$_SERVER['REQUEST_URI'];
$pagina_deseada = "/OfertasControlador/addoferta";

if($pagina_actual===$pagina_deseada){ 
?>
    <body onload="cargarDatosFormulario()">
<?php 
    }else{ ?>
    <body>
<?php 
    } 
?>
    <div class="container-fluid row p-0 m-0 vh-100">
        <header class="col-12 m-0 p-0" id="ContenedorHeader" >
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3" style="font-size: 1.2rem">
                <div class="container-fluid">
                    <!-- Logo -->
                    <a class="col-2 row navbar-brand" href="/">
                        <img src="../images/logonaranja.png" class="img-fluid rounded-circle col-5 me-2" style="width: 20%; height: 20%; object-fit: cover;" alt="">
                        <strong style="font-size: 1.5rem; color:  #bb5511;" class="col-7">RevitaliZona</strong>
                    </a>

                    <!-- Botón de menú -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Menú colapsable -->
                    <div class="collapse navbar-collapse col-6 mb-3" id="navbarNav">
                        <ul class="navbar-nav col-10">
                            <li class="nav-item col-4">
                                <a class="nav-link" href="/OfertasControlador/mostrarOfertas">Ofertas</a>
                            </li>
                            <li class="nav-item col-4">
                                <a class="nav-link" href="/NegocioControlador/mostrarNegocios">Negocios</a>
                            </li>
                            <li class="nav-item col-4">
                                <a class="nav-link" href="/ServiciosControlador/listarServicios">Servicios</a>
                            </li>
                            <li>
                                <div class="justify-content-center align-items-center mt-3">
                                <a href="/OfertasControlador/addoferta" class="text-white text-decoration-none px-3 rounded-4 p-2 "   style="background-color:  #bb5511;">+Publicar</a>

                                </div>
                            </li>
                        </ul>

                    </div>

                    <!-- Acciones de usuario -->
                    <div class="col-4 d-flex align-items-center justify-content-end">
                        
                        <!-- Notificaciones -->
                            <div class="dropdown col-3 text-center position-relative">
                                <a href="#" role="button" id="userDropdown1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="text-light position-relative" >
                                    <i class="bi bi-bell animated-bell fs-3"  style="color:  #bb5511;"></i>
                                    <?php
                                        // Count the number of notifications
                                        $numNotifications=0;
                                        foreach($datos['usuarioSesion']['noti'] as $noti){  
                                            if($noti->leida_notificacion===0){
                                                $numNotifications=$numNotifications+1;
                                            }
                                        }
                                        if ($numNotifications > 0) {
                                            echo '<span class="badge bg-danger position-absolute top-0 start-100 translate-middle p-1" style="margin-left: 0rem;">' . $numNotifications . '</span>';
                                        }
                                    ?>
                                </a>
                                    <div class="dropdown-menu" style="max-height: 15vh; overflow: auto;" aria-labelledby="userDropdown1">
                                    <a href="/UserControlador/marcartodasnotis">
                                        <button type="submit" name="marcarnotificacionesleido" >Marcar Todos como leído</button>
                                    </a>
                                    <?php
                                        if (!empty($datos['usuarioSesion']['noti'])) {
                                            foreach ($datos['usuarioSesion']['noti'] as $notificacion) {
                                    ?>
                                            <a class="dropdown-item <?php echo ($notificacion->leida_notificacion == 0) ? 'bg-dark text-light' : ''; ?>" onclick="openMainModalavisos('<?php echo($notificacion->Titulo_notificacion) ?>', '<?php echo($notificacion->contenido_notificacion) ?>', '<?php echo($notificacion->id_notificacion) ?>','notificacion', '<?php echo($notificacion->leida_notificacion) ?>')" href="#">
                                                <?php echo($notificacion->Titulo_notificacion) ?>
                                            </a>

                                    <?php
                                            }
                                        } else {
                                            echo "No notifications available";
                                        }
                                    ?>
                                </div>
                            </div>


                        <!-- Mensajes -->
                        <div class="dropdown col-3 text-center">
                            <a role="button" id="userDropdown2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="text-light position-relative">
                                <i class="bi bi-envelope fs-3 "  style="color:  #bb5511;"></i>
                                <?php
                                    // Count the number of notifications
                                    $numAdvertencias = count($datos['usuarioSesion']['advertencias']);
                                    if ($numAdvertencias > 0) {
                                        echo '<span class="badge bg-danger position-absolute top-0 start-100 translate-middle p-1" style="margin-left: 0rem;">' . $numAdvertencias . '</span>';
                                    }
                                ?>
                            </a>

                            <div class="dropdown-menu" style="max-height: 15vh; overflow: auto;" aria-labelledby="userDropdown2">
                                <?php
                                    if (!empty($datos['usuarioSesion']['advertencias'])) {
                                        foreach ($datos['usuarioSesion']['advertencias'] as $aviso) {
                                ?>
                                            <a class="dropdown-item" onclick="openMainModalavisos('<?php echo($aviso->titulo_aviso) ?>', '<?php echo($aviso->contenido_aviso) ?>','<?php echo($aviso->id_aviso) ?>',' avisos', 0)" href="#">
                                                <?php echo($aviso->titulo_aviso) ?>
                                            </a>
                                <?php
                                    }
                                    } else {
                                        echo "No advertencias disponibles";
                                    }
                                ?>
                            </div>
                        </div>

                        <!-- Chat -->
                        <div class="dropdown col-3 text-center">
                            <a href="#" role="button" id="userDropdown3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="text-light position-relative">
                                <i class="bi bi-chat fs-3"  style="color:  #bb5511;"></i>
                                    <?php
                                    
                                    $mensajeRecibidoPorUsuarioActual=0;
                                        if (!empty($datos['usuarioSesion']['chats'])) {
                                            foreach ($datos['usuarioSesion']['chats'] as $chat) {
                                                if($chat->ultimoMensaje->id_usuario1 === $datos['usuarioSesion']['id_usuario']){
                                                    $mensajeRecibidoPorUsuarioActual = $mensajeRecibidoPorUsuarioActual+1;
                                                }
                                                
                                            }
                                        }
                                        // Count the number of notifications
                                        if ($mensajeRecibidoPorUsuarioActual > 0) {
                                            echo '<span class="badge bg-danger position-absolute top-0 start-100 translate-middle p-1" style="margin-left: 0rem;">' . $mensajeRecibidoPorUsuarioActual . '</span>';
                                        }
                                    ?> 
                            </a>
                            <div class="dropdown-menu" style="max-height: 15vh; overflow: auto;" aria-labelledby="userDropdown3">
                                <?php
                                    if (!empty($datos['usuarioSesion']['chats'])) {
                                        foreach ($datos['usuarioSesion']['chats'] as $chat) {
                                ?>
                                            <form action="/UserControlador/chat" method="post">
                                                <input type="hidden" name="recp" value="<?php echo $chat->id_usuario; ?>">
                                                <button class="btn btn-outline-dark btn-lg px-4 " style="margin-left: 10px; margin-right: 10px;" type="submit"><?php echo($chat->nombre_usuario . ' ' . $chat->apellidos_usuario) ?></button>
                                            </form>
                                <?php
                                    }
                                    } else {
                                        echo "No chats available";
                                    }
                                ?>
                            </div>
                        </div>

                        <!-- Perfil -->
                        <div class="dropdown col-3 text-center">
                            <a href="#" role="button" id="userDropdown4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="text-light">
                                <img id="previewFoto" src="/images/perfil_<?php echo $datos['usuarioSesion']['id_usuario'] ?>/Perfil.jpg" alt="User Photo" class="img-fluid rounded-circle me-2 fs-3" style="width: 30px; height: 30px; object-fit: cover;">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="userDropdown4">
                                <a href="/UserControlador/perfil" class="dropdown-item">Perfil</a>
                                <a class="dropdown-item " href="/NegocioControlador/listnegociopropio">Mis Negocios</a>
                                <a class="dropdown-item " href="/OfertasControlador/listarpropios">Mis Ofertas</a>
                                <a href="/OfertasControlador/VerOfertaInscrito" class="dropdown-item">Ofertas Inscritas</a>
                                <a class="dropdown-item" href="/EntidadesControlador/listarentidades">Entidades</a>
                                <a href="/LoginControlador/cerrar" class="dropdown-item">Cerrar Sesión</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <div id="mainModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   
        </div>
        <!-- Contenido principal -->
        <div class="container-fluid row" id="ConetendorPrincipal">