<?php

    class NegocioModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function listarnegociospropio($nif){
            $this->db->query("SELECT
                                    *
                                FROM
                                    USUARIO U
                                JOIN
                                    PERTENECER P ON U.NIF = P.NIF
                                JOIN
                                    OFERTA O ON P.NIF = O.NIF AND P.id_entidad = O.id_entidad
                                JOIN
                                    INMUEBLE I ON O.id_oferta = I.id_oferta
                                JOIN
                                    LOCAL L ON I.codigo_inmueble = L.codigo_inmueble
                                JOIN
                                    NEGOCIO N ON L.codigo_inmueble = N.codigo_inmueble
                                WHERE
                                    U.NIF = :nif;
                                ;
                            ");
            $this->db->bind(':nif', $nif);
            return $this->db->registros();
        }

        public function listarnegocios($nif){
            $this->db->query("SELECT
                                   *
                                FROM
                                    USUARIO U
                                JOIN
                                    PERTENECER P ON U.NIF = P.NIF
                                JOIN
                                    OFERTA O ON P.NIF = O.NIF AND P.id_entidad = O.id_entidad
                                JOIN
                                    INMUEBLE I ON O.id_oferta = I.id_oferta
                                JOIN
                                    LOCAL L ON I.codigo_inmueble = L.codigo_inmueble
                                JOIN
                                    NEGOCIO N ON L.codigo_inmueble = N.codigo_inmueble
                                WHERE
                                    U.NIF <> :nif;
                                ;");
            $this->db->bind(':nif', $nif);
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
            $this->db->query( "INSERT INTO `VAL_NEGOCIO`(`puntuacion`, `comentario`, `fecha_valoracion`, `NIF`, `codigo_negocio`) 
                                        VALUES (:pun, :com, :fech, :nif, :cod)");

            $this->db->bind(':pun', $nuevoComentario['puntuacion']);
            $this->db->bind(':com', $nuevoComentario['comentario']);
            $this->db->bind(':fech', $nuevoComentario['fecha']);
            $this->db->bind(':nif', $nuevoComentario['nif']);
            $this->db->bind(':cod', $nuevoComentario['codigo_negocio']);

            $this->db->execute();
        }
    }