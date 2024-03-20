<?php

    class NegocioControlador extends Controlador{

        private $notificacionmodelo;
        private $negociomodelo;
        private $EntidadesModelo;
        private $DocumentosModelo;
        private $oferta;
        private $municipiosmodelo;
        private $inmueble;
        private $usuario;
        private $admin;
        public $datos;


        public function __construct(){
            Sesion::IniciarSesion($this->datos);
            $this->negociomodelo = $this->modelo('NegocioModelo');
            $this->EntidadesModelo = $this->modelo('EntidadesModelo');
            $this->notificacionmodelo = $this->modelo('NotificacionesModelo');
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

            foreach ($this->datos['usuarioSesion']['chats'] as $usuario) {
                $idUsuario = $this->datos['usuarioSesion']['id_usuario'];
                $idOtroUsuario = $usuario->id_usuario;
                $mensaje=$this->usuario->listarultimomensaje($idUsuario, $idOtroUsuario);
                $usuario->ultimoMensaje=$mensaje;
            }

            if (!isset($_SESSION["usuarioSesion"]) || empty($_SESSION["usuarioSesion"])) {
                redirecionar('/LoginControlador/sesion');
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["marcarnotificacionesleido"])) {
                    $this->usuario->marcarvistastodasnotificaciones($datos);
                }
            }
        }

        public function index(){
        }

        public function mostrarNegocios($municipio=0){           
            $this->vista('negocios/vernegocio', $this->datos);
        }

        public function addnegocio(){
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $negocio['codigo_inmueble'] = $_POST["codigo_inmueble"];
                $negocio['codigo_negocio'] = $_POST["codigo_negocio"];
                $negocio['titulo'] = $_POST["titulo"];
                $negocio['motivo_traspaso'] = $_POST["motivo_traspaso"];
                $negocio['coste_traspaso'] = $_POST["coste_traspaso"];
                $negocio['coste_mensual'] = $_POST["coste_mensual"];
                $negocio['ubicacion'] = $_POST["ubicacion"];
                $negocio['descripcion'] = $_POST["descripcion"];
                $negocio['capital_minimo'] = $_POST["capital_minimo"];
                $this->negociomodelo->addnegocios($negocio);

            }else{
                $id_usuario = $_SESSION['usuarioSesion']['id_usuario'];
                $this->datos['localeslistar'] = $this->modelo('OfertasModelo')->listarLocalesofertas($id_usuario);
                //print_r($this->datos['localeslistar']);
                $this->vista('negocios/insertarnegocio', $this->datos);
            }

        }

        public function listnegociopropio(){
            $id_usuario = $_SESSION['usuarioSesion']['id_usuario'];
            $this->datos['negocioslistar'] = $this->negociomodelo->listarnegociospropio($id_usuario);
            //print_r($this->datos['negocioslistar']);
            $this->vista('negocios/vernegociopropio', $this->datos);

        } 

        public function listnegocio($municipioValor=0){
            $id_usuario = $_SESSION['usuarioSesion']['id_usuario'];
            $this->datos['negocioslistar'] = $this->negociomodelo->listarnegocios($id_usuario, $municipioValor);
            foreach ($this->datos['negocioslistar'] as $negocio) {
                // Check if d_inmueble is set before trying to use it
                if (isset($negocio->d_inmueble)) {
                    $imagen = $this->oferta->listarofertasimagen($negocio->d_inmueble);
                    $negocio->imagenes = $imagen;
                } else {
                    // Handle the case when d_inmueble is not set (e.g., provide a default value or log an error)
                    $negocio->imagenes = []; // Set a default value or handle accordingly
                }
            
                $apuntados = $this->oferta->listarofertasapuntados($negocio->id_oferta);
                $negocio->apuntados = $apuntados;
            }
            
            //print_r($this->datos['negocioslistar']);
            //$this->vista('negocios/vernegocio', $this->datos);
            $this->vistaAPI($this->datos['negocioslistar']);
        }

        public function comentar($id_negocio=0){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nuevoComentario['nif']=$_POST['NIF'];
                $nuevoComentario['codigo_negocio']=$_POST['codigo_negocio'];
                $nuevoComentario['puntuacion']=$_POST['puntuacion'];
                $nuevoComentario['comentario']=$_POST['comentario'];
                $nuevoComentario['fecha']= date('Y-m-d');
                
                $funciona=$this->negociomodelo->crearComentarioNegocio($nuevoComentario);
                $contenido="Buenas Sr./Sra.  ". $nombre_usuario ." le informamos que has comentado en el negocio: ". $insertar['nombre_entidad'] .". Un saludo";
                $titulo="Editar negocio";
                if($funciona==true){
                    
                    $this->notificacionmodelo->añadirNotificacion($contenido, $id_usuario, $Titulo);
                }
                if($this->datos['usuarioSesion']['notificar_notificaciones']){
                    Mailer::Notificacion($this->datos['usuarioSesion']['correo_usuario'], $titulo, $contenido);                

                }
                
                redirecionar("/NegocioControlador/listnegocio");
                
            }else{
                $this->datos['negocio']['id']=$id_negocio;
                $this->vista('/negocios/valoracion', $this->datos);
            }  

        }
        
        public function editarnegocio(){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Verificar si se ha enviado un formulario específico
                if (isset($_POST["enviarOfertaBtn"])) {
                    $titulo_oferta = $_POST['titulo_oferta'];
                    $fecha_inicio_oferta = $_POST['fecha_inicio_oferta'];
                    $fecha_fin_oferta = $_POST['fecha_fin_oferta'];
                    $condiciones_oferta = $_POST['condiciones_oferta'];
                    $descripcion_oferta = $_POST['descripcion_oferta'];
                    
                } elseif (isset($_POST["habilitarBtnLocal"])) {
                    // Recoger datos del inmueble
                    $idInmueble = $_POST["id_inmueble"];
                    $metrosCuadradosInmueble = $_POST["metros_cuadrados_inmueble"];
                    // ... otros campos del inmueble
            
                    // Procesar los datos del inmueble
                    // ...
                } elseif (isset($_POST["enviarNegocioBtn"])) {
                    // Recoger datos del negocio
                    $motivoTraspasoNegocio = $_POST["motivo_traspaso_negocio"];
                    $costeMensualNegocio = $_POST["coste_mensual_negocio"];
                    // ... otros campos del negocio
            
                    // Procesar los datos del negocio
                    // ...
                }else {
                    $id=$_POST['id_negocio'];
                    $this->datos['oferta'] = $this->oferta->verOfertaCompleta($id);

                    $id_negocio=$this->datos['oferta']->id_negocio;
                    $this->datos['oferta']->Datosnegocio = $this->negociomodelo->verNegocioCompleta($id_negocio);
                    if($this->datos['oferta']->Datosnegocio->local_id_inmueble !== null){
                        $this->datos['oferta']->DatosLocal = $this->negociomodelo->verLocal($id_negocio);
                    }
                    $this->datos['negocio']['id']=$id_negocio;
                    $this->vista('/negocios/editarnegocio', $this->datos);
                }
            }
            
                
            

        }

        public function eliminarnegocio($id_negocio=0){
                $funciona=$this->negociomodelo->eliminarNegocio($id_negocio);
                
                /*   $contenido="Buenas Sr./Sra. le informamos que has desactivado el negocio. Un saludo";
                    $titulo="Eliminar negocio";
                if($funciona==true){
                    
                    $this->notificacionmodelo->añadirNotificacion($contenido, $id_usuario, $titulo);
                }
                if($this->datos['usuarioSesion']['notificar_notificaciones']){
                    Mailer::Notificacion($this->datos['usuarioSesion']['correo_usuario'], $titulo, $contenido);                

                }*/
            redirecionar("/NegocioControlador/listnegociopropio");

        }
        
        public function activarnegocio($id){
            $funciona=$this->negociomodelo->activarnegocio($id);
           /* $id_usuario = $_SESSION['usuarioSesion']['id_usuario'];
            $nombre_usuario = $_SESSION['usuarioSesion']['nombre_usuario'];
            $contenido="Buenas Sr./Sra.  ". $nombre_usuario ." le informamos que has activado el negocio. Un saludo";
            $titulo="Activación de  negocio";
            if($funciona==true){
                
                $this->notificacionmodelo->añadirNotificacion($contenido, $id_usuario, $titulo);
            }
            if($this->datos['usuarioSesion']['notificar_notificaciones']){
                Mailer::Notificacion($this->datos['usuarioSesion']['correo_usuario'], $titulo, $contenido);                

            }*/

            redirecionar("/NegocioControlador/listnegociopropio");

        }

        public function verusuariosinscritosNegocio() {
            $id_oferta = $_POST['id_oferta'];


            $this->datos['usuarioslistar'] = $this->oferta->listaruserinscritos($id_oferta);
            
            $this->vista('negocios/verinscritos', $this->datos);
        }

        public function InscripccionOferta($id_oferta = 0) {
            
            $id_usuario = $_SESSION['usuarioSesion']['id_usuario'];
            $nombre_usuario = $_SESSION['usuarioSesion']['nombre_usuario'];
            $funciona=$this->oferta->insertarInscripcion($id_oferta, $_SESSION['usuarioSesion']['id_usuario']);
            $contenido="Buenas Sr./Sra.  ". $nombre_usuario ." le informamos que ha inscrito  la oferta: "." correctamente. Un saludo";
            $titulo="Inscripcion de  oferta";

            if($funciona==true){
                $this->notificacionmodelo->añadirNotificacion($contenido, $id_usuario, $titulo);
            }

            if($this->datos['usuarioSesion']['notificar_notificaciones']){
                //Mailer::Notificacion($this->datos['usuarioSesion']['correo_usuario'], $titulo, $contenido);                

            }

            redirecionar('/NegocioControlador/mostrarNegocios');
        }

        public function verMas(){
            $id = $_POST['id_oferta'];
            $this->datos['oferta'] = $this->oferta->verOfertaCompleta($id);
            $id_negocio=$this->datos['oferta']->id_negocio;
            $this->datos['oferta']->Datosnegocio = $this->negociomodelo->verNegocioCompleta($id_negocio);
            if($this->datos['oferta']->Datosnegocio->local_id_inmueble !== null){
                $this->datos['oferta']->DatosLocal = $this->negociomodelo->verLocal($id_negocio);
            }


            $this->vista('negocios/verMas', $this->datos);

        }
    }