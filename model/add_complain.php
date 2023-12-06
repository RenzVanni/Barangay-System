<?php 
	include('../server/server.php');

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
    $status 	    = $conn->real_escape_string($_POST['statusComplain']);

    if(!empty($date) && !empty($location) && !empty($time) && !empty($details) && !empty($status)){

        $insert  = "INSERT INTO tbl_complain (`complainant_fname`, `complainant_mname`, `complainant_lname`, `complainant_suffix`, `date`, `location`, `time`, `details`, `status`) 
        VALUES ('$complainant_fname', '$complainant_mname', '$complainant_lname', '$complainant_suffix', '$date','$location', '$time','$details','$status')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Complain added!';
            $_SESSION['success'] = 'success';

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    header("Location: ../complain.php");

	$conn->close();