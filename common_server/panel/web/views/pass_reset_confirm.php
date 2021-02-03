<?php
require_once 'mail/pass_reset_mail.php';
session_start();

$token=$_POST['token_'];
$_SESSION['token'] = $token;
$domain_userid=$_POST['domain_userid'];
$_SESSION['domain_userid'] = $domain_userid;

$body = 'Hello, <p><a href="http://assistup.test/new_pass.php?token='.$token.'">password reset link</a></p>';

$message = (new Swift_Message('Email Through Swift Mailer'))
      ->setFrom(['saiyannaing259768648@gmail.com' => 'FROM_NAME'])
      ->setTo(['kosaiyannaing7493@gmail.com'])
      // ->setCc(['RECEPIENT_2_EMAIL_ADDRESS'])
      // ->setBcc(['RECEPIENT_3_EMAIL_ADDRESS'])
      ->setBody($body)
      ->setContentType('text/html')
    ;
 
    // Send the message
    $mailer->send($message);

   echo "password reset link has been sent. please check your email";

?>