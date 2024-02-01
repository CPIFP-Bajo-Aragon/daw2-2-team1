<?php

    class ServiciosModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function listarServicio($id_municipio){
            $this->db->query("SELECT * FROM `DISPONER_SERVICIO` 
                                INNER JOIN SERVICIO on SERVICIO.id_servicio=DISPONER_SERVICIO.id_servicio 
                                where DISPONER_SERVICIO.id_municipio= :id;");
            $this->db->bind(':id', $id_municipio);
        
            return $this->db->registros();
        }
       
    }