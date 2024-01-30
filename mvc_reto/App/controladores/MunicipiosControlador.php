<?php

    class MunicipiosControlador extends Controlador{

        private $municipiosmodelo;

        public function __construct(){
            session_start();
            $this->municipiosmodelo = $this->modelo('MunicipiosModelo');
            
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

        public function listarMunicipios(){
            $this->datos['municipioslistar'] = $this->municipiosmodelo->listarMunicipio();            
            $this->vista('ofertas/ofertas', $this->datos);
        }

        public function añadirMunicipios(){
            
        }
        
        
    }