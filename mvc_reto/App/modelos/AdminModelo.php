<?php

    class AdminModelo{
        private $db;
        


        public function __construct(){
            $this->db = new Base;
        }

        public function verInmuebles() {
            $this->db->query("SELECT * FROM `inmueble` ");
            return $this->db->registros(); 
        }

        public function verNegocios() {
            $this->db->query("SELECT * FROM `negocio` ");
            return $this->db->registros(); 
        }

        public function verUsuarios() {
            $this->db->query("SELECT * FROM `usuario` ");
            return $this->db->registros(); 
        }

        public function verServicios() {
            $this->db->query("SELECT * FROM `servicio` ");
            return $this->db->registros(); 
        }

       

       
        public function anadirInmuebleAdmin($inmueble) {
            $metros_caudrados_inmueble = $inmueble['metros_caudrados_inmueble'];
            $descripcion_inmueble = $inmueble['descripcion_inmueble'];
            $distribucion_inmueble = $inmueble['distribucion_inmueble'];
            $precio_inmueble = $inmueble['precio_inmueble'];
            $direccion_inmueble = $inmueble['direccion_inmueble'];
            $cracteristicas_imueble = $inmueble['cracteristicas_imueble'];
            $equipamento_inmueble = $inmueble['equipamento_inmueble'];
            $latitud_inmueble = $inmueble['latitud_inmueble'];
            $longitud_inmueble = $inmueble['longitud_inmueble'];
            $id_muncipio = $inmueble['id_muncipio'];
            $id_estado = $inmueble['id_estado'];


            $this->db->query("INSERT INTO `inmueble`(`metros_caudrados_inmueble`, `descripcion_inmueble`, `distribucion_inmueble`, `precio_inmueble`, `direccion_inmueble`,  `cracteristicas_imueble`,  `equipamento_inmueble`,  `latitud_inmueble`,  `longitud_inmueble`,  `id_muncipio`,  `id_estado`) 
                            VALUES (:metros_caudrados_inmueble, :descripcion_inmueble, :distribucion_inmueble, :precio_inmueble, :direccion_inmueble, :cracteristicas_imueble, :equipamento_inmueble, :latitud_inmueble, :longitud_inmueble, :id_muncipio, :id_estado)");
        
            $this->db->bind(':metros_caudrados_inmueble', $metros_caudrados_inmueble);
            $this->db->bind(':descripcion_inmueble', $descripcion_inmueble);
            $this->db->bind(':distribucion_inmueble', $distribucion_inmueble);
            $this->db->bind(':precio_inmueble', $precio_inmueble);
            $this->db->bind(':direccion_inmueble', $direccion_inmueble);
            $this->db->bind(':cracteristicas_imueble', $cracteristicas_imueble);
            $this->db->bind(':equipamento_inmueble', $equipamento_inmueble);
            $this->db->bind(':latitud_inmueble', $latitud_inmueble);
            $this->db->bind(':longitud_inmueble', $longitud_inmueble);
            $this->db->bind(':id_muncipio', $id_muncipio);
            $this->db->bind(':id_estado', $id_estado);

        
            $this->db->execute();
        }

        public function anadirNegocioAdmin($negocio) {
            $id_negocio = $negocio['id_negocio'];
            $titulo_negocio = $negocio['titulo_negocio'];
            $motivo_traspaso_negocio = $negocio['motivo_traspaso_negocio'];
            $coste_traspaso_negocio = $negocio['coste_traspaso_negocio'];
            $coste_mensual_negocio = $negocio['coste_mensual_negocio'];
            $descripcion_negocio = $negocio['descripcion_negocio'];
            $capital_minimo_negocio = $negocio['capital_minimo_negocio'];

        
            $this->db->query("INSERT INTO `negocio`(`id_negocio`, `titulo_negocio`, `motivo_traspaso_negocio`, `coste_traspaso_negocio`, `coste_mensual_negocio`,  `descripcion_negocio`, `capital_minimo_negocio`) 
                            VALUES (:id_negocio, :titulo_negocio, :motivo_traspaso_negocio, :coste_traspaso_negocio, :coste_mensual_negocio, :descripcion_negocio, :capital_minimo_negocio)");
        
            $this->db->bind(':id_negocio', $id_negocio);
            $this->db->bind(':titulo_negocio', $titulo_negocio);
            $this->db->bind(':motivo_traspaso_negocio', $motivo_traspaso_negocio);
            $this->db->bind(':coste_traspaso_negocio', $coste_traspaso_negocio);
            $this->db->bind(':coste_mensual_negocio', $coste_mensual_negocio);
            $this->db->bind(':descripcion_negocio', $descripcion_negocio);
            $this->db->bind(':capital_minimo_negocio', $capital_minimo_negocio);

        
            $this->db->execute();
        }
        
        public function ListarAdmins(){
            $this->db->query("SELECT * FROM `usuario` 
                                INNER JOIN usuario_has_rol on usuario_has_rol.id_usuario=usuario.id_usuario 
                                INNER join rol on rol.id_rol=usuario_has_rol.id_rol 
                              WHERE rol.nombre_rol='administrador';"
                            );
            return $this->db->registros(); 
        }


        public function anadirUsuarioAdmin($usuario) {
            $NIF = $usuario['nif'];
            $nombre_usuario = $usuario['nombre_usuario'];
            $apellido = $usuario['apellidos_usuario'];
            $apellidos_usuario = $usuario['correo_usuario'];
            $contrasena_usuario = $usuario['contrasena_usuario'];
            $fecha_nacimiento_usuario = $usuario['fecha_nacimiento_usuario'];
            $telefono_usuario = $usuario['telefono_usuario'];
        
            $this->db->query("INSERT INTO `usuario`(`nif`, `nombre_usuario`, `apellidos_usuario`, `correo_usuario`, `contrasena_usuario`,  `fecha_nacimiento_usuario`, `telefono_usuario`) 
                            VALUES (:nif, :nombre_usuario, :apellidos_usuario, :correo_usuario, :contrasena_usuario, :fecha_nacimiento_usuario, :telefono_usuario)");
        
            $this->db->bind(':nif', $nif);
            $this->db->bind(':nombre_usuario', $nombre_usuario);
            $this->db->bind(':apellidos_usuario', $apellidos_usuario);
            $this->db->bind(':correo_usuario', $correo_usuario);
            $this->db->bind(':contrasena_usuario', $contrasena_usuario);
            $this->db->bind(':fecha_nacimiento_usuario', $fecha_nacimiento_usuario);
            $this->db->bind(':telefono_usuario', $telefono_usuario);

        
            $this->db->execute();
        }
        
        public function anadirServicioAdmin($servicio) {
            $nombre_servicio = $servicio['nombre_servicio'];
            $descripcion_servicio = $servicio['descripcion_servicio'];
            $id_tipo_servicio = $servicio['id_tipo_servicio'];
            $id_municipio = $servicio['id_municipio'];
            $longitud_servicio = $servicio['longitud_servicio'];
            $latitud_servicio = $servicio['latitud_servicio'];
            $telefono_servicio = $servicio['telefono_servicio'];
            $direccion_servicio = $servicio['direccion_servicio'];


        
            $this->db->query("INSERT INTO `servicio`(`nombre_servicio`, `descripcion_servicio`, `id_tipo_servicio`, `id_municipio`, `longitud_servicio`,  `latitud_servicio`, `telefono_servicio`, `direccion_servicio`) 
                            VALUES (:nombre_servicio, :descripcion_servicio, :id_tipo_servicio, :id_municipio, :longitud_servicio, :latitud_servicio, :telefono_servicio, :direccion_servicio)");
        
            $this->db->bind(':nombre_servicio', $nombre_servicio);
            $this->db->bind(':descripcion_servicio', $descripcion_servicio);
            $this->db->bind(':id_tipo_servicio', $id_tipo_servicio);
            $this->db->bind(':id_municipio', $id_municipio);
            $this->db->bind(':longitud_servicio', $longitud_servicio);
            $this->db->bind(':latitud_servicio', $latitud_servicio);
            $this->db->bind(':telefono_servicio', $telefono_servicio);
            $this->db->bind(':direccion_servicio', $direccion_servicio);


        
            $this->db->execute();
        }

        

    }