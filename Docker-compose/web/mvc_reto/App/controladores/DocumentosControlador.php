<?php

    class DocumentosControlador extends Controlador{

        private $DocumentosModelo;
        private $usuario;
        public $datos;



        public function __construct(){
            session_start();
            $this->DocumentosModelo = $this->modelo('DocumentosModelo');
            $this->usuario = $this->modelo('UserModelo');
            $this->datos['usuarioSesion']=$_SESSION['usuarioSesion'];
        }
        public function index(){   
            $this->vista('subir/documentos');
        }

        public function subir() {   
            $id = $this->datos['usuarioSesion']['id_usuario'];
            $directorio =  $_SERVER['DOCUMENT_ROOT'] . '/public/archivos/usuario_'.$id.'/';
        
            if (!file_exists($directorio)) {
                mkdir($directorio, 0777, true);
            }
        
            $uploadDirectory = $directorio;
        print_r($_FILES['archivo']);
            if (!empty($_FILES['archivo']['name'])) {
                $files = $_FILES['archivo'];
                print_r($files);
                foreach ($files['tmp_name'] as $key => $tempFile) {
                    $fileName = $files['name'][$key];
                    $targetFile = $uploadDirectory . time() . '_aa' . $fileName;
                
                    move_uploaded_file($tempFile, $targetFile);
                }
                
        
                echo 'Archivos subidos con éxito.';
            } else {
                echo 'Error al subir los archivos.';
            }
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

        
    }