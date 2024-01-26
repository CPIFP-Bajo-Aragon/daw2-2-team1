<?php

    class Inicio extends Controlador{

        private $SesionModelo;

        public function __construct(){
            session_start();

        }
        public function index(){   
            $this->vista('pagina_inicio');
        }


        public function edit(){
        }
    }