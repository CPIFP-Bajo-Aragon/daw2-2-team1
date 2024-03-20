<?php

function redirecionar($pagina){
    header('location:'. RUTA_URL.$pagina);
}

function cabecera($datos){
    if(Sesion::sesionCreada()){
        if($_SESSION["usuarioSesion"]["admin"]==1){
            require_once RUTA_APP.'/vistas/inc/header_logueado.php';
        }else{
            require_once RUTA_APP.'/vistas/inc/header_admin.php';
        }

    }else{
        require_once RUTA_APP.'/vistas/inc/header_no_logueado.php';
    }
}

