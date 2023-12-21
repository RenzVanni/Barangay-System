<?php 
	include('../server/server.php');
    include "./functions/audit.php";


    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
    $applicant_fname   = $conn->real_escape_string($_POST['applicant_fname']);
    $applicant_mname   = $conn->real_escape_string($_POST['applicant_mname']);
    $applicant_lname   = $conn->real_escape_string($_POST['applicant_lname']);
    $applicant_suffix   = $conn->real_escape_string($_POST['applicant_suffix']);
    
    $house_no         = $conn->real_escape_string($_POST['house_no']);
    $street         = $conn->real_escape_string($_POST['street']);
    $subdivision         = $conn->real_escape_string($_POST['subdivision']);
    
    $dob          = $conn->real_escape_string($_POST['dob']);
    $pob          = $conn->real_escape_string($_POST['pob']);
    $purpose      = $conn->real_escape_string($_POST['purpose']);

    if(!empty($applicant_fname) || !empty($requestor_fname) && !empty($applicant_lname) || !empty($requestor_lname)){

        $insert  = "INSERT INTO tbl_brgyclearance (`applicant_fname`, `applicant_mname`, `applicant_lname`, `applicant_suffix`, `house_no`, `street`, `subdivision`, `date-of-birth`, `place-of-birth`, `purpose`, `status`) 
                    VALUES ('$applicant_fname', '$applicant_mname', '$applicant_lname', '$applicant_suffix', '$house_no', '$street', '$subdivision','$dob', '$pob', '$purpose', 'Pending')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Barangay clearance added!';
            $_SESSION['success'] = 'success';

            $user_id = $_SESSION['id'];
            $action = "INSERT";
            $table_name = "Barangay Clearance";
            logAuditTrail($user_id, $action, $table_name);

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    echo "<script>window.location.href='../brgyClearance.php'</script>";
    // header("Location: ../brgyClearance.php");

	$conn->close();