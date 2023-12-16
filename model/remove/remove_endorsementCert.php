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

			$select = $conn->prepare("SELECT * FROM tbl_ecertificate WHERE id = ?");
			$select->bind_param("s", $id);
			$select->execute();
			$ecertificate = $select->get_result()->fetch_assoc();

			$insert = "INSERT INTO del_ecertificate_archive(`applicant_fname`, `applicant_mname`, `applicant_lname`, `requestor_fname`, `requestor_mname`, `requestor_lname`, `house_no`, `street`, `subdivision`, `documentFor`, `purpose`, `status`, `date_requested`) VALUES (
				'{$ecertificate['applicant_fname']}',
				'{$ecertificate['applicant_mname']}',
				'{$ecertificate['applicant_lname']}',
				'{$ecertificate['requestor_fname']}',
				'{$ecertificate['requestor_mname']}',
				'{$ecertificate['requestor_lname']}',
				'{$ecertificate['house_no']}',
				'{$ecertificate['street']}',
				'{$ecertificate['subdivision']}',
				'{$ecertificate['documentFor']}',
				'{$ecertificate['purpose']}',
				'Cancel',
				'{$ecertificate['date_requested']}'
			)";
			$conn->query($insert);

			$query = "DELETE FROM tbl_ecertificate WHERE id = '$id'";
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

    echo "<script>window.location.href='../../endorsmentCert.php'</script>";
    // header("Location: ../../endorsmentCert.php");
	$conn->close();