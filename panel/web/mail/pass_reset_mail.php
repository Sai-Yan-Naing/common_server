<?php
require_once 'vendor/autoload.php';


    $transport = (new Swift_SmtpTransport('smtp.googlemail.com', 465, 'ssl'))
      ->setUsername('capital.saiyannaing@gmail.com')
      ->setPassword('nilar@sai2597')
    ;
 
    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);
 
    // Create a message
    // echo 'Email has been sent.';

    ?>