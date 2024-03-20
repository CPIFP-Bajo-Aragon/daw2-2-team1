<?php

    class InvitadoControlador extends Controlador{
        private $negociomodelo;
        private $oferta;
        private $municipiosmodelo;
        private $inmueble;
        private $servicios;
        private $ser;
        public $datos;

        public function __construct(){
            $this->negociomodelo = $this->modelo('NegocioModelo');
            $this->oferta = $this->modelo('OfertasModelo');
            $this->municipiosmodelo = $this->modelo('MunicipiosModelo');
            $this->inmueble = $this->modelo('InmuebleModelo');
            $this->servicios = $this->modelo('ServiciosModelo');
            $this->datos['municipioslistar'] = $this->municipiosmodelo->listarMunicipio();
      
        }
        public function index(){

        }

        public function mostrarOfertas($municipio=0){   
            $this->datos['municipioFiltro']=$municipio;        
            $this->vista('invitado/ofertas', $this->datos);
        }

        public function listar($municipioValor=0, $tipoInmuebleValor=0, $precioMin=0, $precioMax=1000, $habitacionesValor=0, $estadoValor=0){
            $this->datos['ofertaslistar'] = $this->oferta->listarTodasofertas();
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
        public function listarServicios($municipio=0){           
            //print_r($this->datos['municipioslistar']);
            $this->vista("invitado/listarservicios", $this->datos);
        }

        public function obtenerServicios($municipio=0, $tipo_servicio=0, $buscador=0){
            $servicios=$this->servicios->listarServicioempresas($municipio, $tipo_servicio, $buscador, 0);

            $this->vistaApi($servicios);
        }

        public function listarNegocios(){           
            //print_r($this->datos['municipioslistar']);
            $this->vista("invitado/negocios", $this->datos);
        }
        public function listnegocio($municipioValor=0){
            $id_usuario=0;
            $this->datos['negocioslistar'] = $this->negociomodelo->listarnegocios($id_usuario, $municipioValor);
            foreach ($this->datos['negocioslistar'] as $negocio) {
                // Check if d_inmueble is set before trying to use it
                if (isset($negocio->d_inmueble)) {
                    $imagen = $this->oferta->listarofertasimagen($negocio->d_inmueble);
                    $negocio->imagenes = $imagen;
                } else {
                    // Handle the case when d_inmueble is not set (e.g., provide a default value or log an error)
                    $negocio->imagenes = []; // Set a default value or handle accordingly
                }
            
                $apuntados = $this->oferta->listarofertasapuntados($negocio->id_oferta);
                $negocio->apuntados = $apuntados;
            }
            
            //print_r($this->datos['negocioslistar']);
            //$this->vista('negocios/vernegocio', $this->datos);
            $this->vistaAPI($this->datos['negocioslistar']);
        }
    }