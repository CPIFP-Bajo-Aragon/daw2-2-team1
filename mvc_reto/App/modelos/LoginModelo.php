<?php

    class LoginModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function comprobacion($u, $c){
            
            $this->db->query("SELECT * FROM `usuario` WHERE `correo_usuario`=:u;");
            $this->db->bind(':u', $u);
            if( $this->db->rowCount()>0){

                $fila = $this->db->registro();
                $hashed_password = $fila->contrasena_usuario;

                if(password_verify($c, $hashed_password)){
                    return $this->db->registro();
                }
                else{
                    redirecionar("/loginControlador/sesion");
                }
            }else{
                redirecionar("/loginControlador/sesion");
            }
            exit;

        }
        
        public function admins($usuario){
            
            $this->db->query("SELECT * FROM `usuario_has_rol` WHERE `id_usuario`=:u and `id_rol`=1");
            $this->db->bind(':u', $usuario);
            return $this->db->rowCount();
        }
        
        public function crearUserModelo($usuario) {
            try {
            $nif = $usuario['nif'] . "";
            $nombre = $usuario['nombre'];
            $apellido = $usuario['apellido'];
            $correo = $usuario['correo'];
            $contrasena = $usuario['contrasena'];
            $municipio = $usuario['municipio'];
            $fecha = $usuario['fecha_nac'];
            $telefono = $usuario['telefono'];
            $contrasena=password_hash($contrasena, PASSWORD_DEFAULT);
        
            $this->db->query("INSERT INTO `usuario`(`NIF`, `nombre_usuario`, `apellidos_usuario`, `correo_usuario`, `contrasena_usuario`, `fecha_nacimiento_usuario`, `telefono_usuario` ) 
                            VALUES (:nif, :nom, :ape, :corre, :con, :fech, :tel)");
        
            $this->db->bind(':nif', $nif);
            $this->db->bind(':nom', $nombre);
            $this->db->bind(':ape', $apellido);
            $this->db->bind(':corre', $correo);
            $this->db->bind(':con', $contrasena);
            $this->db->bind(':fech', $fecha);
            $this->db->bind(':tel', $telefono);
        
            if ($this->db->execute()) {
                // Devuelve el último ID insertado
                $lastInsertId = $this->db->lastInsertId();
                return $lastInsertId; // O puedes devolverlo como necesites
            } else {
                // Si hay un fallo, muestra un mensaje de error
                $_SESSION['error_message'] = 'Error al insertar el usuario';
            }
        } catch (PDOException $e) {
            // Captura la excepción de PDO y muestra un mensaje de error específico
            $_SESSION['error_message'] = 'Error de base de datos: ';
        }
        }
    }