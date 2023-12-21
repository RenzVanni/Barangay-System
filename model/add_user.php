<?php
require_once '../server/server.php';
include './functions/sendUserAccount.php';
include "./functions/audit.php";

if (!isset($_SESSION['username'])) {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit();
    }
}

$id 	= $conn->real_escape_string($_POST['id']);
$resUsername = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');
$userType = trim($_POST['usertype-user'] ?? '');
$firstname = trim($_POST['res_firstname'] ?? '');
$middlename = trim($_POST['res_middlename'] ?? '');
$lastname = trim($_POST['res_lastname'] ?? '');
$gender = trim($_POST['res_gender'] ?? '');
$cstatus = trim($_POST['res_cstatus'] ?? '');
$street = trim($_POST['res_street'] ?? '');
$houseNo = trim($_POST['res_houseNo'] ?? '');
$subdivision = trim($_POST['res_subdivision'] ?? '');
$dbirth = trim($_POST['res_dbirth'] ?? '');
$pbirth = trim($_POST['res_pbirth'] ?? '');
$email 	= $conn->real_escape_string($_POST['email']);

// Validate input
if ($resUsername === '' || $password === '' || $userType === '') {
    setMessageAndRedirect('Please fill up the form completely!', 'danger', '../users.php');
}

// Hash the password using bcrypt
$passwordHashed = password_hash($password, PASSWORD_DEFAULT);

// Check if the user already exists
$query = $conn->prepare("SELECT * FROM tbl_users WHERE firstname = ? AND middlename = ? AND lastname = ?");
$query->bind_param("sss", $firstname, $middlename, $lastname);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    setMessageAndRedirect('Please enter a unique username!', 'danger', '../users.php');
}

$yourName = $firstname." ".$middlename." ".$lastname;
// Insert the user
$insert = $conn->prepare("INSERT INTO tbl_users (username, password, role, firstname, middlename, lastname, gender, civil_status, street, house_no, subdivision, date_of_birth, email, place_of_birth) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$insert->bind_param("ssssssssssssss", $resUsername, $passwordHashed, $userType, $firstname, $middlename, $lastname, $gender, $cstatus, $street, $houseNo, $subdivision, $dbirth, $email, $pbirth);

if ($insert->execute()) {
    
    $updateEmail = $conn->prepare("UPDATE tbl_households SET `email` = ? WHERE id = ?");
    $updateEmail->bind_param("si", $email, $id);
    $updateResult = $updateEmail->execute();
    $updateEmail->close();

    $user_id = $_SESSION['id'];
    $action = "INSERT";
    $table_name = "User";
    logAuditTrail($user_id, $action, $table_name);

    setMessageAndRedirect('User added!'. $id, 'success', '../residentInfo.php');

    // Update email in tbl_households
    if (!empty($email)) {
        // Include the sendAccount.php file after updating the email
        include "./sendAccount.php";
    }
} else {
    setMessageAndRedirect('Something went wrong!', 'danger', '../users.php');
}

$conn->close();

function setMessageAndRedirect($message, $status, $location) {
    $_SESSION['message'] = $message;
    $_SESSION['success'] = $status;
    echo "<script>window.location.href='$location'</script>";
    // header("Location: $location");
    exit();
}
?>