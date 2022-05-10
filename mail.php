<?php
session_start();
$username = $_SESSION['User_Name'];
$mailfrom = $_POST['fromemail_address'];
$subject = $_POST['subject'];
$message = $_POST['message'];
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
// require 'PHPmailer/src/Exception.php';
// require 'PHPmailer/src/PHPMailer.php';
// require 'PHPmailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                 
    $mail->Username   = 'krishnaadhia@gmail.com';                   
    $mail->Password   = '12092001Krishna#';                          
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;   

    //Recipients
    $mail->setFrom($mailfrom, $username);
    $mail->addAddress('cozastoree@gmail.com', 'Coza Store');     //Add a recipient
    // $mail->addReplyTo('krishnaadhia@gmail.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
