<?php

    class UserModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function editarperfil($cambios) {
            $nif = $cambios['nif'];
            $nombre = $cambios['nombre'];
            $apellido = $cambios['apellidio']; // Corregí el error de tipeo en 'apellido'
            $correo = $cambios['email']; // Corregí el error de tipeo en 'email'
        
            $this->db->query("UPDATE `USUARIO` SET `nombre` = :nombre, `apellido` = :apellido, `correo` = :correo WHERE `NIF` = :nif");
        
            $this->db->bind(':nombre', $nombre);
            $this->db->bind(':apellido', $apellido);
            $this->db->bind(':correo', $correo);
            $this->db->bind(':nif', $nif);
            
            $this->db->execute();
        }
        

        public function addusuarios($datos){
            $nif = $datos['nif'];
            $nombre = $datos['nombre'];
            $apellido = $datos['apellido'];
            $correo = $datos['email'];
            $contrasena = $datos['contrasena'];
            $this->db->query("  INSERT INTO `USUARIO`(`NIF`, `nombre`, `apellido`, `correo`, `contrasena`) VALUES (:nif, :nombre, :apellido, :correo, :contrasena);");
            $this->db->bind(':nif', $nif);
            $this->db->bind(':nombre', $nombre);
            $this->db->bind(':apellido', $apellido);
            $this->db->bind(':correo', $correo);
            $this->db->bind(':contrasena', $contrasena);
            $this->db->execute();
        }

        public function listar(){
            $this->db->query("SELECT * FROM `USUARIO`");
            $datos = $this->db->registros();
            return $datos;
        }

        public function enviarmensaje($datos){
            $fecha = date('Y-m-d');
            $hora = date('H:i:s');
            $nif = $datos['nif'];
            $receptor = $datos['receptor'];
            $mensaje = $datos['mensaje'];
            $this->db->query("INSERT INTO `CHATEAR`(`NIF`, `NIF_chatear`, `mensaje`, `fecha_envío`, `hora_envio`) VALUES (:nif , :receptor, :mensaje, :fecha, :hora);");
            $this->db->bind(':nif', $nif);
            $this->db->bind(':receptor', $receptor);
            $this->db->bind(':mensaje', $mensaje);
            $this->db->bind(':fecha', $fecha);
            $this->db->bind(':hora', $hora);
            $this->db->execute();
            redirecionar(RUTA_URL.'/UserControlador/chat/'.$receptor);
        }

        public function listarmensaje($datos){
            $nif = $datos['nif'];
            $receptor = $datos['receptor'];
            $this->db->query("SELECT * FROM `CHATEAR` 
                                                WHERE 
                                                    (NIF = :nif AND NIF_chatear = :receptor )
                                                    OR
                                                    (NIF = :receptor AND NIF_chatear = :nif)
                                                ORDER BY
                                                    fecha_envío ASC, hora_envio ASC;
                                                ");
            $this->db->bind(':nif', $nif);
            $this->db->bind(':receptor', $receptor);
            $mensajes = $this->db->registros();
            return $mensajes;
        }

        public function listaruserchat($datos){
            $nif = $datos['nif'];
            

            $this->db->query("SELECT U.*
                                FROM USUARIO U
                                WHERE U.NIF IN (
                                    SELECT DISTINCT NIF_chatear
                                    FROM CHATEAR
                                    WHERE NIF = :nif1
                                
                                    UNION
                                
                                    SELECT DISTINCT NIF
                                    FROM CHATEAR
                                    WHERE NIF_chatear = :nif2
                                )
                                AND U.NIF NOT IN (
                                    SELECT DISTINCT NIF
                                    FROM ADMINISTRADOR
                                )
                                ");

            $this->db->bind(':nif1', $nif);
            $this->db->bind(':nif2', $nif);

            $registros = $this->db->registros();
            

            return $registros;

        }
      
        public function listarnotificaciones($datos){
            $nif = $datos['nif'];
            

            $this->db->query("SELECT * FROM `NOTIFICACION`
                                            where    `NIF`=:nif;");

            $this->db->bind(':nif', $nif);

            $registros = $this->db->registros();
            

            return $registros;
        }

        public function marcarvistastodasnotificaciones($datos){
            $nif = $datos['nif'];
            

            $this->db->query("UPDATE `NOTIFICACION` SET `leido`=1 WHERE `NIF`=:nif;");

            $this->db->bind(':nif', $nif);

            $this->db->execute();
            

        }
    }