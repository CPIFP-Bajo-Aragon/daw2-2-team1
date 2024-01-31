<?php

    class AdminControlador extends Controlador{

        
        private $oferta;
        public function __construct(){
            session_start();
            $this->oferta = $this->modelo('AdminModelo');
            $this->usuario = $this->modelo('UserModelo');
            $this->admin = $this->modelo('AdminModelo');
            $this->datos['admin'] = $this->admin->ListarAdmins();
            
            $datos['nif']=$_SESSION['usuarioSesion']['NIF'];
            $this->datos['noti'] = $this->usuario->listarnotificaciones($datos);
            $this->datos['chats'] = $this->usuario->listaruserchat($datos);
            if (!isset($_SESSION["usuarioSesion"]) || empty($_SESSION["usuarioSesion"]) || $_SESSION["usuarioSesion"]["admin"]==1) {
                redirecionar(RUTA_URL.'/');
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["marcarnotificacionesleido"])) {
                    $this->usuario->marcarvistastodasnotificaciones($datos);
                }
            }
        }


        public function index(){
        
            $this->vista('admin/inicio');

        }

        public function listarInmuebles(){
            $this->datos['inmuebleslistar'] = $this->oferta->verInmuebles();
            $this->vista('admin/verInmuebles', $this->datos);
        }

        public function listarNegocios(){
            $this->datos['negocioslistar'] = $this->oferta->verNegocios();
            $this->vista('admin/verNegocios', $this->datos);
        }

        public function listarUsuarios(){
            $this->datos['usuarioslistar'] = $this->oferta->verUsuarios();
            $this->vista('admin/verUsuarios', $this->datos);
        }

        public function añadirInmuebleA(){
            $this->vista('admin/añadirInmueble', $this->datos);
        }

       
        
    }