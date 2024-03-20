<?php

    class AdminControlador extends Controlador{

        public function __construct(){
            session_start();
            $this->oferta = $this->modelo('AdminModelo');
            $this->usuario = $this->modelo('UserModelo');
            $this->admin = $this->modelo('AdminModelo');
            $this->datos['admin'] = $this->admin->ListarAdmins();
            
            $datos['id_usuario']=$_SESSION['usuarioSesion']['id_usuario'];
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

        public function listarEntidades(){
            $this->datos['entidadlistar'] = $this->oferta->verEntidades();
            $this->vista('admin/añadirNegocio', $this->datos);
        }

        public function listarMunicipios(){
            $this->datos['municipioslistar'] = $this->oferta->listarMunicipio();            
            $this->vista('admin/añadirNegocio', $this->datos);
        }


        public function listarServicios(){
            $this->datos['servicioslistar'] = $this->oferta->verServicios();
            $this->vista('admin/verServicios', $this->datos);
        }

      

  

        public function anadirInmuebles() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nuevoInmueble['metros_cuadrados_inmueble'] = $_POST['metros_cuadrados_inmueble'];
                $nuevoInmueble['descripcion_inmueble'] = $_POST['descripcion_inmueble'];
                $nuevoInmueble['distribucion_inmueble'] = $_POST['distribucion_inmueble'];
                $nuevoInmueble['precio_inmueble'] = $_POST['precio_inmueble'];
                $nuevoInmueble['dieccion_inmueble'] = $_POST['dieccion_inmueble'];
                $nuevoInmueble['caracteristicas_inmueble'] = $_POST['caracteristicas_inmueble'];
                $nuevoInmueble['equipamento_inmueble'] = $_POST['equipamento_inmueble'];
                $nuevoInmueble['latitud_inmueble'] = $_POST['latitud_inmueble'];
                $nuevoInmueble['longitud_inmueble'] = $_POST['longitud_inmueble'];
                $nuevoInmueble['id_municipio'] = $_POST['id_municipio'];
                $nuevoInmueble['id_estado'] = $_POST['id_estado'];



        
                $this->admin->anadirInmuebleAdmin($nuevoInmueble);
            }
            $this->vista('admin/añadirInmueble', $this->datos);
        }

        public function anadirNegocio() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                


                $nuevoNegocio['titulo_negocio'] = $_POST['titulo_negocio'];
                $nuevoNegocio['motivo_traspaso_negocio'] = $_POST['motivo_traspaso_negocio'];
                $nuevoNegocio['coste_traspaso_negocio'] = $_POST['coste_traspaso_negocio'];
                $nuevoNegocio['coste_mensual_negocio'] = $_POST['coste_mensual_negocio'];
                $nuevoNegocio['descripcion_negocio'] = $_POST['descripcion_negocio'];
                $nuevoNegocio['capital_minimo_negocio'] = $_POST['capital_minimo_negocio'];
                $nuevoNegocio['local_id_inmueble'] = $_POST['local_id_inmueble'];

                $nuevoNegocio['id_entidad'] = $_POST['id_entidad'];


                $nuevoNegocio['titulo_oferta'] = $_POST['titulo_oferta'];
                $nuevoNegocio['fecha_inicio_oferta'] = $_POST['fecha_inicio_oferta'];
                $nuevoNegocio['fecha_fin_oferta'] = $_POST['fecha_fin_oferta'];
                $nuevoNegocio['condiciones_oferta'] = $_POST['condiciones_oferta'];
                $nuevoNegocio['descripcion_oferta'] = $_POST['descripcion_oferta'];
                $nuevoNegocio['fecha_publicacion_oferta'] = $_POST['fecha_publicacion_oferta'];
                $nuevoNegocio['activo_oferta'] = $_POST['activo_oferta'];
                $nuevoNegocio['id_entidad'] = $_POST['id_entidad'];



                $nuevoNegocio['metros_cuadrados_inmueble'] = $_POST['metros_cuadrados_inmueble'];
                $nuevoNegocio['descripcion_inmueble'] = $_POST['descripcion_inmueble'];
                $nuevoNegocio['distribucion_inmueble'] = $_POST['distribucion_inmueble'];
                $nuevoNegocio['precio_inmueble'] = $_POST['precio_inmueble'];
                $nuevoNegocio['direccion_inmueble'] = $_POST['direccion_inmueble'];
                $nuevoNegocio['caracteristicas_inmueble'] = $_POST['caracteristicas_inmueble'];
                $nuevoNegocio['equipamiento_inmueble'] = $_POST['equipamiento_inmueble'];
                $nuevoNegocio['estado_inmueble'] = $_POST['estado_inmueble'];
                $nuevoNegocio['latitud_inmueble'] = $_POST['latitud_inmueble'];
                $nuevoNegocio['longitud_inmueble'] = $_POST['longitud_inmueble'];

                $nuevoNegocio['nombre_local'] = $_POST['nombre_local'];
                $nuevoNegocio['capacidad_local'] = $_POST['capacidad_local'];
                $nuevoNegocio['recursos_local'] = $_POST['recursos_local'];


        
                $this->admin->anadirNegocioAdmin($nuevoNegocio);
            }
            $this->datos['entidadlistar'] = $this->oferta->verEntidades();
            $this->datos['municipioslistar'] = $this->oferta->listarMunicipio();            


            $this->vista('admin/añadirNegocio', $this->datos);
        }

        public function anadirUsuario() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $nuevoUsuario['nif'] = $_POST['nif'];
                $nuevoUsuario['nombre_usuario'] = $_POST['nombre_usuario'];
                $nuevoUsuario['apellidos_usuario'] = $_POST['apellidos_usuario'];
                $nuevoUsuario['correo_usuario'] = $_POST['correo_usuario'];
                $nuevoUsuario['contrasena_usuario'] = $_POST['contrasena_usuario'];
                $nuevoUsuario['fecha_nacimiento_usuario'] = $_POST['fecha_nacimiento_usuario'];
                $nuevoUsuario['telefono_usuario'] = $_POST['telefono_usuario'];

        
                $this->admin->anadirUsuarioAdmin($nuevoUsuario);
            }
            $this->vista('admin/añadirUsuarios', $this->datos);
        }

        public function anadirServicio() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $nuevoServicio['nombre_servicio'] = $_POST['nombre_servicio'];
                $nuevoServicio['descripcion_servicio'] = $_POST['descripcion_servicio'];
                $nuevoServicio['id_tipo_servicio'] = $_POST['id_tipo_servicio'];
                $nuevoServicio['id_municipio'] = $_POST['id_municipio'];
                $nuevoServicio['longitud_servicio'] = $_POST['longitud_servicio'];
                $nuevoServicio['latitud_servicio'] = $_POST['latitud_servicio'];
                $nuevoServicio['telefono_servicio'] = $_POST['telefono_servicio'];
                $nuevoServicio['direccion_servicio'] = $_POST['direccion_servicio'];


        
                $this->admin->anadirServicioAdmin($nuevoServicio);
            }
            $this->vista('admin/añadirServicio', $this->datos);
        }




        
       
        
    }