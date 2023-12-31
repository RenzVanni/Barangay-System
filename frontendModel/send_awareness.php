<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
    $firstname  = $conn->real_escape_string($_POST['firstname']);
    $middlename  = $conn->real_escape_string($_POST['middlename']);
    $lastname  = $conn->real_escape_string($_POST['lastname']);
    $suffix  = $conn->real_escape_string($_POST['suffix']);
    $details 	  = $conn->real_escape_string($_POST['details']);

    $house_no 	    = $conn->real_escape_string($_POST['house_no']);
    $street 	    = $conn->real_escape_string($_POST['street']);
    $subdivision 	    = $conn->real_escape_string($_POST['subdivision']);

    $location = $house_no." ".$street." ".$subdivision;

    $image = $_FILES['image']['name'];


// File upload handling
    $targetDirectory = "../uploads/awareness/";
    $targetAnnouncement = $targetDirectory . basename($_FILES['image']['name']);
    $validAnnouncementImage = move_uploaded_file($_FILES['image']['tmp_name'], $targetAnnouncement);

    if(!empty($location) && !empty($details)){

        $insert  = "INSERT INTO tbl_awareness (`firstname`, `middlename`, `lastname`, `suffix`, `location`, `details`,`status`, `seen`, `image`) 
        VALUES ('$firstname', '$middlename', '$lastname', '$suffix','$location','$details','active', 'unread', '$image')";

        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Awareness added!';
            $_SESSION['success'] = 'success';

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    echo "<script>window.location.href='../index.php#frontendAwareness'</script>";
    // header("Location: ../index.php#frontendAwareness");

	$conn->close();