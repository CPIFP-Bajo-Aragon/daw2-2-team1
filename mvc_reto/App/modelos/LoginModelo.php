<?php

    class LoginModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function comprobacion($u, $c){
            
            $this->db->query("SELECT * FROM `usuario` WHERE `correo_usuario`=:u AND `contrasena_usuario`= :c;");
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
            
            $this->db->query("SELECT * FROM `usuario_has_rol` WHERE `id_usuario`=:u and `id_rol`=1");
            $this->db->bind(':u', $usuario);
            return $this->db->rowCount();
        }
        
        public function crearUserModelo($usuario) {
            $nif = $usuario['nif'] . "";
            $nombre = $usuario['nombre'];
            $apellido = $usuario['apellido'];
            $correo = $usuario['correo'];
            $contrasena = $usuario['contrasena'];
            $municipio = $usuario['municipio'];
        
            $this->db->query("INSERT INTO `usuario`(`NIF`, `nombre`, `apellido`, `correo`, `contrasena`, `id_municipio`) 
                            VALUES (:nif, :nom, :ape, :corre, :con, :mun)");
        
            $this->db->bind(':nif', $nif);
            $this->db->bind(':nom', $nombre);
            $this->db->bind(':ape', $apellido);
            $this->db->bind(':corre', $correo);
            $this->db->bind(':con', $contrasena);
            $this->db->bind(':mun', $municipio);
        
            $this->db->execute();
        }
    }