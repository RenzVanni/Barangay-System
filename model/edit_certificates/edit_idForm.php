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
    
    $pob = $conn->real_escape_string($_POST['pob']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $civil_status = $conn->real_escape_string($_POST['civil_status']);
    $contact_no = $conn->real_escape_string($_POST['contact_no']);
    $documentFor = $conn->real_escape_string($_POST['documentFor']);
    $purpose = $conn->real_escape_string($_POST['purpose']);
    $date_requested = $conn->real_escape_string($_POST['date_requested']);
    $status = $conn->real_escape_string($_POST['status']);
    $seen = $conn->real_escape_string($_POST['seen']);


    // Construct the SQL UPDATE query
    $update_query = "UPDATE tbl_idform
                     SET `applicant_fname` = '$applicant_fname',
                         `applicant_mname`='$applicant_mname',`applicant_lname`='$applicant_lname',`applicant_suffix`='$applicant_suffix',`requestor_fname`='$requestor_fname',`requestor_mname`='$requestor_mname',`requestor_lname`='$requestor_lname',`requestor_suffix`='$requestor_suffix',`house_no`='$house_no',`street`='$street',`subdivision`='$subdivision',`place_of_birth`='$pob',`birth_date`='$dob',`civil_status`='$civil_status',`contact_number`='$contact_no',`documentFor`='$documentFor',`purpose`='$purpose',`date_requested`='$date_requested',
                         `status`='$status',
                         `seen`='$seen'
                     WHERE id = '$id'";

    // Execute the query
    $result = $conn->query($update_query);

    if ($result === true) {
        $_SESSION['message'] = 'IdForm updated successfully!';
        $_SESSION['success'] = 'success';
    } else {
        $_SESSION['message'] = 'Error updating record: ' . $conn->error;
        $_SESSION['success'] = 'danger';
    }

    // Redirect to the appropriate page (adjust the path accordingly)
    header("Location: ../../generate/idForm_generate.php?id=". $id);
    exit();
}

$conn->close();
?>