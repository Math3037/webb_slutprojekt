<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/lib/PHPMailer/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/lib/PHPMailer/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/lib/PHPMailer/SMTP.php';

session_start();

function sendPasswordResetMail($token){
    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->IsHTML(true);


    $mail->Username = "theo01sandell@gmail.com";
    $mail->Password = "ggvujdfaihsooyvh";


    $mail->SetFrom("theo01sandell@gmail.com");
    $mail->Subject = "Sakana password reset";
    $mail->Body = "Someone has requested to reset your password. <br> If you wish to do this, press the link below. <br> <a href=\"http://localhost/reset_password?token=$token\">http://localhost/reset_password?token=$token</a> <br> <b>This link is valid for 30 minutes</b>";

    $mail->AddAddress("theo01sandell@gmail.com");

    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message has been sent";
    }
}

?>