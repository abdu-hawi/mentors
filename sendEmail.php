<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;

require_once './PHPMailer/src/Exception.php';
require_once './PHPMailer/src/PHPMailer.php';
require_once './PHPMailer/src/SMTP.php';

function send($email, $subject, $body){

    /* Instantiation and passing `true` enables exceptions */
    $mail = new PHPMailer(true);

    /* Use SMTP. */
    $mail->isSMTP();
//    /* Set authentication. */
//    $mail->SMTPAuth = true;
//    /*secure transfer enabled REQUIRED for Gmail*/
//    $mail->SMTPSecure = 'tls';
//    /* Google (Gmail) SMTP server. */
//    $mail->Host = 'smtp.gmail.com';
//    /* SMTP port. */
//    $mail->Port = 587;
//    /* Username (email address). */
//    $mail->IsHTML(true);
//    $mail->Username = 'walloffame002@gmail.com';
//    /* Google account password. */
//    $mail->Password = 'mslsqopjcoismbnh';
    $mail->isSMTP();
    $mail->Host = 'smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Port = 2525;
    $mail->Username = '901a6548718213';
    $mail->Password = 'a1c035517e6637';

    $mail->setFrom('myEmail@gmail.com', 'Abdu');
    $mail->Subject = "=?UTF-8?B?" . base64_encode($subject) . "?=";

    $mail->Body = $body;

    $mail->addAddress($email);

    /* Finally send the mail. */
    if($mail->Send()) return true;
    else return false;
}