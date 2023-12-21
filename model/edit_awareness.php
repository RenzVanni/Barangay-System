<?php 
	include '../server/server.php';
    include "./functions/audit.php";


	if(!isset($_SESSION['username'])){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
  $id 	        = $conn->real_escape_string($_POST['id']);
    $firstname  = $conn->real_escape_string($_POST['firstname']);
    $middlename  = $conn->real_escape_string($_POST['middlename']);
    $lastname  = $conn->real_escape_string($_POST['lastname']);
    $suffix  = $conn->real_escape_string($_POST['suffix']);
  $date         = $conn->real_escape_string($_POST['date']);
  $time 	      = $conn->real_escape_string($_POST['time']);
  $location     = $conn->real_escape_string($_POST['location']);
  $details 	    = $conn->real_escape_string($_POST['details_awareness']);
  $status 	    = $conn->real_escape_string($_POST['status_awareness']);

	if(!empty($id)){

		if($status !== 'settled') {
			$query = "UPDATE tbl_awareness SET `firstname`='$firstname', `middlename`='$middlename', `lastname`='$lastname', `suffix`='$suffix', `date`='$date', `time`='$time', `location`='$location', `details`='$details', `status`='$status' WHERE id=$id;";	
			$result 	= $conn->query($query);
		if($result === true){
            
			$_SESSION['message'] = 'Awareness details has been updated!';
			$_SESSION['success'] = 'success';

			$user_id = $_SESSION['id'];
            $action = "UPDATE";
            $table_name = "Awareness";
            logAuditTrail($user_id, $action, $table_name);

		}else{

			$_SESSION['message'] = 'Somethin went wrong!';
			$_SESSION['success'] = 'danger';
		}

		} else {
			$query  = "INSERT INTO settled_awareness_archive (`firstname`, `middlename`, `lastname`, `suffix`, `date`, `time`, `location`, `details`, `status`) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$date','$time', '$location', '$details', '$status')";
			$result 	= $conn->query($query);

		if($result === true){
            
			$_SESSION['message'] = 'Awareness has been saved to archived!';
			$_SESSION['success'] = 'success';

			$user_id = $_SESSION['id'];
            $action = "DELETE";
            $table_name = "Archive Awareness";
            logAuditTrail($user_id, $action, $table_name);

			$delete = $conn->prepare("DELETE FROM tbl_awareness WHERE id = ?");
			$delete->bind_param("i", $id);
			$delete->execute();

		}else{

			$_SESSION['message'] = 'Somethin went wrong!';
			$_SESSION['success'] = 'danger';
		}

		}
	}else{
		$_SESSION['message'] = 'No Awareness ID found!';
		$_SESSION['success'] = 'danger';
	}

    echo "<script>window.location.href='../awareness.php'</script>";
    // header("Location: ../awareness.php");

	$conn->close();