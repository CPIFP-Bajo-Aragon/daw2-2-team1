<?php

    class OfertasModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function listarpropiasofertas($id_usuario){
            $this->db->query( "SELECT oferta.*
                                FROM `oferta`
                                WHERE oferta.id_entidad IN (
                                    SELECT entidad.id_entidad
                                    FROM entidad
                                    INNER JOIN usuario_entidad ON entidad.id_entidad = usuario_entidad.id_entidad
                                    WHERE usuario_entidad.id_usuario = :id_usuario)"
                                );
            $this->db->bind(':id_usuario', $id_usuario);
            return $this->db->registros();
        }

        public function listarLocalesofertas($id_usuario){
            $this->db->query( "SELECT * FROM `oferta` inner join inmueble on inmueble.id_oferta=oferta.id_oferta INNER JOIN LOCAL on local.codigo_inmueble=inmueble.codigo_inmueble WHERE `id_usuario` = :id_usuario;");
            $this->db->bind(':id_usuario', $id_usuario);
            return $this->db->registros();
        }

        public function listarofertas($id_usuario){
            $this->db->query( "SELECT oferta.*
                                FROM `oferta`
                                WHERE oferta.id_entidad IN (
                                    SELECT entidad.id_entidad
                                    FROM entidad
                                    INNER JOIN usuario_entidad ON entidad.id_entidad = usuario_entidad.id_entidad
                                    WHERE usuario_entidad.id_usuario != :id_usuario);");
            $this->db->bind(':id_usuario', $id_usuario);
            return $this->db->registros();
        }

        public function listarofertasimagen(){
            $this->db->query( "SELECT * FROM `imagen`");
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
            $lastInsertId = lastInsertId();
            return $lastInsertId;
        }

        public function listaroferta($id){
            $this->db->query( "SELECT * FROM `oferta` WHERE `id_oferta` = :id_oferta;");
            $this->db->bind(':id_oferta', $id);
            return $this->db->registro();
        }

        public function editaroferta($insert){

            $this->db->query( "UPDATE `oferta` SET `tipo_oferta`=:tipo_oferta,`fecha_inicio`=:fecha_inicio, `fecha_fin`= :fecha_fin,`condiciones`= :condiciones, `tipo`=:tipo 
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

            $this->db->query( "DELETE FROM `oferta` WHERE `id_oferta`=:id;");

            // Vincular los parámetros
                $this->db->bind(':id', $id);
            
            $this->db->execute();
        }

        public function verOfertaCompleta($id) {
            $this->db->query("SELECT * FROM `oferta` WHERE `id_oferta` = :id_oferta;");
            $this->db->bind(':id_oferta', $id);
            return $this->db->registro();
        }

        public function listarInmueble($id) {
            $this->db->query("SELECT * FROM `inmueble` WHERE `id_oferta` = :id_oferta;");
            $this->db->bind(':id_oferta', $id);
            return $this->db->registro();
        }

        public function recogerComentario($id) {
            $this->db->query("SELECT * FROM `val_inmueble` 
                              INNER JOIN inmueble ON val_inmueble.codigo_inmueble = inmueble.codigo_inmueble 
                              INNER JOIN oferta ON inmueble.id_oferta = oferta.id_oferta 
                              INNER JOIN usuario ON val_inmueble.NIF = usuario.NIF 
                              WHERE oferta.id_oferta = :id");
            $this->db->bind(':id', $id);
            return $this->db->registros();
        }
        
        public function insertarInscripcion($id, $nif){
            $this->db->query("INSERT INTO `inscribir`(`id_usuario`, `id_oferta`) VALUES (:nif, :id)");
            $this->db->bind(':id', $id);
            $this->db->bind(':nif', $nif);
            return $this->db->execute();
        }
        public function listarofertasInscritas($nif){
            $this->db->query( "SELECT * FROM `inscribir` 
                                INNER join oferta on inscribir.id_oferta = oferta.id_oferta 
                                inner join inmueble on inmueble.id_oferta = oferta.id_oferta  
                                        WHERE inscribir.NIF = :nif;");
            $this->db->bind(':nif', $nif);
            return $this->db->registros();
        }
    }