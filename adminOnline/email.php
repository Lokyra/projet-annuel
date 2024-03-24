
<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendNewsEmail($to) {
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
        $mail->Subject = 'Exciting Updates & New Features on Our Online TicTacToe Platform!';
        $mail->Body    .= 'Dear User'. PHP_EOL . PHP_EOL;
        $mail->Body   .= 'We hope this email finds you well. We are thrilled to announce some exciting updates and new ' . PHP_EOL;
        $mail->Body   .= 'features on our Online TicTacToe platform that we believe will enhance your gaming experience.' . PHP_EOL . PHP_EOL;
        $mail->Body   .= 'If you have any questions or feedback, please contact us. We value your input and are always looking for ways to improve.' . PHP_EOL;
        $mail->Body   .= 'Happy Gaming !';

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo 'Failed to send email ' . $mail->ErrorInfo;
        return false;
    }
}