<?php

            // require __DIR__ . '/mailer/src/PHPMailer.php';
            // require __DIR__ . '/mailer/src/SMTP.php';
            // require __DIR__ . '/mailer/src/Exception.php';
            // use PHPMailer\PHPMailer\PHPMailer;



Class Mailer {  
  function __construct() {
  }



  public static function sendEmail($dest, $name) {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->isSMTP();
    $mail->Host = 'in-v3.mailjet.com';
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->Username = '7cf95e08fc79e0eb7ef9a3446e3b2e79';
    $mail->Password = '12fc003f9c54489ed67a3b3a16e4aeb5';
    $mail->SMTPKeepAlive = true;
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; 

    $mail->setFrom('revitalizona@gmail.com', 'Comarca del Bajo Aragon');
    $mail->Subject = "Tienes una nueva notificacion de la plataforma.";

    $userEmail = $dest;
    $userName = $name;

    $mail->addAddress($userEmail, $userName);

    $mail->Body = "<h2>¡Hola, {$userName}!</h2> <p>Tu cuenta ha sido creada con exito.</p>";
    $mail->AltBody = "Hello, {$userName}! \n How are you?";
    try {
        $mail->send();
    } catch (Exception $e) {
    }
    $mail->clearAddresses();
    $mail->smtpClose();
  }


  public static function recuperar($email, $contrasena)
{
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'in-v3.mailjet.com';
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->Username = '7cf95e08fc79e0eb7ef9a3446e3b2e79';
    $mail->Password = '12fc003f9c54489ed67a3b3a16e4aeb5';
    $mail->SMTPKeepAlive = true;

    $mail->setFrom('revitalizona@gmail.com', 'Comarca del Bajo Aragon');
    $mail->addAddress($email);

    $mail->Subject = "Cambio de Contraseña";
    $mail->isHTML(true);

    $mail->Body = "<p>Tu contraseña ha sido cambiada.</p> <p>Tu nueva contraseña es: $contrasena</p>";

    try {
        $mail->send();
    } catch (Exception $e) {
    }
}

public static function Notificacion($email, $Titulo, $Contenido)
{
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'in-v3.mailjet.com';
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->Username = '7cf95e08fc79e0eb7ef9a3446e3b2e79';
    $mail->Password = '12fc003f9c54489ed67a3b3a16e4aeb5';
    $mail->SMTPKeepAlive = true;

    $mail->setFrom('revitalizona@gmail.com', 'Comarca del Bajo Aragon');
    $mail->addAddress($email);

    $mail->Subject = $Titulo;
    $mail->isHTML(true);

    $mail->Body = $Contenido;

    try {
        $mail->send();
    } catch (Exception $e) {
    }
}

public static function contactar($nombre, $correo, $telefono, $mensaje)
{
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'in-v3.mailjet.com';
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->Username = '7cf95e08fc79e0eb7ef9a3446e3b2e79';
    $mail->Password = '12fc003f9c54489ed67a3b3a16e4aeb5';
    $mail->SMTPKeepAlive = true;

    $mail->setFrom($correo, 'Comarca del Bajo Aragon');
    $mail->addAddress('revitalizona@gmail.com'); 

    $mail->Subject = 'Asunto del correo';
    $mail->isHTML(true);

    $mail->Body = $mensaje;

    try {
        $mail->send();
    } catch (Exception $e) {
    }
}

  
  

}