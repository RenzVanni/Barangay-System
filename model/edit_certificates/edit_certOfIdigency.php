<?php
include('../../server/server.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the form
    $id = $conn->real_escape_string($_POST['id']);
    $applicant_fname = $conn->real_escape_string($_POST['applicant_fname']);
    $applicant_mname = $conn->real_escape_string($_POST['applicant_mname']);
    $applicant_lname = $conn->real_escape_string($_POST['applicant_lname']);
    $applicant_suffix = $conn->real_escape_string($_POST['applicant_suffix']);
    
    $requestor_fname = $conn->real_escape_string($_POST['requestor_fname']);
    $requestor_mname = $conn->real_escape_string($_POST['requestor_mname']);
    $requestor_lname = $conn->real_escape_string($_POST['requestor_lname']);
    $requestor_suffix = $conn->real_escape_string($_POST['requestor_suffix']);
    
    $house_no = $conn->real_escape_string($_POST['house_no']);
    $street = $conn->real_escape_string($_POST['street']);
    $subdivision = $conn->real_escape_string($_POST['subdivision']);
    
    $documentFor = $conn->real_escape_string($_POST['documentFor']);
    $purpose = $conn->real_escape_string($_POST['purpose']);
    $date_requested = $conn->real_escape_string($_POST['date_requested']);
    $status = $conn->real_escape_string($_POST['status']);
    $seen = $conn->real_escape_string($_POST['seen']);


    // Construct the SQL UPDATE query
    $update_query = "UPDATE tbl_certofindigency
                     SET `applicant_fname` = '$applicant_fname',
                         `applicant_mname`='$applicant_mname',`applicant_lname`='$applicant_lname',`applicant_suffix`='$applicant_suffix',`requestor_fname`='$requestor_fname',`requestor_mname`='$requestor_mname',`requestor_lname`='$requestor_lname',`requestor_suffix`='$requestor_suffix',`house_no`='$house_no',`street`='$street',`subdivision`='$subdivision',`documentFor`='$documentFor',`purpose`='$purpose',`date_requested`='$date_requested',
                         `status`='$status',
                         `seen`='$seen'
                     WHERE id = '$id'";

    // Execute the query
    $result = $conn->query($update_query);

    if ($result === true) {
        $_SESSION['message'] = 'Certificate of Indigency updated successfully!';
        $_SESSION['success'] = 'success';
    } else {
        $_SESSION['message'] = 'Error updating record: ' . $conn->error;
        $_SESSION['success'] = 'danger';
    }

$query = "SELECT documentFor FROM tbl_certofindigency WHERE `id`='$id'";
$result = $conn->query($query);

if ($result) {
    $certofindigency = $result->fetch_assoc();

    // Check if the 'documentFor' column exists in the result
    if (isset($certofindigency['documentFor'])) {
        $documentFor = $certofindigency['documentFor'];

        // Redirect to the appropriate page based on the 'documentFor' value
        if ($documentFor == "Self") {
            header("Location: ../../generate/certOfIndigency_generate_forself.php?id=". $id);
        } else {
            header("Location: ../../generate/certOfIndigency_generate_forsomeone.php?id=". $id);
        }
    } else {
        echo "Error: 'documentFor' column not found in the result.";
    }
} else {
    echo "Error: " . $conn->error;
}
    exit();
}

$conn->close();
?>