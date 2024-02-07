<?php

    class MunicipiosControlador extends Controlador{

        private $municipiosmodelo;

        public function __construct(){
            session_start();
            $this->municipiosmodelo = $this->modelo('MunicipiosModelo');
            
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