<?php

    class InmuebleModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function listarinmueble($id){
            $this->db->query( "SELECT * FROM `inmueble`WHERE `id_oferta` = :id");
            $this->db->bind(':id', $id);
            return $this->db->registros();
        }
        public function crearComentarioInmueble($nuevoComentario){
            $this->db->query( "INSERT INTO `valorar_inmueble`(`id_inmueble`, `fecha_valoracion_inm`, `puntuacion_inm`, `descripcion_inm`, `id_usuario`) 
                                        VALUES (:cod, :fech, :pun, :com,  :nif)");

            $this->db->bind(':pun', $nuevoComentario['puntuacion']);
            $this->db->bind(':com', $nuevoComentario['comentario']);
            $this->db->bind(':fech', $nuevoComentario['fecha']);
            $this->db->bind(':nif', $nuevoComentario['nif']);
            $this->db->bind(':cod', $nuevoComentario['codigo_inmueble']);

            $this->db->execute();
        }


        public function añadirInmueble($inmueble){
            $this->db->query("INSERT INTO `inmueble`(`metros_cuadrados_inmueble`, `descripcion_inmueble`, `distribucion_inmueble`, `precio_inmueble`, `direccion_inmueble`, `caracteristicas_inmueble`, 
            `equipamiento_inmueble`, `id_municipio`, `id_estado`) 
            VALUES (:mCuadrados, :descripcion, :distribucion, :precio, :direccion, :caracteristicas, :equipamiento, :municipio, :estado)");

            $this->db->bind(':mCuadrados', $inmueble['metrosCuadrados']);
            $this->db->bind(':descripcion', $inmueble['descripcion']);
            $this->db->bind(':distribucion', $inmueble['distribucion']);
            $this->db->bind(':precio', $inmueble['precio']);
            $this->db->bind(':direccion', $inmueble['ubicacion']);
            $this->db->bind(':caracteristicas', $inmueble['caracteristicas']);
            $this->db->bind(':equipamiento', $inmueble['equipamiento']);
            $this->db->bind(':municipio', $inmueble['municipio']);
            $this->db->bind(':estado', $inmueble['estado']);

            $this->db->execute();
        }


        public function añadirinmuebleconnegio(){
            echo "añadir inmueble con negocio";
        }



        public function obtenerDetallesInmueble($id) {
            $this->db->query("SELECT * FROM `inmueble` i 
                                JOIN `oferta_inmueble` oi ON oi.d_inmueble = i.id_inmueble
                                JOIN `oferta` o ON oi.id_oferta = o.id_oferta
                                 WHERE oi.`id_oferta` = :id_oferta;");
            $this->db->bind(':id_oferta', $id);
            return $this->db->registro();
        }
    }