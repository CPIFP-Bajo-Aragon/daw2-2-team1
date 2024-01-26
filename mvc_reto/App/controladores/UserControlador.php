<?php

    class UserControlador extends Controlador{

        
        private $usuario;
        public function __construct(){
            session_start();
            $this->usuario = $this->modelo('UserModelo');
            
        }


        public function index(){
        
            $this->vista('ofertas/ofertas');

        }

        public function perfil(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $cambios['nif']=$_SESSION['usuarioSesion']['NIF'];
                $cambios['nombre']=$_POST['nombre'];
                $cambios['apellido']=$_POST['apellido'];
                $cambios['email']=$_POST['email'];
                $cambios['telefono']=$_POST['telefono'];
                $cambios['direccion']=$_POST['direccion'];
                $cambios['date']=$_POST['date'];
                $this->datos['usuarioSesion'] = $this->usuario->editarperfil($cambios);
                $this->vista('usuario/perfil', $this->datos['usuarioSesion']); 
            
            }else{
                $this->datos['usuarioSesion'] = $_SESSION['usuarioSesion'];
                $this->vista('usuario/perfil', $this->datos['usuarioSesion']); 
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
            $this->vista('usuario/listar', $this->datos['usuariolistar']); 
        }

        public function chat($receptor=0){
            $datos['nif']=$_SESSION['usuarioSesion']['NIF'];
            $datos['receptor']=$receptor;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $datos['mensaje']=$_POST['mensaje'];
                //print_r($datos);
                $this->usuario->enviarmensaje($datos);   
            }
            $this->mensajes = $this->usuario->listarmensaje($datos);   
            //print_r($this->mensajes);
            $this->vista('usuario/chat', $this->mensajes); 
        }
    }