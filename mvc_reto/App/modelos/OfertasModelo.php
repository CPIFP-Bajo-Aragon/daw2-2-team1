<?php

    class OfertasModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function listarpropiasofertas($id_usuario){
            $this->db->query( "SELECT *
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
            $this->db->query( "SELECT *
                                FROM `oferta`
                                    INNER JOIN oferta_inmueble on oferta_inmueble.id_oferta=oferta.id_oferta
                                WHERE oferta.id_entidad not IN (
                                    SELECT entidad.id_entidad
                                    FROM entidad
                                    INNER JOIN usuario_entidad ON entidad.id_entidad = usuario_entidad.id_entidad
                                    WHERE usuario_entidad.id_usuario = :id_usuario);");
            $this->db->bind(':id_usuario', $id_usuario);
            return $this->db->registros();
        }

        public function listarofertasimagen($id_inmueble){
            $this->db->query( "SELECT * FROM `imagen` where id_inmueble = $id_inmueble");
            return $this->db->registros();
        }

        public function añadiroferta($insert){

            //Insert oferta

            //$this->db->query( "INSERT INTO `oferta`(`fecha_inicio_oferta`, `fecha_fin_oferta`, `condiciones_oferta`) VALUES ( :fecha_ini, :fecha_fin, :condiciones)");
            $this->db->query( "INSERT INTO `oferta`(`condiciones_oferta`) VALUES (:condiciones)");

            //$this->db->bind(':fecha_ini', $_POST["fecha_inicio"]);
            //$this->db->bind(':fecha_fin', $_POST["fecha_fin"]);
            $this->db->bind(':condiciones', $insert["condiciones"]);
            //$this->db->bind(':entidad', $_POST["entidad"]);

            $this->db->execute();

            // Obtener el ID de la última oferta insertada
            //$lastInsertId = lastInsertId();
            //return $lastInsertId;
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
            $this->db->query("INSERT INTO `usuario_oferta`(`id_usuario`, `id_oferta`) VALUES (:nif, :id)");
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