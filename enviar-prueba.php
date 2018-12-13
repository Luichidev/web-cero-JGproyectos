<?php

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

$body = " Nombre: $nombre <br>
          Correo: $correo <br>
          Teléfono $telefono <br>
          Mensaje: $mensaje
        ";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);     
try {
    
    $mail->SMTPDebug = 2;                                 
    $mail->isSMTP();                                      
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;       
    $mail->Username = 'disconluis@gmail.com'; 
    $mail->Password = 'p@ssw0rdluis';           
    $mail->SMTPSecure = 'tls';            
    $mail->Port = 587;                   

  
    $mail->setFrom('micorreo', $nombre);
    $mail->addAddress('disconluis@gmail.com');  
    
    $mail->isHTML(true);                                  
    $mail->Subject = 'Asunto';
    $mail->Body    = $body;
    $mail->CharSet = 'UTF-8';

    $mail->send();
    echo ' <script>
      alert("El mensaje se envió correctamente")
      window.history.go(-1)
      </script>
    ';
} catch (Exception $e) {
    echo 'Hubo un error al enviar el mensaje: ', $mail->ErrorInfo;
}
