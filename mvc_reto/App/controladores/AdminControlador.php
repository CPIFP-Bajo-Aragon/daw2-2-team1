<?php

    class AdminControlador extends Controlador{

        public function __construct(){
            session_start();
            $this->oferta = $this->modelo('AdminModelo');
            $this->usuario = $this->modelo('UserModelo');
            $this->admin = $this->modelo('AdminModelo');
            $this->datos['admin'] = $this->admin->ListarAdmins();
            
            $datos['nif']=$_SESSION['usuarioSesion']['NIF'];
            $this->datos['noti'] = $this->usuario->listarnotificaciones($datos);
            $this->datos['chats'] = $this->usuario->listaruserchat($datos);
            if (!isset($_SESSION["usuarioSesion"]) || empty($_SESSION["usuarioSesion"]) || $_SESSION["usuarioSesion"]["admin"]==1) {
                redirecionar(RUTA_URL.'/');
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["marcarnotificacionesleido"])) {
                    $this->usuario->marcarvistastodasnotificaciones($datos);
                }
            }
        }


        public function index(){
        
            $this->vista('admin/inicio');

        }

        public function listarInmuebles(){
            $this->datos['inmuebleslistar'] = $this->oferta->verInmuebles();
            $this->vista('admin/verInmuebles', $this->datos);
        }

        public function listarNegocios(){
            $this->datos['negocioslistar'] = $this->oferta->verNegocios();
            $this->vista('admin/verNegocios', $this->datos);
        }

        public function listarUsuarios(){
            $this->datos['usuarioslistar'] = $this->oferta->verUsuarios();
            $this->vista('admin/verUsuarios', $this->datos);
        }

  

        public function anadirInmuebles() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nuevoInmueble['tipo_oferta'] = $_POST['tipo_oferta'];
                $nuevoInmueble['fecha_inicio'] = $_POST['fecha_inicio'];
                $nuevoInmueble['fecha_fin'] = $_POST['fecha_fin'];
                $nuevoInmueble['condiciones'] = $_POST['condiciones'];
                $nuevoInmueble['fecha_publicacion'] = $_POST['fecha_publicacion'];
                $nuevoInmueble['tipo'] = $_POST['tipo'];
        
                $this->admin->anadirInmuebleAdmin($nuevoInmueble);
            }
            $this->vista('admin/añadirInmueble', $this->datos);
        }

        public function anadirNegocio() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nuevoNegocio['codigo_negocio'] = $_POST['codigo_negocio'];

                $nuevoNegocio['titulo'] = $_POST['titulo'];
                $nuevoNegocio['motivo_traspaso'] = $_POST['motivo_traspaso'];
                $nuevoNegocio['coste_traspaso'] = $_POST['coste_traspaso'];
                $nuevoNegocio['coste_mensual'] = $_POST['coste_mensual'];
                $nuevoNegocio['ubicacion'] = $_POST['ubicacion'];
                $nuevoNegocio['descripcion'] = $_POST['descripcion'];
                $nuevoNegocio['capital_minimo'] = $_POST['capital_minimo'];

        
                $this->admin->anadirNegocioAdmin($nuevoNegocio);
            }
            $this->vista('admin/añadirNegocio', $this->datos);
        }

        public function anadirUsuario() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $nuevoUsuario['NIF'] = $_POST['NIF'];
                $nuevoUsuario['nombre'] = $_POST['nombre'];
                $nuevoUsuario['apellido'] = $_POST['apellido'];
                $nuevoUsuario['correo'] = $_POST['correo'];
                $nuevoUsuario['contrasena'] = $_POST['contrasena'];
                $nuevoUsuario['id_municipio'] = $_POST['id_municipio'];

        
                $this->admin->anadirUsuarioAdmin($nuevoUsuario);
            }
            $this->vista('admin/añadirUsuarios', $this->datos);
        }




        
       
        
    }