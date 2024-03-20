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
    $mail->Subject = "Tienes un nuevo aviso de la plataforfa.";

    $userEmail = $dest;
    $userName = $name;

    $mail->addAddress($userEmail, $userName);

    $mail->Body = "<h2>¡Hola, {$userName}!</h2> <p>Tu cuenta ha sido creada con exito.</p>";
    $mail->AltBody = "Hello, {$userName}! \n How are you?";
    try {
        $mail->send();
        echo "Message sent to: ({$userEmail}) {$mail->ErrorInfo}\n";
    } catch (Exception $e) {
        echo "Mailer Error ({$userEmail}) {$mail->ErrorInfo}\n";
    }
    $mail->clearAddresses();
    $mail->smtpClose();
  }

}