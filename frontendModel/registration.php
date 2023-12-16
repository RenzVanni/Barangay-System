<?php
include '../server/server.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

// Function to generate a random verification code
function generateVerificationCode()
{
    return bin2hex(random_bytes(16));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $house_no = $_POST['house_no'];
    $street = $_POST['street'];
    $subdivision = $_POST['subdivision'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Check if the email already exists in tbl_users
    $checkEmailQuery = "SELECT * FROM tbl_users WHERE firstname = '$firstname' AND lastname = '$lastname' AND email = '$email'";
    $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailResult) > 0) {
        // The email already exists, handle accordingly
        $_SESSION['message'] = 'Error: User already exists.';
        $_SESSION['success'] = 'danger';
        header("Location: ../login_page.php");
        exit;
        // Redirect or handle the error as needed
    } else {
        // The household already exists, proceed with user registration

        // Generate a verification code
        $verificationCode = generateVerificationCode();

        // Insert user data into the database
        $sql = "INSERT INTO tbl_users (firstname, middlename, lastname, username, email, password, verification_code, role, date_of_birth, house_no, street, subdivision) VALUES ('$firstname', '$middlename', '$lastname', '$username', '$email', '$password', '$verificationCode', 'user', '$birthdate', '$house_no', '$street', '$subdivision')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Send verification email
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
            $mail->Subject = 'Email Verification';
            $mail->Body = "Click the following link to verify your email: http://localhost/BarangaySystem/frontendModel/verify_registration.php?code=$verificationCode";

 try {
            if ($mail->send()) {
                $_SESSION['message'] = 'Registration successful. Please check your email to verify your account.';
                $_SESSION['success'] = 'success';
                header("Location: ../login_page.php");
                exit;
            } else {
                throw new Exception('Error sending verification email: ' . $mail->ErrorInfo);
            }
        } catch (Exception $e) {
            $_SESSION['message'] = $e->getMessage();
            $_SESSION['success'] = 'danger';
            header("Location: ../login_page.php");
            exit;
        }
    } else {
        $_SESSION['message'] = 'Error registering user: ' . mysqli_error($conn);
        $_SESSION['success'] = 'danger';
        header("Location: ../login_page.php");
        exit;
    }
    }
}
?>
