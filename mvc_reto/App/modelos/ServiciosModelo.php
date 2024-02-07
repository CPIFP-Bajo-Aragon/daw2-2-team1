<?php

    class ServiciosModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function listarServicioempresas($id_municipio, $id_servicio){
            $this->db->query("SELECT * FROM `servicio` 
                                INNER JOIN tipo_servicio on tipo_servicio.id_tipo_servicio=servicio.id_tipo_servicio 
                                where servicio.id_municipio= :id and servicio.id_tipo_servicio= :id_servicio;");
            $this->db->bind(':id', $id_municipio);
            $this->db->bind(':id_servicio', $id_servicio);
        
            return $this->db->registros();
        }
        public function listarServicio(){
            $this->db->query("SELECT * FROM tipo_servicio");      
            return $this->db->registros();
        }
       
    }