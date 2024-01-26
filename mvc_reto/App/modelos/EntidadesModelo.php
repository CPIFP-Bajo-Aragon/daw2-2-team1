<?php

    class EntidadesModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function listar($nif){
            $this->db->query("SELECT * FROM `ENTIDAD`
                                    INNER JOIN `PERTENECER`
                                         ON `ENTIDAD`.`id_entidad` = `PERTENECER`.`id_entidad` 
                                    WHERE PERTENECER.NIF=:nif");
            $this->db->bind(':nif', $nif);
            return  $this->db->registros();
        }

        public function crear($datos){
            $this->db->query("INSERT INTO `ENTIDAD`(`id_entidad` ,`nombre_entidad`, `sector`, `dirección`, `número_telefónico`, `correo`, `página_web`) 
                                            VALUES (3, :nom, :sec, :dir, :num, :corr, :pag)");
             // Enlazar los parámetros
                $this->db->bind(':nom', $datos['nombre_entidad']);
                $this->db->bind(':sec', $datos['sector']);
                $this->db->bind(':dir', $datos['direccion']);
                $this->db->bind(':num', $datos['numero_telefonico']);
                $this->db->bind(':corr', $datos['correo']);
                $this->db->bind(':pag', $datos['pagina_web']);
                                            
            //$this->db->bind(':nif', $nif);
             $this->db->execute();
        }

    }