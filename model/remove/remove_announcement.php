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
			$select = $conn->prepare("SELECT * FROM tbl_announcement WHERE id = ?");
			$select->bind_param("s", $id);
			$select->execute();
			$announcement = $select->get_result()->fetch_assoc();

			$insert = "INSERT INTO del_announcement_archive(`title`, `details`, `date_announcement`, `image_announcement`, `begin_date`, `until_date`) VALUES (
				'{$announcement['title']}',
				'{$announcement['details']}',
				'{$announcement['date_announcement']}',
				'{$announcement['image_announcement']}',
				'{$announcement['begin_date']}',
				'{$announcement['until_date']}'
			)";
			$conn->query($insert);

			$query = "DELETE FROM tbl_announcement WHERE id = '$id'";
			$result = $conn->query($query);
			
			if($result === true){
				$_SESSION['message'] = 'Announcement has been removed!';
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

		$_SESSION['message'] = 'Missing Announcement ID!';
		$_SESSION['success'] = 'danger';
	}

    header("Location: ../../announcement.php");
	$conn->close();