<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $business_name    = $conn->real_escape_string($_POST['business_name']);
    $owner_fname    = $conn->real_escape_string($_POST['owner_fname']);
    $owner_mname    = $conn->real_escape_string(isset($_POST['owner_mname']) ? $_POST['owner_mname'] :"");
    $owner_lname    = $conn->real_escape_string($_POST['owner_lname']);
    $owner_suffix    = $conn->real_escape_string(isset($_POST['owner_suffix']) ? $_POST['owner_suffix'] : "");
    $house_no    = $conn->real_escape_string($_POST['house_no']);
    $street    = $conn->real_escape_string($_POST['street']);
    $subdivision    = $conn->real_escape_string($_POST['subdivision']);
    // $contactNo      = $conn->real_escape_string($_POST['contactNo']);
    // $purpose      = $conn->real_escape_string($_POST['purpose']);
    
    if(!empty($business_name) && !empty($owner_fname) && !empty($owner_lname)){

        $insert  = "INSERT INTO tbl_businessclearance (`business_name`,`business_owner_fname`, `business_owner_mname`, `business_owner_lname`, `business_owner_suffix`, `house_no`, `street`, `subdivision`, `status`, `seen`) 
                    VALUES ('$business_name', '$owner_fname', '$owner_mname', '$owner_lname', '$owner_suffix', '$house_no', '$street', '$subdivision', 'Pending', 'unread')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Business Clearance requested successfully!';
            $_SESSION['sub_message'] = '     <p>Thank you for your request. We are working on it! To check your request status, please go to <a
                href="Cart.php">"Request Status"</a> page.
        </p>';
            $_SESSION['success'] = 'success';
            $certClass = "Business Clearance";
            include "./received/received_request.php";

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }
    } else {
        $_SESSION['message'] = 'Something went wrong!';
        $_SESSION['success'] = 'danger';
    }
    header("Location: ../index.php#services");

	$conn->close();