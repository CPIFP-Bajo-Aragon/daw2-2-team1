<?php

    class ServiciosControlador extends Controlador{

        
        private $servicios;
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
            $this->datos['municipioslistar'] = $this->municipiosmodelo->listarMunicipio();

            

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
        
            echo "index";
        }

        public function listarServicios(){
           
            foreach($this->datos['municipioslistar'] as $municipio){
                $municipio->servicios = $this->servicios->listarServicio();

                foreach($municipio->servicios as $servicio){
                    $servicio->empresas = $this->servicios->listarServicioempresas($municipio->id_municipio, $servicio->id_tipo_servicio);
                }

            }
            //print_r($this->datos['municipioslistar']);
            $this->vista("servicios/listarservicios", $this->datos);
        }
    }