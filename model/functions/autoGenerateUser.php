<?php

function generateUsername() {
    return 'user' . time(); // Creates a username using a prefix and the current timestamp.
}

function generatePassword($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_=+';
    $password = '';
    
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[random_int(0, strlen($characters) - 1)];
    }
    
    return $password;
}

function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);  // Hashes the password using bcrypt by default.
}

// When account is created:
$username = generateUsername();
$plainPassword = generatePassword();
$hashedPassword = hashPassword($plainPassword);

function setMessageAndRedirect($message, $status) {
    $_SESSION['message'] = $message;
    $_SESSION['success'] = $status;
}
function insertUser($conn, $username, $passwordHashed, $firstname, $middlename, $lastname, $sex, $cstatus, $street, $dbirth, $pbirth, $email, $houseNo, $subdivision) {
$query = $conn->prepare("SELECT * FROM tbl_users WHERE username = ?");
$query->bind_param("s", $username);
$query->execute();

$result = $query->get_result();

if ($result->num_rows > 0) {
    setMessageAndRedirect('Please enter a unique username!', 'danger');
}

$role = "user";
$insert = $conn->prepare("INSERT INTO tbl_users (username, password, role, firstname, middlename, lastname, gender, civil_status, street, house_no, subdivision, date_of_birth, place_of_birth, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$insert->bind_param("ssssssssssssss", $username, $passwordHashed, $role, $firstname, $middlename, $lastname, $sex, $cstatus, $street, $houseNo, $subdivision, $dbirth, $pbirth, $email);


if ($insert->execute()) {
    setMessageAndRedirect('User added!', 'success');
} else {
    setMessageAndRedirect('Something went wrong!', 'danger');
}
}
 ?>