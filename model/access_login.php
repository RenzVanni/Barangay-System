<?php
include '../server/server.php';

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

        // Insert a log entry for the user login
        $logUsername = $user['username'];
        $logActivity = 'Login';
        $logDate = date('Y-m-d');
        $logTime = date('H:i:s');

        $insertLogQuery = $conn->prepare("INSERT INTO login_logs (username, activity, log_date, log_time) VALUES (?, ?, ?, ?)");
        $insertLogQuery->bind_param("ssss", $logUsername, $logActivity, $logDate, $logTime);
        $insertLogQuery->execute();
        $insertLogQuery->close();

        // Set session variables based on user role
        if ($user['role'] === 'admin' || $user['role'] === 'staff') {
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            setMessageAndRedirect('You have successfully logged in to Automated Brgy Management System!', 'success', '../dashboard.php');
        } else if ($user['role'] === 'user') {
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
            $_SESSION['contact_no'] = $user['contact_no'];

            setMessageAndRedirect('You have successfully logged in to Automated Brgy Management System!', 'success', '../index.php');
        } else {
            setMessageAndRedirect('Username or password is incorrect!', 'danger', '../login_page.php');
        }

    } else {
        setMessageAndRedirect('Username or password is incorrect!', 'danger', '../login_page.php');
    }
} else {
    setMessageAndRedirect('Username or password is incorrect!', 'danger', '../login_page.php');
}

$conn->close();

function setMessageAndRedirect($message, $status, $location) {
    $_SESSION['message'] = $message;
    $_SESSION['success'] = $status;
    header("Location: $location");
    exit();
}
?>
