<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])){
    $email = $_POST['email'];

$mail = new PHPMailer(true);
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                               
    $mail->Username   = 'mahalsloe@gmail.com';                    
    $mail->Password   = 'dcpbofnyujffaebf';                               
    $mail->SMTPSecure = 'ssl';            
    $mail->Port       = 465;                              

    $mail->setFrom('mahalsloe@gmail.com');
    $mail->addAddress($_POST[$email]);  
    

    $mail->isHTML(true);  
    $key = mt_rand(99999,999999) ;                     
    $mail->Subject = ' your code is :'.$key;
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
  

    $mail->send();
    echo 'Message has been sent';

}