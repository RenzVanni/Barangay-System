<?php 
	include('../server/server.php');
    include "./functions/audit.php";

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
    $applicant_fname    = $conn->real_escape_string(isset($_POST['applicant_fname']) ? $_POST['applicant_fname'] : "");
    $applicant_mname    = $conn->real_escape_string(isset($_POST['applicant_mname']) ? $_POST['applicant_mname'] : "");
    $applicant_lname    = $conn->real_escape_string(isset($_POST['applicant_lname']) ? $_POST['applicant_lname'] : "");
    $applicant_suffix    = $conn->real_escape_string($_POST['applicant_suffix']);

    $requestor_fname    = $conn->real_escape_string($_POST['requestor_fname']);
    $requestor_mname    = $conn->real_escape_string($_POST['requestor_mname']);
    $requestor_lname    = $conn->real_escape_string($_POST['requestor_lname']);
    $requestor_suffix    = $conn->real_escape_string($_POST['requestor_suffix']);

    $parent_fname    = $conn->real_escape_string($_POST['parent_fname']);
    $parent_mname    = $conn->real_escape_string($_POST['parent_mname']);
    $parent_lname    = $conn->real_escape_string($_POST['parent_lname']);
    $parent_suffix    = $conn->real_escape_string($_POST['parent_suffix']);

    $mother_fname    = $conn->real_escape_string($_POST['mother_fname']);
    $mother_mname    = $conn->real_escape_string($_POST['mother_mname']);
    $mother_lname    = $conn->real_escape_string($_POST['mother_lname']);
    $mother_suffix    = $conn->real_escape_string($_POST['mother_suffix']);

    $father_fname    = $conn->real_escape_string($_POST['father_fname']);
    $father_mname    = $conn->real_escape_string($_POST['father_mname']);
    $father_lname    = $conn->real_escape_string($_POST['father_lname']);
    $father_suffix    = $conn->real_escape_string($_POST['father_suffix']);

    $house_no         = $conn->real_escape_string($_POST['house_no']);
    $street         = $conn->real_escape_string($_POST['street']);
    $subdivision         = $conn->real_escape_string($_POST['subdivision']);
    
    $dob 	    = $conn->real_escape_string($_POST['dob']);
    $documentFor    = $conn->real_escape_string($_POST['documentFor']);

    if(!empty($applicant_fname) || !empty($requestor_fname) && !empty($applicant_lname) || !empty($requestor_lname)){

        $insert  = "INSERT INTO tbl_certoflbr (`applicant_fname`, `applicant_mname`, `applicant_lname`, `applicant_suffix`, `requestor_fname`, `requestor_mname`, `requestor_lname`, `requestor_suffix`, `parent_fname`, `parent_mname`, `parent_lname`, `parent_suffix`, `father_fname`, `father_mname`, `father_lname`, `father_suffix`, `mother_fname`, `mother_mname`, `mother_lname`, `mother_suffix`, `date_of_birth`, `house_no`, `street`, `subdivision`, `status`, `documentFor`) 
                    VALUES ('$applicant_fname', '$applicant_mname', '$applicant_lname', '$applicant_suffix', '$requestor_fname', '$requestor_mname', '$requestor_lname', '$requestor_suffix', '$parent_fname', '$parent_mname', '$parent_lname', '$parent_suffix', '$father_fname', '$father_mname', '$father_lname', '$father_suffix', '$mother_fname', '$mother_mname', '$mother_lname', '$mother_suffix', '$dob', '$house_no', '$street', '$subdivision', 'Pending', '$documentFor')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Late birth registration added!';
            $_SESSION['success'] = 'success';

            $user_id = $_SESSION['id'];
            $action = "INSERT";
            $table_name = "Certificate of Late Birth";
            logAuditTrail($user_id, $action, $table_name);

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    echo "<script>window.location.href='../certOfLBR.php'</script>";
    // header("Location: ../certOfLBR.php");

	$conn->close();