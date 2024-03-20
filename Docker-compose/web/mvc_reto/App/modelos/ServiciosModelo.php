<?php

    class ServiciosModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function listarServicioempresas($id_municipio, $id_servicio, $buscador, $offset){
            $sql="SELECT * FROM `servicio` 
            INNER JOIN tipo_servicio on tipo_servicio.id_tipo_servicio=servicio.id_tipo_servicio ";
            
            if($id_municipio!=0){
                $sql .= " where servicio.id_municipio= $id_municipio";
            }

            if($id_servicio!=0){
                $sql .= " and servicio.id_tipo_servicio= $id_servicio";
            }

            if(!empty($buscador)){
                $sql .= " and servicio.nombre_servicio LIKE '%$buscador%'";
            }
            $sql .= "LIMIT 10 OFFSET $offset;";
            $this->db->query($sql);

        
            return $this->db->registros();
        }
        public function listarServicio(){
            $this->db->query("SELECT * FROM tipo_servicio");      
            return $this->db->registros();
        }

        public function obtenerTotalServicios(){
            $this->db->query("SELECT COUNT(*) FROM servicio");      
            return $this->db->registro();
        }
       
    }