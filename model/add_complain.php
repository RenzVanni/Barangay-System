<?php 
	include('../server/server.php');
    include "./functions/audit.php";

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
    $complainant_fname  = $conn->real_escape_string($_POST['complainant_fname']);
    $complainant_mname  = $conn->real_escape_string($_POST['complainant_mname']);
    $complainant_lname  = $conn->real_escape_string($_POST['complainant_lname']);
    $complainant_suffix  = $conn->real_escape_string($_POST['complainant_suffix']);
    
    $date 	= $conn->real_escape_string($_POST['date']);
    $location 	    = $conn->real_escape_string($_POST['location']);
    $time 	      = $conn->real_escape_string($_POST['time']);
    $details 	  = $conn->real_escape_string($_POST['details_complain']);
   

    if(!empty($date) && !empty($location) && !empty($time) && !empty($details)){

        $insert  = "INSERT INTO tbl_complain (`complainant_fname`, `complainant_mname`, `complainant_lname`, `complainant_suffix`, `date`, `location`, `time`, `details`,`seen`) 
        VALUES ('$complainant_fname', '$complainant_mname', '$complainant_lname', '$complainant_suffix', '$date','$location', '$time','$details','read')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Complain added!';
            $_SESSION['success'] = 'success';

            $user_id = $_SESSION['id'];
            $action = "INSERT";
            $table_name = "Complain";
            logAuditTrail($user_id, $action, $table_name);

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    echo "<script>window.location.href='../complain.php'</script>";
    // header("Location: ../complain.php");

	$conn->close();