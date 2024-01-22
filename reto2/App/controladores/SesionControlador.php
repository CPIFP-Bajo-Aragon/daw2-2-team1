<?php

    class SesionControlador extends Controlador{

        private $sesion;
        public function __construct(){
            $this->sesion = $this->modelo('SesionModelo');
            
        }
        public function index(){
        
            $this->vista("sesion/sesion");
        }

        public function adduser(){
        }
    }