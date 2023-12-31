<?php 
	include('../server/server.php');
    include "./functions/audit.php";

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
	$fname 	= $conn->real_escape_string($_POST['officialName_fname']);
	$mname 	= $conn->real_escape_string($_POST['officialName_mname']);
	$lname 	= $conn->real_escape_string($_POST['officialName_lame']);
	$suffix 	= $conn->real_escape_string($_POST['officialName_suffix']);
	$chair 	= $conn->real_escape_string($_POST['chairmanship']);
	$start 	= $conn->real_escape_string($_POST['term-start']);
    $end 	= $conn->real_escape_string($_POST['term-end']);
	$status 	= $conn->real_escape_string($_POST['status']);

    if(!empty($fname) && !empty($lname) && !empty($chair) && !empty($start) && !empty($end)){
   // Check if the chairmanship position already exists
        $checkQuery = "SELECT * FROM tblofficials WHERE chairmanship = '$chair' LIMIT 1";
        $checkResult = $conn->query($checkQuery);

        if ($checkResult->num_rows > 0) {
            // Chairmanship position already exists, you may handle this case as needed
            $_SESSION['message'] = 'Chairmanship position already exists!';
            $_SESSION['success'] = 'danger';
        } else {
            // Chairmanship position doesn't exist, proceed with insertion
            $insert = "INSERT INTO tblofficials (`firstname`, `middlename`, `lastname`, `suffix`, `chairmanship`, `termstart`, `termend`, `status`) VALUES ('$fname', '$mname', '$lname', '$suffix', '$chair', '$start','$end', '$status')";
            $result = $conn->query($insert);

            if ($result === true) {
                $_SESSION['message'] = 'Official added!';
                $_SESSION['success'] = 'success';
                            
                $user_id = $_SESSION['id'];
                $action = "INSERT";
                $table_name = "Official";
                logAuditTrail($user_id, $action, $table_name);
            } else {
                $_SESSION['message'] = 'Something went wrong!';
                $_SESSION['success'] = 'danger';
            }

            $adminName = $fname." ".$mname." ".$lname;
            $passwordHashed = password_hash("admin", PASSWORD_DEFAULT);
            $role = $chair;

            $insertAdmin = $conn->prepare("INSERT INTO tbl_users (username, password, role, firstname, middlename, lastname) VALUES (?, ?, ?, ?, ?, ?)");
            $insertAdmin->bind_param("ssssss", $adminName, $passwordHashed, $role, $fname, $mname, $lname);
            $insertAdmin->execute();

        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    echo "<script>window.location.href='../barangayOfficials.php'</script>";
    // header("Location: ../barangayOfficials.php");

	$conn->close();