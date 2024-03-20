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
            $this->db->query( "INSERT INTO `valorar_inmueble`(`id_inmueble`, `puntuacion_inm`, `comentario_inm`, `id_usuario`) 
                                        VALUES (:cod, :pun, :com,  :id_usuario)");

            $this->db->bind(':pun', $nuevoComentario['puntuacion']);
            $this->db->bind(':com', $nuevoComentario['comentario']);
            $this->db->bind(':id_usuario', $nuevoComentario['id_usuario']);
            $this->db->bind(':cod', $nuevoComentario['id_inmueble']);

            
            if($this->db->execute()){
                return true;
            }
        }


        public function añadirInmueble($inmueble){
            $this->db->query("INSERT INTO `inmueble`(`metros_cuadrados_inmueble`, `descripcion_inmueble`, `distribucion_inmueble`, `direccion_inmueble`, `caracteristicas_inmueble`, 
            `equipamiento_inmueble`, `id_municipio`, `id_estado`, `id_entidad`) 
            VALUES (:mCuadrados, :descripcion, :distribucion, :direccion, :caracteristicas, :equipamiento, :municipio, :estado, :entidad)");

            $this->db->bind(':mCuadrados', $inmueble['metrosCuadrados']);
            $this->db->bind(':descripcion', $inmueble['descripcion']);
            $this->db->bind(':distribucion', $inmueble['distribucion']);
            //$this->db->bind(':precio', $inmueble['precio']);
            $this->db->bind(':direccion', $inmueble['ubicacion']);
            $this->db->bind(':caracteristicas', $inmueble['caracteristicas']);
            $this->db->bind(':equipamiento', $inmueble['equipamiento']);
            $this->db->bind(':municipio', $inmueble['municipio']);
            $this->db->bind(':estado', $inmueble['estado']);
            $this->db->bind(':entidad', $inmueble['entidad']);

            $this->db->execute();

            return $this->db->lastInsertId();

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

        public function editarInmueble($inmueble){
            try{
                $this->db->query("UPDATE `inmueble`
                                        SET
                                            `metros_cuadrados_inmueble` = :mCuadrados,
                                            -- `descripcion_inmueble` = :descripcion,
                                            `distribucion_inmueble` = :distribucion,
                                            `precio_inmueble` = :precio,
                                            `direccion_inmueble` = :direccion,
                                            `caracteristicas_inmueble` = :caracteristicas,
                                            `equipamiento_inmueble` = :equipamiento
                                            -- `id_estado` = :estado
                                        WHERE
                                            `id_inmueble` = :id;
                                        ");

                $this->db->bind(':id', $inmueble['id_inmueble']);
                $this->db->bind(':mCuadrados', $inmueble['metros_cuadrados_inmueble']);
                // $this->db->bind(':descripcion', $inmueble['distribucion_inmueble']);
                $this->db->bind(':distribucion', $inmueble['distribucion_inmueble']);
                $this->db->bind(':precio', $inmueble['precio_inmueble']);
                $this->db->bind(':direccion', $inmueble['direccion_inmueble']);
                $this->db->bind(':caracteristicas', $inmueble['caracteristicas_inmueble']);
                $this->db->bind(':equipamiento', $inmueble['equipamiento_inmueble']);
                // $this->db->bind(':estado', $inmueble['estado']);

                $this->db->execute();
                $_SESSION['correcto_message'] = 'El inmueble se a editado correctamente';
                return true;
            }catch (PDOException $e) {
                // Captura la excepción de PDO y muestra un mensaje de error específico
                $_SESSION['error_message'] = 'Error al editar el inmueble vuelve a intentarlo ';
              
            }
        }
    }