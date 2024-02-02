<?php

    class ServiciosModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function listarServicioempresas($id_municipio, $id_servicio){
            $this->db->query("SELECT * FROM `DISPONER_SERVICIO` 
                                INNER JOIN SERVICIO on SERVICIO.id_servicio=DISPONER_SERVICIO.id_servicio 
                                where DISPONER_SERVICIO.id_municipio= :id and DISPONER_SERVICIO.id_servicio= :id_servicio;");
            $this->db->bind(':id', $id_municipio);
            $this->db->bind(':id_servicio', $id_servicio);
        
            return $this->db->registros();
        }
        public function listarServicio(){
            $this->db->query("SELECT * FROM SERVICIO");      
            return $this->db->registros();
        }
       
    }