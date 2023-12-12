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

    $insert  = "INSERT INTO chat_messages (`message`, `sender`, `email`, `seen`) 
    VALUES ('$message', '$name', '$email', 'unread')";

    $result  = $conn->query($insert);

    if($result === true){
        $_SESSION['message'] = 'Contact us send successfully!';
        $_SESSION['success'] = 'success';

    }else{
        $_SESSION['message'] = 'Something went wrong!';
        $_SESSION['success'] = 'danger';
    }

    header("Location: ../index.php#contact-us");

	$conn->close();