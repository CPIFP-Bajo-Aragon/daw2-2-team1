<?php

    class UserControlador extends Controlador{

        
        private $usuario;
        private $negociomodelo;
        private $EntidadesModelo;
        private $DocumentosModelo;
        private $oferta;
        private $municipiosmodelo;
        private $inmueble;
        private $admin;
        private $mensajes;
        private $notificacionmodelo;
        public $datos;

        public function __construct(){
            Sesion::IniciarSesion($this->datos);
            $this->negociomodelo = $this->modelo('NegocioModelo');
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
                redirecionar('/LoginControlador/sesion');
            }        
        }
        public function index(){
        
            $this->vista('ofertas/ofertas');

        }
        public function todosvistos(){
            $this->vista('usuario/perfil', $this->datos); 
            
        }
        public function perfil(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["Actualizarformulario"])) {
                $this->datos['CambioEnPerfil']=0;

                $cambios['nif'] = $_POST['nif'];
                $cambios['nombre'] = $_POST['nombre'];
                $cambios['apellido'] = $_POST['apellido'];
                $cambios['email'] = $_POST['email'];
                $cambios['fecha_nacimiento'] = $_POST['fecha_nacimiento'];
                $cambios['telefono'] = $_POST['telefono'];
                $cambios['id_usuario'] = $_POST['id_usuario'];
                $id_usuario = $_POST['id_usuario'];

                // Procesar y mover la imagen si se ha seleccionado
                if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                    $nombreArchivo = 'Perfil.jpg';
                    $rutaDestino = $_SERVER['DOCUMENT_ROOT'] . '/public/images/perfil_' . $_SESSION['usuarioSesion']['id_usuario'] . '/' . $nombreArchivo;
        
                    // Eliminar la imagen antigua si existe
                    if (file_exists($rutaDestino)) {
                        unlink($rutaDestino);
                    }
        
                    // Mover el archivo al directorio de destino
                    move_uploaded_file($_FILES['foto']['tmp_name'], $rutaDestino);
        
                    // Actualizar el nombre de la imagen en la sesión y en la base de datos si es necesario
                    $_SESSION['usuarioSesion']['foto'] = '/images/perfil_' . $_SESSION['usuarioSesion']['id_usuario'] . '/' . $nombreArchivo;
                    $cambios['foto'] = '/images/perfil_' . $_SESSION['usuarioSesion']['id_usuario'] . '/' . $nombreArchivo;
                
                
                }
                $funciona=$this->usuario->editarperfil($cambios);

                if($funciona==true){
                    
                    $this->datos['usuarioSesion']['nombre_usuario'] = $cambios['nombre'];
                    $this->datos['usuarioSesion']['apellidos_usuario'] = $cambios['apellido'];
                    $this->datos['usuarioSesion']['correo_usuario'] = $cambios['email'];
                    $this->datos['usuarioSesion']['nif_usuario'] = $cambios['nif'];
                    $this->datos['usuarioSesion']['apellidos_usuario'] = $cambios['apellido'];
                    $this->datos['usuarioSesion']['telefono_usuario'] = $cambios['telefono'];

                    $_SESSION['usuarioSesion']['nombre_usuario'] = $cambios['nombre'];
                    $_SESSION['usuarioSesion']['apellidos_usuario'] = $cambios['apellido'];
                    $_SESSION['usuarioSesion']['correo_usuario'] = $cambios['email'];
                    $_SESSION['usuarioSesion']['nif_usuario'] = $cambios['nif'];
                    $_SESSION['usuarioSesion']['apellidos_usuario'] = $cambios['apellido'];
                    $_SESSION['usuarioSesion']['telefono_usuario'] = $cambios['telefono'];

                    $contenido="Buenas Sr./Sra.  ". $this->datos['usuarioSesion']['nombre_usuario'] ." le informamos que has editado el perfil correctamente";
                    $Titulo="Edicion de perfil";
                    $this->notificacionmodelo->añadirNotificacion($contenido, $id_usuario, $Titulo);
                }
               

                $this->datos['CambioEnPerfil']=1;
                
                $this->vista('usuario/perfil', $this->datos, $_SESSION['usuarioSesion']); 
            
            }else{
                $this->vista('usuario/perfil', $this->datos); 
            } 

        }
        public function anadir(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $cambios['nif']=$_POST['nif'];
                $cambios['nombre']=$_POST['nombre'];
                $cambios['apellido']=$_POST['apellido'];
                $cambios['email']=$_POST['correo'];
                //$cambios['telefono']=$_POST['telefono'];
                //$cambios['direccion']=$_POST['direccion'];
                //$cambios['date']=$_POST['date'];
                $cambios['contrasena']=$_POST['contrasena'];



                $this->usuario->addusuarios($cambios);
    
            }
                $this->vista('usuario/add'); 
        }
        public function ver(){
            $this->datos['usuariolistar'] = $this->usuario->listar();
            $this->vista('usuario/listar', $this->datos); 
        }
        public function chat(){
            if(isset($_POST['recp'])){
                unset($_SESSION['receptor']);
            }
            
            if ( isset($_SESSION['receptor'])) {
                $receptor=$_SESSION['receptor'];
            }else{
                $receptor=$_POST['recp'];
            }
            
            $datos['id_usuario']=$_SESSION['usuarioSesion']['id_usuario'];
            $datos['entidad_receptor']=$receptor;
            $this->datos['receptor']= $this->usuario->ObtenerAdminEntidad($datos);
            //print_r($datos);
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
                $datos['mensaje']=$_POST['mensaje'];
                $datos['receptor']=$_POST['recp'];
                $_SESSION['receptor'] = $_POST['recp'];
                //print_r($datos);
                $this->usuario->enviarmensaje($datos);  
                redirecionar("/UserControlador/chat");
            }
 
            $this->vista('usuario/chat', $this->datos); 
        }
        
        public function listarmensajeschat($receptor){
            $datos['id_usuario']=$_SESSION['usuarioSesion']['id_usuario'];
            $datos['entidad_receptor']=$receptor;
            $datos['receptor']= $this->usuario->ObtenerAdminEntidad($datos);
            

            $this->mensajes = $this->usuario->listarmensaje($datos);   
            //print_r($this->mensajes);
            $this->vistaApi($this->mensajes); 
        }
        public function NotiMensajes($valor=0){
            $this->usuario->ModificarNotificacionMensajes($valor, $this->datos['usuarioSesion']);
            $_SESSION['usuarioSesion']['notificar_mensajes']=$valor;
            redirecionar("/UserControlador/perfil");
        }
        public function NotiNotificacion($valor=0){
            $this->usuario->ModificarNotificacionNotificacion($valor, $this->datos['usuarioSesion']);
            $_SESSION['usuarioSesion']['notificar_notificaciones']=$valor;
            redirecionar("/UserControlador/perfil");
        }
        public function NotiAvisos($valor=0){
            $this->usuario->ModificarNotificacionAvisos($valor, $this->datos['usuarioSesion']);
            $_SESSION['usuarioSesion']['notificar_avisos']=$valor;
            redirecionar("/UserControlador/perfil");
        }
        public function eliminarAviso($id=0){
            // Obtener la URL anterior
                $urlReferida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

            // Eliminar el protocolo (http o https)
                $urlSinProtocolo = preg_replace('/^https?:\/\//', '', $urlReferida);

            // Dividir la URL en segmentos
                $segmentos = explode('/', $urlSinProtocolo);

            // Eliminar el primer segmento
                array_shift($segmentos);

            // Volver a unir los segmentos restantes
                $rutaRelativa = implode('/', $segmentos);


            $this->usuario->eliminarAviso($id);


            redirecionar("/".$rutaRelativa);
        }

        public function eliminarNotificacion($id=0){
            // Obtener la URL anterior
                $urlReferida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

            // Eliminar el protocolo (http o https)
                $urlSinProtocolo = preg_replace('/^https?:\/\//', '', $urlReferida);

            // Dividir la URL en segmentos
                $segmentos = explode('/', $urlSinProtocolo);

            // Eliminar el primer segmento
                array_shift($segmentos);

            // Volver a unir los segmentos restantes
                $rutaRelativa = implode('/', $segmentos);


            $this->usuario->eliminarNotificacion($id);


            redirecionar("/".$rutaRelativa);
        }

        public function leidoNotificacion($id=0){
            // Obtener la URL anterior
                $urlReferida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

            // Eliminar el protocolo (http o https)
                $urlSinProtocolo = preg_replace('/^https?:\/\//', '', $urlReferida);

            // Dividir la URL en segmentos
                $segmentos = explode('/', $urlSinProtocolo);

            // Eliminar el primer segmento
                array_shift($segmentos);

            // Volver a unir los segmentos restantes
                $rutaRelativa = implode('/', $segmentos);


            $this->usuario->leidoNotificacio($id);


            redirecionar("/".$rutaRelativa);
        }

        public function marcartodasnotis(){
            // Obtener la URL anterior
            $urlReferida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

            // Eliminar el protocolo (http o https)
                $urlSinProtocolo = preg_replace('/^https?:\/\//', '', $urlReferida);

            // Dividir la URL en segmentos
                $segmentos = explode('/', $urlSinProtocolo);

            // Eliminar el primer segmento
                array_shift($segmentos);

            // Volver a unir los segmentos restantes
                $rutaRelativa = implode('/', $segmentos);

            $this->usuario->marcarvistastodasnotificaciones($this->datos['usuarioSesion']);

            redirecionar("/".$rutaRelativa);

        }
    }