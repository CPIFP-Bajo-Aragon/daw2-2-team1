<?php

    class DocumentosControlador extends Controlador{

        private $DocumentosModelo;

        public function __construct(){
            session_start();
            $this->EntidadesModelo = $this->modelo('DocumentosModelo');
            $this->admin = $this->modelo('AdminModelo');
            $this->datos['admin'] = $this->admin->ListarAdmins();

            $this->usuario = $this->modelo('UserModelo');
            $datos['nif']=$_SESSION['usuarioSesion']['NIF'];
            
            $this->datos['noti'] = $this->usuario->listarnotificaciones($datos);
            $this->datos['chats'] = $this->usuario->listaruserchat($datos);
            
            if (!isset($_SESSION["usuarioSesion"]) || empty($_SESSION["usuarioSesion"]) || $_SESSION["usuarioSesion"]["admin"]==0) {
                redirecionar(RUTA_URL.'/');
            }
        }
        public function index(){   
            $this->vista('subir/documentos');
        }

        public function nominas(){   
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $carpeta_destino = 'archivos/nomina/';
                    if (!file_exists($carpeta_destino)) {
                        mkdir($carpeta_destino, 0777, true);
                    }

                    if (isset($_FILES['archivo'])) {
                        $archivo = $_FILES['archivo'];
                        $id= $_SESSION['usuarioSesion']['NIF'];
                        $nom= $_SESSION['usuarioSesion']['nombre'];


                        $nombre_temporal = $archivo['tmp_name'];
                        $nombre_archivo = $archivo['name'];
                        $nombre_destino = $carpeta_destino.$id.'_'.$nombre_archivo;
                        move_uploaded_file($nombre_temporal, $nombre_destino);
                    
                    }
                }
                $this->vista('subir/nominas' , $this->datos);
            
        }

        public function descargarNominas($nombreArchivo) {
            $ruta_archivo = 'archivos/nomina/' . $nombreArchivo;
        
            if (file_exists($ruta_archivo)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename=' . basename($ruta_archivo));
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($ruta_archivo));
                readfile($ruta_archivo);
                exit;
            } else {
                // Manejar caso de archivo no encontrado
                echo "Archivo no encontrado";
            }
        }

        

        public function curriculum(){   
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $carpeta_destino = 'archivos/curriculum/';
                    if (!file_exists($carpeta_destino)) {
                        mkdir($carpeta_destino, 0777, true);
                    }

                    if (isset($_FILES['archivo'])) {
                        $archivo = $_FILES['archivo'];
                        $id= $_SESSION['usuarioSesion']['NIF'];


                        $nombre_temporal = $archivo['tmp_name'];
                        $nombre_archivo = $archivo['name'];
                        $nombre_destino = $carpeta_destino . $id.'_' .$nombre_archivo;
                        move_uploaded_file($nombre_temporal, $nombre_destino);
                    
                    }
            }
                $this->vista('subir/curriculum', $this->datos);
            
        }

        public function descargarCurriculum($nombreArchivo) {
            $ruta_archivo = 'archivos/curriculum/' . $nombreArchivo;
        
            if (file_exists($ruta_archivo)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename=' . basename($ruta_archivo));
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($ruta_archivo));
                readfile($ruta_archivo);
                exit;
            } else {
                // Manejar caso de archivo no encontrado
                echo "Archivo no encontrado";
            }
        }
    }