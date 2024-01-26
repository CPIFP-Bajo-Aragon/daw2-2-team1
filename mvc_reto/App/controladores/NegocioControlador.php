<?php

    class NegocioControlador extends Controlador{

        private $negociomodelo;

        public function __construct(){
            session_start();
            $this->negociomodelo = $this->modelo('NegocioModelo');
        }
        public function index(){
        }

        public function addnegocio(){
            $nif = $_SESSION['usuarioSesion']['NIF'];
            $this->datos['ofertaslistar'] = $this->modelo('OfertasModelo')->listarpropiasofertas($nif);
            //print_r($this->datos['ofertaslistar']);
            $this->vista('negocios/insertarnegocio', $this->datos['ofertaslistar']);

        }

        public function listnegociopropio(){
            $nif = $_SESSION['usuarioSesion']['NIF'];
            $this->datos['negocioslistar'] = $this->negociomodelo->listarnegociospropio($nif);
            //print_r($this->datos['negocioslistar']);
            $this->vista('negocios/vernegociopropio', $this->datos['negocioslistar']);

        } 

        public function listnegocio(){
            $nif = $_SESSION['usuarioSesion']['NIF'];
            $this->datos['negocioslistar'] = $this->negociomodelo->listarnegocios($nif);
            //print_r($this->datos['negocioslistar']);
            $this->vista('negocios/vernegocio', $this->datos['negocioslistar']);

        }
        
        
    }