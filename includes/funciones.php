<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
function debugear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function enviarEmail($token,$texto,$id){
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth=true;

    //
    $mail->Host = "smtp.mailtrap.io";
    $mail->Username="99eb6ae9849847";
    $mail->Password="590fdde004d500";
    $mail->SMTPSecure="tls";
    $mail->Port=2525;
    $mail->CharSet="UTF-8";
    //

    $mail->setFrom("kizeban@gmail.com");
    $mail->addAddress("sebasabr2000@gmail.com");
    $mail->Subject="confirmacion de correo";

    $mail->isHTML(true);
    $mail->Body="<p>${texto} <a href='http://localhost:8000/${id}?token=${token}'>click aqui</a></p>";
    $mail->send();
}