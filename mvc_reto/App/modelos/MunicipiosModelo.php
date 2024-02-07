<?php

    class MunicipiosModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function listarMunicipio(){
            $this->db->query("SELECT * FROM municipio");
            return $this->db->registros();
        }

    }