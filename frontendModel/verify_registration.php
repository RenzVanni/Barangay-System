<?php
include '../server/server.php'; // Include your database connection file

if (isset($_GET['code'])) {
    $verificationCode = $_GET['code'];

    // Update user status to verified
    $sql = "UPDATE tbl_users SET is_verified = 1 WHERE verification_code = '$verificationCode'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>window.location.href='../login_page.php'</script>";
        // header("Location: ../login_page.php");
        $_SESSION['message'] = 'Email verification successful. Your account is now active.';
        $_SESSION['success'] = 'success';
    } else {
        $_SESSION['message'] = 'Error verifying email: ' . mysqli_error($conn);
        $_SESSION['success'] = 'danger';
    }
} else {
    $_SESSION['message'] = 'Invalid verification code.';
    $_SESSION['success'] = 'danger';
}
?>
