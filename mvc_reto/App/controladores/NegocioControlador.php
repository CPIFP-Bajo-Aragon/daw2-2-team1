<?php

    class NegocioControlador extends Controlador{

        private $negociomodelo;

        public function __construct(){
            session_start();
            $this->negociomodelo = $this->modelo('NegocioModelo');

            
            $this->admin = $this->modelo('AdminModelo');
            $this->datos['admin'] = $this->admin->ListarAdmins();
            
            $this->usuario = $this->modelo('UserModelo');

            $datos['nif']=$_SESSION['usuarioSesion']['NIF'];
            $this->datos['noti'] = $this->usuario->listarnotificaciones($datos);
            $this->datos['chats'] = $this->usuario->listaruserchat($datos);
            if (!isset($_SESSION["usuarioSesion"]) || empty($_SESSION["usuarioSesion"])|| $_SESSION["usuarioSesion"]["admin"]==0) {
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

        public function addnegocio(){
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $negocio['codigo_inmueble'] = $_POST["codigo_inmueble"];
                $negocio['codigo_negocio'] = $_POST["codigo_negocio"];
                $negocio['titulo'] = $_POST["titulo"];
                $negocio['motivo_traspaso'] = $_POST["motivo_traspaso"];
                $negocio['coste_traspaso'] = $_POST["coste_traspaso"];
                $negocio['coste_mensual'] = $_POST["coste_mensual"];
                $negocio['ubicacion'] = $_POST["ubicacion"];
                $negocio['descripcion'] = $_POST["descripcion"];
                $negocio['capital_minimo'] = $_POST["capital_minimo"];
                $this->negociomodelo->addnegocios($negocio);

            }else{
                $nif = $_SESSION['usuarioSesion']['NIF'];
                $this->datos['localeslistar'] = $this->modelo('OfertasModelo')->listarLocalesofertas($nif);
                //print_r($this->datos['localeslistar']);
                $this->vista('negocios/insertarnegocio', $this->datos);
            }

        }

        public function listnegociopropio(){
            $nif = $_SESSION['usuarioSesion']['NIF'];
            $this->datos['negocioslistar'] = $this->negociomodelo->listarnegociospropio($nif);
            //print_r($this->datos['negocioslistar']);
            $this->vista('negocios/vernegociopropio', $this->datos);

        } 

        public function listnegocio(){
            $nif = $_SESSION['usuarioSesion']['NIF'];
            $this->datos['negocioslistar'] = $this->negociomodelo->listarnegocios($nif);
            //print_r($this->datos['negocioslistar']);
            $this->vista('negocios/vernegocio', $this->datos);

        }

        public function comentar($id_negocio=0){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nuevoComentario['nif']=$_POST['NIF'];
                $nuevoComentario['codigo_negocio']=$_POST['codigo_negocio'];
                $nuevoComentario['puntuacion']=$_POST['puntuacion'];
                $nuevoComentario['comentario']=$_POST['comentario'];
                $nuevoComentario['fecha']= date('Y-m-d');
                
                $this->negociomodelo->crearComentarioNegocio($nuevoComentario);
                
                redirecionar("/NegocioControlador/listnegocio");
                
            }else{
                $this->datos['negocio']['id']=$id_negocio;
                $this->vista('/negocios/valoracion', $this->datos);
            }  

        }
        
        public function editarnegocio($id_negocio=0){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nuevoComentario['nif']=$_POST['NIF'];
                $nuevoComentario['codigo_negocio']=$_POST['codigo_negocio'];
                $nuevoComentario['puntuacion']=$_POST['puntuacion'];
                $nuevoComentario['comentario']=$_POST['comentario'];
                $nuevoComentario['fecha']= date('Y-m-d');
                
                $this->negociomodelo->crearComentarioNegocio($nuevoComentario);
                
                redirecionar("/NegocioControlador/listnegocio");
                
            }else{
                $this->datos['negocio']['id']=$id_negocio;
                $this->vista('/negocios/valoracion', $this->datos);
            }  

            }
        
    }