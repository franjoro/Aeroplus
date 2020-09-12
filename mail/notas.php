<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$correo=$_POST["data1"];
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'mail.ivea.com.sv';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'marketing@ivea.com.sv';                     // SMTP username
    $mail->Password   = 'marketingivea';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('marketing@ivea.com.sv', 'CAAA');
    $mail->addAddress($correo);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Nueva nota ingresada';
    $mail->Body    = '
    <center>
    <img src="https://pruebas.ivea.com.sv/img/logo.png" style="width:300px">
    <h1>Nueva nota ingresada</h1>
    <p><b>Nota: </b>'.$_POST['nota'].'</p>
    <a href="https://pruebas.ivea.com.sv"><p>Revisar nota:</p></a>
    </center>
    ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>
