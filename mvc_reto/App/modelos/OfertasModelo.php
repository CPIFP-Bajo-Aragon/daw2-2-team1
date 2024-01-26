<?php

    class OfertasModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function listarpropiasofertas($nif){
            $this->db->query( "SELECT * FROM `OFERTA` WHERE `NIF` = :nif;");
            $this->db->bind(':nif', $nif);
            return $this->db->registros();
        }

        public function listarofertas($nif){
            $this->db->query( "SELECT * FROM `OFERTA` WHERE `NIF` != :nif;");
            $this->db->bind(':nif', $nif);
            return $this->db->registros();
 
        }

        public function añadirinmueble(){
            echo "añadir inmueble sin negocio";
        }

        public function añadirinmuebleconnegio(){
            echo "añadir inmueble con negocio";
        }

        public function añadirofertanegocio($insert){
            $nif = $insert['nif'];  
            $tipo_pferta = $insert['tipo_oferta'];  
            $fecha_inicio = $insert['fecha_inicio'];  
            $fecha_fin = $insert['fecha_fin'];  
            $condiciones = $insert['condiciones'];  
            $fecha_publicacion = $insert['fecha_publicacion'];  
            $tipo = $insert['tipo'];  
            $id_entidad = $insert['id_entidad'];  

            $this->db->query( "INSERT INTO `OFERTA`(`tipo_oferta`, `fecha_inicio`, `fecha_fin`, `condiciones`, `fecha_publicacion`, `tipo`, `NIF`, `id_entidad`) VALUES ( :tipo_ofe, :fecha_ini, :fecha_fin, :condiciones, :fecha_pu, :tipo, :nif, :id_entidad)");

            $this->db->bind(':tipo_ofe', $tipo_pferta);
            $this->db->bind(':fecha_ini', $fecha_inicio);
            $this->db->bind(':fecha_fin', $fecha_fin);
            $this->db->bind(':condiciones', $condiciones);
            $this->db->bind(':fecha_pu', $fecha_publicacion);
            $this->db->bind(':tipo', $tipo);
            $this->db->bind(':nif', $nif);
            $this->db->bind(':id_entidad', $id_entidad);
            $this->db->execute();

            // Obtener el ID de la última oferta insertada
            $lastInsertId = $this->db->lastInsertId();
            return $lastInsertId;
    }

        public function añadiroferta($insert){
            $nif = $insert['nif'];  
            $tipo_pferta = $insert['tipo_oferta'];  
            $fecha_inicio = $insert['fecha_inicio'];  
            $fecha_fin = $insert['fecha_fin'];  
            $condiciones = $insert['condiciones'];  
            $fecha_publicacion = $insert['fecha_publicacion'];  
            $tipo = $insert['tipo']; 

            $this->db->query( "INSERT INTO `OFERTA`(`tipo_oferta`, `fecha_inicio`, `fecha_fin`, `condiciones`, `fecha_publicacion`, `tipo`, `NIF`) VALUES ( :tipo_ofe, :fecha_ini, :fecha_fin, :condiciones, :fecha_pu, :tipo, :nif )");

            $this->db->bind(':tipo_ofe', $tipo_pferta);
            $this->db->bind(':fecha_ini', $fecha_inicio);
            $this->db->bind(':fecha_fin', $fecha_fin);
            $this->db->bind(':condiciones', $condiciones);
            $this->db->bind(':fecha_pu', $fecha_publicacion);
            $this->db->bind(':tipo', $tipo);
            $this->db->bind(':nif', $nif);
            $this->db->execute();

            // Obtener el ID de la última oferta insertada
            $lastInsertId = $this->db->lastInsertId();
            return $lastInsertId;
        }

        public function listaroferta($id){
            $this->db->query( "SELECT * FROM `OFERTA` WHERE `id_oferta` = :id_oferta;");
            $this->db->bind(':id_oferta', $id);
            return $this->db->registro();
        }
        
    }