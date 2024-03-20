<?php

    class OfertasControlador extends Controlador{

        
        private $notificacionmodelo;
        private $negociomodelo;
        private $negocio;
        private $vivienda;
        private $local;
        private $entidad;
        private $oferta_inmueble;
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
            $this->vivienda = $this->modelo('ViviendaModelo');
            $this->local = $this->modelo('LocalModelo');
            $this->negocio = $this->modelo('NegocioModelo');

            $this->datos['admin'] = $this->admin->ListarAdmins();
            $this->datos['usuarioSesion']['noti'] = $this->usuario->listarnotificaciones($this->datos['usuarioSesion']);
            $this->datos['usuarioSesion']['chats'] = $this->usuario->listaruserchat($this->datos['usuarioSesion']);
            $this->datos['usuarioSesion']['advertencias'] = $this->usuario->listaradvertencias($this->datos['usuarioSesion']);
            $this->datos['municipioslistar'] = $this->municipiosmodelo->listarMunicipio();

            $this->datos['ent']=$this->EntidadesModelo->listar($this->datos['usuarioSesion']['id_usuario']);

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
        
            echo "index";
        }
        
        public function addoferta(){


            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['publicarOfertaInmueble'])) {
                
                //Datos entidad
                if($_POST['entidad']==='NuevaEntidad'){
                    $entidad['nombre_entidad']=$_POST['nombre_entidad'];
                    $entidad['cif']=$_POST['cif_entidad'];
                    $entidad['sector'] = $_POST["sector_entidad"];
                    $entidad['direccion'] = $_POST["direccion_entidad"];
                    $entidad['numero_telefonico'] = $_POST["telefono_entidad"];
                    $entidad['correo'] = $_POST["correo_entidad"];
                    $entidad['pagina_web'] = $_POST["pagina_web"];
                    $entidad['id_usuario']=$this->datos['usuarioSesion']['id_usuario'];

                    $id_entidad=$this->EntidadesModelo->crear($entidad);
                    
                    $inmueble['entidad'] = $id_entidad;
                    $negocio['id_entidad']= $id_entidad; 
                    $insert['id_entidad']= $id_entidad; 
                }
               
                //Datos de inmueble

                $inmueble['metrosCuadrados'] = $_POST["metrosCuadrados"];
                $inmueble['descripcion'] = $_POST["descripcion"];
                $inmueble['distribucion'] = $_POST["distribucion"];
                //$inmueble['precio'] = $_POST["precio"];
                $inmueble['estado'] = $_POST["estado"];
                $inmueble['ubicacion'] = $_POST["calle"].','.$_POST["numero"].','. $_POST["puerta"];
                $inmueble['caracteristicas'] = implode(',', $_POST['caracteristicas']);
                $inmueble['equipamiento'] = $_POST['equipamiento'];
                $inmueble['municipio'] = $_POST['municipio'];
                
                if($_POST['entidad']!=='NuevaEntidad'){
                    $inmueble['entidad'] = $_POST['entidad'];
                }

                $ultimo_id_inmueble=$this->inmueble->añadirInmueble($inmueble);


                //Datos de vivienda
                if($_POST['tipoInmueble']==='Vivienda'){
                    $vivienda['tipoVivienda'] = $_POST['tipoVivienda'];
                    $vivienda['habitaciones'] = $_POST['habitaciones'];

                    $this->vivienda->anadirVivienda($vivienda, $ultimo_id_inmueble);
                }
                //Datos de local
                if($_POST['tipoInmueble']==='Local'){
                    $local['capacidad_local'] = $_POST['capacidad'];
                    $local['recursos_local'] = $_POST['recursos'];

                    $ultimo_id_local=$this->local->anadirLocal($local, $ultimo_id_inmueble);
                }


                //Datos negocio
                if($_POST['tipoOferta']==='Traspaso'){
                    $negocio['titulo_negocio'] = $_POST["titulo_negocio"];
                    $negocio['descripcion_negocio'] = $_POST["descripcion_negocio"];
                    $negocio['motivo_traspaso'] = $_POST["motivo_traspaso"];
                    $negocio['coste_traspaso'] = $_POST["coste_traspaso"];
                    $negocio['coste_mensual'] = $_POST["coste_mensual"];
                    $negocio['capital_minimo'] = $_POST["capital_minimo"];

                    if($_POST['entidad']!=='NuevaEntidad'){
                        $negocio['id_entidad']= $_POST['entidad']; 
                    }

                   $id_negocio=$this->negocio->addnegocios($negocio, $ultimo_id_local);
                }

                //Datos de oferta

                $insert['nombre_oferta']= $_POST["nombre_oferta"];  
                $insert['fecha_inicio']= $_POST["fecha_inicio"];  
                $insert['descripcion_oferta']= $_POST["descripcion_oferta"];  
                $insert['fecha_fin']= $_POST["fecha_fin"];  
                //$insert['condiciones']= $_POST['condiciones'];
                $insert['precio'] = $_POST["precio_oferta"];
                if($_POST['entidad']!=='NuevaEntidad'){
                    $insert['id_entidad']= $_POST['entidad']; 
                }
                if($_POST['tipoOferta']==='Traspaso'){
                    $a=$this->oferta->añadiroferta($insert, $id_negocio);
                }else{
                    $a=$this->oferta->añadiroferta($insert, null);
                }
                //Datos oferta_inmueble

                $oferta_inmueble['precio_inm'] = $_POST["precio_oferta"];
                $this->oferta->añadirOfertaInmueble($oferta_inmueble, $ultimo_id_inmueble, $a);

                //IMÁGENES
 
                $total = count($_FILES['imagenes']['name']);
                for ($i = 0; $i < $total; $i++) {
                    $nombreImagen = $_FILES['imagenes']['name'][$i];
                    $formatoImagen = $_FILES['imagenes']['type'][$i];
                    
                    // Crear la ruta del directorio de destino
                    $directorioDestino = RUTA_APP . '/../public/images/inmueble_' . $ultimo_id_inmueble;
                    
                    // Verificar si el directorio de destino existe, si no, crearlo
                    if (!file_exists($directorioDestino)) {
                        // mkdir($directorioDestino);
                        if (!mkdir($directorioDestino, 0777, true)) {
                            // Si no se puede crear el directorio, maneja el error según sea necesario
                            echo "Error: No se pudo crear el directorio de destino";
                        }
                    }
                    
                    // Crear la ruta completa del archivo de destino
                    $rutaDestino = $directorioDestino . '/' . $nombreImagen;
                
                    // Mover la imagen al directorio de destino
                    if (move_uploaded_file($_FILES['imagenes']['tmp_name'][$i], $rutaDestino)) {
                        // Operación exitosa
                        // Guardar la información en la base de datos
                        $this->oferta->insertarImagen($nombreImagen, $formatoImagen, $rutaDestino, $ultimo_id_inmueble);
                    } else {
                        // Manejo de errores si falla la operación de movimiento
                        echo "Error al mover la imagen a la ruta de destino";
                    }
                }
                
            
                $this->vista('ofertas/insertarofertas', $this->datos);

             }else{
                 $this->vista('ofertas/insertarofertas', $this->datos);
             }

        }

        public function mostrarOfertas($municipio=0){   
            $this->datos['municipioFiltro']=$municipio;        
            $this->vista('ofertas/ofertas', $this->datos);
        }
        
        public function listar($municipioValor=0, $tipoInmuebleValor=0, $precioMin=0, $precioMax=1000, $habitacionesValor=0, $estadoValor=0){
            $id_usuario = $_SESSION['usuarioSesion']['id_usuario'];
            $this->datos['ofertaslistar'] = $this->oferta->listarofertas($id_usuario, $municipioValor, $tipoInmuebleValor, $precioMin, $precioMax, $habitacionesValor, $estadoValor);
            //$this->datos['ofertaslistar'] = $this->oferta->listarofertasFiltradas($id_usuario);
                foreach ($this->datos['ofertaslistar'] as $oferta) {
                    $imagen = $this->oferta->listarofertasimagen($oferta->d_inmueble);    
                    $apuntados = $this->oferta->listarofertasapuntados($oferta->id_oferta);                    
                    $oferta->apuntados = $apuntados;                
                    $oferta->imagenes = $imagen;
                }
            $this->vistaAPI($this->datos['ofertaslistar']);
            //$this->vista('ofertas/ofertas', $this->datos);
        }

        public function listarpropios(){
            $id_usuario = $_SESSION['usuarioSesion']['id_usuario'];
            $pagina = isset($_POST['pagina']) ? $_POST['pagina'] : 1;
            $ofertas_por_pagina = 3; // Número de ofertas por página
            $ofertas = $this->oferta->listarpropiasofertas($id_usuario, $pagina, $ofertas_por_pagina);
            $total_ofertas = count($this->oferta->listarpropiasofertastodas($id_usuario)); // Obtener el total de ofertas
            $this->datos['ofertaslistar'] = $ofertas;
            $this->datos['total_ofertas'] = $total_ofertas; // Pasar el total de ofertas a la vista
            $this->datos['ofertas_por_pagina'] = $ofertas_por_pagina;
            $this->vista('ofertas/ofertaspropias', $this->datos);

        }

        public function verMas() {
            $id = $_POST['id_oferta'];
            $ofertaCompleta = $this->oferta->verOfertaCompleta($id);
            $ofertaComentario = $this->oferta->recogerComentario($id);
            $detalleInmueble = $this->inmueble->obtenerDetallesInmueble($id);                 
            $imagen = $this->oferta->listarofertasimagen($detalleInmueble->id_inmueble);                    
            
            if ($ofertaCompleta && $detalleInmueble) {
                $this->datos['oferta'] = $ofertaCompleta;
                $this->datos['inmueble'] = $detalleInmueble;
                $this->datos['comentario'] = $ofertaComentario;
                $this->datos['imagen'] = $imagen;
                
                $this->vista('ofertas/verOferta', $this->datos);

            } else {
                // Manejar el caso en el que no se encuentre la oferta o detalles del inmueble
                echo "Error: No se encontró la oferta o detalles del inmueble.";
            }
        }

        public function editoferta(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                $id = $_POST['id_oferta'];            
                $id_usuario = $this->datos['usuarioSesion']['id_usuario'];
                $nombre_usuario = $this->datos['usuarioSesion']['nombre_usuario'];

                if(isset($_POST['enviarOfertaBtn'])){
                    // Información de oferta
                        $insert['id_oferta'] = $id;
                        $insert['titulo_oferta'] = $_POST['titulo_oferta'];
                        $insert['fecha_inicio_oferta'] = $_POST['fecha_inicio_oferta'];
                        $insert['fecha_fin_oferta'] = $_POST['fecha_fin_oferta'];
                        $insert['condiciones_oferta'] = $_POST['condiciones_oferta'];
                        $insert['descripcion_oferta'] = $_POST['descripcion_oferta'];
                        
                        $funciona=$this->oferta->editaroferta($insert);
                        $contenido="Buenas Sr./Sra.  ". $nombre_usuario ." le informamos que has editado la oferta: ". $insert['titulo_oferta'] ." y que los cambios se han realizado correctamente. Un saludo";
                        $titulo="Edicion de oferta";
                        if($funciona==true){
                            
                            $this->notificacionmodelo->añadirNotificacion($contenido, $id_usuario, $titulo);
                        }
                        if($this->datos['usuarioSesion']['notificar_notificaciones']){
                            Mailer::Notificacion($this->datos['usuarioSesion']['correo_usuario'], $titulo, $contenido);                
        
                        }
                    redirecionar("/OfertasControlador/listarpropios");
                }else if(isset($_POST['enviarInmuebleBtn'])){
                    // Características inmueble
                        $insert['id_inmueble'] = $_POST['id_inmueble'];
                        $insert['metros_cuadrados_inmueble'] = $_POST['metros_cuadrados_inmueble'];
                        $insert['distribucion_inmueble'] = $_POST['distribucion_inmueble'];
                        $insert['precio_inmueble'] = $_POST['precio_inmueble'];
                        $insert['caracteristicas_inmueble'] = $_POST['caracteristicas_inmueble'];
                        $insert['direccion_inmueble'] = $_POST['direccion_inmueble'];
                        $insert['equipamiento_inmueble'] = $_POST['equipamiento_inmueble'];
                        $insert['id_municipio'] = $_POST['id_municipio'];
                        $funciona=$this->inmueble->editarInmueble($insert);
                        redirecionar("/OfertasControlador/listarpropios");
                        $contenido="Buenas Sr./Sra.  ". $nombre_usuario ." le informamos que has editado la oferta: ". $insert['titulo_oferta'] ." y que los cambios se han realizado correctamente. Un saludo";
                        $titulo="Edicion de oferta";
                        if($funciona==true){
                            
                            $this->notificacionmodelo->añadirNotificacion($contenido, $id_usuario, $titulo);
                        }
                        if($this->datos['usuarioSesion']['notificar_notificaciones']){
                            Mailer::Notificacion($this->datos['usuarioSesion']['correo_usuario'], $titulo, $contenido);                
        
                        }
                }else{
                    $ofertaCompleta = $this->oferta->verOfertaCompleta($id);
                    $ofertaComentario = $this->oferta->recogerComentario($id);
                    $detalleInmueble = $this->inmueble->obtenerDetallesInmueble($id);                 
                    $imagen = $this->oferta->listarofertasimagen($detalleInmueble->id_inmueble);                    
                    
                    if ($ofertaCompleta && $detalleInmueble) {
                        $this->datos['oferta'] = $ofertaCompleta;
                        $this->datos['inmueble'] = $detalleInmueble;
                        $this->datos['comentario'] = $ofertaComentario;
                        $this->datos['imagen'] = $imagen;
                    } else {
                        // Manejar el caso en el que no se encuentre la oferta o detalles del inmueble
                        echo "Error: No se encontró la oferta o detalles del inmueble.";
                    }
                    
                    $this->datos['OfertaEditar']=$this->oferta->listaroferta($id);
                    $this->vista('ofertas/editaroferta', $this->datos);
                }  
                
                

                
                // redirecionar("/OfertasControlador/listarpropios");
            }
        }
        
        public function eliminaroferta($id){
            $oferta=$this->oferta->listaroferta($id);
            // print_r($oferta);
            $funciona=$this->oferta->eliminaroferta($id);
            $id_usuario = $_SESSION['usuarioSesion']['id_usuario'];
            $nombre_usuario = $_SESSION['usuarioSesion']['nombre_usuario'];
            $contenido="Buenas Sr./Sra.  ". $nombre_usuario ." le informamos que has deactivado la oferta: ". $oferta->titulo_oferta .". Un saludo";
            $titulo="Eliminar oferta";
            if($funciona==true){
                
                $this->notificacionmodelo->añadirNotificacion($contenido, $id_usuario, $titulo);
            }
            if($this->datos['usuarioSesion']['notificar_notificaciones']){
                Mailer::Notificacion($this->datos['usuarioSesion']['correo_usuario'], $titulo, $contenido);                

            }

            redirecionar("/OfertasControlador/listarpropios");
        }

        public function activaroferta($id){
            $oferta=$this->oferta->listaroferta($id);
            // print_r($oferta);
            $funciona=$this->oferta->activaroferta($id);
            $id_usuario = $_SESSION['usuarioSesion']['id_usuario'];
            $nombre_usuario = $_SESSION['usuarioSesion']['nombre_usuario'];
            $contenido="Buenas Sr./Sra.  ". $nombre_usuario ." le informamos que has activado la oferta: ". $oferta->titulo_oferta .". Un saludo";
            $titulo="Activación de  oferta";
            if($funciona==true){
                
                $this->notificacionmodelo->añadirNotificacion($contenido, $id_usuario, $titulo);
            }
            if($this->datos['usuarioSesion']['notificar_notificaciones']){
                Mailer::Notificacion($this->datos['usuarioSesion']['correo_usuario'], $titulo, $contenido);                

            }

            redirecionar("/OfertasControlador/listarpropios");
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

            redirecionar('/OfertasControlador/mostrarOfertas');
        }

        public function EliminarInscripccion($id_oferta = 0) {
            
            $id_usuario = $_SESSION['usuarioSesion']['id_usuario'];
            $nombre_usuario = $_SESSION['usuarioSesion']['nombre_usuario'];
            $funciona=$this->oferta->EliminarInscripccion($id_oferta, $id_usuario);
            $contenido="Buenas Sr./Sra.  ". $nombre_usuario ." le informamos que has borrado la inscripcion de la oferta: "." correctamente. Un saludo";
            $titulo="Inscripcion de  oferta";

            if($funciona==true){
                $this->notificacionmodelo->añadirNotificacion($contenido, $id_usuario, $titulo);
            }

            if($this->datos['usuarioSesion']['notificar_notificaciones']){
                //Mailer::Notificacion($this->datos['usuarioSesion']['correo_usuario'], $titulo, $contenido);                

            }

            redirecionar('/OfertasControlador/VerOfertaInscrito');
        }


        public function VerOfertaInscrito() {
            $id_usuario = $_SESSION['usuarioSesion']['id_usuario'];
            $this->datos['ofertaslistar'] = $this->oferta->listarofertasInscritas($id_usuario);
            foreach ($this->datos['ofertaslistar'] as $oferta) {
                $imagen = $this->oferta->listarofertasimagen($oferta->d_inmueble);    
                $apuntados = $this->oferta->listarofertasapuntados($oferta->id_oferta);                    
                $oferta->apuntados = $apuntados;                
                $oferta->imagenes = $imagen;
            }
            $this->vista('ofertas/ofertasinscrito', $this->datos);
        }
        

        public function verusuariosinscritos() {
            $id_oferta = $_POST['id_oferta'];


            $this->datos['usuarioslistar'] = $this->oferta->listaruserinscritos($id_oferta);
            
            $this->vista('ofertas/verinscritos', $this->datos);
        }
        

    }