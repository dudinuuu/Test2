<?php
// Check for empty fields
session_start();

$errors = [];
if(isset($_POST['name']), ($_POST['email']), ($_POST['phone']), ($_POST['message']))
   {
     $sfields = [
       'name' => $_POST['name'],
       'email' => $_POST['email'],
       'phone' => $_POST['phone'],
       'message' => $_POST['message'],
     ];

     foreach($fields as $field => $data){
       if(empty($data)){
          $errors[] = .$errors[] = 'The ' .$field. 'field is required.';
       }
     }

     echo '<pre>', print_r($errors), '</pre>';
     die();
   }

   else{
     $errors = 'Sonething went wrong';
   }

// $name = strip_tags(htmlspecialchars($_POST['name']));
// $email_address = strip_tags(htmlspecialchars($_POST['email']));
// $phone = strip_tags(htmlspecialchars($_POST['phone']));
// $message = strip_tags(htmlspecialchars($_POST['message']));
//
// // Create the email and send the message
// $to = 'royal.sports.101@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
// $email_subject = "Website Contact Form:  $name";
// $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
// $headers = "From: royal.guest.sport.101@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
// $headers .= "Reply-To: $email_address";
// mail($to,$email_subject,$email_body,$headers);
// return true;
?>
