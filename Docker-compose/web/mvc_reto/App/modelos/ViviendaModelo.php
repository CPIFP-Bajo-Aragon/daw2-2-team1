<?php
class ViviendaModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function anadirVivienda($vivienda, $id_inmueble){
           
            $this->db->query( "INSERT INTO `vivienda`(`habitaciones_vivienda`, `tipo_vivienda`, `id_inmueble`) VALUES ( :habitaciones, :tipo, :id_inmueble)");

            $this->db->bind(':habitaciones', $vivienda["habitaciones"]);
            $this->db->bind(':tipo', $vivienda["tipoVivienda"]);
            $this->db->bind(':id_inmueble', $id_inmueble);

            $this->db->execute();
        }

    }