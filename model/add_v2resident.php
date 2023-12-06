<?php
include '../server/server.php';
include './functions/autoGenerateUser.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Get data from POST request
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $ext = $_POST['ext'];
    $dob = $_POST['dob'];
    $place_of_birth = $_POST['place-of-birth'];
    $sex = $_POST['sex'];
    $civil_status = $_POST['civil-status'];
    $citizenship = $_POST['citizenship'];
    $occupation = $_POST['occupation'];
    $no = $_POST['no'];
    $street = $_POST['street'];
    $subdivision = $_POST['subdivision'];
    $household_no = $_POST['household-no'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO tbl_households (`firstname`, `middlename`, `lastname`, `ext`, `date_of_birth`, `place_of_birth`, `sex`, `civil_status`, `citizenship`, `occupation`, `house_no`, `street`, `subdivision`, `household_no`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("ssssssssssssss", $firstname, $middlename, $lastname, $ext, $dob, $place_of_birth, $sex, $civil_status, $citizenship, $occupation, $no, $street, $subdivision, $household_no);

    // Execute the SQL statement
    if ($stmt->execute()) {
        // Handle successful insert (e.g., set a session message or redirect)
        $_SESSION['message'] = 'Resident added successfully!';

        // function calculateAge($dob) {
        //     $today = new DateTime();
        //     $birthDate = new DateTime($dob);
        //     $interval = $today->diff($birthDate);
        //     return $interval->y;
        // }
        // insertUser($conn, $username, $hashedPassword, $firstname, $middlename, $lastname, $sex, $civil_status, $street, $dob, $email);

        header("Location: ../residentInfo.php");
    } else {
        // Handle error (e.g., set a session error message or redirect)
        $_SESSION['error'] = 'Failed to add resident!';
        header("Location: ../addResidentPage.php"); // Replace with your page's name if it's different
    }
}
?>
