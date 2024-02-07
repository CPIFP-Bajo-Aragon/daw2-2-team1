<?php

    class EntidadesModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function listar($id_usuario){
            $this->db->query("SELECT * FROM `entidad`
                                    INNER JOIN `usuario_entidad`
                                         ON `entidad`.`id_entidad` = `usuario_entidad`.`id_entidad` 
                                    WHERE usuario_entidad.id_usuario=:id_usuario");
            $this->db->bind(':id_usuario', $id_usuario);
            return  $this->db->registros();
        }

        public function crear($datos){
            $this->db->query("INSERT INTO `entidad`(`nombre_entidad`, `sector`, `dirección`, `número_telefónico`, `correo`, `página_web`) 
            VALUES (:nom, :sec, :dir, :num, :corr, :pag)");

            // Enlazar los parámetros
            $this->db->bind(':nom', $datos['nombre_entidad']);
            $this->db->bind(':sec', $datos['sector']);
            $this->db->bind(':dir', $datos['direccion']);
            $this->db->bind(':num', $datos['numero_telefonico']);
            $this->db->bind(':corr', $datos['correo']);
            $this->db->bind(':pag', $datos['pagina_web']);

            // Ejecutar la primera consulta de inserción
            $this->db->execute();

            // Obtener el ID de la entidad insertada
            $id_entidad = $this->db->lastInsertId();


            // Segunda consulta de inserción en la tabla PERTENECER
            $this->db->query("INSERT INTO `pertenecer` (`NIF`, `id_entidad`) VALUES (:nif, :entidad)");

            // Enlazar los parámetros para la segunda consulta
            $this->db->bind(':nif', $datos['nif']);
            $this->db->bind(':entidad', $id_entidad);

            // Ejecutar la segunda consulta de inserción
            $this->db->execute();

        }
    }