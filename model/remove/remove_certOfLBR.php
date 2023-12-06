<?php 
	include '../../server/server.php';

	if(!isset($_SESSION['username']) && $_SESSION['role']!='administrator'){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
	$id 	= $conn->real_escape_string($_GET['id']);

	if(!empty($id)){
		try {
			$select = $conn->prepare("SELECT * FROM tbl_certoflbr WHERE id = ?");
			$select->bind_param("s", $id);
			$select->execute();
			$certoflbr = $select->get_result()->fetch_assoc();

			$insert = "INSERT INTO del_certoflbr_archive(`applicant_fname`, `applicant_mname`, `applicant_lname`, `requestor_fname`, `requestor_mname`, `requestor_lname`, `parent_fname`, `parent_mname`, `parent_lname`, `father_fname`, `father_mname`, `father_lname`, `mother_fname`, `mother_mname`, `mother_lname`, `date_of_birth`, `house_no`, `street`, `subdivision`, `status`, `date_requested`, `documentFor`) VALUES (
				'{$certoflbr['applicant_fname']}',
				'{$certoflbr['applicant_mname']}',
				'{$certoflbr['applicant_lname']}',
				'{$certoflbr['requestor_fname']}',
				'{$certoflbr['requestor_mname']}',
				'{$certoflbr['requestor_lname']}',
				'{$certoflbr['parent_fname']}',
				'{$certoflbr['parent_mname']}',
				'{$certoflbr['parent_lname']}',
				'{$certoflbr['father_fname']}',
				'{$certoflbr['father_mname']}',
				'{$certoflbr['father_lname']}',
				'{$certoflbr['mother_fname']}',
				'{$certoflbr['mother_mname']}',
				'{$certoflbr['mother_lname']}',
				'{$certoflbr['date_of_birth']}',
				'{$certoflbr['house_no']}',
				'{$certoflbr['street']}',
				'{$certoflbr['subdivision']}',
				'Cancel',
				'{$certoflbr['date_requested']}',
				'{$certoflbr['documentFor']}'
			)";
			$conn->query($insert);
			
			$query = "DELETE FROM tbl_certoflbr WHERE id = '$id'";
			$result = $conn->query($query);
			
			if($result === true){
				$_SESSION['message'] = 'Certificate has been removed!';
				$_SESSION['success'] = 'danger';
				
			}else{
				$_SESSION['message'] = 'Something went wrong!';
				$_SESSION['success'] = 'danger';
			}
		} catch (Exception $e) { 
			$_SESSION['message'] = 'An error occurred: ' . $e->getMessage();
			$_SESSION['success'] = 'danger';
		}
	}else{

		$_SESSION['message'] = 'Missing Certificate ID!';
		$_SESSION['success'] = 'danger';
	}

    header("Location: ../../certOfLBR.php");
	$conn->close();