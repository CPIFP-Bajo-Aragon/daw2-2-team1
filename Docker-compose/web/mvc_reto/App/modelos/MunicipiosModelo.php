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

        public function municipio($id_municipio){
            $this->db->query("SELECT * FROM municipio where id_municipio = :id");
            $this->db->bind(':id', $id_municipio);
            return $this->db->registros();
        }

    }