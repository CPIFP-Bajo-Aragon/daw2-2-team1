<?php

    class NotificacionesModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function añadirNotificacion($contenido, $id_usuario, $titulo){
            $this->db->query( "INSERT INTO `notificacion`( `contenido_notificacion`, `id_usuario`, `leida_notificacion`, `Titulo_notificacion`)    
                                VALUES (:contenido , :id_usuario, 0, :titulo )
            "
            );
            print_r($contenido, $id_usuario);
            $this->db->bind(':contenido', $contenido);
            $this->db->bind(':id_usuario', $id_usuario);
            $this->db->bind(':titulo', $titulo);
            $this->db->execute();
        }
    }