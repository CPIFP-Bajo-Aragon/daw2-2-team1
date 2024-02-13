<?php

    class OfertasControlador extends Controlador{

        
        private $oferta;
        private $inmueble;
        public function __construct(){
            session_start();
            $this->oferta = $this->modelo('OfertasModelo');
            $this->municipiosmodelo = $this->modelo('MunicipiosModelo');
            $this->inmueble = $this->modelo('InmuebleModelo');
            $this->usuario = $this->modelo('UserModelo');
            $this->admin = $this->modelo('AdminModelo');
            $this->datos['admin'] = $this->admin->ListarAdmins();
            $datos['id_usuario']=$_SESSION['usuarioSesion']['id_usuario'];
            $this->datos['noti'] = $this->usuario->listarnotificaciones($datos);
            $this->datos['chats'] = $this->usuario->listaruserchat($datos);
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
        
            echo "index";
        }
        
        public function addoferta(){


             if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['publicarOfertaInmueble'])) {
                
                //Datos de oferta

                //$insert['fecha_inicio']= $_POST["fecha_inicio"];  
                //$insert['fecha_fin']= $_POST["fecha_fin"];  
                $insert['condiciones']= $_POST['condiciones'];  
                //$insert['fecha_publicacion']= $_POST['fecha_publicacion'];  
                //$insert['id_entidad']= $_POST['id_entidad'];  

                //Datos de inmueble

                $inmueble['metrosCuadrados'] = $_POST["metrosCuadrados"];
                $inmueble['descripcion'] = $_POST["descripcion"];
                $inmueble['distribucion'] = $_POST["distribucion"];
                $inmueble['precio'] = $_POST["precio"];
                $inmueble['estado'] = $_POST["estado"];
                $inmueble['ubicacion'] = $_POST["calle"].','.$_POST["numero"].','. $_POST["puerta"];
                $inmueble['caracteristicas'] = implode(',', $_POST['caracteristicas']);
                $inmueble['equipamiento'] = $_POST['equipamiento'];
                $inmueble['municipio'] = $_POST['municipio'];
                $inmueble['estado'] = $_POST['estado'];

                //Datos oferta_inmueble

                $a=$this->oferta->añadiroferta($insert);
                $this->inmueble->añadirInmueble($inmueble);

             }else{
                 $this->vista('ofertas/insertarofertas', $this->datos);
             }

        }

        public function listar(){
            $id_usuario = $_SESSION['usuarioSesion']['id_usuario'];
            $this->datos['ofertaslistar'] = $this->oferta->listarofertas($id_usuario);
                foreach ($this->datos['ofertaslistar'] as $oferta) {
                    $imagen = $this->oferta->listarofertasimagen($oferta->d_inmueble);                    
                    $oferta->imagenes = $imagen;
                }
            $this->vista('ofertas/ofertas', $this->datos);
        }

        public function listarpropios(){
            $id_usuario = $_SESSION['usuarioSesion']['id_usuario'];
            $this->datos['ofertaslistar'] = $this->oferta->listarpropiasofertas($id_usuario);
            $this->vista('ofertas/ofertaspropias', $this->datos);
        }

        public function editoferta($id=0){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $insert['id_oferta']= $_POST['id_oferta'];  
                $insert['tipo_oferta']= $_POST['tipo_oferta'];  
                $insert['fecha_inicio']= $_POST['fecha_inicio'];  
                $insert['fecha_fin']= $_POST['fecha_fin'];  
                $insert['condiciones']= $_POST['condiciones'];   
                $insert['tipo']= $_POST['tipo'];

                print_r($insert);

                $a=$this->oferta->editaroferta($insert);
                redirecionar("/OfertasControlador/listarpropios");
            }else{
                if($id==0){
                    echo "Ha habido un error";
                }else{
                    $this->datos['OfertaEditar']=$this->oferta->listaroferta($id);
                    $this->vista('ofertas/editaroferta', $this->datos);
                }  
            }
        }
        
        public function eliminaroferta($id){
            $this->oferta->eliminaroferta($id);
            redirecionar("/OfertasControlador/listarpropios");

        }

        public function verMas($id = 0) {
            $ofertaCompleta = $this->oferta->verOfertaCompleta($id);
            $ofertaComentario = $this->oferta->recogerComentario($id);
            $detalleInmueble = $this->inmueble->obtenerDetallesInmueble($id);
            
            if ($ofertaCompleta && $detalleInmueble) {
                $this->datos['oferta'] = $ofertaCompleta;
                $this->datos['inmueble'] = $detalleInmueble;
                $this->datos['comentario'] = $ofertaComentario;
                $this->vista('ofertas/verOferta', $this->datos);
            } else {
                // Manejar el caso en el que no se encuentre la oferta o detalles del inmueble
                echo "Error: No se encontró la oferta o detalles del inmueble.";
            }
        }

        public function InscripccionOferta($id_oferta = 0) {
            $this->oferta->insertarInscripcion($id_oferta, $_SESSION['usuarioSesion']['id_usuario']);
            redirecionar('/OfertasControlador/listar');
        }

        public function VerOfertaInscrito() {
            $id_usuario = $_SESSION['usuarioSesion']['id_usuario'];
            $this->datos['ofertaslistar'] = $this->oferta->listarofertasInscritas($id_usuario);
            print_r($this->datos['ofertaslistar']);
            $this->vista('ofertas/ofertasinscrito', $this->datos);
        }
        

    }