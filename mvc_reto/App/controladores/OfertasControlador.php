<?php

    class OfertasControlador extends Controlador{

        
        private $oferta;
        public function __construct(){
            session_start();
            $this->oferta = $this->modelo('OfertasModelo');
            
        }
        public function index(){
        
            echo "index";
        }
        public function addoferta(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $insert['nif']= $_POST['nif'];  
                $insert['tipo_oferta']= $_POST['tipo_oferta'];  
                $insert['fecha_inicio']= $_POST['fecha_inicio'];  
                $insert['fecha_fin']= $_POST['fecha_fin'];  
                $insert['condiciones']= $_POST['condiciones'];  
                $insert['fecha_publicacion']= $_POST['fecha_publicacion'];  
                $insert['tipo']= $_POST['tipo'];  
                $insert['id_entidad']= $_POST['id_entidad'];  

                print_r($insert);

                $a=$this->oferta->añadiroferta($insert);
                $this->oferta->añadirinmueble();
            }else{
                $this->vista('ofertas/insertarofertas');
            }  

        }

        public function listar(){
            $nif = $_SESSION['usuarioSesion']['NIF'];
            $this->datos['ofertaslistar'] = $this->oferta->listarofertas($nif);
            
            $this->vista('ofertas/ofertas', $this->datos);
        }

        public function listarpropios(){
            $nif = $_SESSION['usuarioSesion']['NIF'];
            $this->datos['ofertaslistar'] = $this->oferta->listarpropiasofertas($nif);
            
            $this->vista('ofertas/ofertaspropias', $this->datos);
        }

        public function editoferta($id=0){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $insert['nif']= $_POST['nif'];  
                $insert['tipo_oferta']= $_POST['tipo_oferta'];  
                $insert['fecha_inicio']= $_POST['fecha_inicio'];  
                $insert['fecha_fin']= $_POST['fecha_fin'];  
                $insert['condiciones']= $_POST['condiciones'];  
                $insert['fecha_publicacion']= $_POST['fecha_publicacion'];  
                $insert['tipo']= $_POST['tipo'];  
                $insert['id_entidad']= $_POST['id_entidad'];  

                print_r($insert);

                $a=$this->oferta->editoferta($insert);
                redirecionar("/OfertasControlador/listarpropios");
            }else{
                if($id==0){
                    echo "Ha habido un error";
                }else{
                    $this->datos['OfertaEditar']=$this->oferta->listaroferta($id);
                    $this->vista('ofertas/editaroferta', $this->datos['OfertaEditar']);
                }  
            }
        }
        
    }