<?php

    class Inicio extends Controlador{

        private $SesionModelo;

        public function __construct(){
            $this->SesionModelo = $this->modelo('SesionModelo');

        }
        public function index(){   
            $this->vista('pagina_inicio');
        }


        public function edit(){
        }
    }