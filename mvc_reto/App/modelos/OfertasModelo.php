<?php

    class OfertasModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function listarpropiasofertas($nif){
            $this->db->query( "SELECT * FROM `OFERTA`   WHERE `NIF` = :nif;");
            $this->db->bind(':nif', $nif);
            return $this->db->registros();
        }

        public function listarLocalesofertas($nif){
            $this->db->query( "SELECT * FROM `OFERTA` inner join INMUEBLE on INMUEBLE.id_oferta=OFERTA.id_oferta INNER JOIN LOCAL on LOCAL.codigo_inmueble=INMUEBLE.codigo_inmueble WHERE `NIF` = :nif;");
            $this->db->bind(':nif', $nif);
            return $this->db->registros();
        }

        public function listarofertas($nif){
            $this->db->query( "SELECT * FROM `OFERTA`
                                         inner join INMUEBLE on INMUEBLE.id_oferta = OFERTA.id_oferta 
                                         WHERE `NIF` != :nif;");
            $this->db->bind(':nif', $nif);
            return $this->db->registros();
        }

        public function listarofertasimagen(){
            $this->db->query( "SELECT * FROM `IMAGEN`");
            return $this->db->registros();
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

        public function editaroferta($insert){

            $this->db->query( "UPDATE `OFERTA` SET `tipo_oferta`=:tipo_oferta,`fecha_inicio`=:fecha_inicio, `fecha_fin`= :fecha_fin,`condiciones`= :condiciones, `tipo`=:tipo 
                                 WHERE `id_oferta`= :id_oferta");

            // Vincular los parámetros
                $this->db->bind(':id_oferta', $insert['id_oferta']);
                $this->db->bind(':tipo_oferta', $insert['tipo_oferta']);
                $this->db->bind(':fecha_inicio', $insert['fecha_inicio']);
                $this->db->bind(':fecha_fin', $insert['fecha_fin']);
                $this->db->bind(':condiciones', $insert['condiciones']);
                $this->db->bind(':tipo', $insert['tipo']);
            
            $this->db->execute();
        }

        public function eliminaroferta($id){

            $this->db->query( "DELETE FROM `OFERTA` WHERE `id_oferta`=:id;");

            // Vincular los parámetros
                $this->db->bind(':id', $id);
            
            $this->db->execute();
        }

        public function verOfertaCompleta($id) {
            $this->db->query("SELECT * FROM `OFERTA` WHERE `id_oferta` = :id_oferta;");
            $this->db->bind(':id_oferta', $id);
            return $this->db->registro();
        }

        public function listarInmueble($id) {
            $this->db->query("SELECT * FROM `INMUEBLE` WHERE `id_oferta` = :id_oferta;");
            $this->db->bind(':id_oferta', $id);
            return $this->db->registro();
        }

        public function recogerComentario($id) {
            $this->db->query("SELECT * FROM `VAL_INMUEBLE` 
                              INNER JOIN INMUEBLE ON VAL_INMUEBLE.codigo_inmueble = INMUEBLE.codigo_inmueble 
                              INNER JOIN OFERTA ON INMUEBLE.id_oferta = OFERTA.id_oferta 
                              INNER JOIN USUARIO ON VAL_INMUEBLE.NIF = USUARIO.NIF 
                              WHERE OFERTA.id_oferta = :id");
            $this->db->bind(':id', $id);
            return $this->db->registros();
        }
        
        public function insertarInscripcion($id, $nif){
            $this->db->query("INSERT INTO `INSCRIBIR`(`NIF`, `id_oferta`) VALUES (:nif, :id)");
            $this->db->bind(':id', $id);
            $this->db->bind(':nif', $nif);
            return $this->db->execute();
        }
        public function listarofertasInscritas($nif){
            $this->db->query( "SELECT * FROM `INSCRIBIR` 
                                INNER join OFERTA on INSCRIBIR.id_oferta = OFERTA.id_oferta 
                                inner join INMUEBLE on INMUEBLE.id_oferta = OFERTA.id_oferta  
                                        WHERE INSCRIBIR.NIF = :nif;");
            $this->db->bind(':nif', $nif);
            return $this->db->registros();
        }
    }