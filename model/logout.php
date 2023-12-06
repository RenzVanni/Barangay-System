<?php
	include '../server/server.php';
   	session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['role']);

    session_start();	
    $_SESSION['message'] = "You have been logged out!";
    $_SESSION['success'] = 'danger';



    $username 	= $conn->real_escape_string($_GET['username']);
      
    if(!empty($username)) {
      header('location: ../../capstone-frontend/main.php');
    } else {
      header('location: ../login.php');
    }