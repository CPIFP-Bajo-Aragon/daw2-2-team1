<?php

    class MunicipiosControlador extends Controlador{

        private $EntidadesModelo;
        private $DocumentosModelo;
        private $oferta;
        private $municipiosmodelo;
        private $inmueble;
        private $usuario;
        private $admin;
        public $datos;

        public function __construct(){
            session_start();
            $this->EntidadesModelo = $this->modelo('EntidadesModelo');
            $this->DocumentosModelo = $this->modelo('DocumentosModelo');
            $this->oferta = $this->modelo('OfertasModelo');
            $this->municipiosmodelo = $this->modelo('MunicipiosModelo');
            $this->inmueble = $this->modelo('InmuebleModelo');
            $this->usuario = $this->modelo('UserModelo');
            $this->admin = $this->modelo('AdminModelo');
            $this->datos['admin'] = $this->admin->ListarAdmins();
            $this->datos['usuarioSesion']=$_SESSION['usuarioSesion'];
            $this->datos['usuarioSesion']['noti'] = $this->usuario->listarnotificaciones($this->datos['usuarioSesion']);
            $this->datos['usuarioSesion']['chats'] = $this->usuario->listaruserchat($this->datos['usuarioSesion']);
            $this->datos['usuarioSesion']['advertencias'] = $this->usuario->listaradvertencias($this->datos['usuarioSesion']);
            $this->datos['municipioslistar'] = $this->municipiosmodelo->listarMunicipio();

            foreach ($this->datos['usuarioSesion']['chats'] as $usuario) {
                $idUsuario = $this->datos['usuarioSesion']['id_usuario'];
                $idOtroUsuario = $usuario->id_usuario;
                $mensaje=$this->usuario->listarultimomensaje($idUsuario, $idOtroUsuario);
                $usuario->ultimoMensaje=$mensaje;
            }

            if (!isset($_SESSION["usuarioSesion"]) || empty($_SESSION["usuarioSesion"])) {
                redirecionar(RUTA_URL.'/');
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["marcarnotificacionesleido"])) {
                    $this->usuario->marcarvistastodasnotificaciones($datos);
                }
            }
        }

        public function listarMunicipios(){
            $this->datos['municipioslistar'] = $this->municipiosmodelo->listarMunicipio();            
            $this->vista('ofertas/ofertas', $this->datos);
        }

        public function añadirMunicipios(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                if (isset($_POST['tipoInmueble'])) {
                    $municipio['tipoInmueble'] = $_POST['tipoInmueble'];
                }
                if (isset($_POST['tipoVivienda'])) {
                    $municipio['tipoVivienda'] = $_POST['tipoVivienda'];
                }
                $municipio['nombre'] = $_POST["nombre"];
                $municipio['descripcion'] = $_POST["descripcion"];
                $municipio['precio'] = $_POST["precio"];
                $municipio['ubicacion'] = $_POST["calle"].','.$_POST["numero"].','.$_POST["puerta"];
                $municipio['localidad'] = $_POST["localidad"];
                $municipio['metrosCuadrados'] = $_POST["metrosCuadrados"];
                $municipio['caracteristicas'] = implode(',', $_POST['caracteristicas']);
                if (isset($_POST['estado'])) {
                    $municipio['estado'] = $_POST['estado'];
                }
                if (isset($_POST['equipamiento'])) {
                    $municipio['equipamiento'] = $_POST['equipamiento'];
                }

            }
        }
        
        
    }