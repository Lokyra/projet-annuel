
<?php

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendNewsEmail($to, $subject, $body) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'arasaka.unity@gmail.com';
        $mail->Password   = 'ngwp ugcn tzar mtru';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;


        $mail->setFrom('arasaka.unity@gmail.com', 'Tic-tac-toe Player Online');
        $mail->addAddress($to);

        $mail->isHTML(false);
        $mail->Subject =  $subject;
        $mail->Body    .=  $body;
        
        
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo 'Failed to send email ' . $mail->ErrorInfo;
        return false;
    }
}