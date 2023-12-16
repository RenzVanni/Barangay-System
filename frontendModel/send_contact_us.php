<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
    $name  = $conn->real_escape_string($_POST['name']);
    $email 	  = $conn->real_escape_string($_POST['email']);
    $message 	  = $conn->real_escape_string($_POST['message']);

    $insert  = "INSERT INTO contact_us (`name`, `message`, `email`, `seen`) 
    VALUES ('$name', '$message', '$email', 'unread')";

    include "./contact_us/email_contact_us.php";
    $result  = $conn->query($insert);

    if($result === true){
        $_SESSION['message'] = 'Contact us send successfully!';
        $_SESSION['success'] = 'success';

    }else{
        $_SESSION['message'] = 'Something went wrong!';
        $_SESSION['success'] = 'danger';
    }

    echo "<script>window.location.href='../index.php#contact-us'</script>";
    // header("Location: ../index.php#contact-us");

	$conn->close();