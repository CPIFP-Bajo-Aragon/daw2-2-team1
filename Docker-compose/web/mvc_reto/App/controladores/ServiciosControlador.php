<?php

    class ServiciosControlador extends Controlador{

        
        private $servicios;
        private $EntidadesModelo;
        private $DocumentosModelo;
        private $negociomodelo;
        private $oferta;
        private $ser;
        private $municipiosmodelo;
        private $inmueble;
        private $usuario;
        private $admin;
        public $datos;
        
        
        public function __construct(){
            session_start();
            $this->servicios = $this->modelo('ServiciosModelo');
            $this->negociomodelo = $this->modelo('NegocioModelo');
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
            $this->datos['tipoServicioListar'] = $this->servicios->listarServicio();
            $this->datos['totalServicios'] = $this->servicios->obtenerTotalServicios();



            foreach ($this->datos['usuarioSesion']['chats'] as $usuario) {
                $idUsuario = $this->datos['usuarioSesion']['id_usuario'];
                $idOtroUsuario = $usuario->id_usuario;
                $mensaje=$this->usuario->listarultimomensaje($idUsuario, $idOtroUsuario);
                $usuario->ultimoMensaje=$mensaje;
            }
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["marcarnotificacionesleido"])) {
                    $this->usuario->marcarvistastodasnotificaciones($datos);
                }
            }
        }

        public function index(){
        
            echo "index";
        }

        public function listarServicios($municipio=0){           
            //print_r($this->datos['municipioslistar']);
            $this->datos['totalServicios']=$this->servicios->obtenerTotalServicios();

            $this->vista("servicios/listarservicios", $this->datos);
        }

        public function obtenerServicios($municipio=0, $tipo_servicio=0, $buscador=0, $offset=0){
            $servicios=$this->servicios->listarServicioempresas($municipio, $tipo_servicio, $buscador, $offset);
            $this->vistaApi($servicios);
        }
    }