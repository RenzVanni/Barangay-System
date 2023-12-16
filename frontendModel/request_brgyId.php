<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $requestor_fname    = $conn->real_escape_string($_POST['requestor_fname']);
    $requestor_mname    = $conn->real_escape_string(isset($_POST['requestor_mname']) ? $_POST['requestor_mname'] : "");
    $requestor_lname    = $conn->real_escape_string($_POST['requestor_lname']);
    $requestor_suffix    = $conn->real_escape_string(isset($_POST['requestor_suffix']) ? $_POST['requestor_suffix'] : "");

    $applicant_fname    = $conn->real_escape_string($_POST['applicant_fname']);
    $applicant_mname    = $conn->real_escape_string(isset($_POST['applicant_mname']) ? $_POST['applicant_mname'] : "");
    $applicant_lname    = $conn->real_escape_string($_POST['applicant_lname']);
    $applicant_suffix    = $conn->real_escape_string(isset($_POST['applicant_suffix']) ? $_POST['applicant_suffix'] : "");

    $requestor_houseNo      = $conn->real_escape_string($_POST['requestor_houseNo']);
    $requestor_street      = $conn->real_escape_string($_POST['requestor_street']);
    $requestor_subdivision      = $conn->real_escape_string($_POST['requestor_subdivision']);
    $requestor_dob      = $conn->real_escape_string($_POST['requestor_dob']);
    $requestor_pob      = $conn->real_escape_string($_POST['requestor_pob']);
    $requestor_civilStatus      = $conn->real_escape_string($_POST['requestor_civilStatus']);
    $contactNo      = $conn->real_escape_string($_POST['contactNo']);
    $documentFor  = $conn->real_escape_string($_POST['documentFor']);
    $image = $_FILES['image']['name'];


// File upload handling
    $targetDirectory = "../uploads/idImage/";
    $targetAnnouncement = $targetDirectory . basename($_FILES['image']['name']);
    $validAnnouncementImage = move_uploaded_file($_FILES['image']['tmp_name'], $targetAnnouncement);
    
    if(!empty($applicant_fname) && !empty($applicant_lname)){

        $insert  = "INSERT INTO tbl_idform (`applicant_fname`, `applicant_mname`, `applicant_lname`, `applicant_suffix`, `requestor_fname`, `requestor_mname`, `requestor_lname`, `requestor_suffix`, `house_no`, `street`, `subdivision`, `place_of_birth`, `birth_date`, `civil_status`, `contact_number`, `documentFor`, `status`, `seen`, `image`) 
                    VALUES ('$applicant_fname', '$applicant_mname', '$applicant_lname', '$applicant_suffix', '$requestor_fname', '$requestor_mname', '$requestor_lname', '$requestor_suffix', '$requestor_houseNo', '$requestor_street', '$requestor_subdivision', '$requestor_pob', '$requestor_dob', '$requestor_civilStatus','$contactNo', '$documentFor', 'Pending', 'unread', '$image')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Identification requested successfully!';
            $_SESSION['sub_message'] = '     <p>Thank you for your request. We are working on it! To check your request status, please go to <a
                href="Cart.php">"Request Status"</a> page.
        </p>';
            $_SESSION['success'] = 'success';
            $certClass = "Identification";
            include "./received/received_request.php";

        }else{
            $_SESSION['message'] = 'Something went wrong daw!';
            $_SESSION['success'] = 'danger';
        }

    } else if(!empty($requestor_fname) && !empty($requestor_lname)) {

        $insert  = "INSERT INTO tbl_idform (`applicant_fname`, `applicant_mname`, `applicant_lname`, `requestor_fname`, `requestor_mname`, `requestor_lname`, `house_no`, `street`, `subdivision`, `place_of_birth`, `birth_date`, `civil_status`, `contact_number`, `documentFor`, `status`, `seen`, `image`) 
                    VALUES ('$requestor_fname', '$requestor_mname', '$requestor_lname', '$requestor_fname', '$requestor_mname', '$requestor_lname', '$requestor_houseNo', '$requestor_street', '$requestor_subdivision', '$requestor_pob', '$requestor_dob', '$requestor_civilStatus','$contactNo', '$documentFor', 'Pending', 'unread', '$image')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Identification requested successfully!';
            $_SESSION['sub_message'] = '     <p>Thank you for your request. We are working on it! To check your request status, please go to <a
                href="Cart.php">"Request Status"</a> page.
        </p>';
            $_SESSION['success'] = 'success';
            $certClass = "Identification";
            include "./received/received_request.php";

        }else{
            $_SESSION['message'] = 'Something went wrong daw!';
            $_SESSION['success'] = 'danger';
        }

    } else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }
    } else {
        $_SESSION['message'] = 'Something went wrong!';
        $_SESSION['success'] = 'danger';
    }
        echo "<script>window.location.href='../index.php#services'</script>";


	$conn->close();