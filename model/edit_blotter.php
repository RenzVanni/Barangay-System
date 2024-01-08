<?php 
	include '../server/server.php';
    include "./functions/audit.php";

	if(!isset($_SESSION['username'])){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
 	$id 	        = $conn->real_escape_string($_POST['blotter_id']);
    $incident_type  = $conn->real_escape_string($_POST['incident_type']);
    $location  = $conn->real_escape_string($_POST['location']);
    $blotter_date  = $conn->real_escape_string($_POST['blotter_date']);
    $involved  = $conn->real_escape_string($_POST['involved']);
    
    $details  = $conn->real_escape_string($_POST['details']);
    $respondent 	= $conn->real_escape_string($_POST['respondent']);

	if(!empty($id)){
		$query = "UPDATE tbl_blotter SET `incident_type`='$incident_type',`location`='$location',`blotter_date`='$blotter_date',`involved`='$involved',`details`='$details',`respondent`='$respondent' WHERE `id`='$id'";	
		$result 	= $conn->query($query);
		if($result === true){
            
			$_SESSION['message'] = 'Blotter details has been updated!';
			$_SESSION['success'] = 'success';

			$user_id = $_SESSION['id'];
            $action = "UPDATE";
            $table_name = "Blotter";
            logAuditTrail($user_id, $action, $table_name);

		}else{

			$_SESSION['message'] = 'Something went wrong!';
			$_SESSION['success'] = 'danger';
		}
	}else{
		$_SESSION['message'] = 'No Blotter ID found!';
		$_SESSION['success'] = 'danger';
	}

    echo "<script>window.location.href='../blotter.php'</script>";
    // header("Location: ../blotter.php");

	$conn->close();