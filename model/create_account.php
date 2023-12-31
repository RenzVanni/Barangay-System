<?php
include "../server/server.php";
include "./functions/audit.php";

// Get user input
$resUsername = $_POST['username'];
$password = $_POST['password'];
$userType = $_POST['role'];
$firstname = $_POST['firstname'];
$middlename = isset($_POST['middlename']) ? $_POST['middlename'] : "";
$lastname = $_POST['lastname'];
// $gender = $_POST['gender'];
// $cstatus = $_POST['civil_status'];
// $street = $_POST['street'];
// $houseNo = $_POST['house_no'];
// $subdivision = $_POST['subdivision'];
// $dbirth = $_POST['date_of_birth'];
// $email = $_POST['email'];
// $pbirth = $_POST['place_of_birth'];

// Hash the password using bcrypt
$passwordHashed = password_hash($password, PASSWORD_DEFAULT);

// Prepare the SQL statement
$insert = $conn->prepare("INSERT INTO tbl_users (username, password, role, firstname, middlename, lastname) VALUES (?, ?, ?, ?, ?, ?)");

// Bind parameters
$insert->bind_param("ssssss", $resUsername, $passwordHashed, $userType, $firstname, $middlename, $lastname);

// Execute the statement
if ($insert->execute()) {
    $user_id = $_SESSION['id'];
    $action = "INSERT";
    $table_name = "Create Account";
    logAuditTrail($user_id, $action, $table_name);
    echo "<script>window.location.href='../users.php'</script>";
    // header('Location: ../users.php');
} else {
    echo "Error creating user account: " . $insert->error;
}

// Close the statement and connection
$insert->close();
$conn->close();
?>
