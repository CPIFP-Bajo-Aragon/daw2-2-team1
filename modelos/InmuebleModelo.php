<?php

    class InmuebleModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function listarinmueble($id){
            $this->db->query( "SELECT * FROM `INMUEBLE`WHERE `id_oferta` = :id");
            $this->db->bind(':id', $id);
            return $this->db->registros();
        }
        public function crearComentarioInmueble($nuevoComentario){
            $this->db->query( "INSERT INTO `VAL_INMUEBLE`(`puntuacion`, `comentario`, `fecha_valoracion`, `NIF`, `codigo_inmueble`) 
                                        VALUES (:pun, :com, :fech, :nif, :cod)");

            $this->db->bind(':pun', $nuevoComentario['puntuacion']);
            $this->db->bind(':com', $nuevoComentario['comentario']);
            $this->db->bind(':fech', $nuevoComentario['fecha']);
            $this->db->bind(':nif', $nuevoComentario['nif']);
            $this->db->bind(':cod', $nuevoComentario['codigo_inmueble']);

            $this->db->execute();
        }


        public function añadirinmueble(){
            echo "añadir inmueble sin negocio";

            $this->db->query("INSERT INTO `INMUEBLE`(`id_oferta`, `codigo_inmueble`, `metros_cuadrados`, `distribucion`, `fotos`, `direccion`, `precio`, `ubicacion`, `tipo_alquiler`, `planta`, `equipamiento`, `estado`, `id_municipio`) 
                                        VALUES (:idOferta, :codInmueble, :mCuadrados, :distribucion, :fotos, :direccion, :precio, :ubicacion, :tipoAlquiler, :planta, :equipamiento, :estado, :idMunicipio)");

            $this->db->bind(':idOferta', $nuevoComentario['puntuacion']);
            $this->db->bind(':codInmueble', $nuevoComentario['comentario']);
            $this->db->bind(':mCuadrados', $nuevoComentario['fecha']);
            $this->db->bind(':distribucion', $nuevoComentario['nif']);
            $this->db->bind(':fotos', $nuevoComentario['codigo_inmueble']);
            $this->db->bind(':direccion', $nuevoComentario['puntuacion']);
            $this->db->bind(':precio', $nuevoComentario['comentario']);
            $this->db->bind(':ubicacion', $nuevoComentario['fecha']);
            $this->db->bind(':tipoAlquiler', $nuevoComentario['nif']);
            $this->db->bind(':planta', $nuevoComentario['codigo_inmueble']);
            $this->db->bind(':equipamiento', $nuevoComentario['puntuacion']);
            $this->db->bind(':estado', $nuevoComentario['comentario']);
            $this->db->bind(':idMunicipio', $nuevoComentario['fecha']);

            $this->db->execute();
        }


        public function añadirinmuebleconnegio(){
            echo "añadir inmueble con negocio";
        }



        public function obtenerDetallesInmueble($id) {
            $this->db->query("SELECT * FROM `INMUEBLE` i JOIN `OFERTA` o ON i.id_oferta = o.id_oferta WHERE i.`id_oferta` = :id_oferta;");
            $this->db->bind(':id_oferta', $id);
            return $this->db->registro();
        }
    }