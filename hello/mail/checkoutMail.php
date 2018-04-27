<?php
  session_start();
  include 'xmlLoader.php';

  $name = strip_tags(htmlspecialchars($_POST['name']));
  $email_address = strip_tags(htmlspecialchars($_POST['email']));
  $phone = strip_tags(htmlspecialchars($_POST['phone']));
  $cardNumber = strip_tags(htmlspecialchars($_POST['cardNumber']));
  $expityMonth = strip_tags(htmlspecialchars($_POST['expityMonth']));
  $expityYear = strip_tags(htmlspecialchars($_POST['expityYear']));
  $cvCode = strip_tags(htmlspecialchars($_POST['cvCode']));
  $cart=$_SESSION["cart"];
  $count=0;
  // echo $cart[0]['id'];



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
      $mail->Body = 'Cart Details:';
      foreach($cart as $value){
        $mail->Body .= '<br>id-> '.$cart[$count]['id'].'<br>Name-> '.$cart[$count]['name'][0].'<br>Price-> '.$cart[$count]['price'][0].'<br>Quantity->'.$cart[$count]['quantity'].'<br>';
        $count++;
      }
      $mail->Body .=  '<br>CardNumber: '.$cardNumber. '<br>Expiry: '.$expityMonth.'/'.$expityYear.'<br>CV: '.$cvCode.'<br><br>Name: '.$name. '<br>Phone number: '.$phone. '<br>Email: '.$email_address;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();

      echo 'Message has been sent';
  } catch (Exception $e) {
      echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
  }
?>
