<?php
// Backend PHP code for updating the user's password

include '../server/server.php';


$username = $_POST['username'];
$email = $_POST['email'];
$current_password = $_POST['current_password'] ?? "";
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'] ?? "";
$userType = $_POST['usertype-user'] ?? "";

if(isset($_POST["submit_admin"])) {
    include "./sendNewPassword.php";
    $new_password = password_hash($new_password, PASSWORD_DEFAULT);
    $update_stmt = $conn->prepare('UPDATE tbl_users SET password = ? WHERE username = ?');
    $update_stmt->bind_param("ss", $new_password, $username);
    if ($update_stmt->execute()) {
        $_SESSION['message'] = 'Password has been updated!';
        $_SESSION['success'] = 'success';

    } else {
        $_SESSION['message'] = 'Something went wrong!';
        $_SESSION['success'] = 'danger';
    }

    if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    return;
}

if (!empty($username)) {
    $_SESSION['message'] = $current_password;
    if ($new_password === $confirm_password) {
        // Verify the current password against the one stored in the database
        $stmt = $conn->prepare("SELECT password FROM tbl_users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        echo $user;

        if ($user && password_verify($current_password, $user['password'])) {
            // Hash the new password using bcrypt
            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

            // Update the password in the database
            $update_stmt = $conn->prepare("UPDATE tbl_users SET password = ? AND role = ? WHERE username = ?");
            $update_stmt->bind_param("sss", $hashed_password, $username, $userType);
            if ($update_stmt->execute()) {
                $_SESSION['message'] = 'Password has been updated!';
                $_SESSION['success'] = 'success';
            } else {
                $_SESSION['message'] = 'Something went wrong!';
                $_SESSION['success'] = 'danger';
            }
        } else {
            $_SESSION['message'] = 'Current Password is incorrect!'. $user['password'];
            $_SESSION['success'] = 'danger';
        }
    } else {
        $_SESSION['message'] = 'Password did not match!';
        $_SESSION['success'] = 'danger';
    }
} else {
    $_SESSION['message'] = 'No Username found!';
    $_SESSION['success'] = 'danger';
}

if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}

$conn->close();
?>