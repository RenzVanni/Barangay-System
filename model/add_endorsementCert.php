<?php 
	include('../server/server.php');
    include "./functions/audit.php";


    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
    $applicant_fname    = $conn->real_escape_string($_POST['applicant_fname']);
    $applicant_mname    = $conn->real_escape_string($_POST['applicant_mname']);
    $applicant_lname    = $conn->real_escape_string($_POST['applicant_lname']);
    $applicant_suffix   = $conn->real_escape_string($_POST['applicant_suffix']);
    
    $requestor_fname    = $conn->real_escape_string($_POST['requestor_fname']);
    $requestor_mname    = $conn->real_escape_string($_POST['requestor_mname']);
    $requestor_lname    = $conn->real_escape_string($_POST['requestor_lname']);
    $requestor_suffix   = $conn->real_escape_string($_POST['requestor_suffix']);
    
    $house_no         = $conn->real_escape_string($_POST['house_no']);
    $street         = $conn->real_escape_string($_POST['street']);
    $subdivision         = $conn->real_escape_string($_POST['subdivision']);
    
    $purpose      = $conn->real_escape_string($_POST['purpose']);
    $documentFor  = $conn->real_escape_string($_POST['documentFor']);

    if(!empty($applicant_fname) || !empty($requestor_fname) && !empty($applicant_lname) || !empty($requestor_lname)){

        $insert  = "INSERT INTO tbl_ecertificate (`applicant_fname`, `applicant_mname`, `applicant_lname`, `applicant_suffix`, `requestor_fname`, `requestor_mname`, `requestor_lname`, `requestor_suffix`, `house_no`, `street`, `subdivision`, `documentFor`, `purpose`, `status`) 
                    VALUES ('$applicant_fname', '$applicant_mname', '$applicant_lname', '$applicant_suffix', '$requestor_fname', '$requestor_mname', '$requestor_lname', '$requestor_suffix', '$house_no', '$street', '$subdivision', '$documentFor','$purpose', 'Pending')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Endorsement Certificate added!';
            $_SESSION['success'] = 'success';

            $user_id = $_SESSION['id'];
            $action = "INSERT";
            $table_name = "Endorsement Certificate";
            logAuditTrail($user_id, $action, $table_name);

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    echo "<script>window.location.href='../endorsmentCert.php'</script>";
    // header("Location: ../endorsmentCert.php");

	$conn->close();