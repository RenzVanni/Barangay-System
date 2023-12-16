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
			$select = $conn->prepare("SELECT * FROM tbl_certoflbr WHERE id = ?");
			$select->bind_param("s", $id);
			$select->execute();
			$idForm = $select->get_result()->fetch_assoc();

		$insert = "INSERT INTO del_certoflbr_archive( `applicant_fname`, `applicant_mname`, `applicant_lname`, `applicant_suffix`, `requestor_fname`, `requestor_mname`, `requestor_lname`, `requestor_suffix`, `parent_fname`, `parent_mname`, `parent_lname`, `parent_suffix`, `father_fname`, `father_mname`, `father_lname`, `father_suffix`, `mother_fname`, `mother_mname`, `mother_lname`, `mother_suffix`, `date_of_birth`, `house_no`, `street`, `subdivision`, `status`, `date_requested`, `documentFor`) VALUES (
				'{$idForm['applicant_fname']}',
				'{$idForm['applicant_mname']}',
				'{$idForm['applicant_lname']}',
				'{$idForm['applicant_suffix']}',
				'{$idForm['requestor_fname']}',
				'{$idForm['requestor_mname']}',
				'{$idForm['requestor_lname']}',
				'{$idForm['requestor_suffix']}',
                '{$idForm['parent_fname']}',
				'{$idForm['parent_mname']}',
				'{$idForm['parent_lname']}',
				'{$idForm['parent_suffix']}',
                '{$idForm['father_fname']}',
				'{$idForm['father_mname']}',
				'{$idForm['father_lname']}',
				'{$idForm['father_suffix']}',
                '{$idForm['mother_fname']}',
				'{$idForm['mother_mname']}',
				'{$idForm['mother_lname']}',
				'{$idForm['mother_suffix']}',
				'{$idForm['date_of_birth']}',
				'{$idForm['house_no']}',
				'{$idForm['street']}',
				'{$idForm['subdivision']}',
				'Cancel',
				'{$idForm['date_requested']}',
				'{$idForm['documentFor']}'
			)";
			$conn->query($insert);
	 
			$query 		= "DELETE FROM tbl_certoflbr WHERE id = '$id'";
			
			$result 	= $conn->query($query);
			
			if($result === true){
				$_SESSION['message'] = 'Certificate of Late Birth has been removed!';
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

		$_SESSION['message'] = 'Missing Certificate of Late Birth ID!';
		$_SESSION['success'] = 'danger';
	}

    echo "<script>window.location.href='../../Cart.php'</script>";
    // header("Location: ../../Cart.php");
	$conn->close();