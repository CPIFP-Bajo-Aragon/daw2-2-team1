<?php

    class EntidadesControlador extends Controlador{

        private $EntidadesModelo;
        private $DocumentosModelo;
        private $oferta;
        private $municipiosmodelo;
        private $inmueble;
        private $usuario;
        private $admin;
        private $notificacionmodelo;
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
            $this->notificacionmodelo = $this->modelo('NotificacionesModelo');
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
            $this->vista('entidades/verentidades', $this->datos);
        }

        public function listarentidades(){
            $id_usuario=$_SESSION["usuarioSesion"]['id_usuario'];
            $this->datos['ent']=$this->EntidadesModelo->listar($id_usuario);

            $this->datos['entno']=$this->EntidadesModelo->listarEntidadnoincrito($id_usuario);
            $this->vista('entidad/verentidades', $this->datos);
        }

        public function editarentidades($identidad=0){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nombre_usuario= $this->datos['usuarioSesion']['id_usuario'];
                $insertar['id_entidad'] = $_POST['id_entidad'];
                $insertar['nombre_entidad'] = $_POST['nombre_entidad'];
                $insertar['cif_entidad'] = $_POST['cif'];
                $insertar['sector_entidad'] = $_POST['sector'];
                $insertar['direccion_entidad'] = $_POST['direccion'];
                $insertar['numero_telefono_entidad'] = $_POST['numero_telefonico'];
                $insertar['correo_entidad'] = $_POST['correo'];
                $insertar['pagina_web_entidad'] = $_POST['pagina_web'];

                $funciona=$this->EntidadesModelo->editarentidad($insertar);

                $contenido="Buenas Sr./Sra.  ". $nombre_usuario ." le informamos que has editado la entidad: ". $insertar['nombre_entidad'] ." y que los cambios se han realizado correctamente. Un saludo";
                $titulo="Has editado una entidad";

                if($funciona==true){
                    $this->notificacionmodelo->añadirNotificacion($this->datos['usuarioSesion']['correo_usuario'], $nombre_usuario, $titulo);
                }
                if($this->datos['usuarioSesion']['notificar_notificaciones']==1){
                    Mailer::Notificacion($this->datos['usuarioSesion']['correo_usuario'], $titulo, $contenido);
                }
                redirecionar("/EntidadesControlador/listarentidades");
            }else{
                    $this->datos['EntidadEditar']=$this->EntidadesModelo->listarentidad($identidad);
                    $this->vista('entidad/editarentidad', $this->datos);   
            }
        }

        public function abandonarentidad($identidad=0){
            $id_usuario=$this->datos["usuarioSesion"]['id_usuario'];
            $nombre_usuario=$this->datos["usuarioSesion"]['nombre_usuario'];

            $funciona=$this->EntidadesModelo->abandonarentidad($identidad, $id_usuario);
                $contenido="Buenas Sr./Sra.  ". $nombre_usuario ." le informamos que has abandonado la entidad : " .". Un saludo";
                $titulo="Abandonar entidad";
            if($funciona==true){
                
                $this->notificacionmodelo->añadirNotificacion($contenido, $id_usuario, $titulo);
            }
            if($this->datos['usuarioSesion']['notificar_notificaciones']){
                Mailer::Notificacion($this->datos['usuarioSesion']['correo_usuario'], $titulo, $contenido);
            }
            redirecionar("/EntidadesControlador/listarentidades");
          
        }
        

        public function addentidades(){
          
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $datos['id_usuario']=$_SESSION["usuarioSesion"]['id_usuario'];
                    $datos['nombre_entidad'] = $_POST["nombre_entidad"];
                    $datos['cif'] = $_POST["cif"];
                    $datos['sector'] = $_POST["sector"];
                    $datos['direccion'] = $_POST["direccion"];
                    $datos['numero_telefonico'] = $_POST["numero_telefonico"];
                    $datos['correo'] = $_POST["correo"];
                    $datos['pagina_web'] = $_POST["pagina_web"];

                    $funciona=$this->EntidadesModelo->crear($datos);
                    $contenido="Buenas Sr./Sra.  ". $datos['id_usuario'] ." le informamos que has creado la entidad: ". $datos['nombre_entidad'] .". Un saludo";
                    $titulo="Añadir Entidad";
                    if($funciona==true){
                        $this->notificacionmodelo->añadirNotificacion($contenido,  $datos['id_usuario'], $titulo);
                    }
                    if($this->datos['usuarioSesion']['notificar_notificaciones']){
                        Mailer::Notificacion($this->datos['usuarioSesion']['correo_usuario'], $titulo, $contenido);                
                    }
                    redirecionar('/EntidadesControlador/listarentidades');
                }else{
                    $this->vista('entidad/añadirentidades', $this->datos);
            }
        }

        public function solicitarentidades(){
            $id_usuario = $this->datos["usuarioSesion"]['id_usuario'];
            $id_entidad = $_POST['id_entidad'];
            
            try {
                $funciona = $this->EntidadesModelo->insertarsolicitud($id_usuario, $id_entidad);
                if($funciona){
                    $contenido = "Buenas Sr./Sra. " . " le informamos que has solicitado la entrada a la entidad. Un saludo";
                    $titulo = "Solicitar participacion en entidad";
                    $this->notificacionmodelo->añadirNotificacion($contenido, $id_usuario, $titulo);
                    if($this->datos['usuarioSesion']['notificar_notificaciones']){
                        Mailer::Notificacion($this->datos['usuarioSesion']['correo_usuario'], $titulo, $contenido);                
                    }
                }
                redirecionar('/EntidadesControlador/listarentidades/');
            } catch(PDOException $e) {
                echo "<script>alert('Error al insertar en la base de datos: " . $e->getMessage() . "');</script>";
                redirecionar('/EntidadesControlador/listarentidades/');
            }
        }
        
        public function verSolicitudes(){
            $this->vista('entidad/verSolicitudes', $this->datos);   
        }
        
        
        
    }