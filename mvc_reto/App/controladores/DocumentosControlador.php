<?php

    class DocumentosControlador extends Controlador{

        private $DocumentosModelo;

        public function __construct(){
            session_start();
            $this->EntidadesModelo = $this->modelo('DocumentosModelo');

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
                        $nombre_archivo = $id."_".$nom."_".$archivo['name'];
                        $nombre_destino = $carpeta_destino . $nombre_archivo;
                        move_uploaded_file($nombre_temporal, $nombre_destino);
                    
                    }
                $this->vista('subir/nominas');
            }else{
                $this->vista('subir/nominas');
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
                        $nom= $_SESSION['usuarioSesion']['nombre'];


                        $nombre_temporal = $archivo['tmp_name'];
                        $nombre_archivo = $id."_".$nom."_".$archivo['name'];
                        $nombre_destino = $carpeta_destino . $nombre_archivo;
                        move_uploaded_file($nombre_temporal, $nombre_destino);
                    
                    }
                $this->vista('subir/curriculum');
            }else{
                $this->vista('subir/curriculum');
            }
        }
    }