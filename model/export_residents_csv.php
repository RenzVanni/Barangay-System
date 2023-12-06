<?php

require("../server/server.php");

// get Users
$query = "SELECT `firstname`, `middlename`, `lastname`, `sex`, `house_no`, `street`, `subdivision`, `date_of_birth`, `place_of_birth`, `civil_status`, `occupation`, `email`, `contact_no`, `voter_status`, `citizenship`, `household_no`, `osy`, `pwd`  FROM tblresidents";
if (!$result = $conn->query($query)) {
    exit($conn->error);
}

$users = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Residents.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('Firstname', 'Middlename', 'Lastname', 'Sex', 'House_No', 'Street', 'Subdivision', 'Date_of_Birth', 'Place_of_Birth', 'Civil_Status', 'Occupation', 'Email', 'Contact_No', 'Voter_Status', 'Citizenship', 'Household_No', 'OSY', 'PWD'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}


?>