<?php

    class LoginControlador extends Controlador{

        
        private $sesion;
        
        public function __construct(){
            session_start();
            $this->sesion = $this->modelo('LoginModelo');
            $this->municipiosmodelo = $this->modelo('MunicipiosModelo');
            $this->datos['municipioslistar']=$this->municipiosmodelo->listarMunicipio();
            
            
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
                $id_usuario = $this->datos["usuarios"]["id_usuario"];
                
                $esAdmin = $this->comprobarsiesadmin($id_usuario);
                
            // Verificas si es admin
            if ($esAdmin) {
                $usuarios["admin"]=0;

                // Hacer algo si es admin
                redirecionar(RUTA_URL.'/adminControlador');
                Mailer::sendEmail($nuevoUsuario['correo'], $nuevoUsuario['nombre']);

            } else {
                $usuarios["admin"]=1;

                // Hacer algo si no es admin
               redirecionar(RUTA_URL.'/ofertasControlador/listar');
               Mailer::sendEmail($nuevoUsuario['correo'], $nuevoUsuario['nombre']);
                
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
                    $nuevoUsuario['municipio']=$_POST['municipio'];
                    $nuevoUsuario['fecha_nac']=$_POST['fecha_nacimiento'];
                    $nuevoUsuario['telefono']=$_POST['telefono'];
                    $this->sesion->crearUserModelo($nuevoUsuario);
                    $rutaDeseada = $_SERVER['DOCUMENT_ROOT'] . '/public/images/perfil_';
                    $nombreCarpeta = $rutaDeseada .  $nuevoUsuario['nif'];

                    if (!file_exists($nombreCarpeta)) {
                        if (mkdir($nombreCarpeta, 777, true)) {
                            echo "La carpeta \"$nombreCarpeta\" ha sido creada exitosamente.";
                        } else {
                            echo "Error al intentar crear la carpeta \"$nombreCarpeta\".";
                        }
                    } else {
                        echo "La carpeta \"$nombreCarpeta\" ya existe.";
                    }
                    header("Location: /LoginControlador/sesion");
                    Mailer::sendEmail($nuevoUsuario['correo'], $nuevoUsuario['nombre']);



                    
                    
            }else{
                $this->vista("registrar/registrar", $this->datos);
            }  
        }

        public function cerrar(){
            Sesion::cerrarSesion();
            redirecionar("/");
        }
    }