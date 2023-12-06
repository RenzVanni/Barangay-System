<?php 
	include '../server/server.php';

	if(!isset($_SESSION['username'])){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
  $id 	        = $conn->real_escape_string($_POST['blotter_id']);
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

	if(!empty($id)){

		if($status !== 'settled') {
			$query = "UPDATE tbl_blotter SET `complainant_fname`='$complainant_fname',`complainant_mname`='$complainant_mname',`complainant_lname`='$complainant_lname',`complainant_suffix`='$complainant_suffix',`respondent_fname`='$respondent_fname',`respondent_mname`='$respondent_mname',`respondent_lname`='$respondent_lname',`respondent_suffix`='$respondent_suffix',`victim_fname`='$victim_fname',`victim_mname`='$victim_mname',`victim_lname`='$victim_lname',`victim_suffix`='$victim_suffix',`type`='$type',`location`='$location',`date`='$date',`time`='$time',`details`='$details',`status`='$status' WHERE id=$id;";	
			$result 	= $conn->query($query);
		if($result === true){
            
			$_SESSION['message'] = 'Blotter details has been updated!';
			$_SESSION['success'] = 'success';

		}else{

			$_SESSION['message'] = 'Somethin went wrong!';
			$_SESSION['success'] = 'danger';
		}

		} else {
			$query  = "INSERT INTO settled_blotter_archive (`complainant_fname`, `complainant_mname`, `complainant_lname`, `complainant_suffix`, `respondent_fname`, `respondent_mname`, `respondent_lname`, `respondent_suffix`, `victim_fname`, `victim_mname`, `victim_lname`, `victim_suffix`, `type`, `location`, `date`, `time`, `details`, `status`) 
                    VALUES ('$complainant_fname', '$complainant_mname', '$complainant_lname', '$complainant_suffix', '$respondent_fname', '$respondent_mname', '$respondent_lname', '$respondent_suffix', '$victim_fname', '$victim_mname', '$victim_lname', '$victim_suffix', '$type','$location','$date', '$time','$details', '$status')";
			$result 	= $conn->query($query);

		if($result === true){
            
			$_SESSION['message'] = 'Blotter has been saved to archived!';
			$_SESSION['success'] = 'success';

			$delete = $conn->prepare("DELETE FROM tbl_blotter WHERE id = ?");
			$delete->bind_param("i", $id);
			$delete->execute();

		}else{

			$_SESSION['message'] = 'Somethin went wrong!';
			$_SESSION['success'] = 'danger';
		}

		}
	}else{
		$_SESSION['message'] = 'No Blotter ID found!';
		$_SESSION['success'] = 'danger';
	}

    header("Location: ../blotter.php");

	$conn->close();