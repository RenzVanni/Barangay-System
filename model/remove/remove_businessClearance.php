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
			$select = $conn->prepare("SELECT * FROM tbl_businessclearance WHERE id = ?");
			$select->bind_param("s", $id);
			$select->execute();
			$businessClearance = $select->get_result()->fetch_assoc();

			$insert = "INSERT INTO del_businessclearance_archive(`business-name`, `business-owner-fname`, `business-owner-mname`, `business-owner-lname`, `house_no`, `street`, `subdivision`, `purpose`, `date-applied`, `documentFor`) VALUES (
				'{$businessClearance['business-name']}',
				'{$businessClearance['business-owner-fname']}',
				'{$businessClearance['business-owner-mname']}',
				'{$businessClearance['business-owner-lname']}',
				'{$businessClearance['house_no']}',
				'{$businessClearance['street']}',
				'{$businessClearance['subdivision']}',
				'{$businessClearance['purpose']}',
				'{$businessClearance['date-applied']}',
				'{$businessClearance['documentFor']}'
			)";
			$conn->query($insert);

			$query = "DELETE FROM tbl_businessclearance WHERE id = '$id'";
			$result = $conn->query($query);
			
			if($result === true){
				$_SESSION['message'] = 'Clearance has been removed!';
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

		$_SESSION['message'] = 'Missing Clearance ID!';
		$_SESSION['success'] = 'danger';
	}

    echo "<script>window.location.href='../../businessClearance.php'</script>";
    // header("Location: ../../businessClearance.php");
	$conn->close();