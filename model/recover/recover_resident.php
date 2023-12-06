<?php
include '../../server/server.php';

	if(!isset($_SESSION['username']) && $_SESSION['role']!='administrator'){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
	$id 	= $conn->real_escape_string($_GET['id']);

	if($id != ''){

		try {
		$select = $conn->prepare("SELECT * FROM del_residents_archive WHERE id = ?");
		$select->bind_param("s", $id);
		$select->execute();
		$resident = $select->get_result()->fetch_assoc();

        $checkQuery = $conn->prepare("SELECT id FROM tbl_households WHERE firstname = ? AND lastname = ? AND date_of_birth = ?");
        $checkQuery->bind_param("sss", $resident['firstname'], $resident['lastname'], $resident['date_of_birth']);
        $checkQuery->execute();
        $exists = $checkQuery->get_result()->fetch_assoc();

        if(!$exists) {
		$insert = "INSERT INTO tbl_households (`firstname`, `middlename`, `lastname`, `sex`, `house_no`, `street`, `subdivision`, `date_of_birth`, `place_of_birth`, `civil_status`, `occupation`, `email`, `contact_no`, `voter_status`, `citizenship`, `household_no`, `osy`, `pwd`, `household_head`) 
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
		
		$delete = $conn->prepare("DELETE FROM del_residents_archive WHERE id = ?");
		$delete->bind_param("s", $id);
		$delete->execute();
        $_SESSION['message'] = 'Resident has been recovered!';
        $_SESSION['success'] = 'success';
        } else {
		
	    $_SESSION['message'] = 'Resident already recovered!';
        $_SESSION['success'] = 'warning';
        }
		
		} catch (Exception $e) { 
				$_SESSION['message'] = 'An error occurred: ' . $e->getMessage();
			$_SESSION['success'] = 'danger';
		}
	}else{

		$_SESSION['message'] = 'Missing Resident ID!';
		$_SESSION['success'] = 'danger';
	}	

	header("Location: ../../residentInfo.php");
	$conn->close();
 ?>