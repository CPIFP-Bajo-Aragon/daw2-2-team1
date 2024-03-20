<?php

class Inicio extends Controlador {
    private $SesionModelo;

    public function __construct() {
        session_start();
    }

    public function index() {
       
        $this->vista('pagina_inicio');    }

    public function ofertas() {
        $this->vista('ofertas/ofertas');
    }

    public function contactar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contactar['nombre'] = $_POST['nombre'];
            $contactar['correo'] = $_POST['correo'];
            $contactar['telefono'] = $_POST['telefono'];
            $contactar['mensaje'] = $_POST['mensaje'];
    
            Mailer::contactar($contactar['nombre'], $contactar['correo'], $contactar['telefono'], $contactar['mensaje']);
    
            echo 'El formulario ha sido enviado correctamente';
    
            $this->vista('pagina_inicio');
        }
    }
    

   
}