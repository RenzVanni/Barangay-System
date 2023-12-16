<?php
include '../server/server.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Check if the new password and confirm password match
    if ($newPassword !== $confirmPassword) {
        $_SESSION['message'] = 'New password and confirm password do not match.';
        $_SESSION['success'] = 'danger';
        echo "<script>window.location.href='../index.php'</script>";
        // header("Location: ../index.php");
        exit;
    }

    // Fetch the user's current password from the database (replace 'your_user_id' with the actual user ID)
    $userId = $_SESSION['id'];// Replace with the actual user ID
    $getUserPasswordQuery = "SELECT password FROM tbl_users WHERE id = '$userId'";
    $getUserPasswordResult = mysqli_query($conn, $getUserPasswordQuery);

    if ($getUserPasswordResult) {
        $row = mysqli_fetch_assoc($getUserPasswordResult);
        $currentPassword = $row['password'];

        // Check if the entered old password matches the current password
        if (password_verify($oldPassword, $currentPassword)) {
            // Hash the new password
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

            // Update the user's password in the database
            $updatePasswordQuery = "UPDATE tbl_users SET password = '$hashedPassword' WHERE id = '$userId'";
            $updatePasswordResult = mysqli_query($conn, $updatePasswordQuery);

            if ($updatePasswordResult) {
                $_SESSION['message'] = 'Password changed successfully.';
                $_SESSION['success'] = 'success';
                echo "<script>window.location.href='../index.php'</script>";
                // header("Location: ../index.php");
                exit;
            } else {
                $_SESSION['message'] = 'Error updating password: ' . mysqli_error($conn);
                $_SESSION['success'] = 'danger';
                echo "<script>window.location.href='../index.php'</script>";
                // header("Location: ../index.php");
                exit;
            }
        } else {
            $_SESSION['message'] = 'Old password is incorrect.';
            $_SESSION['success'] = 'danger';
            echo "<script>window.location.href='../index.php'</script>";
            // header("Location: ../index.php");
            exit;
        }
    } else {
        $_SESSION['message'] = 'Error fetching user password: ' . mysqli_error($conn);
        $_SESSION['success'] = 'danger';
        echo "<script>window.location.href='../index.php'</script>";
        // header("Location: ../index.php");
        exit;
    }
}
?>
