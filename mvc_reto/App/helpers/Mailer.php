<?php

            // require __DIR__ . '/mailer/src/PHPMailer.php';
            // require __DIR__ . '/mailer/src/SMTP.php';
            // require __DIR__ . '/mailer/src/Exception.php';
            // use PHPMailer\PHPMailer\PHPMailer;



Class Mailer {  
  function __construct() {
  }

  // public static function sendEmail($dest, $name) {
    
  //   $mail = new PHPMailer();
  //       $mail->isSMTP();
  //       $mail->Host = 'in-v3.mailjet.com';
  //       $mail->SMTPAuth = true;
  //       $mail->Port = 587;
  //       $mail->Username = '0506d5e7ba41e6a17fb431ae51df94a9';
  //       $mail->Password = 'fa7c8689a33a30183b969fd9374637ca';
  //       $mail->SMTPKeepAlive = true;

  //       $mail->setFrom('houledjillali@gmail.com', 'Comarca del Bajo Aragon');
  //       $mail->Subject = "Has recibido una nueva notificación en nuestra plataforma";

  //       $userEmail = $dest;
  //       $userName = $name;

  //       $mail->addAddress($userEmail, $userName);

  //       $mail->Body = "<h2>¡Hola, {$userName}!</h2> <p>Tu cuenta ha sido dada de alta con éxito en nuestra plataforma.</p>";
  //       $mail->AltBody = "Hello, {$userName}! \n How are you?";

  //       try {
  //           $mail->send();
  //           echo "Message sent to: ({$userEmail}) {$mail->ErrorInfo}\n";
  //       } catch (Exception $e) {
  //           echo "Mailer Error ({$userEmail}) {$mail->ErrorInfo}\n";
  //       }
  //       $mail->clearAddresses();
  //       $mail->smtpClose();
  //   }
  public static function sendEmail($dest, $name) {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->isSMTP();
    $mail->Host = 'in-v3.mailjet.com';
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->Username = '7cf95e08fc79e0eb7ef9a3446e3b2e79';
    $mail->Password = '86e985bd4717587e7e3dfb812110cea6';
    $mail->SMTPKeepAlive = true;
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; 

    $mail->setFrom('revitalizona@gmail.com', 'Comarca del Bajo Aragon');
    $mail->Subject = "Has recibido una nueva notificación en nuestra plataforma.";

    $userEmail = $dest;
    $userName = $name;

    $mail->addAddress($userEmail, $userName);

    $mail->Body = "<h2>¡Hola, {$userName}!</h2> <p>Tu cuenta ha sido dada de alta con exito en nuestra plataforma.</p>";
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

