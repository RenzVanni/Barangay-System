<?php 
	include '../server/server.php';

	if(!isset($_SESSION['username'])){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
    $id 	= $conn->real_escape_string($_POST['official_id']);
	$fname 	= $conn->real_escape_string($_POST['officialName_fname']);
	$mname 	= $conn->real_escape_string($_POST['officialName_mname']);
	$lname 	= $conn->real_escape_string($_POST['officialName_lname']);
	$suffix 	= $conn->real_escape_string($_POST['officialName_suffix']);
	$chair 	= $conn->real_escape_string($_POST['chairmanship']);
	$start 	= $conn->real_escape_string($_POST['term-start']);
    $end 	= $conn->real_escape_string($_POST['term-end']);
	$status 	= $conn->real_escape_string($_POST['status']);

	if(!empty($id)){

		if($status !== 'Inactive') {
		$query 		= "UPDATE tblofficials SET `firstname`='$fname', `middlename`='$mname', `lastname`='$lname', `suffix`='$suffix',   `chairmanship`='$chair', termstart='$start', termend='$end', `status`='$status' WHERE id=$id;";	
		$result 	= $conn->query($query);

		if($result === true){
            
			$_SESSION['message'] = 'Brgy official has been updated!';
			$_SESSION['success'] = 'success';

		}else{

			$_SESSION['message'] = 'Something went wrong!';
			$_SESSION['success'] = 'danger';
		}
	} else { 
		$query  = "INSERT INTO officials_archive (`firstname`, `middlename`, `lastname`, `suffix`, `chairmanship`,  termstart, termend, `status`) VALUES ('$fname', '$mname', '$lname', '$suffix', '$chair', '$start','$end', '$status')";
		$result 	= $conn->query($query);

		if($result === true){
            
			$_SESSION['message'] = 'Brgy official has been saved to archive!';
			$_SESSION['success'] = 'success';

			$delete = $conn->prepare("DELETE FROM tblofficials WHERE id = ?");
			$delete->bind_param("i", $id);
			$delete->execute();

		}else{

			$_SESSION['message'] = 'Something went wrong!';
			$_SESSION['success'] = 'danger';
		}
	}

	}else{
		$_SESSION['message'] = 'No Brgy Official ID found!';
		$_SESSION['success'] = 'danger';
	}

    header("Location: ../barangayOfficials.php");

	$conn->close();