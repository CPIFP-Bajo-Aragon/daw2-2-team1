<?php
/*DESARROLLO*/
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
/*DESARROLLO*/


    //Ruta de la aplicacion
    define('RUTA_APP', dirname(dirname(__FILE__)));


    //Ruta url
    // define('RUTA_URL', 'http://localhost/mvc_completo');
    define('RUTA_URL', '');

    //
    define('NOMBRE_SITIO', 'CRUD MVC - DAW2 Alcañiz');
 
    define('DB_HOST', 'localhost');
    define('DB_USUARIO', 'team0');
    define('DB_PASSWORD', 'team0');
    define('DB_NOMBRE', 'mydb');
    
    //Tamaño paginacion.
    define('TAM_PAGINA', 2);
