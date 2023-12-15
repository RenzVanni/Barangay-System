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
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Check if the email already exists in tbl_users
    $checkEmailQuery = "SELECT * FROM tbl_users WHERE email = '$email'";
    $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailResult) > 0) {
        // The email already exists, handle accordingly
        $_SESSION['message'] = 'Error: Email already exists.';
        $_SESSION['success'] = 'danger';
        header("Location: ../login_page.php");
        // Redirect or handle the error as needed
    } else {
        // The email does not exist, proceed with the registration

        // Check if the combination of firstname, middlename, and lastname exists in tbl_households
        $checkHouseholdQuery = "SELECT * FROM tbl_households WHERE firstname = '$firstname' AND middlename = '$middlename' AND lastname = '$lastname' AND date_of_birth = '$birthdate'";
        $checkHouseholdResult = mysqli_query($conn, $checkHouseholdQuery);

        if (mysqli_num_rows($checkHouseholdResult) > 0) {
            // The household already exists, proceed with user registration

            // Generate a verification code
            $verificationCode = generateVerificationCode();

            // Insert user data into the database
            $sql = "INSERT INTO tbl_users (firstname, middlename, lastname, username, email, password, verification_code, role, date_of_birth) VALUES ('$firstname', '$middlename', '$lastname', '$username', '$email', '$password', '$verificationCode', 'user', '$birthdate')";
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

                if ($mail->send()) {
                    $_SESSION['message'] = 'Registration successful. Please check your email to verify your account.';
                    $_SESSION['success'] = 'success';
                    header("Location: ../login_page.php");
                } else {
                    $_SESSION['message'] = 'Error sending verification email: ' . $mail->ErrorInfo;
                    $_SESSION['success'] = 'danger';
                    echo 'Error sending verification email: ' . $mail->ErrorInfo;
                    header("Location: ../login_page.php");
                }
            } else {
                $_SESSION['message'] = 'Error registering user: ' . mysqli_error($conn);
                $_SESSION['success'] = 'danger';
                header("Location: ../login_page.php");
            }
        } else {
            // The household does not exist, handle accordingly
            $_SESSION['message'] = 'Error: Household does not exist.';
            $_SESSION['success'] = 'danger';
            header("Location: ../login_page.php");
            // Redirect or handle the error as needed
        }
    }
}
?>
