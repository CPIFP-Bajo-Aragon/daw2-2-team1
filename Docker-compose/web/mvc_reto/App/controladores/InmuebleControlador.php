<?php

    class InmuebleControlador extends Controlador{

        
        private $EntidadesModelo;
        private $DocumentosModelo;
        private $oferta;
        private $municipiosmodelo;
        private $notificacionmodelo;
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
            $this->notificacionmodelo = $this->modelo('NotificacionesModelo');
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
        public function index(){
        }

        // public function addinmueble(){
        //     if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['publicarOfertaInmueble'])){
        //         $inmueble['metrosCuadrados'] = $_POST["metrosCuadrados"];
        //         $inmueble['descripcion'] = $_POST["descripcion"];
        //         $inmueble['distribucion'] = $_POST["distribucion"];
        //         $inmueble['precio'] = $_POST["precio"];
        //         $inmueble['estado'] = $_POST["estado"];
        //         $inmueble['ubicacion'] = $_POST["calle"].','.$_POST["numero"].'.'. $_POST["puerta"];
        //         $inmueble['localidad'] = $_POST["localidad"];
        //         $inmueble['caracteristicas'] = implode(',', $_POST['caracteristicas']);
        //         $inmueble['equipamiento'] = $_POST['equipamiento'];
        //         $inmueble['municipio'] = $_POST['municipio'];
        //         $inmueble['estado'] = $_POST['estado'];

        //         $this->inmueble->insertarInmueble($inmueble);       
        //     }else{
        //         $this->vista('ofertas/insertarofertas', $this->datos);
        //     }
        // }

        public function comentar($id_inmueble=0, $id_oferta=0){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nuevoComentario['id_usuario']=$_POST['id_usuario'];
                $id_usuario=$_POST['id_usuario'];
                $nuevoComentario['id_inmueble']=$id_inmueble;
                $nuevoComentario['puntuacion']=$_POST['rating'];
                $nuevoComentario['comentario']=$_POST['comentario'];
                $nombre_usuario= $_SESSION['usuarioSesion']['nombre_usuario'];
                $funciona= $this->inmueble->crearComentarioInmueble($nuevoComentario);  
                $contenido="Buenas Sr./Sra.  ". $nombre_usuario ." le informamos que has comentado en el inmueble: ". ". Un saludo";
                $titulo="Comentar en inmueble";
                if($funciona==true){
                    
                    $this->notificacionmodelo->añadirNotificacion($contenido, $id_usuario, $titulo);
                }
                if($this->datos['usuarioSesion']['notificar_notificaciones']){
                    Mailer::Notificacion($this->datos['usuarioSesion']['correo_usuario'], $titulo, $contenido);                
                }
                redirecionar("/OfertasControlador/mostrarOfertas");
            }else{
                $this->datos['inmueble']['id_inmueble'] = $id_inmueble;
                $this->vista('inmuebles/valoracion', $this->datos);
            }  

        }

    }