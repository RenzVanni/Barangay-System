<?php
include '../server/server.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if the token is valid and not expired
    $currentDateTime = date('Y-m-d H:i:s');
    $checkTokenQuery = "SELECT * FROM tbl_users WHERE password_reset_token = '$token' AND password_reset_token_expiry > '$currentDateTime'";
    $checkTokenResult = mysqli_query($conn, $checkTokenQuery);

    if ($checkTokenResult && mysqli_num_rows($checkTokenResult) > 0) {
        // Token is valid, allow the user to reset the password
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Reset Password</title>
        </head>
        <body>

            <h2>Reset Password</h2>

            <?php
            // Display any messages from the server (e.g., success or error messages)
            if (isset($_SESSION['message'])) {
                echo '<p>' . $_SESSION['message'] . '</p>';
                unset($_SESSION['message']);
            }
            ?>

            <form action="reset_password.php" method="post">
                <input type="hidden" name="token" value="<?php echo $token; ?>">

                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required>

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>

                <button type="submit">Reset Password</button>
            </form>

        </body>
        </html>

        <?php

    } else {
        // Invalid or expired token
        echo 'Invalid or expired token.';
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle the password reset form submission

    $token = $_POST['token'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate the form data
    if (empty($newPassword) || empty($confirmPassword)) {
        $_SESSION['message'] = 'Please enter both the new password and confirm password.';
        $_SESSION['success'] = 'danger';
        header("Location: reset_password.php?token=$token");
        exit;
    }

    if ($newPassword !== $confirmPassword) {
        $_SESSION['message'] = 'The new password and confirm password do not match.';
        $_SESSION['success'] = 'danger';
        header("Location: reset_password.php?token=$token");
        exit;
    }

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

    // Update the user's password
    $updatePasswordQuery = "UPDATE tbl_users SET password = '$hashedPassword' WHERE password_reset_token = '$token'";
    $updatePasswordResult = mysqli_query($conn, $updatePasswordQuery);

    if ($updatePasswordResult) {
        // Password successfully reset
        $_SESSION['message'] = 'Password successfully reset.';
        $_SESSION['success'] = 'success';

        // Clear the reset token and expiry time
        $clearTokenQuery = "UPDATE tbl_users SET password_reset_token = NULL, password_reset_token_expiry = NULL WHERE password_reset_token = '$token'";
        $clearTokenResult = mysqli_query($conn, $clearTokenQuery);

        if (!$clearTokenResult) {
            $_SESSION['message'] = 'Error clearing reset token: ' . mysqli_error($conn);
            $_SESSION['success'] = 'danger';
        }
    } else {
        // Error updating password
        $_SESSION['message'] = 'Error updating password: ' . mysqli_error($conn);
        $_SESSION['success'] = 'danger';
    }

    header("Location: ../login_page.php");
    exit;
}
?>
