<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $applicant_fname    = $conn->real_escape_string($_POST['applicant_fname']);
    $applicant_mname    = $conn->real_escape_string(isset($_POST['applicant_mname']) ? $_POST['applicant_mname'] : "");
    $applicant_lname    = $conn->real_escape_string($_POST['applicant_lname']);
    $applicant_suffix    = $conn->real_escape_string(isset($_POST['applicant_suffix']) ? $_POST['applicant_suffix'] : "");

    $requestor_fname    = $conn->real_escape_string($_POST['requestor_fname']);
    $requestor_mname    = $conn->real_escape_string(isset($_POST['requestor_mname']) ? $_POST['requestor_mname'] : "");
    $requestor_lname    = $conn->real_escape_string($_POST['requestor_lname']);
    $requestor_suffix    = $conn->real_escape_string(isset($_POST['requestor_suffix']) ? $_POST['requestor_suffix'] : "");

    $applicant_houseNo      = $conn->real_escape_string($_POST['applicant_houseNo']);
    $applicant_street      = $conn->real_escape_string($_POST['applicant_street']);
    $applicant_subdivision      = $conn->real_escape_string($_POST['applicant_subdivision']);
    $documentFor  = $conn->real_escape_string($_POST['documentFor']);

    if(!empty($applicant_fname) || !empty($requestor_fname)){

        $insert  = "INSERT INTO tbl_ecertificate (`applicant_fname`, `applicant_mname`, `applicant_lname`, `applicant_suffix`, `requestor_fname`, `requestor_mname`, `requestor_lname`, `requestor_suffix`, `house_no`, `street`, `subdivision`, `documentFor`, `status`, `seen`) 
                    VALUES ('$requestor_fname', '$requestor_mname', '$requestor_lname', '$requestor_suffix', '$applicant_fname', '$applicant_mname', '$applicant_lname', '$applicant_suffix', '$applicant_houseNo', '$applicant_street', '$applicant_subdivision',  '$documentFor', 'Pending', 'unread')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Endorsement certificate requested successfully!';
            $_SESSION['sub_message'] = '     <p>Thank you for your request. We are working on it! To check your request status, please go to <a
                href="Cart.php">"Request Status"</a> page.
        </p>';
            $_SESSION['success'] = 'success';
            $certClass = "Endorsement Certificate";
            include "./received/received_request.php";

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }
    } else {
        $_SESSION['message'] = 'Something went wrong!';
        $_SESSION['success'] = 'danger';
    }
    header("Location: ../index.php#services");

	$conn->close();