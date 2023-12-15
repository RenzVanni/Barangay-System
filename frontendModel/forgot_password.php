<?php
include '../server/server.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Generate a random reset token
    $resetToken = bin2hex(random_bytes(32));
    $expiryTime = date('Y-m-d H:i:s', strtotime('+1 hour'));

    // Update the user's record with the reset token and expiry time
    $updateTokenQuery = "UPDATE tbl_users SET password_reset_token = '$resetToken', password_reset_token_expiry = '$expiryTime' WHERE email = '$email'";
    $updateTokenResult = mysqli_query($conn, $updateTokenQuery);

    if ($updateTokenResult) {
        // Send reset email
        $mail = new PHPMailer;
        $mail->SMTPDebug = 2;              
        $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';  
        $mail->SMTPAuth   = true;          
        $mail->Username   = 'renzvanni626@gmail.com';  // SMTP username
        $mail->Password   = 'usaiatbmfqbfybkf';        // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
        $mail->Port       = 465;   

        $mail->setFrom('renzvanni626@gmail.com');
        $mail->addAddress($email);
        $mail->Subject = 'Password Reset';
        $mail->Body = "Click the following link to reset your password: http://localhost/BarangaySystem/frontendModel/reset_password.php?token=$resetToken";

        if ($mail->send()) {
            $_SESSION['message'] = 'Password reset instructions sent to your email.';
            $_SESSION['success'] = 'success';
        } else {
            $_SESSION['message'] = 'Error sending password reset email: ' . $mail->ErrorInfo;
            $_SESSION['success'] = 'danger';
        }
    } else {
        $_SESSION['message'] = 'Error updating reset token: ' . mysqli_error($conn);
        $_SESSION['success'] = 'danger';
    }
    header("Location: ../login_page.php");

}
?>
