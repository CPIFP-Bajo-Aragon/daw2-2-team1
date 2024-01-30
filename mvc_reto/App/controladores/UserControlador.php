<?php

    class UserControlador extends Controlador{

        
        private $usuario;
        public function __construct(){
            session_start();
            $this->usuario = $this->modelo('UserModelo');

            $this->admin = $this->modelo('AdminModelo');
            $this->datos['admin'] = $this->admin->ListarAdmins();
            $datos['nif']=$_SESSION['usuarioSesion']['NIF'];

            $this->datos['chats'] = $this->usuario->listaruserchat($datos);
            
            $this->datos['noti'] = $this->usuario->listarnotificaciones($datos);
            
            if (!isset($_SESSION["usuarioSesion"]) || empty($_SESSION["usuarioSesion"])) {
                redirecionar(RUTA_URL.'/');
            }
            
        }


        public function index(){
        
            $this->vista('ofertas/ofertas');

        }

        public function perfil(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $cambios['nif']=$_SESSION['usuarioSesion']['NIF'];
                $cambios['nombre']=$_POST['nombre'];
                $cambios['apellidio']=$_POST['apellido'];
                $cambios['email']=$_POST['email'];

                // Procesar y mover la imagen si se ha seleccionado
                if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                    $nombreArchivo = 'Perfil.jpg';
                    $rutaDestino = $_SERVER['DOCUMENT_ROOT'] . '/public/images/perfil_' . $_SESSION['usuarioSesion']['NIF'] . '/' . $nombreArchivo;
        
                    // Eliminar la imagen antigua si existe
                    if (file_exists($rutaDestino)) {
                        unlink($rutaDestino);
                    }
        
                    // Mover el archivo al directorio de destino
                    move_uploaded_file($_FILES['foto']['tmp_name'], $rutaDestino);
        
                    // Actualizar el nombre de la imagen en la sesión y en la base de datos si es necesario
                    $_SESSION['usuarioSesion']['foto'] = '/images/perfil_' . $_SESSION['usuarioSesion']['NIF'] . '/' . $nombreArchivo;
                    $cambios['foto'] = '/images/perfil_' . $_SESSION['usuarioSesion']['NIF'] . '/' . $nombreArchivo;
                }
                $this->usuario->editarperfil($cambios);
                $_SESSION['usuarioSesion']['nombre'] = $cambios['nombre'];
                $_SESSION['usuarioSesion']['apellido'] = $cambios['apellidio'];
                $_SESSION['usuarioSesion']['correo'] = $cambios['email'];
                $this->vista('usuario/perfil', $_SESSION['usuarioSesion']); 

            
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

        public function chat($receptor=0){
            $datos['nif']=$_SESSION['usuarioSesion']['NIF'];
            $datos['receptor']=$receptor;
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