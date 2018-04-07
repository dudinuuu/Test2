<?php
// Check for empty fields
if(empty($_POST['name'])      ||
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

// Create the email and send the message
// $to = 'royal.sports.101@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
// $email_subject = "Website Contact Form:  $name";
// $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
// $headers = "From: royal.guest.sport.101@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
// $headers .= "Reply-To: $email_address";
require_once('PHPMailer/PHPMailerAutoload.php');
$mail = new PHPMailer();
$mail ->isSMTP();
$mail ->SMTPAuth = true;
$mail ->SMTPSecure = 'ssl';
$mail ->Host = 'smtp.gmail.com';
$mail ->Port = '465';
$mail ->isHTML();
$mail ->Username = 'royal.sport.101@gmail.com';
$mail ->Password = 'royalsport';
$mail ->SetForm('no.reply.royal@gmail.com');
$mail ->Name = $name;
$mail ->Phone = $phone;
$mail ->Subject = $message;
$mail ->AddAddress($email_address);

$mail = Send();

return true;
?>
