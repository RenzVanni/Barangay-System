<?php 
	include '../server/server.php';

	if(!isset($_SESSION['username'])){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
  $id = $conn->real_escape_string($_POST['id']);
  $fname = $conn->real_escape_string($_POST['firstname']);
  $mname = $conn->real_escape_string($_POST['middlename']);
  $lname = $conn->real_escape_string($_POST['lastname']);
  $age = $conn->real_escape_string($_POST['age']);
  $sex = $conn->real_escape_string($_POST['sex']);
  $houseNo = $conn->real_escape_string($_POST['house-no']);
  $street = $conn->real_escape_string($_POST['street']);
  $subdivision = $conn->real_escape_string($_POST['subdivision']);
  $dbirth = $conn->real_escape_string($_POST['dob']);
  $pbirth = $conn->real_escape_string($_POST['place-of-birth']);
  $cstatus = $conn->real_escape_string($_POST['civil-status']);
  $occupation = $conn->real_escape_string($_POST['occupation']);
  $email = $conn->real_escape_string($_POST['email']);
  $contact = $conn->real_escape_string($_POST['contact-no']);
  $vstatus = $conn->real_escape_string($_POST['voter-status']);
  $citizenship = $conn->real_escape_string($_POST['citizenship']);
  $householdNo = $conn->real_escape_string($_POST['household-no']);
  $osy = $conn->real_escape_string($_POST['out-of-school-youth']);
  $pwd = $conn->real_escape_string($_POST['person-with-disability']);

	// change profile2 name

	  // image file directory
  $check = "SELECT id FROM tblresidents WHERE `firstname`='$fname'";
	$nat= $conn->query($check)->fetch_assoc();
	if($nat['id'] == $id || $nat <= 0){
		if(!empty($id)){

			if(!empty($fname) && !empty($lname)){

				$query = "UPDATE tblresidents SET `firstname`='$fname',`middlename`='$mname', `lastname`='$lname',`sex`='$sex', `house_no`='$houseNo', `street`='$street',`subdivision`='$subdivision', `date_of_birth`='$dbirth',`place_of_birth`='$pbirth', `civil_status`='$cstatus', `occupation`='$occupation', `email`='$email', `contact_no`='$contact', `voter_status`='$vstatus', `citizenship`='$citizenship', `household_no`='$householdNo', `osy`='$osy', `pwd`='$pwd'
				WHERE id=$id;";

				if($conn->query($query) === true){

					$_SESSION['message'] = 'Resident Information has been updated!';
					$_SESSION['success'] = 'success';
				}
			}else if(!empty($fname) && empty($lname)){

				$query = "UPDATE tblresidents SET `firstname`='$fname',`middlename`='$mname', `lastname`='$lname',`sex`='$sex', `house_no`='$houseNo', `street`='$street',`subdivision`='$subdivision', `date_of_birth`='$dbirth',`place_of_birth`='$pbirth', `civil_status`='$cstatus', `occupation`='$occupation', `email`='$email', `contact_no`='$contact', `voter_status`='$vstatus', `citizenship`='$citizenship', `household_no`='$householdNo', `osy`='$osy', `pwd`='$pwd'
				WHERE id=$id;";
				
				if($conn->query($query) === true){

					$_SESSION['message'] = 'Resident Information has been updated!';
					$_SESSION['success'] = 'success';
				}

			}else if(empty($fname) && !empty($lname)){

				$query = "UPDATE tblresidents SET `firstname`='$fname',`middlename`='$mname', `lastname`='$lname',`sex`='$sex', `house_no`='$houseNo', `street`='$street',`subdivision`='$subdivision', `date_of_birth`='$dbirth',`place_of_birth`='$pbirth', `civil_status`='$cstatus', `occupation`='$occupation', `email`='$email', `contact_no`='$contact', `voter_status`='$vstatus', `citizenship`='$citizenship', `household_no`='$householdNo', `osy`='$osy', `pwd`='$pwd'
				WHERE id=$id;";

				if($conn->query($query) === true){

					$_SESSION['message'] = 'Resident Information has been updated!!';
					$_SESSION['success'] = 'success';

					if(move_uploaded_file($_FILES['img']['tmp_name'], $target)){

						$_SESSION['message'] = 'Resident Information has been updated!!';
						$_SESSION['success'] = 'success';
					}
				}

			}else{
        
				$query = "UPDATE tblresidents SET `firstname`='$fname',`middlename`='$mname', `lastname`='$lname',`sex`='$sex', `house_no`='$houseNo', `street`='$street',`subdivision`='$subdivision', `date_of_birth`='$dbirth',`place_of_birth`='$pbirth', `civil_status`='$cstatus', `occupation`='$occupation', `email`='$email', `contact_no`='$contact', `voter_status`='$vstatus', `citizenship`='$citizenship', `household_no`='$householdNo', `osy`='$osy', `pwd`='$pwd'
				WHERE id=$id;";
				
				if($conn->query($query) === true){

					$_SESSION['message'] = 'Resident Information has been updated!';
					$_SESSION['success'] = 'success';
				}
			}

		}else{

			$_SESSION['message'] = 'Please complete the form!';
			$_SESSION['success'] = 'danger';
		}
	}else{
		$_SESSION['message'] = 'invalid';
		$_SESSION['success'] = 'danger';
	}

	if(isset($_POST['idForm'])) {
    echo "<script>window.location.href='../idForm.php'</script>";
    // header("Location: ../idForm.php");
	}
	else if($_POST['brgyClearance']) {
    echo "<script>window.location.href='../brgyClearance.php'</script>";
    // header("Location: ../brgyClearance.php");
	} 
	else if($_POST['endorsementCert']) {
    echo "<script>window.location.href='../endorsmentCert.php'</script>";
    // header("Location: ../endorsmentCert.php");
	}
	else if($_POST['certOfIndigency']) {
    echo "<script>window.location.href='../certOfIndigency.php'</script>";
    // header("Location: ../certOfIndigency.php");
	}
	else if($_POST['certOfLBR']) {
    echo "<script>window.location.href='../certOfLBR.php'</script>";
    // header("Location: ../certOfLBR.php");
	}
	else if($_POST['awareness']) {
    echo "<script>window.location.href='../awareness.php'</script>";
    // header("Location: ../awareness.php");
	}else {
    echo "<script>window.location.href='../residentInfo.php'</script>";
    // header("Location: ../residentInfo.php");
	}

	$conn->close();