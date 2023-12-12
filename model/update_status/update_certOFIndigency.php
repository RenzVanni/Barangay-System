<?php
include '../../server/server.php';

if (!isset($_SESSION['username'])) {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

$id = $conn->real_escape_string($_POST['id']);
$status = $conn->real_escape_string($_POST['status']);


if (!empty($status)) {
           $dateRequested = isset($_POST['dateRequested']) ? $_POST['dateRequested'] : '';

        $query2 = "SELECT * FROM tbl_certofindigency WHERE `id`='$id'";
        $result2 = $conn->query($query2);
        $applicant = $result2->fetch_assoc();

        $fname = !empty($applicant['requestor_fname']) ? $applicant['requestor_fname'] : $applicant['applicant_fname'];
        $mname = !empty($applicant['requestor_mname']) ? $applicant['requestor_mname'] : $applicant['applicant_mname'];
        $lname = !empty($applicant['requestor_lname']) ? $applicant['requestor_lname'] : $applicant['applicant_lname'];

        $query3 = "SELECT * FROM tbl_households WHERE `firstname`='$fname' AND `middlename`='$mname' AND `lastname`='$lname'";
        $result3 = $conn->query($query3);
        $resident = $result3->fetch_assoc();

        $contactNo = isset($resident['contact_no']) ? $resident['contact_no'] : "";
        
        $certificateType = "Certificate of Indigency";
        $isStatus = $status == "For Pick-up" ? true : false;
        include '../sms/certificate_sms.php';

    $query = "UPDATE tbl_certofindigency SET status='$status'";

    // Only include the date if it is present in the form
    if (!empty($dateRequested)) {
        $query .= ", date_requested='$dateRequested'";
    }

    $query .= " WHERE id='$id'";
    // $query = "UPDATE tbl_certofindigency SET status='$status' WHERE id='$id'";

    if ($conn->query($query) === true) {
        $_SESSION['message'] = 'Certificate of Indigency status has been updated!';
        $_SESSION['success'] = 'success';
    } else {
        $_SESSION['message'] = 'Error updating Endorsement Certificate of Indigency status: ' . $conn->error;
        $_SESSION['success'] = 'danger';
    }
} else {
    $_SESSION['message'] = 'Please complete the form!';
    $_SESSION['success'] = 'danger';
}

if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}

$conn->close();
?>