
<?php
ini_set('display_errors', 1);
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendVerificationEmail($to, $token) {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'arasaka.unity@gmail.com';
        $mail->Password   = 'ngwp ugcn tzar mtru';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('arasaka.unity@gmail.com', 'Tic-tac-toe Player Online');
        $mail->addAddress($to);

        // Content
        $mail->isHTML(false);
        $mail->Subject = 'Verify your email address';
        $mail->Body    = 'Thank you for registering! Please enter the token below to verify your email address:';
        $mail->Body   .= '   ';
        $mail->Body   .= $token;
        $mail->Body   .= '   ';
        $mail->Body   .= 'If you did not register, please ignore this email.';

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo 'Failed to send email ' . $mail->ErrorInfo;
        return false;
    }
}