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
			$select = $conn->prepare("SELECT * FROM tbl_business WHERE id = ?");
			$select->bind_param("s", $id);
			$select->execute();
			$business = $select->get_result()->fetch_assoc();

			$insert = "INSERT INTO del_business_archive(`taxpayer_fname`, `taxpayer_mname`, `taxpayer_lname`, `taxpayer_suffix`, `business_name`, `house_no`, `street`, `subdivision`, `business_type`, `business_status`, `business_started`) VALUES (
				'{$business['taxpayer_fname']}',
				'{$business['taxpayer_mname']}',
				'{$business['taxpayer_lname']}',
				'{$business['taxpayer_suffix']}',
				'{$business['business_name']}',
				'{$business['house_no']}',
				'{$business['street']}',
				'{$business['subdivision']}',
				'{$business['business_type']}',
				'{$business['business_status']}',
				'{$business['business_started']}'
			)";
			$conn->query($insert);

			$query = "DELETE FROM tbl_business WHERE id = '$id'";
			$result = $conn->query($query);
			
			if($result === true){
				$_SESSION['message'] = 'Business has been removed!';
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

    header("Location: ../../business.php");
	$conn->close();