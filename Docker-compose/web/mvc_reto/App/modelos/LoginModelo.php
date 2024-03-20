<?php

    class LoginModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function comprobacion($u, $c){
            $this->db->query("SELECT * FROM `usuario` WHERE `correo_usuario`=:u;");
            $this->db->bind(':u', $u);
        
            if ($this->db->rowCount() > 0) {
                $fila = $this->db->registro();
                $hashed_password = $fila->contrasena_usuario;
        
                // Verificar contraseña
                if (password_verify($c, $hashed_password)) {
                    if ($fila->activo_usuario == 1) {
                        $_SESSION['correcto_message'] = "Se ha logueado correctamente";
                        return $fila;
                    } else {
                        $_SESSION['error_message'] = "Tu cuenta está desactivada. Contacta al administrador.";
                        redirecionar("/loginControlador/sesion");
                    }
                } else {
                    $_SESSION['error_message'] = "Usuario o contraseña incorrectos";
                    redirecionar("/loginControlador/sesion");
                }
            } else {
                $_SESSION['error_message'] = "Usuario o contraseña incorrectos";
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
            $fecha = $usuario['fecha_nac'];
            $telefono = $usuario['telefono'];
            $contrasena=password_hash($contrasena, PASSWORD_DEFAULT);
        
            $this->db->query("INSERT INTO `usuario`(`NIF`, `nombre_usuario`, `apellidos_usuario`, `correo_usuario`, `contrasena_usuario`, `fecha_nacimiento_usuario`, `telefono_usuario`, `notificar_avisos`, `notificar_mensajes`, `notificar_notificaciones`, `activo_usuario` ) 
                            VALUES (:nif, :nom, :ape, :corre, :con, :fech, :tel, 1, 1, 1, 1)");
        
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
                $_SESSION['correcto_message'] = 'Se ha registrado correctamente';

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


        public function recuperaContrasena($contrasena, $email)
        {
        $this->db->query("UPDATE `usuario` SET contrasena_usuario = :contrasena WHERE correo_usuario = :email");
        $this->db->bind(':contrasena', $contrasena);
        $this->db->bind(':email', $email);
        $this->db->execute();
        }
    }