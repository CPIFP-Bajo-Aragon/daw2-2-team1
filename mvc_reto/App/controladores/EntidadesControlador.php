<?php

    class EntidadesControlador extends Controlador{

        private $EntidadesModelo;

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
            $this->vista('entidades/verentidades', $this->datos);
        }

        public function listarentidades(){
            $id_usuario=$_SESSION["usuarioSesion"]['id_usuario'];
            $this->datos['ent']=$this->EntidadesModelo->listar($id_usuario);
            $this->vista('entidad/verentidades', $this->datos);
        }

        

        public function addentidades(){
          
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $datos['id_usuario']=$_SESSION["usuarioSesion"]['id_usuario'];
                    $datos['nombre_entidad'] = $_POST["nombre_entidad"];
                    $datos['cif'] = $_POST["cif"];
                    $datos['sector'] = $_POST["sector"];
                    $datos['direccion'] = $_POST["dirección"];
                    $datos['numero_telefonico'] = $_POST["número_telefónico"];
                    $datos['correo'] = $_POST["correo"];
                    $datos['pagina_web'] = $_POST["página_web"];

                    $this->EntidadesModelo->crear($datos);
                    
                    redirecionar('/EntidadesControlador/listarentidades');
                }else{
                    $this->vista('entidad/añadirentidades', $this->datos);
            }
        }
    }