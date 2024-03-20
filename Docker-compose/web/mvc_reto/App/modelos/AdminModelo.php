<?php

    class AdminModelo{
        private $db;
        


        public function __construct(){
            $this->db = new Base;
        }

        public function verInmuebles() {
            $this->db->query("SELECT i.*, 
                                     o.*, 
                                     m.nombre_municipio, 
                                     e.estado, 
                                     ent.nombre_entidad,
                                     l.nombre_local, capacidad_local, recursos_local,
                                     v.habitaciones_vivienda, tipo_vivienda
                             FROM inmueble i
                             INNER JOIN oferta_inmueble oi ON oi.d_inmueble = i.id_inmueble
                             INNER JOIN oferta o ON oi.id_oferta = o.id_oferta
                             INNER JOIN municipio m ON i.id_municipio = m.id_municipio
                             INNER JOIN estado e ON i.id_estado = e.id_estado
                             INNER JOIN entidad ent ON i.id_entidad = ent.id_entidad
                             LEFT JOIN local l ON i.id_inmueble = l.id_inmueble
                             LEFT JOIN vivienda v ON i.id_inmueble = v.id_inmueble");
                                      
            return $this->db->registros(); 
        }
        
        
        

        public function verNegocios() {
            $this->db->query("SELECT oferta.*, negocio.*, entidad.nombre_entidad, l.nombre_local, l.capacidad_local, l.recursos_local
                FROM negocio
                LEFT JOIN oferta ON negocio.id_negocio = oferta.id_negocio
                LEFT JOIN entidad ON negocio.id_entidad = entidad.id_entidad
                LEFT JOIN local AS l ON negocio.local_id_inmueble = l.id_local");
            return $this->db->registros();
        }
        
        
        

        public function verUsuarios() {

            $this->db->query("SELECT * FROM `usuario`");
            return $this->db->registros(); 
            
        }

        public function Buscador($busqueda) {
            $busqueda = $this->db->real_escape_string($_POST['busqueda']);
        
            $query = "SELECT * FROM `usuario` WHERE nombre_usuario LIKE '%" . $busqueda . "%'";
            $usuarios = [];
            $errors = ['data' => false];
        
            $getUsuarios = $this->db->query($query);
        
            if ($getUsuarios->num_rows > 0) {
                while ($data = $getUsuarios->fetch_assoc()) {
                    $usuarios[] = $data;
                }
                echo json_encode($usuarios);
            } else {
                echo json_encode($errors);
            }
        
            return $this->db->registros();
        }
        

        public function verRoles() {
            $this->db->query("SELECT * FROM `rol` ");
            return $this->db->registros(); 
            
        }

        public function verValoracionesInmueble() {
            $this->db->query("SELECT * FROM `valorar_inmueble` ");

            return $this->db->registros(); 
        }

        public function verValoracionesNegocio() {
            $this->db->query("SELECT * FROM `valorar_negocio` ");

            return $this->db->registros(); 
        }

        public function verEntidades() {
            $this->db->query("SELECT * FROM `entidad` ");
            return $this->db->registros(); 
        }

        public function verEstados() {
            $this->db->query("SELECT * FROM `estado` ");
            return $this->db->registros(); 
        }

        public function listarMunicipio(){
            $this->db->query("SELECT * FROM municipio");
            return $this->db->registros();
        }

        public function verServicios() {
            $this->db->query("SELECT servicio.*, tipo_servicio.nombre_tipo_servicio, municipio.nombre_municipio
            FROM servicio
            LEFT JOIN tipo_servicio ON servicio.id_tipo_servicio = tipo_servicio.id_tipo_servicio
            LEFT JOIN municipio ON servicio.id_municipio = municipio.id_municipio;
             ");
            return $this->db->registros(); 
        }

        public function verTipoServicios() {
            $this->db->query("SELECT * FROM `tipo_servicio` ");
            return $this->db->registros(); 
        }

        public function verlocales() {
            $this->db->query("SELECT * FROM `local` ");
            return $this->db->registros(); 
        }

        

        public function listadoOfertas() {
            $this->db->query("SELECT * FROM `oferta` ");
            return $this->db->registros(); 
        }

        public function listadoUsuarioOferta() {
            $this->db->query("SELECT usuario_oferta.id_usuario, usuario_oferta.id_oferta, oferta.titulo_oferta FROM `usuario_oferta` LEFT JOIN oferta ON oferta.id_oferta = usuario_oferta.id_oferta; ");
            return $this->db->registros(); 
        }
        

        public function ListarAdmins(){
            $this->db->query("SELECT * FROM `usuario` 
                                INNER JOIN usuario_has_rol on usuario_has_rol.id_usuario=usuario.id_usuario 
                                INNER join rol on rol.id_rol=usuario_has_rol.id_rol 
                              WHERE rol.nombre_rol='administrador';"
                            );
            return $this->db->registros(); 
        }

        public function verAvisos() {
            
            $this->db->query("SELECT * FROM `aviso`; ");
            return $this->db->registros();
        }
        
        

      
        public function verUsuariosEntidad() {
            $this->db->query("SELECT usuario.nombre_usuario, usuario.nif, usuario_entidad.id_usuario, usuario_entidad.rol, usuario_entidad.id_entidad FROM usuario_entidad LEFT JOIN usuario ON usuario.id_usuario = usuario_entidad.id_usuario");
        
            return $this->db->registros();
        }
        
        
        
        public function listarofertas(){
            $sql="SELECT *
                     FROM `oferta`
                         INNER JOIN oferta_inmueble on oferta_inmueble.id_oferta=oferta.id_oferta
                         INNER JOIN inmueble on oferta_inmueble.d_inmueble = inmueble.id_inmueble
                         INNER JOIN municipio on municipio.id_municipio=inmueble.id_municipio
                         INNER JOIN entidad on entidad.id_entidad=oferta.id_entidad
                         left JOIN vivienda ON inmueble.id_inmueble=vivienda.id_inmueble 
                         left JOIN local ON inmueble.id_inmueble=local.id_inmueble 
                         and id_negocio is null";
          
            
 
 
             return $this->db->registros($sql);
         }
 
 
       

       
        public function anadirInmuebleAdmin($inmueble) {
            try{

                $titulo_oferta = $inmueble['titulo_oferta'];
                $fecha_inicio_oferta = $inmueble['fecha_inicio_oferta'];
                $fecha_fin_oferta = $inmueble['fecha_fin_oferta'];
                $condiciones_oferta = $inmueble['condiciones_oferta'];
                $descripcion_oferta = $inmueble['descripcion_oferta'];
                $fecha_publicacion_oferta = $inmueble['fecha_publicacion_oferta'];
                $id_entidad = $inmueble['id_entidad'];
            
                $this->db->query("INSERT INTO `oferta`(`titulo_oferta`, `fecha_inicio_oferta`, `fecha_fin_oferta`, `condiciones_oferta`, `descripcion_oferta`, `fecha_publicacion_oferta`, `activo_oferta`, `id_entidad`) 
                                VALUES (:titulo_oferta, :fecha_inicio_oferta, :fecha_fin_oferta, :condiciones_oferta, :descripcion_oferta, :fecha_publicacion_oferta, 1, :id_entidad)");
            
                $this->db->bind(':titulo_oferta', $titulo_oferta);
                $this->db->bind(':fecha_inicio_oferta', $fecha_inicio_oferta);
                $this->db->bind(':fecha_fin_oferta', $fecha_fin_oferta);
                $this->db->bind(':condiciones_oferta', $condiciones_oferta);
                $this->db->bind(':descripcion_oferta', $descripcion_oferta);
                $this->db->bind(':fecha_publicacion_oferta', $fecha_publicacion_oferta);
                $this->db->bind(':id_entidad', $id_entidad);
    
            
                $this->db->execute();
            
                
                 $metros_cuadrados_inmueble = $inmueble['metros_cuadrados_inmueble'];
                 $descripcion_inmueble = $inmueble['descripcion_inmueble'];
                 $distribucion_inmueble = $inmueble['distribucion_inmueble'];
                 $precio_inmueble = $inmueble['precio_inmueble'];
                 $direccion_inmueble = $inmueble['direccion_inmueble'];
                 $caracteristicas_inmueble = $inmueble['caracteristicas_inmueble'];
                 $equipamiento_inmueble = $inmueble['equipamiento_inmueble'];
                 $latitud_inmueble = $inmueble['latitud_inmueble'];
                 $longitud_inmueble = $inmueble['longitud_inmueble'];
                 $id_municipio = $inmueble['id_municipio'];
                 $id_estado = $inmueble['id_estado'];
                 $this->db->bind(':id_entidad', $id_entidad);



                 $this->db->query("INSERT INTO `inmueble`(`metros_cuadrados_inmueble`, `descripcion_inmueble`, `distribucion_inmueble`, `precio_inmueble`, `direccion_inmueble`,  `caracteristicas_inmueble`,  `equipamiento_inmueble`,  `latitud_inmueble`,  `longitud_inmueble`,  `id_municipio`,  `id_estado`,  `id_entidad`) 
                 VALUES (:metros_cuadrados_inmueble, :descripcion_inmueble, :distribucion_inmueble, :precio_inmueble, :direccion_inmueble, :caracteristicas_inmueble, :equipamiento_inmueble, :latitud_inmueble, :longitud_inmueble, :id_municipio, :id_estado, :id_entidad)");

        
                 $this->db->bind(':metros_cuadrados_inmueble', $metros_cuadrados_inmueble);
                 $this->db->bind(':descripcion_inmueble', $descripcion_inmueble);
                 $this->db->bind(':distribucion_inmueble', $distribucion_inmueble);
                 $this->db->bind(':precio_inmueble', $precio_inmueble);
                 $this->db->bind(':direccion_inmueble', $direccion_inmueble);
                 $this->db->bind(':caracteristicas_inmueble', $caracteristicas_inmueble);
                 $this->db->bind(':equipamiento_inmueble', $equipamiento_inmueble);
                 $this->db->bind(':latitud_inmueble', $latitud_inmueble);
                 $this->db->bind(':longitud_inmueble', $longitud_inmueble);
                 $this->db->bind(':id_municipio', $id_municipio);
                 $this->db->bind(':id_estado', $id_estado);
                 $this->db->bind(':id_entidad', $id_entidad);
                 


        
                $this->db->execute();
            
                
                if ($inmueble['tipo'] === 'local') {
        
                $nombre_local = $inmueble['nombre_local'];
                $capacidad_local = $inmueble['capacidad_local'];
                $recursos_local = $inmueble['recursos_local'];
                $id_inmueble = $this->db->lastInsertId();

            
                $this->db->query("INSERT INTO `local`(`nombre_local`, `capacidad_local`, `recursos_local`, `id_inmueble`) 
                                 VALUES (:nombre_local, :capacidad_local, :recursos_local, :id_inmueble)");
            
                $this->db->bind(':nombre_local', $nombre_local);
                $this->db->bind(':capacidad_local', $capacidad_local);
                $this->db->bind(':recursos_local', $recursos_local);
                $this->db->bind(':id_inmueble', $id_inmueble);
            
                $this->db->execute();

                }elseif ($inmueble['tipo'] === 'vivienda') {
        
                    $habitaciones_vivienda = $inmueble['habitaciones_vivienda'];
                    $tipo_vivienda = $inmueble['tipo_vivienda'];
                    $id_inmueble = $this->db->lastInsertId();

                   
                
                    $this->db->query("INSERT INTO `vivienda`(`habitaciones_vivienda`, `tipo_vivienda`, `id_inmueble`) 
                                     VALUES (:habitaciones_vivienda, :tipo_vivienda, :id_inmueble)");
                
                    $this->db->bind(':habitaciones_vivienda', $habitaciones_vivienda);
                    $this->db->bind(':tipo_vivienda', $tipo_vivienda);
                    $this->db->bind(':id_inmueble', $id_inmueble);
                
                    $this->db->execute();
                }
                $_SESSION['correcto_message']="Se ha podido insertar la oferta";
            }catch(PDOException $e){
                $_SESSION['error_message']="No se ha podido insertar la oferta";
            }
                

               
            }


        public function anadirNegocioAdmin($negocio) {
            try{
                $titulo_negocio = $negocio['titulo_negocio'];
                $motivo_traspaso_negocio = $negocio['motivo_traspaso_negocio'];
                $coste_traspaso_negocio = $negocio['coste_traspaso_negocio'];
                $coste_mensual_negocio = $negocio['coste_mensual_negocio'];
                $descripcion_negocio = $negocio['descripcion_negocio'];
                $capital_minimo_negocio = $negocio['capital_minimo_negocio'];
                $local_id_inmueble = $negocio['local_id_inmueble'];
                $id_entidad = $negocio['id_entidad'];
            
                $this->db->query("INSERT INTO `negocio`(`titulo_negocio`, `motivo_traspaso_negocio`, `coste_traspaso_negocio`, `coste_mensual_negocio`,  `descripcion_negocio`, `capital_minimo_negocio`, `local_id_inmueble`, `id_entidad`) 
                                VALUES (:titulo_negocio, :motivo_traspaso_negocio, :coste_traspaso_negocio, :coste_mensual_negocio, :descripcion_negocio, :capital_minimo_negocio, :local_id_inmueble, :id_entidad)");
            
                $this->db->bind(':titulo_negocio', $titulo_negocio);
                $this->db->bind(':motivo_traspaso_negocio', $motivo_traspaso_negocio);
                $this->db->bind(':coste_traspaso_negocio', $coste_traspaso_negocio);
                $this->db->bind(':coste_mensual_negocio', $coste_mensual_negocio);
                $this->db->bind(':descripcion_negocio', $descripcion_negocio);
                $this->db->bind(':capital_minimo_negocio', $capital_minimo_negocio);
                $this->db->bind(':local_id_inmueble', $local_id_inmueble);
                $this->db->bind(':id_entidad', $id_entidad);
            
                $this->db->execute();
            
                $id_negocio = $this->db->lastInsertId();
                $this->db->bind(':id_entidad', $id_entidad);

            
                $titulo_oferta = $negocio['titulo_oferta'];
                $fecha_inicio_oferta = $negocio['fecha_inicio_oferta'];
                $fecha_fin_oferta = $negocio['fecha_fin_oferta'];
                $condiciones_oferta = $negocio['condiciones_oferta'];
                $descripcion_oferta = $negocio['descripcion_oferta'];
                $fecha_publicacion_oferta = $negocio['fecha_publicacion_oferta'];
            
                $this->db->query("INSERT INTO `oferta`(`titulo_oferta`, `fecha_inicio_oferta`, `fecha_fin_oferta`, `condiciones_oferta`, `descripcion_oferta`, `fecha_publicacion_oferta`, `id_entidad`, `id_negocio`) 
                                VALUES (:titulo_oferta, :fecha_inicio_oferta, :fecha_fin_oferta, :condiciones_oferta, :descripcion_oferta, :fecha_publicacion_oferta, :id_entidad, :id_negocio)");
            
                $this->db->bind(':titulo_oferta', $titulo_oferta);
                $this->db->bind(':fecha_inicio_oferta', $fecha_inicio_oferta);
                $this->db->bind(':fecha_fin_oferta', $fecha_fin_oferta);
                $this->db->bind(':condiciones_oferta', $condiciones_oferta);
                $this->db->bind(':descripcion_oferta', $descripcion_oferta);
                $this->db->bind(':fecha_publicacion_oferta', $fecha_publicacion_oferta);
                $this->db->bind(':id_entidad', $id_entidad);
    
                $this->db->bind(':id_negocio', $id_negocio);
            
                $this->db->execute();
            
                $id_oferta = $this->db->lastInsertId();
            
                $metros_cuadrados_inmueble = $negocio['metros_cuadrados_inmueble'];
                $descripcion_inmueble = $negocio['descripcion_inmueble'];
                $distribucion_inmueble = $negocio['distribucion_inmueble'];
                $precio_inmueble = $negocio['precio_inmueble'];
                $direccion_inmueble = $negocio['direccion_inmueble'];
                $caracteristicas_inmueble = $negocio['caracteristicas_inmueble'];
                $equipamiento_inmueble = $negocio['equipamiento_inmueble'];
                $latitud_inmueble = $negocio['latitud_inmueble'];
                $longitud_inmueble = $negocio['longitud_inmueble'];
                $id_municipio = $negocio['id_municipio'];
                $id_estado = $negocio['id_estado'];
            
                $this->db->query("INSERT INTO `inmueble`(`metros_cuadrados_inmueble`, `descripcion_inmueble`, `distribucion_inmueble`, `precio_inmueble`, `direccion_inmueble`, `caracteristicas_inmueble`, `equipamiento_inmueble`, `latitud_inmueble`, `longitud_inmueble`, `id_municipio`, `id_estado`, `id_entidad`) 
                                VALUES (:metros_cuadrados_inmueble, :descripcion_inmueble, :distribucion_inmueble, :precio_inmueble, :direccion_inmueble, :caracteristicas_inmueble, :equipamiento_inmueble, :latitud_inmueble, :longitud_inmueble, :id_municipio, :id_estado, :id_entidad)");
            
                $this->db->bind(':metros_cuadrados_inmueble', $metros_cuadrados_inmueble);
                $this->db->bind(':descripcion_inmueble', $descripcion_inmueble);
                $this->db->bind(':distribucion_inmueble', $distribucion_inmueble);
                $this->db->bind(':precio_inmueble', $precio_inmueble);
                $this->db->bind(':direccion_inmueble', $direccion_inmueble);
                $this->db->bind(':caracteristicas_inmueble', $caracteristicas_inmueble);
                $this->db->bind(':equipamiento_inmueble', $equipamiento_inmueble);
                $this->db->bind(':latitud_inmueble', $latitud_inmueble);
                $this->db->bind(':longitud_inmueble', $longitud_inmueble);
                $this->db->bind(':id_municipio', $id_municipio);
                $this->db->bind(':id_estado', $id_estado);
                $this->db->bind(':id_entidad', $id_entidad);
            
                $this->db->execute();
            
                $id_inmueble = $this->db->lastInsertId();
            
                $nombre_local = $negocio['nombre_local'];
                $capacidad_local = $negocio['capacidad_local'];
                $recursos_local = $negocio['recursos_local'];
            
                $this->db->query("INSERT INTO `local`(`nombre_local`, `capacidad_local`, `recursos_local`, `id_inmueble`) 
                                VALUES (:nombre_local, :capacidad_local, :recursos_local, :id_inmueble)");
            
                $this->db->bind(':nombre_local', $nombre_local);
                $this->db->bind(':capacidad_local', $capacidad_local);
                $this->db->bind(':recursos_local', $recursos_local);
                $this->db->bind(':id_inmueble', $id_inmueble);
            
                $this->db->execute();
                $_SESSION['correcto_message']="Se ha podido insertar la negocio";
            }catch(PDOException $e){
                $_SESSION['error_message']="No se ha podido insertar la negocio";
            }
        }
        
       
    

        public function anadirUsuarioAdmin($usuario) {
           
                try{ 
                $nif = $usuario['nif'];
                $nombre_usuario = $usuario['nombre_usuario'];
                $apellidos_usuario = $usuario['apellidos_usuario'];
                $correo_usuario = $usuario['correo_usuario'];
                $contrasena_usuario = $usuario['contrasena_usuario'];
                $fecha_nacimiento_usuario = $usuario['fecha_nacimiento_usuario'];
                $telefono_usuario = $usuario['telefono_usuario'];

               
            
                $this->db->query("INSERT INTO `usuario`(`nif`, `nombre_usuario`, `apellidos_usuario`, `correo_usuario`, `contrasena_usuario`,  `fecha_nacimiento_usuario`, `telefono_usuario`, `notificar_avisos`, `notificar_mensajes`, `notificar_notificaciones`, `activo_usuario`) 
                                VALUES (:nif, :nombre_usuario, :apellidos_usuario, :correo_usuario, :contrasena_usuario, :fecha_nacimiento_usuario, :telefono_usuario, 1, 1, 1, 1)");
            
                $this->db->bind(':nif', $nif);
                $this->db->bind(':nombre_usuario', $nombre_usuario);
                $this->db->bind(':apellidos_usuario', $apellidos_usuario);
                $this->db->bind(':correo_usuario', $correo_usuario);
                $this->db->bind(':contrasena_usuario', $contrasena_usuario);
                $this->db->bind(':fecha_nacimiento_usuario', $fecha_nacimiento_usuario);
                $this->db->bind(':telefono_usuario', $telefono_usuario);
            
                $this->db->execute();
            
                $id_usuario = $this->db->lastInsertId();
            
                if ($usuario['tipo'] === 'existente') {
                    $id_entidad = $usuario['id_entidad'];
                } elseif ($usuario['tipo'] === 'nueva') {
                    $nombre_entidad = $usuario['nombre_entidad'];
                    $cif_entidad = $usuario['cif_entidad'];
                    $sector_entidad = $usuario['sector_entidad'];
                    $direccion_entidad = $usuario['direccion_entidad'];
                    $numero_telefono_entidad = $usuario['numero_telefono_entidad'];
                    $correo_entidad = $usuario['correo_entidad'];
                    $pagina_web_entidad = $usuario['pagina_web_entidad'];
            
                    $this->db->query("INSERT INTO `entidad` (`nombre_entidad`, `cif_entidad`, `sector_entidad`, `direccion_entidad`, `numero_telefono_entidad`, `correo_entidad`, `pagina_web_entidad`) 
                                    VALUES (:nombre_entidad, :cif_entidad, :sector_entidad, :direccion_entidad, :numero_telefono_entidad, :correo_entidad, :pagina_web_entidad)");
            
                    $this->db->bind(':nombre_entidad', $nombre_entidad);
                    $this->db->bind(':cif_entidad', $cif_entidad);
                    $this->db->bind(':sector_entidad', $sector_entidad);
                    $this->db->bind(':direccion_entidad', $direccion_entidad);
                    $this->db->bind(':numero_telefono_entidad', $numero_telefono_entidad);
                    $this->db->bind(':correo_entidad', $correo_entidad);
                    $this->db->bind(':pagina_web_entidad', $pagina_web_entidad);
            
                    $this->db->execute();
            
                    $id_entidad = $this->db->lastInsertId();
                }
            
                $rol = $usuario['rol'];
            
                $this->db->query("INSERT INTO `usuario_entidad` (`id_usuario`, `id_entidad`, `rol`) 
                                VALUES (:id_usuario, :id_entidad, :rol)");
            
                $this->db->bind(':id_usuario', $id_usuario);
                $this->db->bind(':id_entidad', $id_entidad);
                $this->db->bind(':rol', $rol);
            
                $this->db->execute();
                $_SESSION['correcto_message']="El usuario ha sido creado correctamente";
            }catch(PDOException $e){
                $_SESSION['error_message']="No se ha podido añadir el nuevo usuario, el nif o correo ya estan en uso.";
            }
             
        }
        
        public function editarUsuarioAdmin($editarUsuario) {
            try{
                $id_usuario = $editarUsuario['id_usuario'];
                $nif = $editarUsuario['nif'];
                $nombre_usuario = $editarUsuario['nombre_usuario'];
                $apellidos_usuario = $editarUsuario['apellidos_usuario'];
                $correo_usuario = $editarUsuario['correo_usuario'];
                $fecha_nacimiento_usuario = $editarUsuario['fecha_nacimiento_usuario'];
                $telefono_usuario = $editarUsuario['telefono_usuario'];
            
                $this->db->query("UPDATE `usuario` SET 
                                `nif` = :nif, 
                                `nombre_usuario` = :nombre_usuario, 
                                `apellidos_usuario` = :apellidos_usuario, 
                                `correo_usuario` = :correo_usuario, 
                                `fecha_nacimiento_usuario` = :fecha_nacimiento_usuario, 
                                `telefono_usuario` = :telefono_usuario
                                WHERE `id_usuario` = :id_usuario");
            
                $this->db->bind(':nif', $nif);
                $this->db->bind(':nombre_usuario', $nombre_usuario);
                $this->db->bind(':apellidos_usuario', $apellidos_usuario);
                $this->db->bind(':correo_usuario', $correo_usuario);
                $this->db->bind(':fecha_nacimiento_usuario', $fecha_nacimiento_usuario);
                $this->db->bind(':telefono_usuario', $telefono_usuario);
                $this->db->bind(':id_usuario', $id_usuario);
            
                $this->db->execute();
                $_SESSION['correcto_message']="Se ha podido editar el usuario";
            }catch(PDOException $e){
                $_SESSION['error_message']="No se ha podido editar el usuario";
            }
        }

        public function editarEntidadAdmin($editarEntidad) {
            
            try{
                $id_entidad = $editarEntidad['id_entidad'];
                $nombre_entidad = $editarEntidad['nombre_entidad'];
                $cif_entidad = $editarEntidad['cif_entidad'];
                $sector_entidad = $editarEntidad['sector_entidad'];
                $direccion_entidad = $editarEntidad['direccion_entidad'];
                $correo_entidad = $editarEntidad['correo_entidad'];
                $pagina_web_entidad = $editarEntidad['pagina_web_entidad'];
            
                $query = "UPDATE `entidad` SET 
                        `nombre_entidad` = :nombre_entidad, 
                        `cif_entidad` = :cif_entidad, 
                        `sector_entidad` = :sector_entidad, 
                        `direccion_entidad` = :direccion_entidad, 
                        `correo_entidad` = :correo_entidad, 
                        `pagina_web_entidad` = :pagina_web_entidad
                        WHERE `id_entidad` = :id_entidad";
            
                $this->db->query($query);
        
                $this->db->bind(':nombre_entidad', $nombre_entidad);
                $this->db->bind(':cif_entidad', $cif_entidad);
                $this->db->bind(':sector_entidad', $sector_entidad);
                $this->db->bind(':direccion_entidad', $direccion_entidad);
                $this->db->bind(':correo_entidad', $correo_entidad);
                $this->db->bind(':pagina_web_entidad', $pagina_web_entidad);
                $this->db->bind(':id_entidad', $id_entidad);
            
                $this->db->execute();
                $_SESSION['correcto_message']="Se ha podido editar la entidad";
            }catch(PDOException $e){
                $_SESSION['error_message']="No se ha podido editar la entidad";
            }
        
        
        }
        

        public function anadirServicioAdmin($nuevoServicio) {
            try {
                $this->db->query("INSERT INTO `servicio` 
                                  (`nombre_servicio`, `descripcion_servicio`, `id_tipo_servicio`, 
                                   `id_municipio`, `longitud_servicio`, `latitud_servicio`, 
                                   `telefono_servicio`, `direccion_servicio`) 
                                  VALUES 
                                  (:nombre_servicio, :descripcion_servicio, :id_tipo_servicio, 
                                   :id_municipio, :longitud_servicio, :latitud_servicio, 
                                   :telefono_servicio, :direccion_servicio)");
        
                $this->db->bind(':nombre_servicio', $nuevoServicio['nombre_servicio']);
                $this->db->bind(':descripcion_servicio', $nuevoServicio['descripcion_servicio']);
                $this->db->bind(':id_tipo_servicio', $nuevoServicio['id_tipo_servicio']);
                $this->db->bind(':id_municipio', $nuevoServicio['id_municipio']);
                $this->db->bind(':longitud_servicio', $nuevoServicio['longitud_servicio']);
                $this->db->bind(':latitud_servicio', $nuevoServicio['latitud_servicio']);
                $this->db->bind(':telefono_servicio', $nuevoServicio['telefono_servicio']);
                $this->db->bind(':direccion_servicio', $nuevoServicio['direccion_servicio']);
        
                $this->db->execute();
        
                $_SESSION['correcto_message'] = 'El servicio se ha añadido correctamente';
            } catch (PDOException $e) {
                $_SESSION['error_message'] = 'Fallo al añadir servicio.' . $e->getMessage();
            }
        }
        

        public function editarServicioAdmin($editarServicio) {
            try{
                $id_servicio = $editarServicio['id_servicio'];
                $nombre_servicio = $editarServicio['nombre_servicio'];
                $descripcion_servicio = $editarServicio['descripcion_servicio'];
                $id_tipo_servicio = $editarServicio['id_tipo_servicio'];
                $id_municipio = $editarServicio['id_municipio'];
                $longitud_servicio = $editarServicio['longitud_servicio'];
                $latitud_servicio = $editarServicio['latitud_servicio'];
                $telefono_servicio = $editarServicio['telefono_servicio'];
                $direccion_servicio = $editarServicio['direccion_servicio'];
            
                $this->db->query("UPDATE `servicio` SET 
                                `nombre_servicio` = :nombre_servicio, 
                                `descripcion_servicio` = :descripcion_servicio, 
                                `id_tipo_servicio` = :id_tipo_servicio, 
                                `id_municipio` = :id_municipio, 
                                `longitud_servicio` = :longitud_servicio, 
                                `latitud_servicio` = :latitud_servicio, 
                                `telefono_servicio` = :telefono_servicio, 
                                `direccion_servicio` = :direccion_servicio
                                WHERE `id_servicio` = :id_servicio");
            
                $this->db->bind(':nombre_servicio', $nombre_servicio);
                $this->db->bind(':descripcion_servicio', $descripcion_servicio);
                $this->db->bind(':id_tipo_servicio', $id_tipo_servicio);
                $this->db->bind(':id_municipio', $id_municipio);
                $this->db->bind(':longitud_servicio', $longitud_servicio);
                $this->db->bind(':latitud_servicio', $latitud_servicio);
                $this->db->bind(':telefono_servicio', $telefono_servicio);
                $this->db->bind(':direccion_servicio', $direccion_servicio);
                $this->db->bind(':id_servicio', $id_servicio);
            
                $this->db->execute();
                $_SESSION['correcto_message']="Se ha podido editar el Servicio";
            }catch(PDOException $e){
                $_SESSION['error_message']="No se ha podido editar el Servicio";
            }
        }
        
        public function editarInmuebleAdmin($editarInmueble) {
            try{
                $editarInmueble['id_inmueble'] = $_POST['id_inmueble'];
            
                $queryOferta = "UPDATE oferta SET
                                titulo_oferta = :titulo_oferta,
                                fecha_inicio_oferta = :fecha_inicio_oferta,
                                fecha_fin_oferta = :fecha_fin_oferta,
                                condiciones_oferta = :condiciones_oferta,
                                descripcion_oferta = :descripcion_oferta,
                                fecha_publicacion_oferta = :fecha_publicacion_oferta
                                WHERE id_oferta IN (SELECT id_oferta FROM oferta_inmueble WHERE d_inmueble = :id_inmueble)";
            
                $this->db->query($queryOferta);
                $this->db->bind(':titulo_oferta', $editarInmueble['titulo_oferta']);
                $this->db->bind(':fecha_inicio_oferta', $editarInmueble['fecha_inicio_oferta']);
                $this->db->bind(':fecha_fin_oferta', $editarInmueble['fecha_fin_oferta']);
                $this->db->bind(':condiciones_oferta', $editarInmueble['condiciones_oferta']);
                $this->db->bind(':descripcion_oferta', $editarInmueble['descripcion_oferta']);
                $this->db->bind(':fecha_publicacion_oferta', $editarInmueble['fecha_publicacion_oferta']);
                $this->db->bind(':id_inmueble', $editarInmueble['id_inmueble']);
                $this->db->execute();
            
                $queryInmueble = "UPDATE inmueble SET
                                metros_cuadrados_inmueble = :metros_cuadrados_inmueble,
                                descripcion_inmueble = :descripcion_inmueble,
                                distribucion_inmueble = :distribucion_inmueble,
                                precio_inmueble = :precio_inmueble,
                                direccion_inmueble = :direccion_inmueble,
                                caracteristicas_inmueble = :caracteristicas_inmueble,
                                equipamiento_inmueble = :equipamiento_inmueble,
                                latitud_inmueble = :latitud_inmueble,
                                longitud_inmueble = :longitud_inmueble,
                                id_municipio = :id_municipio,
                                id_estado = :id_estado
                                WHERE id_inmueble = :id_inmueble";
            
                $this->db->query($queryInmueble);
                $this->db->bind(':metros_cuadrados_inmueble', $editarInmueble['metros_cuadrados_inmueble']);
                $this->db->bind(':descripcion_inmueble', $editarInmueble['descripcion_inmueble']);
                $this->db->bind(':distribucion_inmueble', $editarInmueble['distribucion_inmueble']);
                $this->db->bind(':precio_inmueble', $editarInmueble['precio_inmueble']);
                $this->db->bind(':direccion_inmueble', $editarInmueble['direccion_inmueble']);
                $this->db->bind(':caracteristicas_inmueble', $editarInmueble['caracteristicas_inmueble']);
                $this->db->bind(':equipamiento_inmueble', $editarInmueble['equipamiento_inmueble']);
                $this->db->bind(':latitud_inmueble', $editarInmueble['latitud_inmueble']);
                $this->db->bind(':longitud_inmueble', $editarInmueble['longitud_inmueble']);
                $this->db->bind(':id_municipio', $editarInmueble['id_municipio']);
                $this->db->bind(':id_estado', $editarInmueble['id_estado']);
                $this->db->bind(':id_inmueble', $editarInmueble['id_inmueble']);
                $this->db->execute();
            
                if (isset($editarInmueble['nombre_local'])) {
                    $queryLocal = "UPDATE local SET
                                    nombre_local = :nombre_local,
                                    capacidad_local = :capacidad_local,
                                    recursos_local = :recursos_local
                                    WHERE id_inmueble = :id_inmueble";
                
                    $this->db->query($queryLocal);
                    $this->db->bind(':nombre_local', $editarInmueble['nombre_local']); 
                    $this->db->bind(':capacidad_local', $editarInmueble['capacidad_local']); 
                    $this->db->bind(':recursos_local', $editarInmueble['recursos_local']); 
                    $this->db->bind(':id_inmueble', $editarInmueble['id_inmueble']);
                    $this->db->execute();
                } elseif (isset($editarInmueble['habitaciones_vivienda'])) {
                    $queryVivienda = "UPDATE vivienda SET
                                        habitaciones_vivienda = :habitaciones_vivienda,
                                        tipo_vivienda = :tipo_vivienda
                                        WHERE id_inmueble = :id_inmueble";
                
                    $this->db->query($queryVivienda);
                    $this->db->bind(':habitaciones_vivienda', $editarInmueble['habitaciones_vivienda']); 
                    $this->db->bind(':tipo_vivienda', $editarInmueble['tipo_vivienda']); 
                    $this->db->bind(':id_inmueble', $editarInmueble['id_inmueble']);
                    $this->db->execute();
                }
                $_SESSION['correcto_message']="Se ha podido editar inmueble";
            }catch(PDOException $e){
                $_SESSION['error_message']="No se ha podido editar inmueble";
            }
        }


        public function editarNegocioAdmin($editarNegocio) {
            try{
                if (isset($editarNegocio['titulo_oferta'])) {
                $queryOferta = "UPDATE oferta SET
                                titulo_oferta = :titulo_oferta,
                                fecha_inicio_oferta = :fecha_inicio_oferta,
                                fecha_fin_oferta = :fecha_fin_oferta,
                                condiciones_oferta = :condiciones_oferta,
                                descripcion_oferta = :descripcion_oferta,
                                fecha_publicacion_oferta = :fecha_publicacion_oferta
                                WHERE id_oferta IN (SELECT id_oferta FROM negocio WHERE id_negocio = :id_negocio)";
            
                $this->db->query($queryOferta);
                $this->db->bind(':titulo_oferta', $editarNegocio['titulo_oferta']);
                $this->db->bind(':fecha_inicio_oferta', $editarNegocio['fecha_inicio_oferta']);
                $this->db->bind(':fecha_fin_oferta', $editarNegocio['fecha_fin_oferta']);
                $this->db->bind(':condiciones_oferta', $editarNegocio['condiciones_oferta']);
                $this->db->bind(':descripcion_oferta', $editarNegocio['descripcion_oferta']);
                $this->db->bind(':fecha_publicacion_oferta', $editarNegocio['fecha_publicacion_oferta']);
                $this->db->bind(':id_negocio', $editarNegocio['id_negocio']);
                $this->db->execute();
                }
                $queryNegocio = "UPDATE negocio SET
                motivo_traspaso_negocio = :motivo_traspaso_negocio,
                coste_traspaso_negocio = :coste_traspaso_negocio,
                coste_mensual_negocio = :coste_mensual_negocio,
                descripcion_negocio = :descripcion_negocio,
                capital_minimo_negocio = :capital_minimo_negocio,
                id_entidad = :id_entidad
                WHERE id_negocio = :id_negocio";

                $this->db->query($queryNegocio);
                $this->db->bind(':motivo_traspaso_negocio', $editarNegocio['motivo_traspaso_negocio']);
                $this->db->bind(':coste_traspaso_negocio', $editarNegocio['coste_traspaso_negocio']);
                $this->db->bind(':coste_mensual_negocio', $editarNegocio['coste_mensual_negocio']);
                $this->db->bind(':descripcion_negocio', $editarNegocio['descripcion_negocio']);
                $this->db->bind(':capital_minimo_negocio', $editarNegocio['capital_minimo_negocio']);
                $this->db->bind(':id_entidad', $editarNegocio['id_entidad']);
                $this->db->bind(':id_negocio', $editarNegocio['id_negocio']);
                $this->db->execute();

                if (!empty($editarNegocio['local_id_inmueble'])) {
                    $queryLocal = "UPDATE local SET
                                    nombre_local = :nombre_local,
                                    capacidad_local = :capacidad_local,
                                    recursos_local = :recursos_local
                                    WHERE id_local = :local_id_inmueble";
            
                    $this->db->query($queryLocal);
                    $this->db->bind(':nombre_local', $editarNegocio['nombre_local']);
                    $this->db->bind(':capacidad_local', $editarNegocio['capacidad_local']);
                    $this->db->bind(':recursos_local', $editarNegocio['recursos_local']);
                    $this->db->bind(':local_id_inmueble', $editarNegocio['local_id_inmueble']);
                    //print_r($editarNegocio);
                    //exit();
                    $this->db->execute();
                }
                $_SESSION['correcto_message']="Se ha podido editar negocio";
            }catch(PDOException $e){
                $_SESSION['error_message']="No se ha podido editar negocio";
            }
            
            }
                    
                    

        //Funcion Añadir valoracion Negocio
        public function anadirValoracionNegocio($valoracionNegocio) {
            try{
                $id_usuario = $valoracionNegocio['id_usuario'];
                $id_negocio = $valoracionNegocio['id_negocio'];
                $puntuacion = $valoracionNegocio['puntuacion'];
                $descripcion = $valoracionNegocio['descripcion'];
                $fecha_valoracion = $valoracionNegocio['fecha_valoracion'];
            
                $this->db->query("INSERT INTO `valorar_negocio`(`id_usuario`, `id_negocio`, `puntuacion`, `descripcion`, `fecha_valoracion`) 
                                VALUES (:id_usuario, :id_negocio, :puntuacion, :descripcion, :fecha_valoracion)");
            
                $this->db->bind(':id_usuario', $id_usuario);
                $this->db->bind(':id_negocio', $id_negocio);
                $this->db->bind(':puntuacion', $puntuacion);
                $this->db->bind(':descripcion', $descripcion);
                $this->db->bind(':fecha_valoracion', $fecha_valoracion);
            
                $this->db->execute();
                $_SESSION['correcto_message']="Se ha podido insertar la valoracion al negocio";
            }catch(PDOException $e){
                $_SESSION['error_message']="No se ha podido insertar la valoracion al negocio";
            }
        }

        //Funcion Añadir valoracion Negocio
        public function anadirValoracionInmueble($valoracionInmueble) {
            try{
                $id_inmueble = $valoracionInmueble['id_inmueble'];
                $fecha_valoracion_inm = $valoracionInmueble['fecha_valoracion_inm'];
                $puntuacion_inm = $valoracionInmueble['puntuacion_inm'];
                $comentario_inm = $valoracionInmueble['comentario_inm'];
                $id_usuario = $valoracionInmueble['id_usuario'];
            
                $this->db->query("INSERT INTO `valorar_inmueble`(`id_inmueble`, `fecha_valoracion_inm`, `puntuacion_inm`, `comentario_inm`, `id_usuario`) 
                                VALUES (:id_inmueble, :fecha_valoracion_inm, :puntuacion_inm, :comentario_inm, :id_usuario)");
            
                $this->db->bind(':id_inmueble', $id_inmueble);
                $this->db->bind(':fecha_valoracion_inm', $fecha_valoracion_inm);
                $this->db->bind(':puntuacion_inm', $puntuacion_inm);
                $this->db->bind(':comentario_inm', $comentario_inm);
                $this->db->bind(':id_usuario', $id_usuario);
            
                $this->db->execute();
                $_SESSION['correcto_message']="Se ha podido insertar la valoracion al inmueble";
            }catch(PDOException $e){
                $_SESSION['error_message']="No se ha podido insertar la valoracion al inmueble";
            }
        }



        public function DesactivarUsuarioAdmin($idUsuario) {
            try {
                $this->db->query("UPDATE `usuario` SET `activo_usuario`=0 WHERE `id_usuario` = :idUsuario;");
                $this->db->bind(':idUsuario', $idUsuario);
                $this->db->execute();
        
                $_SESSION['correcto_message'] = 'El usuario se ha desactivado correctamente';
            } catch (PDOException $e) {
                $_SESSION['error_message'] = 'Fallo al desactivar usuario.' . $e->getMessage();
            }
        }
        

        public function ActivarUsuarioAdmin($idUsuario) {
            try {
                $this->db->query("UPDATE `usuario` SET `activo_usuario`=1 WHERE `id_usuario` = :idUsuario;");
                $this->db->bind(':idUsuario', $idUsuario);
                $this->db->execute();
        
                $_SESSION['correcto_message'] = 'El usuario se ha activado correctamente';
            } catch (PDOException $e) {
                $_SESSION['error_message'] = 'Fallo al activar usuario.' . $e->getMessage();
            }
        }
        
        

        public function DesactivarNegocioAdmin($idNegocio) {
            try {
                $this->db->query("UPDATE `negocio` SET `activo_negocio` = 0 WHERE `id_negocio` = :idNegocio");
                $this->db->bind(':idNegocio', $idNegocio);
                $this->db->execute();
        
                $_SESSION['correcto_message'] = 'El negocio se ha desactivado correctamente';
            } catch (PDOException $e) {
                $_SESSION['error_message'] = 'Fallo al desactivar negocio.' . $e->getMessage();
            }
        }

        public function ActivarNegocioAdmin($idNegocio) {
            try {
                $this->db->query("UPDATE `negocio` SET `activo_negocio` = 1 WHERE `id_negocio` = :idNegocio");
                $this->db->bind(':idNegocio', $idNegocio);
                $this->db->execute();
        
                $_SESSION['correcto_message'] = 'El negocio se ha activado correctamente';
            } catch (PDOException $e) {
                $_SESSION['error_message'] = 'Fallo al activar negocio.' . $e->getMessage();
            }
        }
        

        public function DesactivarInmuebleAdmin($idInmueble) {
            try {
                $this->db->query("UPDATE `inmueble` SET `activo_inmueble`=0 WHERE `id_inmueble` = :idInmueble;");
                $this->db->bind(':idInmueble', $idInmueble);
                $this->db->execute();
        
                $_SESSION['correcto_message'] = 'El inmueble se ha desactivado correctamente';
            } catch (PDOException $e) {
                $_SESSION['error_message'] = 'Fallo al desactivar inmueble.' . $e->getMessage();
            }
        }
        
        public function ActivarInmuebleAdmin($idInmueble) {
            try {
                $this->db->query("UPDATE `inmueble` SET `activo_inmueble`=1 WHERE `id_inmueble` = :idInmueble;");
                $this->db->bind(':idInmueble', $idInmueble);
                $this->db->execute();
        
                $_SESSION['correcto_message'] = 'El inmueble se ha activado correctamente';
            } catch (PDOException $e) {
                $_SESSION['error_message'] = 'Fallo al activar inmueble.' . $e->getMessage();
            }
        }
        
        
        
        public function eliminarServicioAdmin($id_servicio) {
            try {
                $this->db->query("DELETE FROM `servicio` WHERE `id_servicio` = :id_servicio");
                $this->db->bind(':id_servicio', $id_servicio);
                $this->db->execute();
        
                $_SESSION['correcto_message'] = 'El servicio se ha eliminado correctamente';
            } catch (PDOException $e) {
                $_SESSION['error_message'] = 'Fallo al eliminar servicio.' . $e->getMessage();
            }
        }

        public function eliminarValoracionInm($id_valoracion_inmueble) {
            try {
                $this->db->query("DELETE FROM `valorar_inmueble` WHERE `id_valoracion_inmueble` = :id_valoracion_inmueble");
                $this->db->bind(':id_valoracion_inmueble', $id_valoracion_inmueble);
                $this->db->execute();
        
                $_SESSION['correcto_message'] = 'La valoracion se ha eliminado correctamente';
            } catch (PDOException $e) {
                $_SESSION['error_message'] = 'Fallo al eliminar valoracion.' . $e->getMessage();
            }
        }

        public function eliminarValoracionNeg($id_valoracion_negocio) {
            try {
                $this->db->query("DELETE FROM `valorar_negocio` WHERE `id_valoracion_negocio` = :id_valoracion_negocio");
                $this->db->bind(':id_valoracion_negocio', $id_valoracion_negocio);
                $this->db->execute();
        
                $_SESSION['correcto_message'] = 'La valoracion se ha eliminado correctamente';
            } catch (PDOException $e) {
                $_SESSION['error_message'] = 'Fallo al eliminar valoracion.' . $e->getMessage();
            }
        }

        
        

        public function eliminarentidad($id){

            try{
                $this->db->query( "DELETE FROM `entidad` WHERE `id_entidad`=:id;");

                $this->db->bind(':id', $id);
            
                $this->db->execute();
                $_SESSION['correcto_message'] = 'La entidad se ha eliminado correctamente';

            } catch (PDOException $e) {
                $_SESSION['error_message'] = 'No se a podido eliminar la entidad';
            }
        }

        public function eliminarUsuarioEntidad($id_usuario){

            try{
                $this->db->query( "DELETE FROM `usuario_entidad` WHERE `id_usuario`=:id_usuario;");

                $this->db->bind(':id_usuario', $id_usuario);
            
                $this->db->execute();
                $_SESSION['correcto_message'] = 'El usuario se ha eliminado';

            } catch (PDOException $e) {
                $_SESSION['error_message'] = 'No se a podido eliminar el usuario';
            }
        }

        public function eliminarUsuarioOferta($idUsuario, $idOferta) {
            try {
                $this->db->query("DELETE FROM `usuario_oferta` WHERE `id_usuario` = :idUsuario AND `id_oferta` = :idOferta");
        
                $this->db->bind(':idUsuario', $idUsuario);
                $this->db->bind(':idOferta', $idOferta);
        
                $this->db->execute();
                $_SESSION['correcto_message'] = 'La inscripcion se ha anulado';
            } catch (PDOException $e) {
                $_SESSION['error_message'] = 'No se ha podido eliminar inscripcioneliminarusuario';
            }
        }
        
        

        public function avisoUsuario($aviso){
            try{
                $titulo_aviso = $aviso['titulo_aviso'];
                $contenido_aviso = $aviso['contenido_aviso'];
                $fecha_creacion_aviso = $aviso['fecha_creacion_aviso'];
                $id_usuario = $aviso['id_usuario'];
            
                $this->db->query("INSERT INTO `aviso`(`titulo_aviso`, `contenido_aviso`, `fecha_creacion_aviso`, `id_usuario`) 
                                VALUES ( :titulo_aviso, :contenido_aviso, :fecha_creacion_aviso, :id_usuario)");
            
            
                $this->db->bind(':titulo_aviso', $titulo_aviso);
                $this->db->bind(':contenido_aviso', $contenido_aviso);
                $this->db->bind(':fecha_creacion_aviso', $fecha_creacion_aviso);
                $this->db->bind(':id_usuario', $id_usuario);
            
                $this->db->execute();
                $_SESSION['correcto_message']="Se ha podido insertar el aviso al usuario";
            }catch(PDOException $e){
                $_SESSION['error_message']="No se ha podido insertar el aviso al usuario";
            }
           
        }

        public function anadirUsuarioEntidad($usuarioEntidad){
            try{
                $id_usuario = $usuarioEntidad['id_usuario'];
                $id_entidad = $usuarioEntidad['id_entidad'];
                $rol = $usuarioEntidad['rol'];
            
            
                $this->db->query("INSERT INTO `usuario_entidad`(`id_usuario`, `id_entidad`, `rol`) 
                                VALUES ( :id_usuario, :id_entidad, :rol)");
            
            
                $this->db->bind(':id_usuario', $id_usuario);
                $this->db->bind(':id_entidad', $id_entidad);
                $this->db->bind(':rol', $rol);
            
                $this->db->execute();
                $_SESSION['correcto_message']="Se ha podido insertar el usuario a la entidad";
            }catch(PDOException $e){
                $_SESSION['error_message']="No se ha podido insertar el usuario a la entidad";
            }
           
        }


        public function UsuarioOferta($usuarioOferta) {
            try{
                $id_usuario = $usuarioOferta['id_usuario'];
                $id_oferta = $usuarioOferta['id_oferta'];
            
                $this->db->query("INSERT INTO `usuario_oferta`(`id_usuario`, `id_oferta`) 
                                VALUES (:id_usuario, :id_oferta)");
            
                $this->db->bind(':id_usuario', $id_usuario);
                $this->db->bind(':id_oferta', $id_oferta);
            
                $this->db->execute();
                $_SESSION['correcto_message']="Se ha podido insertar el usuario a la oferta";
            }catch(PDOException $e){
                $_SESSION['error_message']="No se ha podido insertar el usuario a la oferta";
            }
        }

    }