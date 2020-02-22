<?php

require_once 'vendor/autoload.php';
require_once 'config/const.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465,'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD);

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);


    function sendVerificationEmail($Useremail,$token){
        global $mailer;
        $body='
        <!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Verify Email</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        </head>
        
        <body>
            <div class="wrapper">
                <p>Thank You for signing up with us. To enjoy our full package click on the link below to verify your email</p>
                <a href="http://localhost:81/phplessons/login-system/index.php?token='.$token.'">
                    Verify your email
                </a>
            </div>
        </body>
        
        </html>';
        // Create a message
        $message = (new Swift_Message('Verify Your email'))
        ->setFrom(EMAIL)
        ->setTo($Useremail)
        ->setBody($body, 'text/html');

        // Send the message
        $result = $mailer->send($message);
    }

    function sendPasswordReset($Useremail,$token){
        global $mailer;
        $body='
        <!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Reset Password</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        </head>
        
        <body>
            <div class="wrapper">
                <p>Please click on the link below to reset your password</p>
                <a href="http://localhost:81/phplessons/login-system/index.php?password_token='.$token.'">
                    Reset your Password
                </a>
            </div>
        </body>
        
        </html>';
        // Create a message
        $message = (new Swift_Message('Recover Your Password'))
        ->setFrom(EMAIL)
        ->setTo($Useremail)
        ->setBody($body, 'text/html');

        // Send the message
        $result = $mailer->send($message);
    }
?>