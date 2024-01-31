<?php

    class OfertasControlador extends Controlador{

        
        private $oferta;
        public function __construct(){
            session_start();
            $this->oferta = $this->modelo('OfertasModelo');
            $this->municipiosmodelo = $this->modelo('MunicipiosModelo');
            $this->inmueble = $this->modelo('InmuebleModelo');
            $this->usuario = $this->modelo('UserModelo');
            $this->admin = $this->modelo('AdminModelo');
            $this->datos['admin'] = $this->admin->ListarAdmins();
            $datos['nif']=$_SESSION['usuarioSesion']['NIF'];
            $this->datos['noti'] = $this->usuario->listarnotificaciones($datos);
            $this->datos['chats'] = $this->usuario->listaruserchat($datos);
            

            if (!isset($_SESSION["usuarioSesion"]) || empty($_SESSION["usuarioSesion"]) || $_SESSION["usuarioSesion"]["admin"]==0) {
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
            // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //     $insert['nif']= $_POST['nif'];  
            //     $insert['tipo_oferta']= $_POST['tipo_oferta'];  
            //     $insert['fecha_inicio']= $_POST['fecha_inicio'];  
            //     $insert['fecha_fin']= $_POST['fecha_fin'];  
            //     $insert['condiciones']= $_POST['condiciones'];  
            //     $insert['fecha_publicacion']= $_POST['fecha_publicacion'];  
            //     $insert['tipo']= $_POST['tipo'];  
            //     $insert['id_entidad']= $_POST['id_entidad'];  

            //     print_r($insert);

            //     $a=$this->oferta->añadiroferta($insert);
            //     $this->oferta->añadirinmueble();
            // }else{
            //     $this->vista('ofertas/insertarofertas', $this->datos);
            // }  

            if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['publicarOfertaInmueble'])){
                $inmueble['oferta'] = $db->lastInsertId();
                $inmueble['tipoInmueble'] = $_POST['tipoInmueble'];
                $inmueble['tipoVivienda'] = $_POST['tipoVivienda'];
                $inmueble['nombre'] = $_POST['nombre'];
                $inmueble['descripcion'] = $_POST["descripcion"];
                $inmueble['precio'] = $_POST["precio"];
                $inmueble['ubicacion'] = $_POST["calle"].','.$_POST["numero"];
                $inmueble['puerta'] = $_POST["puerta"];
                $inmueble['localidad'] = $_POST["localidad"];
                $inmueble['metrosCuadrados'] = $_POST["metrosCuadrados"];
                $inmueble['caracteristicas'] = implode(',', $_POST['caracteristicas']);
                if (isset($_POST['estado'])) {
                    $inmueble['estado'] = $_POST['estado'];
                }
                if (isset($_POST['equipamiento'])) {
                    $inmueble['equipamiento'] = $_POST['equipamiento'];
                }
                $this->inmueble->insertarInmueble($inmueble);
                
                
            }else{
                $this->vista('ofertas/insertarofertas', $this->datos);
            }
        }

        public function listar(){
            $nif = $_SESSION['usuarioSesion']['NIF'];
            $this->datos['ofertaslistar'] = $this->oferta->listarofertas($nif);
            $this->datos['ofertaslistarimagenes'] = $this->oferta->listarofertasimagen();
            $this->datos['municipioslistar'] = $this->municipiosmodelo->listarMunicipio();
            $this->vista('ofertas/ofertas', $this->datos);
        }

        public function listarpropios(){
            $nif = $_SESSION['usuarioSesion']['NIF'];
            $this->datos['ofertaslistar'] = $this->oferta->listarpropiasofertas($nif);
            
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
        
    }