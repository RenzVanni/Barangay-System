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

    $requestor_fname    = $conn->real_escape_string(isset($_POST['requestor_fname']) ? $_POST['requestor_fname'] : "");
    $requestor_mname    = $conn->real_escape_string(isset($_POST['requestor_mname']) ? $_POST['requestor_mname'] : "");
    $requestor_lname    = $conn->real_escape_string(isset($_POST['requestor_lname']) ? $_POST['requestor_lname'] : "");
    $requestor_suffix    = $conn->real_escape_string(isset($_POST['requestor_suffix']) ? $_POST['requestor_suffix'] : "");

    $applicant_houseNo      = $conn->real_escape_string($_POST['applicant_houseNo']);
    $applicant_street      = $conn->real_escape_string($_POST['applicant_street']);
    $applicant_subdivision      = $conn->real_escape_string($_POST['applicant_subdivision']);
    $applicant_pob      = $conn->real_escape_string($_POST['applicant_pob']);
    $applicant_dob      = $conn->real_escape_string($_POST['applicant_dob']);

    if(!empty($applicant_fname) || !empty($requestor_fname) && !empty($address)&& !empty($purpose)){

        $insert  = "INSERT INTO tbl_brgyclearance (`applicant_fname`, `applicant_mname`, `applicant_lname`, `applicant_suffix`, `house_no`, `street`, `subdivision`, `date-of-birth`, `place-of-birth`, `status`, `seen`) 
                    VALUES ('$applicant_fname', '$applicant_mname', '$applicant_lname', '$applicant_suffix','$applicant_houseNo', '$applicant_street', '$applicant_subdivision', '$applicant_dob', '$applicant_pob', 'Pending', 'unread')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Barangay Clearance requested successfully!';
            $_SESSION['sub_message'] = '     <p>Thank you for your request. We are working on it! To check your request status, please go to <a
                href="Cart.php">"Request Status"</a> page.
        </p>';
            $_SESSION['success'] = 'success';
            $certClass = "Barangay Clearance";
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
    // header("Location: ../index.php#services");
    echo "<script>window.location.href='../index.php#services'</script>";

	$conn->close();