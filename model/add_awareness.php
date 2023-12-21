<?php 
	include('../server/server.php');
    include "./functions/audit.php";

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
    $firstname  = $conn->real_escape_string($_POST['firstname']);
    $middlename  = $conn->real_escape_string($_POST['middlename']);
    $lastname  = $conn->real_escape_string($_POST['lastname']);
    $suffix  = $conn->real_escape_string($_POST['suffix']);
    $date 	= $conn->real_escape_string($_POST['date']);
    $time 	      = $conn->real_escape_string($_POST['time']);
    $location 	    = $conn->real_escape_string($_POST['location']);
    $details 	  = $conn->real_escape_string($_POST['details_awareness']);
    

    if( !empty($date) && !empty($location) && !empty($time) && !empty($details)){

        $insert  = "INSERT INTO tbl_awareness (`firstname`, `middlename`, `lastname`, `suffix`, `date`, `time`, `location`, `details`, `seen`) 
        VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$date','$time', '$location','$details','read')";

        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Awareness added!';
            $_SESSION['success'] = 'success';

            $user_id = $_SESSION['id'];
            $action = "INSERT";
            $table_name = "Awareness";
            logAuditTrail($user_id, $action, $table_name);

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    echo "<script>window.location.href='../awareness.php'</script>";
    // header("Location: ../awareness.php");

	$conn->close();