<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
    $businessName = $conn->real_escape_string($_POST['business_name']);
    $ownerFname 	  = $conn->real_escape_string($_POST['owner_fname']);
    $ownerMname 	  = $conn->real_escape_string($_POST['owner_mname']);
    $ownerLname 	  = $conn->real_escape_string($_POST['owner_lname']);
    $ownerSuffix 	  = $conn->real_escape_string($_POST['owner_suffix']);
 
    $house_no         = $conn->real_escape_string($_POST['house_no']);
    $street         = $conn->real_escape_string($_POST['street']);
    $subdivision         = $conn->real_escape_string($_POST['subdivision']);
    
    $documentFor 	= $conn->real_escape_string($_POST['documentFor']);
    $purpose 	= $conn->real_escape_string($_POST['purpose']);

    if(!empty($businessName) && !empty($ownerFname) && !empty($ownerLname)){

        $insert  = "INSERT INTO tbl_businessclearance (`business_name`, `business_owner_fname`, `business_owner_mname`, `business_owner_lname`, `business_owner_suffix`, `house_no`, `street`, `subdivision`, `documentFor`, `status`, `purpose`) 
                    VALUES ('$businessName', '$ownerFname', '$ownerMname', '$ownerLname', '$ownerSuffix', '$house_no', '$street', '$subdivision', '$documentFor', 'Pending', '$purpose')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Business added!';
            $_SESSION['success'] = 'success';

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    echo "<script>window.location.href='../businessClearance.php'</script>";
    // header("Location: ../businessClearance.php");

	$conn->close();