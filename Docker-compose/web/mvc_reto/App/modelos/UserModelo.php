<?php

    class UserModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function editarperfil($cambios) {
            $id_usuario = $cambios['id_usuario'];
            $nombre = $cambios['nombre'];
            $apellido = $cambios['apellido'];
            $correo = $cambios['email'];
            $fecha_nacimiento = $cambios['fecha_nacimiento'];
            $telefono = $cambios['telefono'];
            $nif = $cambios['nif'];
        
            $this->db->query("UPDATE `usuario` 
                                SET `nombre_usuario` = :nombre, `apellidos_usuario` = :apellido, `correo_usuario` = :correo, nif=:nif, fecha_nacimiento_usuario=:fecha_nac, telefono_usuario=:telefono 
                                WHERE `id_usuario` = :id_usuario");
        
            $this->db->bind(':nombre', $nombre);
            $this->db->bind(':apellido', $apellido);
            $this->db->bind(':correo', $correo);
            $this->db->bind(':nif', $nif);
            $this->db->bind(':fecha_nac', $fecha_nacimiento);
            $this->db->bind(':telefono', $telefono);
            $this->db->bind(':id_usuario', $id_usuario);
            
            
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        

      //  public function addusuarios($datos){
        //    $nif = $datos['nif'];
          //  $nombre = $datos['nombre'];
            //$apellido = $datos['apellido'];
            //$correo = $datos['email'];
//            $contrasena = $datos['contrasena'];
  //          $this->db->query("  INSERT INTO `USUARIO`(`NIF`, `nombre_usuario`, `apellidos_usuario`, `correo_usuario`, `contrasena_usuario`) 
    //                                    VALUES (:nif, :nombre, :apellido, :correo, :contrasena);");
      //      $this->db->bind(':nif', $nif);
        //    $this->db->bind(':nombre', $nombre);
          //  $this->db->bind(':apellido', $apellido);
            //$this->db->bind(':correo', $correo);
//            $this->db->bind(':contrasena', $contrasena);
  //          $this->db->execute();
    //    }

        public function listar(){
            $this->db->query("SELECT * FROM `USUARIO`");
            $datos = $this->db->registros();
            return $datos;
        }

        public function enviarmensaje($datos){
            $nif = $datos['id_usuario'];
            $receptor = $datos['receptor'];
            $mensaje = $datos['mensaje'];
            $this->db->query("INSERT INTO `chatear`(`id_usuario`, `id_usuario1`, `mensaje_chat`) VALUES (:nif , :receptor, :mensaje);");
            $this->db->bind(':nif', $nif);
            $this->db->bind(':receptor', $receptor);
            $this->db->bind(':mensaje', $mensaje);
            
            $this->db->execute();
        }

        public function ObtenerAdminEntidad($datos){
            $receptor = $datos['entidad_receptor'];
            $this->db->query("SELECT * FROM `usuario_entidad` WHERE `rol`='administrador' and id_entidad = :receptor; 
                                                ");
            $this->db->bind(':receptor', $receptor);
            $receptor = $this->db->registro();
            return $receptor;
        }

        public function listarmensaje($datos){
            //print_r($datos);
            $nif = $datos['id_usuario'];
            $receptor = $datos['receptor']->id_usuario;

            $this->db->query("SELECT * FROM `chatear` 
                                                WHERE 
                                                    (id_usuario = :nif AND id_usuario1 = :receptor )
                                                    OR
                                                    (id_usuario = :receptor AND id_usuario1 = :nif)
                                                ORDER BY
                                                    fecha_chat ASC;
                                                ");
            $this->db->bind(':nif', $nif);
            $this->db->bind(':receptor', $receptor);
            $mensajes = $this->db->registros();
            return $mensajes;
        }

        public function listaruserchat($datos){
            $id_usuario = $datos['id_usuario'];
            

            $this->db->query("SELECT U.*
                                FROM usuario U
                                WHERE U.id_usuario IN (
                                    SELECT DISTINCT id_usuario1
                                    FROM chatear
                                    WHERE id_usuario = :nif1
                                
                                    UNION
                                
                                    SELECT DISTINCT id_usuario
                                    FROM chatear
                                    WHERE id_usuario1 = :nif2
                                )
                                AND U.id_usuario NOT IN (
                                    SELECT DISTINCT id_usuario
                                     FROM `usuario_has_rol` WHERE `id_rol`=1
                                )
                                ");

            $this->db->bind(':nif1', $id_usuario);
            $this->db->bind(':nif2', $id_usuario);

            $registros = $this->db->registros();
            

            return $registros;

        }
      
        public function listarultimomensaje($idUsuario, $idUsuario1){
            $this->db->query("SELECT `id_usuario`, `id_usuario1`, `fecha_chat`, `mensaje_chat`, `estado_chat`
            FROM `chatear`
            WHERE (`id_usuario` = $idUsuario1 AND `id_usuario1` = $idUsuario) OR (`id_usuario` = $idUsuario AND `id_usuario1` = $idUsuario1)
            ORDER BY `fecha_chat` DESC
            LIMIT 1;");
             $registro = $this->db->registro();
            

             return $registro;
            
        }

        public function listarnotificaciones($datos){
            $id_usuario = $datos['id_usuario'];
            

            $this->db->query("SELECT * FROM `notificacion` where `id_usuario`=$id_usuario; ");

            // $this->db->bind(':id_usuario', $id_usuario);

            $registros = $this->db->registros();
            

            return $registros;
        }

        public function listaradvertencias($datos){
            $id_usuario = $datos['id_usuario'];
            

            $this->db->query("SELECT * FROM `aviso`
                                            where  `id_usuario`=:id_usuario;");

            $this->db->bind(':id_usuario', $id_usuario);

            $registros = $this->db->registros();
            

            return $registros;
        }

        public function marcarvistastodasnotificaciones($datos){
            $id_usuario = $datos['id_usuario'];
            

            $this->db->query("UPDATE `notificacion` SET `leida_notificacion`=1 WHERE `id_usuario`=:id_usuario;");

            $this->db->bind(':id_usuario', $id_usuario);

            $this->db->execute();
            

        }
    
        public function ModificarNotificacionMensajes($valor, $datos){
            $id_usuario = $datos['id_usuario'];
            

            $this->db->query("UPDATE `usuario` SET `notificar_mensajes`=$valor WHERE `id_usuario`=:id_usuario;");

            $this->db->bind(':id_usuario', $id_usuario);

            $this->db->execute();
            
        }
        public function ModificarNotificacionNotificacion($valor, $datos){
            $id_usuario = $datos['id_usuario'];
            

            $this->db->query("UPDATE `usuario` SET `notificar_notificaciones`=$valor WHERE `id_usuario`=:id_usuario;");

            $this->db->bind(':id_usuario', $id_usuario);

            $this->db->execute();
            
        }
        public function ModificarNotificacionAvisos($valor, $datos){
            $id_usuario = $datos['id_usuario'];
            

            $this->db->query("UPDATE `usuario` SET `notificar_avisos`=$valor WHERE `id_usuario`=:id_usuario;");

            $this->db->bind(':id_usuario', $id_usuario);

            $this->db->execute();
            
        }

        public function eliminarAviso($id){

            $this->db->query("DELETE FROM `aviso` WHERE `id_aviso`=:id_aviso;");

            $this->db->bind(':id_aviso', $id);

            $this->db->execute();
        }

        public function eliminarNotificacion($id){

            $this->db->query("DELETE FROM `notificacion` WHERE `id_notificacion`=:id_notificacion;");

            $this->db->bind(':id_notificacion', $id);

            $this->db->execute();
        }

        public function leidoNotificacio($id){

            $this->db->query("UPDATE `notificacion` SET `leida_notificacion`='1' WHERE `id_notificacion`=:id_notificacion;");

            $this->db->bind(':id_notificacion', $id);

            $this->db->execute();
        }
    }