<?php 
	include '../server/server.php';

	if(!isset($_SESSION['username'])){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
    $id 	        = $conn->real_escape_string($_POST['id']);
    $firstname  = $conn->real_escape_string($_POST['taxPayer_fname']);
    $middlename  = $conn->real_escape_string($_POST['taxPayer_mname']);
    $lastname  = $conn->real_escape_string($_POST['taxPayer_lname']);
    $suffix  = $conn->real_escape_string($_POST['taxPayer_suffix']);
    $house_no  = $conn->real_escape_string($_POST['taxPayer_houseNo']);
    $street  = $conn->real_escape_string($_POST['taxPayer_street']);
    $subdivision  = $conn->real_escape_string($_POST['taxPayer_subdivision']);
    $businessType  = $conn->real_escape_string($_POST['businessType']);
    $businessName  = $conn->real_escape_string($_POST['business_name']);
    $dateStarted  = $conn->real_escape_string($_POST['date_started']);
    $businessStatus  = $conn->real_escape_string($_POST['businessStatus']);

    

	if(!empty($id)){

        $query = "UPDATE tbl_business SET `taxpayer_fname`='$firstname',`taxpayer_mname`='$middlename',`taxpayer_lname`='$lastname',`taxpayer_suffix`='$suffix',`business_name`='$businessName',`house_no`='$house_no',`street`='$street',`subdivision`='$subdivision',`business_type`='$businessType',`business_status`='$businessStatus',`business_started`='$dateStarted' WHERE id='$id'";	
        $result 	= $conn->query($query);
		if($result === true){
            
			$_SESSION['message'] = 'Business details has been updated!';
			$_SESSION['success'] = 'success';

		}else{

			$_SESSION['message'] = 'Somethin went wrong!';
			$_SESSION['success'] = 'danger';
		}
	}else{
		$_SESSION['message'] = 'No Awareness ID found!';
		$_SESSION['success'] = 'danger';
	}

    header("Location: ../editBusiness.php?id=". $id);

	$conn->close();