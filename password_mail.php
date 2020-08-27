<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function sentOTP($email, $link){ 
// Load Composer's autoloader
require 'vendor/autoload.php';
// echo $email;
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp-relay.sendinblue.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'roovinbansal@gmail.com';                     // SMTP username
    $mail->Password   = 'd6YRL4yN2zmTshfP';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('roovinbansal@gmail.com', 'roovin ');
    $mail->addAddress($email, 'roovin');
    $mail->addAddress('roovinkumar123@gmail.com', 'roovin');

    $mail->isHTML(true);                                  // Set email format to HTML  
   
    $mail->Subject = 'Here is the subject';
    $mail->Body    = "
    Email:- $email<br>
    link:- $link";
    $result= $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    return $result;
}

