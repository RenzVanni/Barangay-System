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

			$insert = "INSERT INTO del_blotter_archive(`incident_type`, `location`, `blotter_date`, `involved`, `details`, `respondent`) VALUES (
				'{$blotter['incident_type']}',
				'{$blotter['location']}',
				'{$blotter['blotter_date']}',
				'{$blotter['involved']}',
				'{$blotter['details']}',
				'{$blotter['respondent']}'
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