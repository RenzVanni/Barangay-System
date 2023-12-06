<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                       // Enable verbose debug output
    $mail->isSMTP();                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';     // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                   // Enable SMTP authentication
    $mail->Username   = 'renzvanni626@gmail.com';  // SMTP username
    $mail->Password   = 'usaiatbmfqbfybkf';        // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                    // TCP port to connect to

    //Recipients
    $mail->setFrom('renzvanni626@gmail.com');
    $mail->addAddress($email);  // Add a recipient

    // Content
    $mail->isHTML(true);                        // Set email format to HTML
    $mail->Subject = 'Welcome to CHIMKEN - Chimken is the greatest and will take over the world with poppy. You cannot stop the chimken, poppy.church will find you.';
    $mail->Body    = 'Dear '. $username. ", <br/>We are excited to welcome you to <b>CHIMKEN</b>! <br/>Your password has been successfully change. Here are your login details: <br/><b>Username:</b> ". $username. "<br/><b>Password:</b> ". $new_password;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>