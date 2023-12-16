<?php
include '../server/server.php';
include './functions/autoGenerateUser.php';

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    exit("Failed to upload file.\n");
}

$inputFileName = $target_file;

if (!file_exists($inputFileName)) {
    exit("Could not find .xlsx file.\n");
}

try {
    $spreadsheet = IOFactory::load($inputFileName);
} catch (Exception $e) {
    exit("Error loading file: " . $e->getMessage() . "\n");
}

$data = $spreadsheet->getActiveSheet()->toArray();
array_shift($data);

foreach ($data as $key => $row) {
    $firstname        = $row[0];
    $middlename       = $row[1];
    $lastname         = $row[2];
    $sex              = $row[3];
    $houseNo          = $row[4];
    $street           = $row[5];
    $subdivision      = $row[6];
    $dob              = $row[7];
    $pob              = $row[8];
    $civil_status     = $row[9];
    $occupation       = $row[10];
    $email            = $row[11];
    $contactNo        = $row[12];
    $voter_status     = $row[13];
    $citizenship      = $row[14];
    $householdNo      = $row[15];
    $householdHead    = $row[16];
    $suffix              = $row[17];

    $query_check = "SELECT * FROM tblresidents WHERE firstname='$firstname' AND middlename='$middlename' AND lastname='$lastname'";

    $result = $conn->query($query_check);


    if($result->num_rows == 0) {
        $query = "INSERT INTO tblresidents (`firstname`, `middlename`, `lastname`, `sex`, `house_no`, `street`, `subdivision`, `date_of_birth`, `place_of_birth`, `civil_status`, `occupation`, `email`, `contact_no`, `voter_status`, `citizenship`, `household_no`, `household_head`, `suffix`) 
             VALUES ('$firstname', '$middlename', '$lastname', '$sex', '$houseNo', '$street', '$subdivision', '$dob', '$pob', '$civil_status', '$occupation', '$email', '$contactNo', '$voter_status', '$citizenship', '$householdNo', '$householdHead', '$suffix')";

        // insertUser($conn, $username, $hashedPassword, $firstname, $middlename, $lastname, $sex, $civil_status, $street, $dob, $email);


        if($conn->query($query) === true){
            $_SESSION['message'] = 'Resident Information has been saved!';
            $_SESSION['success'] = 'success';

            // include './sendAccount.php';
        }
    }
}
    header("Location: ../residentInfo.php");

$conn->close();
?>