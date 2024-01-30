<?php

    class LoginControlador extends Controlador{

        
        private $sesion;
        public function __construct(){
            session_start();
            $this->sesion = $this->modelo('LoginModelo');
            
            
        }
        public function index(){
            echo "index";
        }

        public function sesion(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $u=$_POST['usuario'];
                $c=$_POST['contra'];

                $this->iniciosesion($u, $c);

            }else{
                if (isset($_SESSION["usuarioSesion"]) && !empty($_SESSION["usuarioSesion"])) {
                    // La variable de sesión está declarada y no está vacía
                    // Redirigir a la página principal
                    //print_r($_SESSION["usuarioSesion"]);
                    if($_SESSION["usuarioSesion"]["admin"]==0){
                        redirecionar(RUTA_URL.'/adminControlador');
                    }else{
                        redirecionar(RUTA_URL.'/ofertasControlador/listar');
                    }
                }
               
                $this->vista("sesion/login", $this->datos);    
            }  
        }

        public function iniciosesion($u, $c){
            
            // Asegúrate de que comprobacion() devuelva un objeto o un array, no un stdClass
                $usuarios = $this->sesion->comprobacion($u, $c);

            
            // Imprime el contenido de $usuarios para depurar
               // print_r($usuarios);

            // Verifica si $usuarios es un objeto stdClass
                if (is_object($usuarios)) {
                    // Convierte el objeto stdClass a un array asociativo
                    $usuarios = json_decode(json_encode($usuarios), true);
                }

            // Asigna el arreglo de usuarios a $this->datos
                $this->datos["usuarios"] = $usuarios;

                

            // Obtén el valor de "NIF" del arreglo, o asigna un valor predeterminado si no está definido
                $nif = $this->datos["usuarios"]["NIF"];
                
                $esAdmin = $this->comprobarsiesadmin($nif);
                
            // Verificas si es admin
            if ($esAdmin) {
                $usuarios["admin"]=0;

                // Hacer algo si es admin
                redirecionar(RUTA_URL.'/adminControlador');

            } else {
                $usuarios["admin"]=1;

                // Hacer algo si no es admin
               redirecionar(RUTA_URL.'/ofertasControlador/listar');
                
            }
            if(isset($usuarios) && !empty($usuarios)){
                Sesion::crearSesion($usuarios);
            }else{

            }
            exit;
            
        }

        public function comprobarsiesadmin($nif){
           // Llamas a la función admins y almacenas el resultado
          
                $resultado = $this->sesion->admins($nif);
            // Compruebas si el resultado es igual a 1 y devuelves true, sino devuelves false
           
                return ($resultado === 1);
        }

        public function registro(){
    
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                    $nuevoUsuario['nif']=$_POST['nif'];
                    $nuevoUsuario['nombre']=$_POST['nombre'];
                    $nuevoUsuario['apellido']=$_POST['apellido'];
                    $nuevoUsuario['correo']=$_POST['correo'];
                    $nuevoUsuario['contrasena']=$_POST['contrasena'];
                    //$this->sesion->crearUserModelo($nuevoUsuario);
                    $this->sesion->crearUserModelo($nuevoUsuario);
                    header("Location: /LoginControlador/sesion");
                    Mailer::sendEmail($nuevoUsuario['correo'], $nuevoUsuario['nombre']);
                    
                    
            }else{
                $this->vista("registrar/registrar");
            }  
        }

        public function cerrar(){
            Sesion::cerrarSesion();
            redirecionar("/");
        }
    }