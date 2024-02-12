<?php

    class InmuebleControlador extends Controlador{

        private $inmueble;

        public function __construct(){
            session_start();
            $this->inmueble = $this->modelo('InmuebleModelo');
            
            $this->usuario = $this->modelo('UserModelo');
            $datos['id_usuario']=$_SESSION['usuarioSesion']['id_usuario'];
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

        // public function addinmueble(){
        //     if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['publicarOfertaInmueble'])){
        //         $inmueble['metrosCuadrados'] = $_POST["metrosCuadrados"];
        //         $inmueble['descripcion'] = $_POST["descripcion"];
        //         $inmueble['distribucion'] = $_POST["distribucion"];
        //         $inmueble['precio'] = $_POST["precio"];
        //         $inmueble['estado'] = $_POST["estado"];
        //         $inmueble['ubicacion'] = $_POST["calle"].','.$_POST["numero"].'.'. $_POST["puerta"];
        //         $inmueble['localidad'] = $_POST["localidad"];
        //         $inmueble['caracteristicas'] = implode(',', $_POST['caracteristicas']);
        //         $inmueble['equipamiento'] = $_POST['equipamiento'];
        //         $inmueble['municipio'] = $_POST['municipio'];
        //         $inmueble['estado'] = $_POST['estado'];

        //         $this->inmueble->insertarInmueble($inmueble);       
        //     }else{
        //         $this->vista('ofertas/insertarofertas', $this->datos);
        //     }
        // }

        public function comentar($id_inmueble=0){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nuevoComentario['nif']=$_POST['NIF'];
                $nuevoComentario['id_inmueble']=$id_inmueble;
                $nuevoComentario['puntuacion']=$_POST['puntuacion'];
                $nuevoComentario['comentario']=$_POST['comentario'];
                $nuevoComentario['fecha']= date('Y-m-d');
              
            $this->datos['inmueble'] = $this->inmueble->crearComentarioInmueble($nuevoComentario);  
                redirecionar("/ofertasControlador/listar");
        }else{
            $this->datos['inmueble']['id_inmueble'] = $id_inmueble;
            $this->vista('inmuebles/valoracion', $this->datos);
        }  

        }

    }