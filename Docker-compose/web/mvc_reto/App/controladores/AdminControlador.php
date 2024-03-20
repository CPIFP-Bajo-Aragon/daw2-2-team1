<?php

    class AdminControlador extends Controlador{


        private $oferta;
        private $usuario;
        private $admin;

        public function __construct(){
            session_start();
            $this->usuario = $this->modelo('UserModelo');
            $this->admin = $this->modelo('AdminModelo');
            $this->oferta = $this->modelo('OfertasModelo');
            $this->datos['admin'] = $this->admin->ListarAdmins();

            $this->datos['inmuebleslistar'] = $this->admin->verInmuebles();
            
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
            $this->datos['inmuebleslistar'] = $this->admin->verInmuebles();
            $this->datos['ofertaslistar'] = $this->admin->listarofertas();
            $this->datos['municipioslistar'] = $this->admin->listarMunicipio();
            $this->datos['estadoslistar'] = $this->admin->verEstados();
            $this->datos['entidadeslistar'] = $this->admin->verEntidades();


            $this->vista('admin/verInmuebles', $this->datos);
        }


        public function estadisticas(){
            $this->datos['usuarioslistar'] = $this->admin->verUsuarios();
            
            foreach($this->datos['usuarioslistar'] as $usr){
                $ofertas=$this->oferta->listarofertasInscritas($usr->id_usuario);
                $usr->numOfertaApunt=count($ofertas);
                $ofertas=$this->oferta->listarpropiasofertas($usr->id_usuario);
                $usr->numOfertapubli=count($ofertas);
            }

            $this->vista('admin/estadisticas', $this->datos);
        }

        public function listarNegocios(){
            $this->datos['negocioslistar'] = $this->admin->verNegocios();
            $this->datos['entidadeslistar'] = $this->admin->verEntidades();

            $this->vista('admin/verNegocios', $this->datos);
        }

        public function listarUsuarios(){
            $this->datos['usuarioslistar'] = $this->admin->verUsuarios();
            $this->datos['municipioslistar'] = $this->admin->listarMunicipio();
            $this->datos['ofertaslistar'] = $this->admin->listadoOfertas();
            $this->datos['avisoslistar'] = $this->admin->verAvisos();

            $this->datos['usuarioofertalistar'] = $this->admin->listadoUsuarioOferta();


            
            $this->vista('admin/verUsuarios', $this->datos);
            
        }

        public function listarEntidades(){
            $this->datos['entidadeslistar'] = $this->admin->verEntidades();
            $this->datos['usuarioslistar'] = $this->admin->verUsuarios();

            $this->datos['usuariosentidadeslistar'] = $this->admin->verUsuariosEntidad();

            $this->vista('admin/verEntidades', $this->datos);
            
        }

        public function listarAvisos(){
            $this->datos['avisoslistar'] = $this->admin->verAvisos();

            $this->vista('admin/verUsuarios', $this->datos);
            
        }

        public function listarOfertas(){
            $this->datos['ofertaslistar'] = $this->admin->listadoOfertas();

            $this->vista('admin/verUsuarios', $this->datos);
            
        }

        public function listarUsuariosOfertas(){
            $this->datos['usuarioofertalistar'] = $this->admin->listadoUsuarioOferta();

            $this->vista('admin/verUsuarios', $this->datos);
            
        }

        public function listarValoracionesInmueble(){
            $this->datos['valoracionesInmueblelistar'] = $this->admin->verValoracionesInmueble();
            $this->datos['usuarioslistar'] = $this->admin->verUsuarios();

            $this->datos['inmuebleslistar'] = $this->admin->verInmuebles();
            $this->vista('admin/verValoracionesInmueble', $this->datos);

            
        }

        public function listarValoracionesNegocio(){
            $this->datos['valoracionesNegociolistar'] = $this->admin->verValoracionesNegocio();
            $this->datos['usuarioslistar'] = $this->admin->verUsuarios();

            $this->datos['negocioslistar'] = $this->admin->verNegocios();

            $this->vista('admin/verValoracionesNegocio', $this->datos);

            
        }

        public function listarUsuariosEntidad(){
            $this->datos['usuariosentidadeslistar'] = $this->admin->verUsuariosEntidad();
            $this->vista('admin/verEntidades', $this->datos);
        }
      
        public function listarRoles(){
            $this->datos['roleslistar'] = $this->admin->verRoles();
            $this->vista('admin/añadirUsuario', $this->datos);
        }

        public function listarEstados(){
            $this->datos['estadoslistar'] = $this->admin->verEstados();
            $this->vista('admin/añadirNegocio', $this->datos);
        }

        public function listarMunicipios(){
            $this->datos['municipioslistar'] = $this->admin->listarMunicipio();            
            $this->vista('admin/añadirNegocio', $this->datos);
        }

        public function listarServicios(){
            $this->datos['servicioslistar'] = $this->admin->verServicios();
            $this->datos['tiposerviciolistar'] = $this->admin->verTipoServicios();
            $this->datos['municipioslistar'] = $this->admin->listarMunicipio();            


            $this->vista('admin/verServicios', $this->datos);
        }

        public function listarLocal(){
            $this->datos['localeslistar'] = $this->admin->verlocales();
            $this->vista('admin/verNegocios', $this->datos);
        }

        public function listarTipoServicios(){
            $this->datos['tiposerviciolistar'] = $this->admin->verTipoServicios();
            $this->vista('inicio/ainmuebles', $this->datos);
        }

       
        
        public function buscador() {
                $busqueda = $_POST['busqueda'];
                $usuariosEncontrados = $this->adminModelo->Buscador($busqueda);
            
        }
        
        public function buscadorDatos() {
            $busqueda = $_POST['busqueda'];
            $usuariosEncontrados = $this->admin->Buscador($busqueda);
            $this->vistaAPI($usuariosEncontrados);

        
    }
    
    
  

        public function anadirInmuebles() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nuevoInmueble['titulo_oferta'] = $_POST['titulo_oferta'];
                $nuevoInmueble['fecha_inicio_oferta'] = $_POST['fecha_inicio_oferta'];
                $nuevoInmueble['fecha_fin_oferta'] = $_POST['fecha_fin_oferta'];
                $nuevoInmueble['condiciones_oferta'] = $_POST['condiciones_oferta'];
                $nuevoInmueble['descripcion_oferta'] = $_POST['descripcion_oferta'];
                $nuevoInmueble['fecha_publicacion_oferta'] = $_POST['fecha_publicacion_oferta'];
                 // Comprobar clase
                $nuevoInmueble['id_entidad'] = $_POST['id_entidad'];

                $nuevoInmueble['metros_cuadrados_inmueble'] = $_POST['metros_cuadrados_inmueble'];
                $nuevoInmueble['descripcion_inmueble'] = $_POST['descripcion_inmueble'];
                $nuevoInmueble['distribucion_inmueble'] = $_POST['distribucion_inmueble'];
                $nuevoInmueble['precio_inmueble'] = $_POST['precio_inmueble'];
                $nuevoInmueble['direccion_inmueble'] = $_POST['direccion_inmueble'];
                $nuevoInmueble['caracteristicas_inmueble'] = $_POST['caracteristicas_inmueble'];
                $nuevoInmueble['equipamiento_inmueble'] = $_POST['equipamiento_inmueble'];
                $nuevoInmueble['latitud_inmueble'] = $_POST['latitud_inmueble'];
                $nuevoInmueble['longitud_inmueble'] = $_POST['longitud_inmueble'];
                $nuevoInmueble['id_municipio'] = $_POST['id_municipio'];
                $nuevoInmueble['id_estado'] = $_POST['id_estado'];
                $nuevoInmueble['id_entidad'] = $_POST['id_entidad'];
                $nuevoInmueble['tipo'] = $_POST['tipo']; 



                if ($nuevoInmueble['tipo'] === 'local') {

                    $nuevoInmueble['nombre_local'] = $_POST['nombre_local'];
                    $nuevoInmueble['capacidad_local'] = $_POST['capacidad_local'];
                    $nuevoInmueble['recursos_local'] = $_POST['recursos_local'];
                    
                } elseif ($nuevoInmueble['tipo'] === 'vivienda') {

                    $nuevoInmueble['habitaciones_vivienda'] = $_POST['habitaciones_vivienda'];
                    $nuevoInmueble['tipo_vivienda'] = $_POST['tipo_vivienda'];
                }


                $this->admin->anadirInmuebleAdmin($nuevoInmueble);
                
            }
            $this->datos['estadoslistar'] = $this->admin->verEstados();

            $this->datos['estadoslistar'] = $this->admin->verEstados();
            $this->datos['entidadlistar'] = $this->admin->verEntidades();
            $this->datos['municipioslistar'] = $this->admin->listarMunicipio();    
            $this->vista('admin/añadirInmueble', $this->datos);
        }


        public function editarInmueble($id_inmueble=0) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
                $editarInmueble['id_inmueble'] = $_POST['id_inmueble'];

                $editarInmueble['titulo_oferta'] = $_POST['titulo_oferta'];
                $editarInmueble['fecha_inicio_oferta'] = $_POST['fecha_inicio_oferta'];
                $editarInmueble['fecha_fin_oferta'] = $_POST['fecha_fin_oferta'];
                $editarInmueble['condiciones_oferta'] = $_POST['condiciones_oferta'];
                $editarInmueble['descripcion_oferta'] = $_POST['descripcion_oferta'];
                $editarInmueble['fecha_publicacion_oferta'] = $_POST['fecha_publicacion_oferta'];
                // Comprobar clase
                $editarInmueble['id_entidad'] = $_POST['id_entidad'];
        
                $editarInmueble['metros_cuadrados_inmueble'] = $_POST['metros_cuadrados_inmueble'];
                $editarInmueble['descripcion_inmueble'] = $_POST['descripcion_inmueble'];
                $editarInmueble['distribucion_inmueble'] = $_POST['distribucion_inmueble'];
                $editarInmueble['precio_inmueble'] = $_POST['precio_inmueble'];
                $editarInmueble['direccion_inmueble'] = $_POST['direccion_inmueble'];
                $editarInmueble['caracteristicas_inmueble'] = $_POST['caracteristicas_inmueble'];
                $editarInmueble['equipamiento_inmueble'] = $_POST['equipamiento_inmueble'];
                $editarInmueble['latitud_inmueble'] = $_POST['latitud_inmueble'];
                $editarInmueble['longitud_inmueble'] = $_POST['longitud_inmueble'];
                $editarInmueble['id_municipio'] = $_POST['id_municipio'];
                $editarInmueble['id_estado'] = $_POST['id_estado'];
        
                if (isset($_POST['nombre_local'])) {
                    $editarInmueble['nombre_local'] = $_POST['nombre_local'];
                    $editarInmueble['capacidad_local'] = $_POST['capacidad_local'];
                    $editarInmueble['recursos_local'] = $_POST['recursos_local'];
        
                } elseif (isset($_POST['habitaciones_vivienda'])) {
                    $editarInmueble['habitaciones_vivienda'] = $_POST['habitaciones_vivienda'];
                    $editarInmueble['tipo_vivienda'] = $_POST['tipo_vivienda'];
                }
        
                $this->admin->editarInmuebleAdmin($editarInmueble);
                header("Location: /adminControlador/listarInmuebles");

            }
        
            $this->vista('admin/verInmuebles', $this->datos);
        }




        public function editarNegocio($id_negocio=0) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $editarNegocio['id_negocio'] = $_POST['id_negocio'];

                if (!empty($_POST['titulo_oferta'])) {
        
                $editarNegocio['titulo_oferta'] = $_POST['titulo_oferta'];
                $editarNegocio['fecha_inicio_oferta'] = $_POST['fecha_inicio_oferta'];
                $editarNegocio['fecha_fin_oferta'] = $_POST['fecha_fin_oferta'];
                $editarNegocio['condiciones_oferta'] = $_POST['condiciones_oferta'];
                $editarNegocio['descripcion_oferta'] = $_POST['descripcion_oferta'];
                $editarNegocio['fecha_publicacion_oferta'] = $_POST['fecha_publicacion_oferta'];
                }
                $editarNegocio['motivo_traspaso_negocio'] = $_POST['motivo_traspaso_negocio'];
                $editarNegocio['coste_traspaso_negocio'] = $_POST['coste_traspaso_negocio'];
                $editarNegocio['coste_mensual_negocio'] = $_POST['coste_mensual_negocio'];
                $editarNegocio['descripcion_negocio'] = $_POST['descripcion_negocio'];
                $editarNegocio['capital_minimo_negocio'] = $_POST['capital_minimo_negocio'];

                
                
        
                $editarNegocio['id_entidad'] = $_POST['id_entidad'];
                if (isset($_POST['local_id_inmueble'])) {
                    $editarNegocio['local_id_inmueble'] = $_POST['local_id_inmueble'];
                    $editarNegocio['nombre_local'] = $_POST['nombre_local'];
                    $editarNegocio['capacidad_local'] = $_POST['capacidad_local'];
                    $editarNegocio['recursos_local'] = $_POST['recursos_local'];
                }
        
                $this->admin->editarNegocioAdmin($editarNegocio);
                header("Location: /adminControlador/listarNegocios");
            }
        
            $this->vista('admin/verNegocios', $this->datos);
        }
        
        


        //FUNCION AÑADIR NEGOCIOS 
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
                 // Comprobar clase
                $nuevoNegocio['id_entidad'] = $_POST['id_entidad'];
               $nuevoNegocio['id_negocio'] = isset($_POST['id_negocio']) ? $_POST['id_negocio'] : null;


                $nuevoNegocio['metros_cuadrados_inmueble'] = $_POST['metros_cuadrados_inmueble'];
                $nuevoNegocio['descripcion_inmueble'] = $_POST['descripcion_inmueble'];
                $nuevoNegocio['distribucion_inmueble'] = $_POST['distribucion_inmueble'];
                $nuevoNegocio['precio_inmueble'] = $_POST['precio_inmueble'];
                $nuevoNegocio['direccion_inmueble'] = $_POST['direccion_inmueble'];
                $nuevoNegocio['caracteristicas_inmueble'] = $_POST['caracteristicas_inmueble'];
                $nuevoNegocio['equipamiento_inmueble'] = $_POST['equipamiento_inmueble'];
                $nuevoNegocio['latitud_inmueble'] = $_POST['latitud_inmueble'];
                $nuevoNegocio['longitud_inmueble'] = $_POST['longitud_inmueble'];
                $nuevoNegocio['id_municipio'] = $_POST['id_municipio'];
                $nuevoNegocio['id_estado'] = $_POST['id_estado'];
                $nuevoNegocio['id_entidad'] = $_POST['id_entidad'];

                $nuevoNegocio['nombre_local'] = $_POST['nombre_local'];
                $nuevoNegocio['capacidad_local'] = $_POST['capacidad_local'];
                $nuevoNegocio['recursos_local'] = $_POST['recursos_local'];
 

                // compobar clase
                $nuevoNegocio['id_inmueble'] = isset($_POST['id_inmueble']) ? $_POST['id_inmueble'] : null;




        
                $this->admin->anadirNegocioAdmin($nuevoNegocio);
            }
            $this->datos['entidadlistar'] = $this->admin->verEntidades();
            $this->datos['municipioslistar'] = $this->admin->listarMunicipio();    
            $this->datos['estadoslistar'] = $this->admin->verEstados();
        


            $this->vista('admin/añadirNegocio', $this->datos);
        }

                

        //FUNCION AÑADIR USUARIOS
        public function anadirUsuario() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nuevoUsuario['nif'] = $_POST['nif'];
                $nuevoUsuario['nombre_usuario'] = $_POST['nombre_usuario'];
                $nuevoUsuario['apellidos_usuario'] = $_POST['apellidos_usuario'];
                $nuevoUsuario['correo_usuario'] = $_POST['correo_usuario'];
                $nuevoUsuario['contrasena_usuario'] = $_POST['contrasena_usuario'];
                $nuevoUsuario['fecha_nacimiento_usuario'] = $_POST['fecha_nacimiento_usuario'];
                $nuevoUsuario['telefono_usuario'] = $_POST['telefono_usuario'];
                $nuevoUsuario['tipo'] = $_POST['tipo']; 
        
                
                if ($nuevoUsuario['tipo'] === 'existente') {
                    $nuevoUsuario['id_entidad'] = $_POST['id_entidad'];
                } elseif ($nuevoUsuario['tipo'] === 'nueva') {
                    $nuevoUsuario['nombre_entidad'] = $_POST['nombre_entidad'];
                    $nuevoUsuario['cif_entidad'] = $_POST['cif_entidad'];
                    $nuevoUsuario['sector_entidad'] = $_POST['sector_entidad'];
                    $nuevoUsuario['direccion_entidad'] = $_POST['direccion_entidad'];
                    $nuevoUsuario['numero_telefono_entidad'] = $_POST['numero_telefono_entidad'];
                    $nuevoUsuario['correo_entidad'] = $_POST['correo_entidad'];
                    $nuevoUsuario['pagina_web_entidad'] = $_POST['pagina_web_entidad'];
                }
        
               
                $nuevoUsuario['rol'] = $_POST['rol'];
        
                
                $this->admin->anadirUsuarioAdmin($nuevoUsuario);
                
            }
        
        
            $this->datos['entidadlistar'] = $this->admin->verEntidades();
            $this->datos['roleslistar'] = $this->admin->verRoles();
        
          
            $this->vista('admin/añadirUsuarios', $this->datos);
        }

        public function editarUsuario($id_usuario=0) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               

                $editarUsuario['id_usuario'] = $_POST['id_usuario'];
                $editarUsuario['nif'] = $_POST['nif'];
                $editarUsuario['nombre_usuario'] = $_POST['nombre_usuario'];
                $editarUsuario['apellidos_usuario'] = $_POST['apellidos_usuario'];
                $editarUsuario['correo_usuario'] = $_POST['correo_usuario'];
                $editarUsuario['fecha_nacimiento_usuario'] = $_POST['fecha_nacimiento_usuario'];
                $editarUsuario['telefono_usuario'] = $_POST['telefono_usuario'];
        
                $this->admin->editarUsuarioAdmin($editarUsuario);
                header("Location: /adminControlador/listarUsuarios");

            }
        
            $this->vista('admin/verUsuarios', $this->datos);

        }

        public function editarEntidad($id_entidad = 0) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $editarEntidad['id_entidad'] = $_POST['id_entidad'];
                $editarEntidad['nombre_entidad'] = $_POST['nombre_entidad'];
                $editarEntidad['cif_entidad'] = $_POST['cif_entidad'];
                $editarEntidad['sector_entidad'] = $_POST['sector_entidad'];
                $editarEntidad['direccion_entidad'] = $_POST['direccion_entidad'];
                $editarEntidad['correo_entidad'] = $_POST['correo_entidad'];
                $editarEntidad['pagina_web_entidad'] = $_POST['pagina_web_entidad'];
        
                $this->admin->editarEntidadAdmin($editarEntidad);
                header("Location: /adminControlador/listarEntidades");
                exit();
            }
        
            $this->vista('admin/verEntidades', $this->datos);
        }
        

        
        public function editarServicio($id_servicio = 0) {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $editarServicio['id_servicio'] = $_POST['id_servicio'];
            $editarServicio['nombre_servicio'] = $_POST['nombre_servicio'];
            $editarServicio['descripcion_servicio'] = $_POST['descripcion_servicio'];
            $editarServicio['id_tipo_servicio'] = $_POST['id_tipo_servicio'];
            $editarServicio['id_municipio'] = $_POST['id_municipio'];
            $editarServicio['longitud_servicio'] = $_POST['longitud_servicio'];
            $editarServicio['latitud_servicio'] = $_POST['latitud_servicio'];
            $editarServicio['telefono_servicio'] = $_POST['telefono_servicio'];
            $editarServicio['direccion_servicio'] = $_POST['direccion_servicio'];



            $this->admin->editarServicioAdmin($editarServicio);
            header("Location: /adminControlador/listarServicios");
        }

        $this->vista('admin/verServicios', $this->datos);
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
            $this->datos['tiposerviciolistar'] = $this->admin->verTipoServicios();
            $this->datos['municipioslistar'] = $this->admin->listarMunicipio();    

            $this->vista('admin/añadirServicio', $this->datos);

        }


        public function anadirValoracionNegocio() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nuevaValoracion['id_usuario'] = $_POST['id_usuario'];
                $nuevaValoracion['id_negocio'] = $_POST['id_negocio'];
                $nuevaValoracion['puntuacion'] = $_POST['puntuacion'];
                $nuevaValoracion['descripcion'] = $_POST['descripcion'];
                $nuevaValoracion['fecha_valoracion'] = $_POST['fecha_valoracion'];
        
                $this->admin->anadirValoracionNegocio($nuevaValoracion);
                header("Location: /adminControlador/listarValoracionesNegocio");

            }
        
            $this->vista('admin/verValoracionesNegocio', $this->datos);
        }

        public function anadirValoracionInmueble() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $nuevaValoracion['id_inmueble'] = $_POST['id_inmueble'];
                $nuevaValoracion['fecha_valoracion_inm'] = $_POST['fecha_valoracion_inm'];
                $nuevaValoracion['puntuacion_inm'] = $_POST['puntuacion_inm'];
                $nuevaValoracion['comentario_inm'] = $_POST['comentario_inm'];
                $nuevaValoracion['id_usuario'] = $_POST['id_usuario'];
        
                $this->admin->anadirValoracionInmueble($nuevaValoracion);
                header("Location: /adminControlador/listarValoracionesInmueble");


            }
        
            $this->vista('admin/verValoracionesInmueble', $this->datos);
        }
    
        public function DesactivarUsuario($idUsuario) {
            $this->admin->DesactivarUsuarioAdmin($idUsuario);
            redirecionar("/adminControlador/listarUsuarios");
        }
        
        public function ActivarUsuario($idUsuario) {
            $this->admin->ActivarUsuarioAdmin($idUsuario);
            redirecionar("/adminControlador/listarUsuarios");
        }

        public function DesactivarNegocio($id_negocio) {
            $this->admin->DesactivarNegocioAdmin($id_negocio);
            redirecionar("/adminControlador/listarNegocios");
        }

        
        public function ActivarNegocio($idUsuario) {
            $this->admin->ActivarNegocioAdmin($idUsuario);
            redirecionar("/adminControlador/listarNegocios");
        }

        public function DesactivarInmueble($id_inmueble) {
            $this->admin->DesactivarInmuebleAdmin($id_inmueble);
            redirecionar("/adminControlador/listarInmuebles");
        }
        
        public function ActivarInmueble($id_inmueble) {
            $this->admin->ActivarInmuebleAdmin($id_inmueble);
            redirecionar("/adminControlador/listarInmuebles");
        }
        

        public function EliminarServicio($id_servicio) {
            $this->admin->EliminarServicioAdmin($id_servicio);
            redirecionar("/adminControlador/listarServicios");
        }


        public function eliminarentidad($id){
            $this->admin->eliminarentidad($id);
            redirecionar("/adminControlador");

        }

        public function eliminarValoracionInm($id){
            $this->admin->eliminarValoracionInm($id);
            redirecionar("/adminControlador/listarValoracionesInmueble");

        }

        public function eliminarValoracionNeg($id){
            $this->admin->eliminarValoracionNeg($id);
            redirecionar("/adminControlador/listarValoracionesNegocio");

        }

        public function eliminarUsuarioEntidad($id_usuario){
            $this->admin->eliminarUsuarioEntidad($id_usuario);
            redireccionar("/adminControlador");  
        }
        

        public function eliminarUsuarioOferta($idu, $ido){
            $this->admin->eliminarUsuarioOferta($idu, $ido);
            redirecionar("/adminControlador");

        }

        public function anadirAviso() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $nuevoAviso['titulo_aviso'] = $_POST['titulo_aviso'];
                $nuevoAviso['contenido_aviso'] = $_POST['contenido_aviso'];
                $nuevoAviso['fecha_creacion_aviso'] = $_POST['fecha_creacion_aviso'];
                $nuevoAviso['id_usuario'] = $_POST['id_usuario'];
              
        
                $this->admin->avisoUsuario($nuevoAviso);
                header("Location: /adminControlador/listarUsuarios");

            }
        
            $this->vista('admin/verUsuarios', $this->datos);
        }


        public function anadirUsuarioEntidad() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $nuevoUsuario['id_usuario'] = $_POST['id_usuario'];
                $nuevoUsuario['id_entidad'] = $_POST['id_entidad'];
                $nuevoUsuario['rol'] = $_POST['rol'];
               
                $this->admin->anadirUsuarioEntidad($nuevoUsuario);
                header("Location: /adminControlador/listarEntidades");

            }
        
            $this->vista('admin/verEntidades', $this->datos);
        }


        public function anadirUsuarioOferta() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $inscripcion['id_usuario'] = $_POST['id_usuario'];
                $inscripcion['id_oferta'] = $_POST['id_oferta'];

                $this->admin->UsuarioOferta($inscripcion);
                header("Location: /adminControlador/listarUsuarios");

            }
        
            $this->vista('admin/verUsuarios', $this->datos);
        }  
       
        
    }