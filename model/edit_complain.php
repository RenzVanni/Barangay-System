<?php 
	include '../server/server.php';

	if(!isset($_SESSION['username'])){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
  $id 	        = $conn->real_escape_string($_POST['complain_id']);
  $complainant_fname  = $conn->real_escape_string($_POST['complainant_fname']);
    $complainant_mname  = $conn->real_escape_string($_POST['complainant_mname']);
    $complainant_lname  = $conn->real_escape_string($_POST['complainant_lname']);
    $complainant_suffix  = $conn->real_escape_string($_POST['complainant_suffix']);
  $date         = $conn->real_escape_string($_POST['date']);
  $time 	      = $conn->real_escape_string($_POST['time']);
  $location     = $conn->real_escape_string($_POST['location']);
  $details 	    = $conn->real_escape_string($_POST['details_complain']);
  $status 	    = $conn->real_escape_string($_POST['statusComplain']);

	if(!empty($id)){

		if($status !== 'settled') {
			$query = "UPDATE tbl_complain SET `complainant_fname`='$complainant_fname', `complainant_mname`='$complainant_mname', `complainant_lname`='$complainant_lname', `complainant_suffix`='$complainant_suffix', `date`='$date', `time`='$time', `location`='$location', `details`='$details', `status`='$status' WHERE id=$id;";	
			$result 	= $conn->query($query);
		if($result === true){
            
			$_SESSION['message'] = 'Complain details has been updated!';
			$_SESSION['success'] = 'success';

		}else{

			$_SESSION['message'] = 'Somethin went wrong!';
			$_SESSION['success'] = 'danger';
		}

		} else {
			$query  = "INSERT INTO settled_complain_archive (`complainant_fname`, `complainant_mname`, `complainant_lname`, `complainant_suffix`, `date`, `location`, `time`, `details`, `status`) VALUES ('$complainant_fname', '$complainant_mname', '$complainant_lname', '$complainant_suffix', '$date', '$location','$time',  '$details', '$status')";
			$result 	= $conn->query($query);

		if($result === true){
            
			$_SESSION['message'] = 'Complain has been saved to archived!';
			$_SESSION['success'] = 'success';

			$delete = $conn->prepare("DELETE FROM tbl_complain WHERE id = ?");
			$delete->bind_param("i", $id);
			$delete->execute();

		}else{

			$_SESSION['message'] = 'Somethin went wrong!';
			$_SESSION['success'] = 'danger';
		}

		}
	}else{
		$_SESSION['message'] = 'No Complain ID found!';
		$_SESSION['success'] = 'danger';
	}

	
    header("Location: ../complain.php");

	$conn->close();