<?php

    class AdminModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function verInmuebles() {
            $this->db->query("SELECT * FROM `INMUEBLE` ");
            return $this->db->registros(); 
        }

        public function verNegocios() {
            $this->db->query("SELECT * FROM `NEGOCIO` ");
            return $this->db->registros(); 
        }

        public function verUsuarios() {
            $this->db->query("SELECT * FROM `USUARIO` ");
            return $this->db->registros(); 
        }

       
        public function añadirInmuebleAdmin() {
           
        }
        
        public function ListarAdmins(){
            $this->db->query("SELECT * FROM `USUARIO` INNER JOIN ADMINISTRADOR on ADMINISTRADOR.NIF=USUARIO.NIF ");
            return $this->db->registros(); 
        }
        


    }