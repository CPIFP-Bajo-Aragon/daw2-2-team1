<?php

    class UserControlador extends Controlador{

        
        private $usuario;
        public function __construct(){
            session_start();
            $this->negociomodelo = $this->modelo('NegocioModelo');
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
        
            $this->vista('ofertas/ofertas');

        }
        public function todosvistos(){
            $this->vista('usuario/perfil', $this->datos); 
            
        }
        public function perfil(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["Actualizarformulario"])) {
                $this->datos['CambioEnPerfil']=0;

                $cambios['id_usuario']=$_SESSION['usuarioSesion']['id_usuario'];
                $cambios['nombre']=$_POST['nombre'];
                $cambios['apellidio']=$_POST['apellido'];
                $cambios['email']=$_POST['email'];

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
                $this->usuario->editarperfil($cambios);
                $_SESSION['usuarioSesion']['nombre_usuario'] = $cambios['nombre'];
                $_SESSION['usuarioSesion']['apellidos_usuario'] = $cambios['apellidio'];
                $_SESSION['usuarioSesion']['correo_usuario'] = $cambios['email'];
                $this->datos['usuarioSesion']['nombre_usuario'] = $cambios['nombre'];
                $this->datos['usuarioSesion']['apellidos_usuario'] = $cambios['apellidio'];
                $this->datos['usuarioSesion']['correo_usuario'] = $cambios['email'];

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

        public function chat($receptor){
            $datos['id_usuario']=$_SESSION['usuarioSesion']['id_usuario'];
            $datos['entidad_receptor']=$receptor;
            $datos['receptor']= $this->usuario->ObtenerAdminEntidad($datos);
            //print_r($datos);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $datos['mensaje']=$_POST['mensaje'];
                //print_r($datos);
                $this->usuario->enviarmensaje($datos);   
            }

            $this->datos['mensajes'] = $this->usuario->listarmensaje($datos);   
            //print_r($this->mensajes);
            $this->vista('usuario/chat', $this->datos); 
        }

       
    }