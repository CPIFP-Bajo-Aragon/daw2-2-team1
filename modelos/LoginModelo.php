<?php

    class LoginModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function comprobacion($u, $c){
            
            $this->db->query("SELECT * FROM `USUARIO` WHERE `correo`=:u AND `contrasena`= :c;");
            $this->db->bind(':u', $u);
            $this->db->bind(':c', $c);
            if( $this->db->rowCount()>0){
                
                return $this->db->registro();

            }else{
                redirecionar("/");
            }
            exit;

        }
        
        public function admins($usuario){
            
            $this->db->query("SELECT * FROM `ADMINISTRADOR` WHERE `NIF`=:u");
            $this->db->bind(':u', $usuario);
            return $this->db->rowCount();
        }
        
        public function crearUserModelo($usuario) {
            $nif = $usuario['nif'] . "";
            $nombre = $usuario['nombre'];
            $apellido = $usuario['apellido'];
            $correo = $usuario['correo'];
            $contrasena = $usuario['contrasena'];
        
            $this->db->query("INSERT INTO `USUARIO`(`NIF`, `nombre`, `apellido`, `correo`, `contrasena`) 
                            VALUES (:nif, :nom, :ape, :corre, :con)");
        
            $this->db->bind(':nif', $nif);
            $this->db->bind(':nom', $nombre);
            $this->db->bind(':ape', $apellido);
            $this->db->bind(':corre', $correo);
            $this->db->bind(':con', $contrasena);
        
            $this->db->execute();
        }
    }