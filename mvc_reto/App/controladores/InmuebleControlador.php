addinmueble

<?php

    class InmuebleControlador extends Controlador{

        private $inmueble;

        public function __construct(){
            session_start();
            $this->inmueble = $this->modelo('InmuebleModelo');
        }
        public function index(){
        }

        public function addinmueble(){
            $this->vista('inmuebles/add');

        }
    }