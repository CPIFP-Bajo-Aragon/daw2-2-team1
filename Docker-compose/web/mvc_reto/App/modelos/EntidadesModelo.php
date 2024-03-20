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

        public function listarEntidadnoincrito($id_usuario){
            $this->db->query("SELECT DISTINCT entidad.* 
                                    FROM `entidad` 
                                    INNER JOIN `usuario_entidad` 
                                        ON `entidad`.`id_entidad` = `usuario_entidad`.`id_entidad` 
                                WHERE `usuario_entidad`.`id_usuario` != :id_usuario");
            $this->db->bind(':id_usuario', $id_usuario);
            return  $this->db->registros();
        }
        public function insertarsolicitud($id_usuario, $id_entidad){
            $this->db->query("INSERT INTO `usuario_entidad` (`id_usuario`, `id_entidad`, `rol`) VALUES ('$id_usuario', '$id_entidad', '');");
            
            if($this->db->execute()){
                return true;
            }
        }
        public function listarentidad($id_entidad){
            $this->db->query("SELECT * FROM `entidad`
                                    WHERE id_entidad=:id_entidad");
            $this->db->bind(':id_entidad', $id_entidad);
            return  $this->db->registro();
        }

        public function editarentidad($insertar){
            try{
                $this->db->query("UPDATE `entidad`
                                        SET
                                            `nombre_entidad`=:nombre_entidad,
                                            `cif_entidad`=:cif_entidad,
                                            `sector_entidad`=:sector_entidad,
                                            `direccion_entidad`=:direccion_entidad,
                                            `numero_telefono_entidad`=:numero_telefono_entidad,
                                            `correo_entidad`=:correo_entidad,
                                            `pagina_web_entidad`=:pagina_web_entidad
                                        WHERE
                                            `id_entidad`=:id_entidad
                                            ");
                $this->db->bind(':id_entidad', $insertar['id_entidad']);
                $this->db->bind(':nombre_entidad', $insertar['nombre_entidad']);
                $this->db->bind(':cif_entidad', $insertar['cif_entidad']);
                $this->db->bind(':sector_entidad', $insertar['sector_entidad']);
                $this->db->bind(':direccion_entidad', $insertar['direccion_entidad']);
                $this->db->bind(':numero_telefono_entidad', $insertar['numero_telefono_entidad']);
                $this->db->bind(':correo_entidad', $insertar['correo_entidad']);
                $this->db->bind(':pagina_web_entidad', $insertar['pagina_web_entidad']);
                if($this->db->execute()){
                    return true;
                }
                $_SESSION['correcto_message'] = 'La oferta se a editado correctamente';

            } catch (PDOException $e) {
                // Captura la excepción de PDO y muestra un mensaje de error específico
                $error_message = $e->getMessage();

                // Utiliza una expresión regular para extraer la parte específica que necesitas
                preg_match("/Integrity constraint violation: (.+?) in/", $error_message, $matches);
                preg_match("/Duplicate entry '(.+?)' for key '(.+?)'/", $error_message, $matches);

                // Verifica si se encontró una coincidencia antes de almacenarla en la sesión
                $error = isset($matches[1]) ? 'Error al crear la entidad: Duplicate entry \'' . $matches[1] . '\' for key \'' . $matches[2] . '\'' : 'Error al crear la entidad: ' . $error_message;

                // Verifica si se encontró una coincidencia antes de almacenarla en la sesión
                $error = isset($matches[1]) ? 'Error al crear la entidad: ' . $matches[1] : 'Error al crear la entidad: ' . $error_message;
                $_SESSION['error_message'] = $error;


            }
        }

        public function abandonarentidad($id_entidad, $id_usuario){
            $this->db->query("DELETE FROM `usuario_entidad` 
                                    WHERE `id_usuario`=:id_usuario 
                                        and `id_entidad`=:id_entidad ");
            
            $this->db->bind(':id_usuario', $id_usuario);
            $this->db->bind(':id_entidad', $id_entidad);
             
             if($this->db->execute()){
                return true;
             }
        }

        public function crear($datos){
            try{               
                $this->db->query("INSERT INTO `entidad`(`nombre_entidad`, `cif_entidad`, `sector_entidad`, `direccion_entidad`, `numero_telefono_entidad`, `correo_entidad`, `pagina_web_entidad`) 
                VALUES (:nom, :cif, :sec, :dir, :num, :corr, :pag)");

                // Enlazar los parámetros
                $this->db->bind(':nom', $datos['nombre_entidad']);
                $this->db->bind(':cif', $datos['cif']);
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
                $this->db->query("INSERT INTO `usuario_entidad` (`id_usuario`, `id_entidad`, `rol`) VALUES (:nif, :entidad, :rol)");

                // Enlazar los parámetros para la segunda consulta
                $this->db->bind(':nif', $datos['id_usuario']);
                $this->db->bind(':entidad', $id_entidad);
                $this->db->bind(':rol', 'Administrador');

                // Ejecutar la segunda consulta de inserción
                

                $_SESSION['correcto_message'] = 'La entidad se a creado correctamente';

                if($this->db->execute()){
                    return true;
                }

            } catch (PDOException $e) {
                // Captura la excepción de PDO y muestra un mensaje de error específico
                $error_message = $e->getMessage();

                // Utiliza una expresión regular para extraer la parte específica que necesitas
                preg_match("/Integrity constraint violation: (.+?) in/", $error_message, $matches);
                preg_match("/Duplicate entry '(.+?)' for key '(.+?)'/", $error_message, $matches);

                // Verifica si se encontró una coincidencia antes de almacenarla en la sesión
                $error = isset($matches[1]) ? 'Error al crear la entidad: Duplicate entry \'' . $matches[1] . '\' for key \'' . $matches[2] . '\'' : 'Error al crear la entidad: ' . $error_message;

                // Verifica si se encontró una coincidencia antes de almacenarla en la sesión
                $error = isset($matches[1]) ? 'Error al crear la entidad: ' . $matches[1] : 'Error al crear la entidad: ' . $error_message;
                $_SESSION['error_message'] = $error;
            }
        }

        
    }