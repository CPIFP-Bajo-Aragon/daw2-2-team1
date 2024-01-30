<?php
            require __DIR__ . '/mailer/src/PHPMailer.php';
            require __DIR__ . '/mailer/src/SMTP.php';
            require __DIR__ . '/mailer/src/Exception.php';
            use PHPMailer\PHPMailer\PHPMailer;
            

  class Test{
    
    public function __construct() {

    }

     public static function sendEmail() {   

        

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '14c1be9c0f8481';
        $mail->Password = '6a2651cb59ede9';
        
    $mail->SMTPKeepAlive = true;

    $mail->setFrom('adriperezcaspe@gmail.com', 'Comarca del Bajo Aragon');
    $mail->Subject = "Has recibido una nueva notificación en nuestra plataforma.";

    $userEmail = "adriperezcaspe@gmail.com";
    $userName = "a";

    $mail->addAddress($userEmail, $userName);

    $mail->Body = "<h2>¡Hola, {$userName}!</h2> <p>Tu cuenta ha sido dada de alta con exito en nuestra plataforma.</p>";
    $mail->AltBody = "Hello, {$userName}! \n How are you?";
    try {
        $mail->send();
        echo "Message sent to: ({$userEmail}) {$mail->ErrorInfo}";
    } catch (Exception $e) {
        echo "Mailer Error ({$userEmail}) {$mail->ErrorInfo}\n";
    }
    $mail->clearAddresses();
    $mail->smtpClose();
    }
}

