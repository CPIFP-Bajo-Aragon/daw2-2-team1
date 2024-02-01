<?php

    class AdminModelo{
        private $db;
        


        public function __construct(){
            $this->db = new Base;
        }

        public function verInmuebles() {
            $this->db->query("SELECT * FROM `INMUEBLE` ");
            return $this->db->registros(); 
        }

        public function verNegocios() {
            $this->db->query("SELECT * FROM `NEGOCIO` ");
            return $this->db->registros(); 
        }

        public function verUsuarios() {
            $this->db->query("SELECT * FROM `USUARIO` ");
            return $this->db->registros(); 
        }

       
        public function anadirInmuebleAdmin($inmueble) {
            $tipo_oferta = $inmueble['tipo_oferta'];
            $fecha_inicio = $inmueble['fecha_inicio'];
            $fecha_fin = $inmueble['fecha_fin'];
            $condiciones = $inmueble['condiciones'];
            $fecha_publicacion = $inmueble['fecha_publicacion'];
            $tipo = $inmueble['tipo'];
        
            $this->db->query("INSERT INTO `OFERTA`(`tipo_oferta`, `fecha_inicio`, `fecha_fin`, `condiciones`, `fecha_publicacion`,  `tipo`) 
                            VALUES (:tipo_oferta, :fecha_inicio, :fecha_fin, :condiciones, :fecha_publicacion, :tipo)");
        
            $this->db->bind(':tipo_oferta', $tipo_oferta);
            $this->db->bind(':fecha_inicio', $fecha_inicio);
            $this->db->bind(':fecha_fin', $fecha_fin);
            $this->db->bind(':condiciones', $condiciones);
            $this->db->bind(':fecha_publicacion', $fecha_publicacion);
            $this->db->bind(':tipo', $tipo);
        
            $this->db->execute();
        }

        public function anadirNegocioAdmin($negocio) {
            $codigo_negocio = $negocio['codigo_negocio'];
            $titulo = $negocio['titulo'];
            $motivo_traspaso = $negocio['motivo_traspaso'];
            $coste_traspaso = $negocio['coste_traspaso'];
            $coste_mensual = $negocio['coste_mensual'];
            $ubicacion = $negocio['ubicacion'];
            $descripcion = $negocio['descripcion'];
            $capital_minimo = $negocio['capital_minimo'];

        
            $this->db->query("INSERT INTO `NEGOCIO`(`codigo_negocio`, `titulo`, `motivo_traspaso`, `coste_traspaso`, `coste_mensual`, `ubicacion`,  `descripcion`, `capital_minimo`) 
                            VALUES (:codigo_negocio, :titulo, :motivo_traspaso, :coste_traspaso, :coste_mensual, :ubicacion, :descripcion, :capital_minimo)");
        
            $this->db->bind(':codigo_negocio', $codigo_negocio);
            $this->db->bind(':titulo', $titulo);
            $this->db->bind(':motivo_traspaso', $motivo_traspaso);
            $this->db->bind(':coste_traspaso', $coste_traspaso);
            $this->db->bind(':coste_mensual', $coste_mensual);
            $this->db->bind(':ubicacion', $ubicacion);
            $this->db->bind(':descripcion', $descripcion);
            $this->db->bind(':capital_minimo', $capital_minimo);

        
            $this->db->execute();
        }
        
        public function ListarAdmins(){
            $this->db->query("SELECT * FROM `USUARIO` INNER JOIN ADMINISTRADOR on ADMINISTRADOR.NIF=USUARIO.NIF ");
            return $this->db->registros(); 
        }


        public function anadirUsuarioAdmin($usuario) {
            $NIF = $usuario['NIF'];
            $nombre = $usuario['nombre'];
            $apellido = $usuario['apellido'];
            $correo = $usuario['correo'];
            $contrasena = $usuario['contrasena'];
            $id_municipio = $usuario['id_municipio'];
        
            $this->db->query("INSERT INTO `USUARIO`(`NIF`, `nombre`, `apellido`, `correo`, `contrasena`,  `id_municipio`) 
                            VALUES (:NIF, :nombre, :apellido, :correo, :contrasena, :id_municipio)");
        
            $this->db->bind(':NIF', $NIF);
            $this->db->bind(':nombre', $nombre);
            $this->db->bind(':apellido', $apellido);
            $this->db->bind(':correo', $correo);
            $this->db->bind(':contrasena', $contrasena);
            $this->db->bind(':id_municipio', $id_municipio);
        
            $this->db->execute();
        }
        


    }