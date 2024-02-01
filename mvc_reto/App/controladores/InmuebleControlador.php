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
            if (!isset($_SESSION["usuarioSesion"]) || empty($_SESSION["usuarioSesion"])) {
                redirecionar(RUTA_URL.'/');
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["marcarnotificacionesleido"])) {
                    $this->usuario->marcarvistastodasnotificaciones($datos);
                }
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
            $this->datos['inmueble']['codigo_inmueble'] = $id_oferta;
            $this->vista('inmuebles/valoracion', $this->datos);
        }  

        }

    }