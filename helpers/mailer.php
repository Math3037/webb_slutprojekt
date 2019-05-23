<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../lib/PHPMailer/Exception.php';
require '../lib/PHPMailer/PHPMailer.php';
require '../lib/PHPMailer/SMTP.php';

session_start();

function sendPasswordResetMail(){
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
    $mail->Body = "";

    $mail->AddAddress("theo01sandell@gmail.com");

    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message has been sent";
    }
}

?>