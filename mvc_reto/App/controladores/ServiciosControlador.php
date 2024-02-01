<?php

    class ServiciosControlador extends Controlador{

        
        private $servicios;
        public function __construct(){
            session_start();
            $this->oferta = $this->modelo('OfertasModelo');
            $this->municipiosmodelo = $this->modelo('MunicipiosModelo');
            $this->inmueble = $this->modelo('InmuebleModelo');
            $this->usuario = $this->modelo('UserModelo');
            $this->admin = $this->modelo('AdminModelo');
            $this->servicios = $this->modelo('ServiciosModelo');


            $this->datos['admin'] = $this->admin->ListarAdmins();
            $datos['nif']=$_SESSION['usuarioSesion']['NIF'];
            $this->datos['noti'] = $this->usuario->listarnotificaciones($datos);
            $this->datos['chats'] = $this->usuario->listaruserchat($datos);
            $this->datos['municipioslistar']=$this->municipiosmodelo->listarMunicipio();

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
                $municipio->servicios = $this->servicios->listarServicio($municipio->id_municipio);
            }
            $this->vista("servicios/listarservicios", $this->datos);
        }
    }