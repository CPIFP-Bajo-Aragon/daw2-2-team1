<?php

    class InmuebleControlador extends Controlador{

        private $inmueble;

        public function __construct(){
            session_start();
            $this->inmueble = $this->modelo('InmuebleModelo');
            
            $this->usuario = $this->modelo('UserModelo');
            $datos['nif']=$_SESSION['usuarioSesion']['NIF'];
            $this->datos['noti'] = $this->usuario->listarnotificaciones($datos);
            $this->datos['chats'] = $this->usuario->listaruserchat($datos);

            $this->admin = $this->modelo('AdminModelo');
            $this->datos['admin'] = $this->admin->ListarAdmins();
            if (!isset($_SESSION["usuarioSesion"]) || empty($_SESSION["usuarioSesion"]) || $_SESSION["usuarioSesion"]["admin"]==0) {
                redirecionar(RUTA_URL.'/');
            }
        }
        public function index(){
        }

        public function addinmueble(){
            $this->vista('inmuebles/add');

        }

        public function comentar($id_oferta=0){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nuevoComentario['nif']=$_POST['NIF'];
                $nuevoComentario['codigo_inmueble']=$id_oferta;
                $nuevoComentario['puntuacion']=$_POST['puntuacion'];
                $nuevoComentario['comentario']=$_POST['comentario'];
                $nuevoComentario['fecha']= date('Y-m-d');
              
            $this->datos['inmueble'] = $this->inmueble->crearComentarioInmueble($nuevoComentario);  
                redirecionar("/ofertasControlador/listar");
        }else{
           
            $this->vista('inmuebles/valoracion', $this->datos);
        }  

        }

        

    }