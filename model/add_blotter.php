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
    
    $respondent_fname  = $conn->real_escape_string($_POST['respondent_fname']);
    $respondent_mname 	= $conn->real_escape_string($_POST['respondent_mname']);
    $respondent_lname 	= $conn->real_escape_string($_POST['respondent_lname']);
    $respondent_suffix 	= $conn->real_escape_string($_POST['respondent_suffix']);
    
    $victim_fname 	    = $conn->real_escape_string($_POST['victim_fname']);
    $victim_mname 	    = $conn->real_escape_string($_POST['victim_mname']);
    $victim_lname 	    = $conn->real_escape_string($_POST['victim_lname']);
    $victim_suffix	    = $conn->real_escape_string($_POST['victim_suffix']);
    $type 	      = $conn->real_escape_string($_POST['type']);
    $location 	  = $conn->real_escape_string($_POST['location']);
    $date         = $conn->real_escape_string($_POST['date']);
    $time 	      = $conn->real_escape_string($_POST['time']);
    $status 	    = $conn->real_escape_string($_POST['status']);
    $details 	    = $conn->real_escape_string($_POST['details']);

    if(!empty($location) && !empty($date) && !empty($time) && !empty($details)){

        $insert  = "INSERT INTO tbl_blotter (`complainant_fname`, `complainant_mname`, `complainant_lname`, `complainant_suffix`, `respondent_fname`, `respondent_mname`, `respondent_lname`, `respondent_suffix`, `victim_fname`, `victim_mname`, `victim_lname`, `victim_suffix`, `type`, `location`, `date`, `time`, `details`, `status`) 
                    VALUES ('$complainant_fname', '$complainant_mname', '$complainant_lname', '$complainant_suffix', '$respondent_fname', '$respondent_mname', '$respondent_lname', '$respondent_suffix', '$victim_fname', '$victim_mname', '$victim_lname', '$victim_suffix', '$type','$location','$date', '$time','$details', '$status')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Blotter added!';
            $_SESSION['success'] = 'success';

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    header("Location: ../blotter.php");

	$conn->close();