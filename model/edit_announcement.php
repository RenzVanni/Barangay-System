<?php 
	include '../server/server.php';
    include "./functions/audit.php";

	if(!isset($_SESSION['username'])){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
    $id 	        = $conn->real_escape_string($_POST['id']);
    $title  = $conn->real_escape_string($_POST['title']);
    $details  = $conn->real_escape_string($_POST['details']);
    $begin_date  = $conn->real_escape_string($_POST['begin_date']);
    $until_date         = $conn->real_escape_string($_POST['until_date']);
    $date_announcement 	      = $conn->real_escape_string($_POST['date_announcement']);

    $image_announcement = $_FILES['image_announcement']['name'];

    // File upload handling
    $targetDirectory = "../uploads/announcement/";
    $targetAnnouncement = $targetDirectory . basename($_FILES['image_announcement']['name']);
    $validAnnouncementImage = move_uploaded_file($_FILES['image_announcement']['tmp_name'], $targetAnnouncement);
    
	if(!empty($id)){

		if($image_announcement) {
			$query = "UPDATE tbl_announcement SET `title`='$title', `details`='$details', `date_announcement`='$date_announcement', `image_announcement`='$image_announcement', `begin_date`='$begin_date', `until_date`='$until_date' WHERE id=$id;";	
			$result 	= $conn->query($query);
		if($result === true){
            
			$_SESSION['message'] = 'Announcement details has been updated!';
			$_SESSION['success'] = 'success';

			$user_id = $_SESSION['id'];
            $action = "UPDATE";
            $table_name = "Announcement";
            logAuditTrail($user_id, $action, $table_name);

		}else{

			$_SESSION['message'] = 'Somethin went wrong!';
			$_SESSION['success'] = 'danger';
		}

		} else {
            $query = "UPDATE tbl_announcement SET `title`='$title', `details`='$details', `date_announcement`='$date_announcement', `begin_date`='$begin_date', `until_date`='$until_date' WHERE id=$id;";	
			$result 	= $conn->query($query);
		if($result === true){
            
			$_SESSION['message'] = 'Announcement details has been updated!';
			$_SESSION['success'] = 'success';

			$user_id = $_SESSION['id'];
            $action = "UPDATE";
            $table_name = "Annoucement";
            logAuditTrail($user_id, $action, $table_name);

		}else{

			$_SESSION['message'] = 'Somethin went wrong!';
			$_SESSION['success'] = 'danger';
		}

		}
	}else{
		$_SESSION['message'] = 'No Announcement ID found!';
		$_SESSION['success'] = 'danger';
	}

    echo "<script>window.location.href='../announcement.php'</script>";
    // header("Location: ../announcement.php");

	$conn->close();