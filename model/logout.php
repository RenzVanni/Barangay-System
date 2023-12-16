<?php
include '../server/server.php';

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'staff') {
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['role']);
        session_start();
        $_SESSION['message'] = "You have been logged out!";
        $_SESSION['success'] = 'danger';
        echo "<script>window.location.href='../index.php'</script>";
        // header('location: ../index.php');

        
    } else {
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['role']);
        session_start();
        $_SESSION['message'] = "You have been logged out!";
        $_SESSION['success'] = 'danger';
        echo "<script>window.location.href='../index.php'</script>";
        // header('location: ../index.php');

    }
}

// $username = $conn->real_escape_string($_GET['username']);

// if (!empty($username)) {
//     header('location: ../index.php');
// } else {
//     header('location: ../login_page.php');
// }
?>
