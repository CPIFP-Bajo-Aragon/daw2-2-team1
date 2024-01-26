<?php

    class NegocioModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function listarnegociospropio($nif){
            $this->db->query("SELECT * FROM `OFERTA` INNER join NEGOCIO on OFERTA.id_oferta= NEGOCIO.id_oferta WHERE OFERTA.NIF=:nif;
            ");
            $this->db->bind(':nif', $nif);
            return $this->db->registros();
        }

        public function listarnegocios($nif){
            $this->db->query("SELECT * FROM `OFERTA` INNER join NEGOCIO on OFERTA.id_oferta= NEGOCIO.id_oferta WHERE OFERTA.NIF<>:nif;");
            $this->db->bind(':nif', $nif);
            return $this->db->registros();
        }
    }