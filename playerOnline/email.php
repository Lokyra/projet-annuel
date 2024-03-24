
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
        $mail->Subject = 'Verify your email address';
        $mail->Body    .= 'Thank you for registering! Please enter the token below to verify your email address:' . PHP_EOL;
        $mail->Body   .= 'Here is your token : ' . $token . PHP_EOL . PHP_EOL;
        $mail->Body   .= 'If you did not register, please ignore this email.';

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo 'Failed to send email ' . $mail->ErrorInfo;
        return false;
    }
}