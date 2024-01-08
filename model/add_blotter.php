<?php 
	include('../server/server.php');
    include "./functions/audit.php";


    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
    $incident_type  = $conn->real_escape_string($_POST['incident_type']);
    $location  = $conn->real_escape_string($_POST['location']);
    $blotter_date  = $conn->real_escape_string($_POST['blotter_date']);
    $involved  = $conn->real_escape_string($_POST['involved']);
    
    $details  = $conn->real_escape_string($_POST['details']);
    $respondent 	= $conn->real_escape_string($_POST['respondent']);


    $insert  = "INSERT INTO tbl_blotter (`incident_type`, `location`, `blotter_date`, `involved`, `details`, `respondent`) 
                VALUES ('$incident_type', '$location', '$blotter_date', '$involved', '$details', '$respondent')";

    $result  = $conn->query($insert);

    if($result === true){
        $_SESSION['message'] = 'Blotter added!';
        $_SESSION['success'] = 'success';

        $user_id = $_SESSION['id'];
        $action = "INSERT";
        $table_name = "Blotter";
        logAuditTrail($user_id, $action, $table_name);

    }else{
        $_SESSION['message'] = 'Something went wrong!';
        $_SESSION['success'] = 'danger';
    }

    echo "<script>window.location.href='../blotter.php'</script>";
    // header("Location: ../blotter.php");

	$conn->close();