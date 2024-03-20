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
            try{
                $this->db->query( "UPDATE `oferta` SET `titulo_oferta`=:titulo_oferta , `fecha_inicio_oferta`=:fecha_inicio , `fecha_fin_oferta`=:fecha_fin ,`condiciones_oferta`=:condiciones ,
                                                        `descripcion_oferta`=:descripcion ,`id_entidad`=:entidad
                                                    WHERE `id_oferta`= :id_oferta");

                // Vincular los parámetros
                    $this->db->bind(':id_oferta', $insert['id_oferta']);
                    $this->db->bind(':titulo_oferta', $insert['titulo_oferta']);
                    $this->db->bind(':fecha_inicio', $insert['fecha_inicio']);
                    $this->db->bind(':fecha_fin', $insert['fecha_fin']);
                    $this->db->bind(':condiciones', $insert['condiciones']);
                    $this->db->bind(':descripcion', $insert['descripcion']);
                    $this->db->bind(':entidad', $insert['entidad']);
                
                $this->db->execute();
                $_SESSION['correcto_message'] = 'La oferta se a editado correctamente';

             } catch (PDOException $e) {
                // Captura la excepción de PDO y muestra un mensaje de error específico
                $_SESSION['error_message'] = 'Error al editar oferta vuelve a intentarlo ';
            }
        }

        public function eliminaroferta($id){

            try{
                $this->db->query( "DELETE FROM `oferta` WHERE `id_oferta`=:id;");

                $this->db->bind(':id', $id);
            
                $this->db->execute();
                $_SESSION['correcto_message'] = 'La oferta se a eliminado correctamente';

            } catch (PDOException $e) {
                // Captura la excepción de PDO y muestra un mensaje de error específico
                $_SESSION['error_message'] = 'No se a podido eliminar la oferta';
            }
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
            $this->db->query("SELECT * FROM `valorar_inmueble` 
                              INNER JOIN inmueble ON valorar_inmueble.id_inmueble = inmueble.id_inmueble 
                              INNER JOIN oferta_inmueble ON inmueble.id_inmueble = oferta_inmueble.d_inmueble 
                              INNER JOIN oferta ON oferta_inmueble.id_oferta = oferta.id_oferta 
                              INNER JOIN usuario ON valorar_inmueble.id_usuario = usuario.id_usuario 
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
            $this->db->query( "SELECT * FROM `usuario_oferta` 
                                INNER join oferta on usuario_oferta.id_oferta = oferta.id_oferta 
                                INNER JOIN oferta_inmueble ON oferta.id_oferta = oferta_inmueble.id_oferta 
                                inner join inmueble on inmueble.id_inmueble = oferta_inmueble.d_inmueble  
                                        WHERE usuario_oferta.id_usuario = :nif;");
            $this->db->bind(':nif', $nif);
            return $this->db->registros();
        }
    }