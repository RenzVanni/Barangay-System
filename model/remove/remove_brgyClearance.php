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
			$select = $conn->prepare("SELECT * FROM tbl_brgyclearance WHERE id = ?");
			$select->bind_param("s", $id);
			$select->execute();
			$brgyClearance = $select->get_result()->fetch_assoc();

			$insert = "INSERT INTO del_brgyclearance_archive(`applicant_fname`, `applicant_mname`, `applicant_lname`, `requestor_fname`, `requestor_mname`, `requestor_lname`, `house_no`, `street`, `subdivision`, `date-of-birth`, `place-of-birth`, `purpose`, `status`) VALUES (
				'{$brgyClearance['applicant_fname']}',
				'{$brgyClearance['applicant_mname']}',
				'{$brgyClearance['applicant_lname']}',
				'{$brgyClearance['requestor_fname']}',
				'{$brgyClearance['requestor_mname']}',
				'{$brgyClearance['requestor_lname']}',
				'{$brgyClearance['house-no']}',
				'{$brgyClearance['street']}',
				'{$brgyClearance['subdivision']}',
				'{$brgyClearance['date-of-birth']}',
				'{$brgyClearance['place-of-birth']}',
				'{$brgyClearance['purpose']}',
				'Cancel'
			)";
			$conn->query($insert);
	 
			$query 		= "DELETE FROM tbl_brgyclearance WHERE id = '$id'";
			
			$result 	= $conn->query($query);
			
			if($result === true){
				$_SESSION['message'] = 'Brgy Clearance has been removed!';
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

		$_SESSION['message'] = 'Missing Brgy Clearance ID!';
		$_SESSION['success'] = 'danger';
	}

    echo "<script>window.location.href='../../brgyClearance.php'</script>";
    // header("Location: ../../brgyClearance.php");
	$conn->close();