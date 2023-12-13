<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $father_fname    = $conn->real_escape_string($_POST['ffname']);
    $father_mname    = $conn->real_escape_string($_POST['fmname']);
    $father_lname    = $conn->real_escape_string($_POST['flname']);

    $mother_fname    = $conn->real_escape_string($_POST['mfname']);
    $mother_mname    = $conn->real_escape_string($_POST['mmname']);
    $mother_lname    = $conn->real_escape_string($_POST['mlname']);

        
    
    $applicant_fname    = $conn->real_escape_string($_POST['applicant_fname']);
    $applicant_mname    = $conn->real_escape_string($_POST['applicant_mname']);
    $applicant_lname    = $conn->real_escape_string($_POST['applicant_lname']);
    $requestor_fname    = $conn->real_escape_string(isset($_POST['requestor_fname']) ? $_POST['requestor_fname'] : "");
    $requestor_mname    = $conn->real_escape_string(isset($_POST['requestor_mname']) ? $_POST['requestor_mname'] : "");
    $requestor_lname    = $conn->real_escape_string(isset($_POST['requestor_lname']) ? $_POST['requestor_lname'] : "");
    $applicant_houseNo      = $conn->real_escape_string($_POST['applicant_houseNo']);
    $applicant_street      = $conn->real_escape_string($_POST['applicant_street']);
    $applicant_subdivision      = $conn->real_escape_string($_POST['applicant_subdivision']);
    $documentFor  = $conn->real_escape_string($_POST['documentFor']);
    // $contactNo      = $conn->real_escape_string($_POST['contactNo']);
    // $purpose      = $conn->real_escape_string($_POST['purpose']);
    
    if(!empty($applicant_fname) || !empty($requestor_fname) && !empty($applicant_lname) || !empty($requestor_lname) ){

        $insert  = "INSERT INTO tbl_certoflbr (`applicant_fname`, `applicant_mname`, `applicant_lname`, `requestor_fname`, `requestor_mname`, `requestor_lname`, `house_no`, `street`, `subdivision`, `father_fname`, `father_mname`, `father_lname`, `mother_fname`, `mother_mname`, `mother_lname`, `documentFor`, `status`, `seen`) 
                    VALUES ('$applicant_fname', '$applicant_mname', '$applicant_lname', '$requestor_fname', '$requestor_mname', '$requestor_lname', '$applicant_houseNo', '$applicant_street', '$applicant_subdivision', '$father_fname', '$father_mname', '$father_lname', '$mother_fname', '$mother_mname', '$mother_lname','$documentFor', 'Pending', 'unread')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Certificate of Late Birth Registration requested successfully!';
            $_SESSION['sub_message'] = '     <p>Thank you for your request. We are working on it! To check your request status, please go to <a
                href="Cart.php">"Request Status"</a> page.
        </p>';
            $_SESSION['success'] = 'success';
            $certClass = "Certificate of Late Birth Registration";
            include "./received/received_request.php";


        }else{
            $_SESSION['message'] = 'Something went wrong daw!';
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