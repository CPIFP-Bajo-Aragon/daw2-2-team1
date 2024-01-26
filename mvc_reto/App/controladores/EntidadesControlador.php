<?php

    class EntidadesControlador extends Controlador{

        private $EntidadesModelo;

        public function __construct(){
            session_start();
            $this->EntidadesModelo = $this->modelo('EntidadesModelo');

        }
        public function index(){   
            $this->vista('entidades/verentidades');
        }

        public function listarentidades(){
            $nif=$_SESSION["usuarioSesion"]['NIF'];
            $this->ent=$this->EntidadesModelo->listar($nif);
            $this->vista('entidad/verentidades', $this->ent);
        }

        public function addentidades(){
          
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $datos['nif']=$_SESSION["usuarioSesion"]['NIF'];
                    $datos['nombre_entidad'] = $_POST["nombre_entidad"] ?? "";
                    $datos['sector'] = $_POST["sector"] ?? "";
                    $datos['direccion'] = $_POST["dirección"] ?? "";
                    $datos['numero_telefonico'] = $_POST["número_telefónico"] ?? "";
                    $datos['correo'] = $_POST["correo"] ?? "";
                    $datos['pagina_web'] = $_POST["página_web"] ?? "";

                    $this->EntidadesModelo->crear($datos);
                    $this->vista('entidad/verentidades');
                }else{
                    $this->vista('entidad/añadirentidades');
            }
        }
    }