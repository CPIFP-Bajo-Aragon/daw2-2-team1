<?php
    //Controlador principal de todos los controladores
    //Se encarga de cargar los models y las vistas
    
    class Controlador{

        //array para almacenar los datos y poder cargar algunos en el controlador
        //inicializo con roles vacio (acceso libre) para evitar errores
        protected $datos = ['rolesPermitidos' =>[]];

        public function modelo($modelo){
            require_once '../App/modelos/'.$modelo.'.php';
            return new $modelo;
        }
        

        //Cargar vista
        public function vista($vista, $datos = []){
            //comprobamos si existe el archivo
            if(file_exists('../App/vistas/'.$vista.'.php')){
                require_once '../App/vistas/'.$vista.'.php';
            }else{
                die('la vista no existe');
            }
        }

        //cargar vista api
        public function vistaApi($datos){
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            echo json_encode($datos);
            exit(); 

        }
    }
