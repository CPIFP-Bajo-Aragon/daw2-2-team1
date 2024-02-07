<?php

    class NegocioModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function listarnegociospropio($id_usuario){
            $this->db->query("SELECT *
                                    FROM
                                        usuario U
                                    JOIN
                                        usuario_entidad P ON U.id_usuario = P.id_usuario
                                    JOIN
                                        oferta O ON P.id_entidad = O.id_entidad
                                    JOIN
                                        negocio N ON O.id_negocio = N.id_negocio
                                        where     U.id_usuario = :id_usuario;
                            ;");
            $this->db->bind(':id_usuario', $id_usuario);
            return $this->db->registros();
        }

        public function listarnegocios($id_usuario){
            $this->db->query("SELECT *
                                    FROM
                                        usuario U
                                    JOIN
                                        usuario_entidad P ON U.id_usuario = P.id_usuario
                                    JOIN
                                        oferta O ON P.id_entidad = O.id_entidad
                                    JOIN
                                        negocio N ON O.id_negocio = N.id_negocio
                                        where     U.id_usuario != :id_usuario;
                                    ;");
            $this->db->bind(':id_usuario', $id_usuario);
            return $this->db->registros();
        }

        public function addnegocios($datos){
            $this->db->query("INSERT INTO `NEGOCIO`(`codigo_inmueble`, `codigo_negocio`, `titulo`, `motivo_traspaso`, `coste_traspaso`, `coste_mensual`, `ubicacion`, `descripcion`, `capital_minimo`)              VALUES (:cod_in, :cod_neg, :tit, :mot_tras, :cost_tras, :cost_mensual, :ubi, :descr, :cap_min)");

            $this->db->bind(':cod_in', $datos['codigo_inmueble']);
            $this->db->bind(':cod_neg', $datos['codigo_negocio']);
            $this->db->bind(':tit', $datos['titulo']);
            $this->db->bind(':mot_tras', $datos['motivo_traspaso']);
            $this->db->bind(':cost_tras', $datos['coste_traspaso']);
            $this->db->bind(':cost_mensual', $datos['coste_mensual']);
            $this->db->bind(':ubi', $datos['ubicacion']);
            $this->db->bind(':descr', $datos['descripcion']);
            $this->db->bind(':cap_min', $datos['capital_minimo']);
    
            // Ejecutar la consulta
            $this->db->execute();
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

            $this->db->execute();
        }
    }