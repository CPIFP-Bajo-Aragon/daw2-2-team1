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

function imagenes($nif){
    $ruta = 'images/oferta_' . $nif;
    

    // Verificar si la ruta existe
    if (is_dir($ruta)) {
        // Obtener la lista de archivos en el directorio
        $archivos = scandir($ruta);

        // Filtrar los archivos para excluir los directorios "." y ".."
        $archivos = array_diff($archivos, array('..', '.'));

        // Crear un array para almacenar los nombres de los archivos
        $nombresArchivos = array();

        // Recorrer la lista de archivos y almacenar los nombres en el array
        foreach ($archivos as $archivo) {
            $nombresArchivos[] = $archivo;
        }

        // Imprimir o usar el array según sea necesario
        return $nombresArchivos;
    }
    
}