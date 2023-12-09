<?php
include "./server/server.php";

// Get user input
$resUsername = $_POST['username'];
$password = $_POST['password'];
$userType = $_POST['role'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$cstatus = $_POST['civil_status'];
$street = $_POST['street'];
$houseNo = $_POST['house_no'];
$subdivision = $_POST['subdivision'];
$dbirth = $_POST['date_of_birth'];
$email = $_POST['email'];
$pbirth = $_POST['place_of_birth'];

// Hash the password using bcrypt
$passwordHashed = password_hash($password, PASSWORD_DEFAULT);

// Prepare the SQL statement
$insert = $conn->prepare("INSERT INTO tbl_users (username, password, role, firstname, middlename, lastname, gender, civil_status, street, house_no, subdivision, date_of_birth, email, place_of_birth) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters
$insert->bind_param("ssssssssssssss", $resUsername, $passwordHashed, $userType, $firstname, $middlename, $lastname, $gender, $cstatus, $street, $houseNo, $subdivision, $dbirth, $email, $pbirth);

// Execute the statement
if ($insert->execute()) {
    echo "User account created successfully";
} else {
    echo "Error creating user account: " . $insert->error;
}

// Close the statement and connection
$insert->close();
$conn->close();
?>
