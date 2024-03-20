<?php

    class NegocioModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function listarnegociospropio($id_usuario){
            $this->db->query("SELECT *
                                    FROM
                                        oferta O
                                    JOIN
                                        negocio N ON O.id_negocio = N.id_negocio
                                        where     O.id_entidad IN (
                                    SELECT entidad.id_entidad
                                    FROM entidad
                                    INNER JOIN usuario_entidad ON entidad.id_entidad = usuario_entidad.id_entidad
                                    WHERE usuario_entidad.id_usuario = :id_usuario);
                            ;");
            $this->db->bind(':id_usuario', $id_usuario);
            return $this->db->registros();
        }

        public function listarnegocios($id_usuario, $municipioValor){
            $sql=("SELECT oferta.*, N.*, inmueble.*, municipio.*, entidad.*, oferta_inmueble.precio_inm
                                FROM oferta
                                JOIN negocio N ON oferta.id_negocio = N.id_negocio
                                LEFT JOIN oferta_inmueble ON oferta_inmueble.id_oferta = oferta.id_oferta
                                LEFT JOIN inmueble ON oferta_inmueble.d_inmueble = inmueble.id_inmueble
                                LEFT JOIN municipio ON municipio.id_municipio = inmueble.id_municipio
                                LEFT JOIN entidad ON entidad.id_entidad = oferta.id_entidad
                                ");

            if($id_usuario!=0){
                $sql .= "WHERE oferta.id_entidad NOT IN (
                    SELECT entidad.id_entidad
                    FROM entidad
                    INNER JOIN usuario_entidad ON entidad.id_entidad = usuario_entidad.id_entidad
                    WHERE usuario_entidad.id_usuario =  $id_usuario
                )";
            };
            if($municipioValor!=0){
                $sql .= " and inmueble.id_municipio= $municipioValor";
            };
            $sql .= ";";

            $this->db->query($sql);           
            return $this->db->registros();
        }

        public function addnegocios($datos, $id_inmueble){


            $this->db->query("INSERT INTO `negocio`(`titulo_negocio`, `motivo_traspaso_negocio`, `coste_traspaso_negocio`, `coste_mensual_negocio`, `descripcion_negocio`, `capital_minimo_negocio`,  `local_id_inmueble`, `id_entidad`)
            VALUES (:tit, :mot_tras, :cost_tras, :cost_mensual, :descr, :cap_min, :local_id, :id_entidad)");

            $this->db->bind(':tit', $datos['titulo_negocio']);
            $this->db->bind(':mot_tras', $datos['motivo_traspaso']);
            $this->db->bind(':cost_tras', $datos['coste_traspaso']);
            $this->db->bind(':cost_mensual', $datos['coste_mensual']);
            $this->db->bind(':descr', $datos['descripcion_negocio']);
            $this->db->bind(':cap_min', $datos['capital_minimo']);
            $this->db->bind(':local_id', $id_inmueble);
            $this->db->bind(':id_entidad', $datos['id_entidad']);


    
            // Ejecutar la consulta
            $this->db->execute();
            

            return $this->db->lastInsertId();

            redirecionar("/NegocioControlador/addnegocio");
        }

        public function crearComentarioNegocio($nuevoComentario){
            $this->db->query( "INSERT INTO `valorar_inmueble`(`id_inmueble`, `fecha_valoracion_inm`, `puntuacion_inm`, `descripcion_inm`, `id_usuario`) 
                                        VALUES (:cod, :fech, :pun, :com, :nif)");

            $this->db->bind(':pun', $nuevoComentario['puntuacion']);
            $this->db->bind(':com', $nuevoComentario['comentario']);
            $this->db->bind(':fech', $nuevoComentario['fecha']);
            $this->db->bind(':nif', $nuevoComentario['nif']);
            $this->db->bind(':cod', $nuevoComentario['codigo_negocio']);

            
            if($this->db->execute()){
                return true;
            }
        }
        public function editarNegocio(){
            if($this->db->execute()){
                return true;
            }
        }

        public function eliminarNegocio($id){
            $this->db->query("UPDATE `oferta` SET `activo_oferta`=0 WHERE `id_oferta`=$id;");
            if($this->db->execute()){
                return true;
            }
        }

        public function activarnegocio($id){

            try{
                $this->db->query( "UPDATE `oferta` SET `activo_oferta`='1' WHERE `id_oferta`=:id;");

                $this->db->bind(':id', $id);
            
                $this->db->execute();
                $_SESSION['correcto_message'] = 'La oferta se a activado correctamente';
                return true;

            } catch (PDOException $e) {
                $_SESSION['error_message'] = 'No se a podido activar la oferta';
                return false;
            }
        }

        public function verNegocioCompleta($id_negocio){
            $this->db->query("SELECT * FROM `negocio` WHERE `id_negocio` = :id");
            $this->db->bind(':id', $id_negocio);
            return $this->db->registro();
        }

        public function verLocal($id_local){
            $this->db->query("SELECT * FROM `local` INNER join inmueble on inmueble.id_inmueble=local.id_inmueble WHERE `id_local` = :id;");
            $this->db->bind(':id', $id_local);
            return $this->db->registro();
        }
    }