<?php 
	include '../server/server.php';
	include './functions/autoGenerateUser.php';

	if(!isset($_SESSION['username'])){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
			exit();
		}
	}

    $fname = $conn->real_escape_string($_POST['firstname']);
    $mname = $conn->real_escape_string(isset($_POST['middlename']) ? $_POST['middlename'] : "");
    $lname = $conn->real_escape_string($_POST['lastname']);
    $sex = $conn->real_escape_string($_POST['sex']);
    $houseNo = $conn->real_escape_string($_POST['house-no']);
    $street = $conn->real_escape_string($_POST['street']);
    $subdivision = $conn->real_escape_string($_POST['subdivision']);
    $dbirth = $conn->real_escape_string($_POST['dob']);
    $suffix = $conn->real_escape_string(isset($_POST['suffix']) ? $_POST['suffix'] : "");

	function calculateAge($dob) {
	    $today = new DateTime();
        $birthDate = new DateTime($dob);
        $interval = $today->diff($birthDate);
        return $interval->y;
	}

	$computedAge = calculateAge($dbirth);
    $pbirth = $conn->real_escape_string($_POST['pob']);
    $cstatus = $conn->real_escape_string($_POST['civil-status']);
    $occupation = $conn->real_escape_string(isset($_POST['occupation']) ? $_POST['occupation'] : "");
    $email = $conn->real_escape_string(isset($_POST['email']) ? $_POST['email'] : "");
    $contact = $conn->real_escape_string(isset($_POST['contact-no']) ? $_POST['contact-no'] : "");
    $vstatus = $conn->real_escape_string(isset($_POST['voter-status']) ? $_POST['voter-status'] : "");
    $citizenship = $conn->real_escape_string($_POST['citizenship']);
    $householdNo = $conn->real_escape_string(isset($_POST['household-no']) ? $_POST['household-no'] : "");
    $osy = $conn->real_escape_string(isset($_POST['out-of-school-youth']) ? $_POST['out-of-school-youth'] : "");
    $pwd = $conn->real_escape_string(isset($_POST['person-with-disability']) ? $_POST['person-with-disability'] : "");

    // $hHead = $conn->real_escape_string($_POST['household-head']);

	$stmt = $conn->prepare("SELECT id FROM tbl_households WHERE `firstname` = ? AND `lastname` = ? AND `date_of_birth` = ?");
	$stmt->bind_param("sss", $fname, $lname, $dbirth);
	$stmt->execute();

	$result = $stmt->get_result();
        $head = "yes";
	if ($result->num_rows == 0) {
		$stmt = $conn->prepare("INSERT INTO tbl_households (`firstname`, `middlename`, `lastname`, `sex`, `house_no`, `street`, `subdivision`, `date_of_birth`, `place_of_birth`, `civil_status`, `occupation`, `email`, `citizenship`, `household_no`, `household_head`, `suffix`, `contact_no`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssssssssssssss", $fname, $mname, $lname, $sex, $houseNo, $street, $subdivision, $dbirth, $pbirth, $cstatus, $occupation, $email, $citizenship, $householdNo, $head, $suffix, $contact);

		$username = $fname." ".$mname." ".$lname;
		
		if ($stmt->execute()) {
			$_SESSION['message'] = 'Resident Information has been saved!';
			$_SESSION['success'] = 'success';
			// include './sendAccount.php';
		}

		// insertUser($conn, $username, $hashedPassword, $fname, $mname, $lname, $sex, $cstatus, $street, $dbirth, $pbirth, $email, $houseNo, $subdivision, $contact);
	} else {
		$_SESSION['message'] = 'Resident Information already exists';
		$_SESSION['success'] = 'danger';
	}

    echo "<script>window.location.href='../residentInfo.php'</script>";
	// header("Location: ../residentInfo.php");
	$conn->close();
?>