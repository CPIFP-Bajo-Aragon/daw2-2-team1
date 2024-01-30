<?php

    class EntidadesControlador extends Controlador{

        private $EntidadesModelo;

        public function __construct(){
            session_start();
            $this->EntidadesModelo = $this->modelo('EntidadesModelo');
            
            $this->usuario = $this->modelo('UserModelo');
            $datos['nif']=$_SESSION['usuarioSesion']['NIF'];
            
            $this->admin = $this->modelo('AdminModelo');
            $this->datos['admin'] = $this->admin->ListarAdmins();

            $this->datos['noti'] = $this->usuario->listarnotificaciones($datos);
            $this->datos['chats'] = $this->usuario->listaruserchat($datos);

            
            if (!isset($_SESSION["usuarioSesion"]) || empty($_SESSION["usuarioSesion"]) || $_SESSION["usuarioSesion"]["admin"]==0) {
                redirecionar(RUTA_URL.'/');
            }
        }
        public function index(){   
            $this->vista('entidades/verentidades', $this->datos);
        }

        public function listarentidades(){
            $nif=$_SESSION["usuarioSesion"]['NIF'];
            $this->datos['ent']=$this->EntidadesModelo->listar($nif);
            $this->vista('entidad/verentidades', $this->datos);
        }

        public function addentidades(){
          
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $datos['nif']=$_SESSION["usuarioSesion"]['NIF'];
                    $datos['nombre_entidad'] = $_POST["nombre_entidad"];
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