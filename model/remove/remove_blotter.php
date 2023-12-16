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
			$select = $conn->prepare("SELECT * FROM tbl_blotter WHERE id = ?");
			$select->bind_param("s", $id);
			$select->execute();
			$blotter = $select->get_result()->fetch_assoc();

			$insert = "INSERT INTO del_blotter_archive(`complainant_fname`, `complainant_mname`, `complainant_lname`, `complainant_suffix`, `respondent_fname`, `respondent_mname`, `respondent_lname`, `respondent_suffix`, `victim_fname`, `victim_mname`, `victim_lname`, `victim_suffix`, `type`, `location`, `date`, `time`, `details`, `status`) VALUES (
				'{$blotter['complainant_fname']}',
				'{$blotter['complainant_mname']}',
				'{$blotter['complainant_lname']}',
				'{$blotter['complainant_suffix']}',
				'{$blotter['respondent_fname']}',
				'{$blotter['respondent_mname']}',
				'{$blotter['respondent_lname']}',
				'{$blotter['respondent_suffix']}',
				'{$blotter['victim_fname']}',
				'{$blotter['victim_mname']}',
				'{$blotter['victim_lname']}',
				'{$blotter['victim_suffix']}',
				'{$blotter['type']}',
				'{$blotter['location']}',
				'{$blotter['date']}',
				'{$blotter['time']}',	
				'{$blotter['details']}',	
				'{$blotter['status']}'	
			)";
			$conn->query($insert);
			
			$query = "DELETE FROM tbl_blotter WHERE id = '$id'";
			$result = $conn->query($query);
			
			
			if($result === true){
				$_SESSION['message'] = 'Blotter has been removed!';
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

		$_SESSION['message'] = 'Missing Blotter ID!';
		$_SESSION['success'] = 'danger';
	}

    echo "<script>window.location.href='../../blotter.php'</script>";
    // header("Location: ../../blotter.php");
	$conn->close();

	?>