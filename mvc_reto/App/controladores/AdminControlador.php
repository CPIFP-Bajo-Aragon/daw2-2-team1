<?php

    class AdminControlador extends Controlador{

        
        private $oferta;
        public function __construct(){
            session_start();
            $this->oferta = $this->modelo('AdminModelo');
            
        }


        public function index(){
        
            $this->vista('admin/inicio');

        }
    }