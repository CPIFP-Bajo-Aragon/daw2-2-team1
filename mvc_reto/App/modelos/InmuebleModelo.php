<?php

    class InmuebleModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function listarinmueble($id){
            $this->db->query( "SELECT * FROM `inmueble` 
                                    INNER join oferta_inmueble 
                                                on oferta_inmueble.d_inmueble=inmueble.id_inmueble 
                                WHERE oferta_inmueble.id_oferta =  :id");
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


        public function insertarInmueble($inmueble){
            echo "añadir inmueble sin negocio";

            // $this->db->query("INSERT INTO `INMUEBLE`(`id_oferta`, `codigo_inmueble`, `metros_cuadrados`, `distribucion`, `fotos`, `direccion`, `precio`, `ubicacion`, `tipo_alquiler`, `planta`, `equipamiento`, `estado`, `id_municipio`) 
            //                             VALUES (:idOferta, :codInmueble, :mCuadrados, :distribucion, :fotos, :direccion, :precio, :ubicacion, :tipoAlquiler, :planta, :equipamiento, :estado, :idMunicipio)");

            $this->db->query("INSERT INTO `INMUEBLE`(`metros_cuadrados`, `direccion`, `precio`, `ubicacion`, `planta`, `equipamiento`, `estado`) 
                                        VALUES (:idOferta, :mCuadrados, :direccion, :precio, :puerta, :equipamiento, :estado)");

            $this->db->bind(':idOferta', $inmueble['oferta']);
            //$this->db->bind(':codInmueble', $inmueble['comentario']);
            $this->db->bind(':mCuadrados', $inmueble['metrosCuadrados']);
            //$this->db->bind(':distribucion', $inmueble['distribucion']);
            //$this->db->bind(':fotos', $inmueble['fotos']);
            $this->db->bind(':direccion', $inmueble['ubicacion']);
            $this->db->bind(':precio', $inmueble['precio']);
            //$this->db->bind(':tipoAlquiler', $inmueble['tipoAlquiler']);
            $this->db->bind(':puerta', $inmueble['puerta']);
            $this->db->bind(':equipamiento', $inmueble['equipamiento']);
            $this->db->bind(':estado', $inmueble['estado']);
            //$this->db->bind(':idMunicipio', $inmueble['idMunicipio']);

            $this->db->execute();
            echo "Inserción exitosa";
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