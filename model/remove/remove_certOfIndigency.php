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
			$select = $conn->prepare("SELECT * FROM tbl_certofindigency WHERE id = ?");
			$select->bind_param("s", $id);
			$select->execute();
			$certofindigency = $select->get_result()->fetch_assoc();

			$insert = "INSERT INTO del_certofindigency_archive(`applicant_fname`, `applicant_mname`, `applicant_lname`, `requestor_fname`, `requestor_mname`, `requestor_lname`, `house_no`, `street`, `subdivision`, `documentFor`, `purpose`, `status`, `date_requested`) VALUES (
				'{$certofindigency['applicant_fname']}',
				'{$certofindigency['applicant_mname']}',
				'{$certofindigency['applicant_lname']}',
				'{$certofindigency['requestor_fname']}',
				'{$certofindigency['requestor_mname']}',
				'{$certofindigency['requestor_lname']}',
				'{$certofindigency['house_no']}',
				'{$certofindigency['street']}',
				'{$certofindigency['subdivision']}',
				'{$certofindigency['documentFor']}',
				'{$certofindigency['purpose']}',
				'Cancel',
				'{$certofindigency['date-requested']}'
			)";
			$conn->query($insert);

			$query = "DELETE FROM tbl_certofindigency WHERE id = '$id'";
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

    echo "<script>window.location.href='../../certOfIndigency.php'</script>";
    // header("Location: ../../certOfIndigency.php");
	$conn->close();