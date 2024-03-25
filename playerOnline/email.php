
<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendVerificationEmail($to, $token) {
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
        $mail->Subject = 'Verifier votre adresse mail';
        $mail->Body    .= 'Merci pour votre inscription! Veuillez renseigner le token ci-dessous pour vérifier votre adresse mail:' . PHP_EOL;
        $mail->Body   .= 'Voici votre token : ' . $token . PHP_EOL . PHP_EOL;
        $mail->Body   .= 'Ci vous ne vous êtes pas inscrit, veuillez ignorer ce message.';

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Impossible d'envoyer l'email" . $mail->ErrorInfo;
        return false;
    }
}
