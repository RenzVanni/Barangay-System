<?php
include '../frontendServer/server.php';

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($username === '' || $password === '') {
    setMessageAndRedirect('Username or password is empty!', 'danger', '../login.php');
}

// Only fetch password for given username from database
$query = $conn->prepare("SELECT * FROM tbl_users WHERE `username` = ?");
$query->bind_param("s", $username);
$query->execute();

$result = $query->get_result();

if ($result->num_rows) {
    $user = $result->fetch_assoc();

    // Use password_verify to compare input password with hashed password from database
    if (password_verify($password, $user['password'])) {


        if ($user['role'] === 'user') {
            $_SESSION['role'] = $user['role'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['middlename'] = $user['middlename'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['suffix'] = $user['suffix'];
            $_SESSION['street'] = $user['street'];
            $_SESSION['house_no'] = $user['house_no'];
            $_SESSION['subdivision'] = $user['subdivision'];
            $_SESSION['date_of_birth'] = $user['date_of_birth'];
            $_SESSION['place_of_birth'] = $user['place_of_birth'];
            $_SESSION['civil'] = $user['civil_status'];
            $_SESSION['email'] = $user['email'];

            setMessageAndRedirect('You have successfully logged in to Automated Brgy Management System!', 'success', '../main.php');
        } else {
            setMessageAndRedirect('Username or password is incorrect!', 'danger', '../main.php');
        }

    } else {
        setMessageAndRedirect('Username or password is incorrect!', 'danger', '../main.php');
    }
} else {
    setMessageAndRedirect('Username or password is incorrect!', 'danger', '../main.php');
}

$conn->close();

function setMessageAndRedirect($message, $status, $location) {
    $_SESSION['message'] = $message;
    $_SESSION['success'] = $status;
    echo "<script>window.location.href='../main.php'</script>";
    // header("Location: ../main.php");
    exit();
}