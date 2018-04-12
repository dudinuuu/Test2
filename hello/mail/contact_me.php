<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

// Check for empty fields

if(empty(isset($_POST['name']))      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }

$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));




use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'royal.sport.101@gmail.com';                 // SMTP username
    $mail->Password = 'royalsport';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    //Recipients
    $mail->setFrom($email_address, $name);
    //$mail->addAddress('royal.sport.101@gmail.com', 'Joe User');     // Add a recipient
    $mail->addAddress('royal.sport.101@gmail.com');               // Name is optional
    $mail->addReplyTo($email_address, 'Client');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');


    //Content
    $mail->isHTML(true);                        // Set email format to HTML
    $mail->Subject = 'Enquiry';
    $mail->Body    =  $message. '<br><br>Name: '.$name. '<br>Phone number: '.$phone. '<br>Email: '.$email_address;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

return true;
?>
