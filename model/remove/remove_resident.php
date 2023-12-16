<?php
include '../../server/server.php';

	if(!isset($_SESSION['username']) && $_SESSION['role']!='administrator'){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
	$id 	= $conn->real_escape_string($_GET['id']);
	$head 	= $conn->real_escape_string($_GET['head']);

	if($head == 'yes') {
		$_SESSION['message'] = 'You cannot delete the household head!';
		$_SESSION['success'] = 'danger';
		header("Location: ../../household.php");
		exit();
	}

	if($id != ''){

		try {
		$select = $conn->prepare("SELECT * FROM tbl_households WHERE id = ?");
		$select->bind_param("s", $id);
		$select->execute();
		$resident = $select->get_result()->fetch_assoc();

		$insert = "INSERT INTO del_residents_archive (`firstname`, `middlename`, `lastname`, `sex`, `house_no`, `street`, `subdivision`, `date_of_birth`, `place_of_birth`, `civil_status`, `occupation`, `email`, `contact_no`, `voter_status`, `citizenship`, `household_no`, `osy`, `pwd`, `household_head`) 
        VALUES (			
				'{$resident['firstname']}', 
				'{$resident['middlename']}',
				'{$resident['lastname']}',
				'{$resident['sex']}',
				'{$resident['house_no']}',
				'{$resident['street']}',
				'{$resident['subdivision']}',
				'{$resident['date_of_birth']}',
				'{$resident['place_of_birth']}',
				'{$resident['civil_status']}',
				'{$resident['occupation']}',
				'{$resident['email']}',
				'{$resident['contact_no']}',
				'{$resident['voter_status']}',
				'{$resident['citizenship']}',
				'{$resident['household_no']}',
				'{$resident['osy']}',
				'{$resident['pwd']}',
				'{$resident['household_head']}' )";
		$conn->query($insert);

		$deleteUser = $conn->prepare("DELETE FROM tbl_users WHERE firstname = ? AND middlename = ? AND lastname = ?");
		$deleteUser->bind_param("sss", $resident['firstname'], $resident['middlename'], $resident['lastname']);
		$deleteUser->execute();
		
		$delete = $conn->prepare("DELETE FROM tbl_households WHERE id = ?");
		$delete->bind_param("s", $id);
		$delete->execute();
		
		$_SESSION['message'] = $exists ? 'Resident already archived!' : 'Resident has been removed!';
		$_SESSION['success'] = $exists ? 'warning' : 'danger';
		
		} catch (Exception $e) { 
				$_SESSION['message'] = 'An error occurred: ' . $e->getMessage();
			$_SESSION['success'] = 'danger';
		}
	}else{

		$_SESSION['message'] = 'Missing Resident ID!';
		$_SESSION['success'] = 'danger';
	}	
    echo "<script>window.location.href='../../residentInfo.php'</script>";
	// header("Location: ../../residentInfo.php");
	$conn->close();
 ?>