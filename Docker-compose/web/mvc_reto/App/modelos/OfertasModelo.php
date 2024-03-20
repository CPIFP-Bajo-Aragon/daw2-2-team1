<?php

    class OfertasModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function listarTodasofertas(){
            $this->db->query( "SELECT *
                                FROM `oferta`
                                INNER JOIN oferta_inmueble on oferta_inmueble.id_oferta=oferta.id_oferta
                                INNER JOIN inmueble on oferta_inmueble.d_inmueble = inmueble.id_inmueble
                                INNER JOIN municipio on municipio.id_municipio=inmueble.id_municipio
                                INNER JOIN entidad on entidad.id_entidad=oferta.id_entidad;"
                                );
            return $this->db->registros();
        }

        public function listarpropiasofertas($id_usuario, $pagina = 1, $por_pagina = 5){
            $inicio = ($pagina - 1) * $por_pagina;
            $this->db->query("SELECT *
                              FROM `oferta`
                              INNER JOIN oferta_inmueble ON oferta_inmueble.id_oferta = oferta.id_oferta
                              INNER JOIN inmueble ON oferta_inmueble.d_inmueble = inmueble.id_inmueble
                              INNER JOIN municipio ON municipio.id_municipio = inmueble.id_municipio
                              INNER JOIN entidad ON entidad.id_entidad = oferta.id_entidad
                              WHERE oferta.id_entidad IN (
                                  SELECT entidad.id_entidad
                                  FROM entidad
                                  INNER JOIN usuario_entidad ON entidad.id_entidad = usuario_entidad.id_entidad
                                  WHERE usuario_entidad.id_usuario = :id_usuario)
                                  AND id_negocio IS NULL
                              LIMIT :inicio, :por_pagina");
            $this->db->bind(':id_usuario', $id_usuario);
            $this->db->bind(':inicio', $inicio, PDO::PARAM_INT); // Asegura que se trata de un entero
            $this->db->bind(':por_pagina', $por_pagina, PDO::PARAM_INT); // Asegura que se trata de un entero
            return $this->db->registros();
        }

        public function listarpropiasofertastodas($id_usuario){
            $this->db->query("SELECT *
                              FROM `oferta`
                              INNER JOIN oferta_inmueble ON oferta_inmueble.id_oferta = oferta.id_oferta
                              INNER JOIN inmueble ON oferta_inmueble.d_inmueble = inmueble.id_inmueble
                              INNER JOIN municipio ON municipio.id_municipio = inmueble.id_municipio
                              INNER JOIN entidad ON entidad.id_entidad = oferta.id_entidad
                              WHERE oferta.id_entidad IN (
                                  SELECT entidad.id_entidad
                                  FROM entidad
                                  INNER JOIN usuario_entidad ON entidad.id_entidad = usuario_entidad.id_entidad
                                  WHERE usuario_entidad.id_usuario = :id_usuario)
                                  AND id_negocio IS NULL");
            $this->db->bind(':id_usuario', $id_usuario);
            return $this->db->registros();
        }
        
        

        public function listarLocalesofertas($id_usuario){
            $this->db->query( "SELECT * FROM `oferta` inner join inmueble on inmueble.id_oferta=oferta.id_oferta INNER JOIN LOCAL on local.codigo_inmueble=inmueble.codigo_inmueble WHERE `id_usuario` = :id_usuario;");
            $this->db->bind(':id_usuario', $id_usuario);
            return $this->db->registros();
        }

        public function listarofertas($id_usuario, $municipioValor, $tipoInmuebleValor, $precioMin, $precioMax, $habitacionesValor, $estadoValor){
           $sql="SELECT *
                    FROM `oferta`
                        INNER JOIN oferta_inmueble on oferta_inmueble.id_oferta=oferta.id_oferta
                        INNER JOIN inmueble on oferta_inmueble.d_inmueble = inmueble.id_inmueble
                        INNER JOIN municipio on municipio.id_municipio=inmueble.id_municipio
                        INNER JOIN entidad on entidad.id_entidad=oferta.id_entidad
                        left JOIN vivienda ON inmueble.id_inmueble=vivienda.id_inmueble 
                        left JOIN local ON inmueble.id_inmueble=local.id_inmueble 
                    WHERE oferta.id_entidad not IN (
                        SELECT entidad.id_entidad
                        FROM entidad
                        INNER JOIN usuario_entidad ON entidad.id_entidad = usuario_entidad.id_entidad
                        WHERE usuario_entidad.id_usuario = :id_usuario)
                        and id_negocio is null";

            if($municipioValor!=0){
                $sql .= " and inmueble.id_municipio= $municipioValor";
            };

            if($habitacionesValor!=0){
                if($habitacionesValor >= 4){
                    $sql .= " and vivienda.habitaciones_vivienda >= $habitacionesValor";
                }else{
                    $sql .= " and vivienda.habitaciones_vivienda= $habitacionesValor";
                }
            };

            switch ($tipoInmuebleValor) {
                case 0:
                    break;
                case 1:
                    $sql .= " and vivienda.tipo_vivienda = 'Casa'";
                    break;
                case 2:
                    $sql .= " and vivienda.tipo_vivienda = 'Piso'";

                    break;
                case 3:
                    $sql .= "  AND local.id_local IS NOT NULL";

                    break;
                
                default:
                    // Acción por defecto si $tipoInmuebleValor no coincide con ninguno de los casos anteriores
                    break;
            }

            if($estadoValor!=0){
                $sql .= " and inmueble.id_estado = $estadoValor";

            }
            
                $sql .= " and oferta_inmueble.precio_inm between $precioMin and $precioMax";
           
            

            $sql .= ";";
           $this->db->query( $sql);

            $this->db->bind(':id_usuario', $id_usuario);

            return $this->db->registros();
        }

        public function listarofertasFiltradas($id_usuario){

            $id_municipio = $filtro['municipio'];

            $this->db->query( "SELECT *
                                FROM `oferta`
                                    INNER JOIN oferta_inmueble on oferta_inmueble.id_oferta=oferta.id_oferta
                                    INNER JOIN inmueble on oferta_inmueble.d_inmueble = inmueble.id_inmueble
                                    INNER JOIN municipio on municipio.id_municipio=inmueble.id_municipio
                                    INNER JOIN entidad on entidad.id_entidad=oferta.id_entidad
                                WHERE oferta.id_entidad not IN (
                                    SELECT entidad.id_entidad
                                    FROM entidad
                                    INNER JOIN usuario_entidad ON entidad.id_entidad = usuario_entidad.id_entidad
                                    WHERE usuario_entidad.id_usuario = :id_usuario)
                                    and id_negocio is null and id_municipio=:id_municipio;");
            $this->db->bind(':id_usuario', $id_usuario);
            $this->db->bind(':id_municipio', $id_municipio);

            return $this->db->registros();
        }

        public function listarofertasimagen($id_inmueble){
            $this->db->query( "SELECT * FROM `imagen` where id_inmueble = $id_inmueble");
            return $this->db->registros();
        }

        public function listarofertasapuntados($id_oferta){
            $this->db->query( "SELECT * FROM `usuario_oferta`  where id_oferta = $id_oferta");
            return $this->db->registros();
        }

        public function añadiroferta($insert, $id_negocio){

            //Insert oferta

            $this->db->query( "INSERT INTO `oferta`(`titulo_oferta`, `fecha_inicio_oferta`, `fecha_fin_oferta`, `condiciones_oferta`, `fecha_publicacion_oferta`, `id_entidad`, `id_negocio`, `descripcion_oferta`, `activo_oferta`) VALUES ( :nombre_oferta, :fecha_ini, :fecha_fin, :condiciones, :fecha_pub, :entidad, :negocio, :descripcion, 1)");
            
            $this->db->bind(':nombre_oferta', $insert["nombre_oferta"]);
            $this->db->bind(':fecha_ini', $insert["fecha_inicio"]);
            $this->db->bind(':fecha_fin', $insert["fecha_fin"]);
            $this->db->bind(':condiciones', "sin condiciones"/*$insert["condiciones"]*/);
            $fecha_pub = new DateTime();
            $fecha_pub_str = $fecha_pub->format('Y-m-d H:i:s');

            $this->db->bind(':fecha_pub', $fecha_pub_str);
            $this->db->bind(':entidad', $insert["id_entidad"]);
            $this->db->bind(':negocio', $id_negocio);
            $this->db->bind(':descripcion', $insert["descripcion_oferta"]);


            $this->db->execute();

            return $this->db->lastInsertId();
        }

        public function añadirOfertaInmueble($oferta_inmueble, $id_inmueble, $id_oferta){

            //Insert oferta

            $this->db->query( "INSERT INTO `oferta_inmueble`(`id_oferta`, `d_inmueble`, `precio_inm`) VALUES ( :id_oferta, :id_inmueble, :precio_inm)");

            $this->db->bind(':id_oferta', $id_oferta);
            $this->db->bind(':id_inmueble', $id_inmueble);
            $this->db->bind(':precio_inm', $oferta_inmueble["precio_inm"]);

            $this->db->execute();
        }

        public function listaroferta($id){
            $this->db->query( "SELECT * FROM `oferta` WHERE `id_oferta` = :id_oferta;");
            $this->db->bind(':id_oferta', $id);
            return $this->db->registro();
        }

        public function editaroferta($insert){
            try{
                $this->db->query( "UPDATE `oferta` SET `titulo_oferta`=:titulo_oferta , `fecha_inicio_oferta`=:fecha_inicio , `fecha_fin_oferta`=:fecha_fin ,`condiciones_oferta`=:condiciones ,
                                                        `descripcion_oferta`=:descripcion
                                                    WHERE `id_oferta`= :id_oferta");

                // Vincular los parámetros
                    $this->db->bind(':id_oferta', $insert['id_oferta']);
                    $this->db->bind(':titulo_oferta', $insert['titulo_oferta']);
                    $this->db->bind(':fecha_inicio', $insert['fecha_inicio_oferta']);
                    $this->db->bind(':fecha_fin', $insert['fecha_fin_oferta']);
                    $this->db->bind(':condiciones', $insert['condiciones_oferta']);
                    $this->db->bind(':descripcion', $insert['descripcion_oferta']);
                
                $this->db->execute();
                $_SESSION['correcto_message'] = 'La oferta se a editado correctamente';
                return true;
             } catch (PDOException $e) {
                // Captura la excepción de PDO y muestra un mensaje de error específico
                $_SESSION['error_message'] = 'Error al editar oferta vuelve a intentarlo ';
              
            }
        }

        public function eliminaroferta($id){

            try{
                $this->db->query( "UPDATE `oferta` SET `activo_oferta`='0' WHERE `id_oferta`=:id;");

                $this->db->bind(':id', $id);
            
                $this->db->execute();
                $_SESSION['correcto_message'] = 'La oferta se a descativar correctamente';
                return true;

            } catch (PDOException $e) {
                // Captura la excepción de PDO y muestra un mensaje de error específico
                $_SESSION['error_message'] = 'No se a podido descativar la oferta';
                return false;
            }
        }

        public function activaroferta($id){

            try{
                $this->db->query( "UPDATE `oferta` SET `activo_oferta`='1' WHERE `id_oferta`=:id;");

                $this->db->bind(':id', $id);
            
                $this->db->execute();
                $_SESSION['correcto_message'] = 'La oferta se a activado correctamente';
                return true;

            } catch (PDOException $e) {
                $_SESSION['error_message'] = 'No se a podido activar la oferta';
                return false;
            }
        }

        public function verOfertaCompleta($id) {
            $this->db->query("SELECT * FROM `oferta` WHERE `id_oferta` = :id_oferta;");
            $this->db->bind(':id_oferta', $id);
            return $this->db->registro();
        }

        public function listarInmueble($id) {
            $this->db->query("SELECT * FROM `inmueble` WHERE `id_oferta` = :id_oferta;");
            $this->db->bind(':id_oferta', $id);
            return $this->db->registro();
        }

        public function recogerComentario($id) {
            $this->db->query("SELECT * FROM `valorar_inmueble` 
                              INNER JOIN inmueble ON valorar_inmueble.id_inmueble = inmueble.id_inmueble 
                              INNER JOIN oferta_inmueble ON inmueble.id_inmueble = oferta_inmueble.d_inmueble 
                              INNER JOIN oferta ON oferta_inmueble.id_oferta = oferta.id_oferta 
                              INNER JOIN usuario ON valorar_inmueble.id_usuario = usuario.id_usuario 
                              WHERE oferta.id_oferta = :id");
            $this->db->bind(':id', $id);
            return $this->db->registros();
        }
        
        public function insertarInscripcion($id, $nif){
            try{
                $this->db->query("INSERT INTO `usuario_oferta`(`id_usuario`, `id_oferta`) VALUES (:nif, :id)");
                $this->db->bind(':id', $id);
                $this->db->bind(':nif', $nif);
                $this->db->execute();
                $_SESSION['correcto_message'] = 'Se a podido insertar la inscripción';

                return true;
            }catch (PDOException $e) {
                // Captura la excepción de PDO y muestra un mensaje de error específico
                $_SESSION['error_message'] = 'No se a podido insertar la inscripción';
                return false;
            }
        }

        public function EliminarInscripccion($id, $nif){
            try{
                $this->db->query("DELETE FROM `usuario_oferta` WHERE `id_usuario`=:nif and `id_oferta`=:id");
                $this->db->bind(':id', $id);
                $this->db->bind(':nif', $nif);
                $this->db->execute();
                $_SESSION['correcto_message'] = 'Se a podido eliminar la inscripción';

                return true;
            }catch (PDOException $e) {
                // Captura la excepción de PDO y muestra un mensaje de error específico
                $_SESSION['error_message'] = 'No se a podido eliminar la inscripción';
                return false;
            }
        }



        public function listarofertasInscritas($nif){
            $this->db->query( "SELECT * FROM `usuario_oferta` 
                                INNER join oferta on usuario_oferta.id_oferta = oferta.id_oferta 
                                INNER JOIN oferta_inmueble ON oferta.id_oferta = oferta_inmueble.id_oferta 
                                INNER JOIN inmueble on oferta_inmueble.d_inmueble = inmueble.id_inmueble
                                INNER JOIN municipio on municipio.id_municipio=inmueble.id_municipio
                                INNER JOIN entidad on entidad.id_entidad=oferta.id_entidad
                                   WHERE usuario_oferta.id_usuario = :nif;");
            $this->db->bind(':nif', $nif);
            return $this->db->registros();
        }

        public function listaruserinscritos($id_oferta){
            
            $this->db->query( " SELECT * FROM `usuario_oferta` 
                                INNER join usuario on usuario.id_usuario=usuario_oferta.id_usuario 
                                    WHERE usuario_oferta.id_oferta= :id_oferta"); 
            $this->db->bind(':id_oferta', $id_oferta);
            
            return $this->db->registros();
            
        }

        public function insertarImagen($nombreImagen, $formatoImagen, $rutaImagen, $id_inmueble){
            $this->db->query("INSERT INTO imagen (nombre_imagen, formato_imagen, ruta_imagen, id_inmueble) VALUES (:nombre, :formato, :ruta, :id_inmueble)"); 
            
            $this->db->bind(':nombre', $nombreImagen);
            $this->db->bind(':formato', $formatoImagen);
            $this->db->bind(':ruta', $rutaImagen);
            $this->db->bind(':id_inmueble', $id_inmueble);


            return $this->db->execute();

            echo "Imagenes insertadas perfectamente";
        }
    }