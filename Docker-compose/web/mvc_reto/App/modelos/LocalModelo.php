<?php
class LocalModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function anadirLocal($local, $id_local){
           
            $this->db->query( "INSERT INTO `local`(`capacidad_local`, `recursos_local`, `id_inmueble`) VALUES ( :capacidad, :recursos, :id_inmueble)");

            $this->db->bind(':capacidad', $local["capacidad_local"]);
            $this->db->bind(':recursos', $local["recursos_local"]);
            $this->db->bind(':id_inmueble', $id_local);

            $this->db->execute();
            return $this->db->lastInsertId();


        }

    }