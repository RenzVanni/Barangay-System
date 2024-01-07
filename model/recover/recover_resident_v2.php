<?php 
	include('../../server/server.php');
    include "../functions/audit.php";

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
    $id = $conn->real_escape_string($_POST['id']);
    $firstname = $conn->real_escape_string($_POST['firstname']);
    $middlename = $conn->real_escape_string($_POST['middlename']);
    $lastname = $conn->real_escape_string($_POST['lastname']);
    $suffix = $conn->real_escape_string($_POST['suffix']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $pob = $conn->real_escape_string($_POST['pob']);
    $citizenship = $conn->real_escape_string($_POST['citizenship']);
    $contact_no = $conn->real_escape_string(isset($_POST['contact_no']) ? $_POST['contact_no'] : "");
    $email = $conn->real_escape_string(isset($_POST['email']) ? $_POST['email'] : "");
    $house_no = $conn->real_escape_string($_POST['house_no']);
    $street = $conn->real_escape_string($_POST['street']);
    $subdivision = $conn->real_escape_string($_POST['subdivision']);
    $occupation = $conn->real_escape_string($_POST['occupation']);
    $sex = $conn->real_escape_string($_POST['sex']);
    $civil_status = $conn->real_escape_string($_POST['civil_status']);
    $education = $conn->real_escape_string($_POST['education']);
    $pwd = $conn->real_escape_string(isset($_POST['pwd']) ? $_POST['pwd'] : "");
    $osy = $conn->real_escape_string(isset($_POST['osy']) ? $_POST['osy'] : "");
    $osc = $conn->real_escape_string(isset($_POST['osc']) ? $_POST['osc'] : "");
    $ofw = $conn->real_escape_string(isset($_POST['ofw']) ? $_POST['ofw'] : "");

    $stmt = $conn->prepare("SELECT id FROM tbl_households WHERE `firstname` = ? AND `lastname` = ? AND `date_of_birth` = ? AND `house_no`=? and `street`=? AND `subdivision`=?");
	$stmt->bind_param("ssssss", $firstname, $lastname, $dob, $house_no, $street, $subdivision);
	$stmt->execute();
	$result = $stmt->get_result();


    if ($result->num_rows == 0) {
		$stmt = $conn->prepare("INSERT INTO tbl_households (`firstname`, `middlename`, `lastname`, `sex`, `house_no`, `street`, `subdivision`, `date_of_birth`, `place_of_birth`, `civil_status`, `occupation`, `email`, `citizenship`, `suffix`, `contact_no`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssssssssssss", $firstname, $middlename, $lastname, $sex, $house_no, $street, $subdivision, $dob, $pob, $civil_status, $occupation, $email, $citizenship, $suffix, $contact);

		$username = $fname." ".$mname." ".$lname;
		
		if ($stmt->execute()) {
			$_SESSION['message'] = 'Resident Information has been saved!';
			$_SESSION['success'] = 'success';

			$user_id = $_SESSION['id'];
            $action = "INSERT";
            $table_name = "Recover Individual";
            logAuditTrail($user_id, $action, $table_name);

			// include './sendAccount.php';
		}

        $delete = $conn->prepare("DELETE FROM del_residents_archive WHERE id = ?");
		$delete->bind_param("s", $id);
		$delete->execute();

        echo "<script>window.location.href='../../businessClearance.php'</script>";
	} else {
		$_SESSION['message'] = 'Resident Information already exists';
		$_SESSION['success'] = 'danger';
        echo "<script>window.location.href = '../../recoverRecord.php?id=" . urlencode($id) . "';</script>";

	}

    // header("Location: ../businessClearance.php");

	$conn->close();