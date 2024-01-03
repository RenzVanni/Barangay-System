<?php
    include '../server/server.php';
    include "./functions/audit.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Assuming $conn is the connection to your database
    
    // Prepare the statement once for efficiency
    $stmt = $conn->prepare("INSERT INTO tbl_households (`firstname`, `middlename`, `lastname`, `sex`, `house_no`, `street`, `subdivision`, `date_of_birth`, `place_of_birth`, `civil_status`, `occupation`, `citizenship`, `household_head`, `suffix`, `email`, `contact_no`, `voter_status`, `head_name`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $totalEntries = count($_POST['lastName']); // Assumes every other array has the same count

  $householdHeadName = '';
    for ($i = 0; $i < $totalEntries; $i++) {
        // Check if the current person is the household head
        if (isset($_POST['householdHead'][$i+1]) && $_POST['householdHead'][$i+1] === 'yes') {
            $householdHeadName = $_POST['firstName'][$i] . ' ' . $_POST['middleName'][$i] . ' ' . $_POST['lastName'][$i];
            break; // Stop searching once found
        }
    }

    for ($i = 0; $i < $totalEntries; $i++) {

               // File upload handling
        // $imagePath = ""; // Initialize with a default value

        // if (isset($_FILES['imageProfile']['name'][$i]) && !empty($_FILES['imageProfile']['name'][$i])) {
        //     $uploadDir = "../uploads/profile/"; // Specify your upload directory
        //     $uploadFile = $uploadDir . basename($_FILES['imageProfile']['name'][$i]);

        //     if (move_uploaded_file($_FILES['imageProfile']['tmp_name'][$i], $uploadFile)) {
        //         $imagePath = $uploadFile;
        //     } else {
        //         echo "File upload failed.";
        //         // Handle the error as needed
        //     }
        // }

        // $householdHead = isset($_POST['householdHead'][$i+1]) && $_POST['householdHead'][$i+1] === 'yes' ? 'yes' : $_POST['firstName'][$i+1] . ' ' . $_POST['middleName'][$i+1] . ' ' . $_POST['lastName'][$i+1];

           // Set $householdHead to the name of the household head marked as 'yes'
      // Set $householdHead to the name of the household head marked as 'yes'
        $householdHead = ($_POST['householdHead'][$i+1] === 'yes') ? 'yes' : $householdHeadName;


        if (!$stmt->bind_param("ssssssssssssssssss", 
            $_POST['firstName'][$i],
            $_POST['middleName'][$i], 
            $_POST['lastName'][$i],
            $_POST['sex'][$i], 
            $_POST['no'][$i], 
            $_POST['streetName'][$i], 
            $_POST['subdiName'][$i], 
            $_POST['dateBirth'][$i], 
            $_POST['placeBirth'][$i], 
            $_POST['civilStatus'][$i], 
            $_POST['occupational'][$i], 
            $_POST['citizenship'][$i], 
            // $_POST['householdHead'][$i], 
            $householdHead,
            $_POST['ext'][$i],
            $_POST['email'][$i],
            $_POST['contact_no'][$i],
            $_POST['voter_status'][$i],
            $householdHeadName
            // $imagePath
            )) {
            $_SESSION['message'] = "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
			$_SESSION['success'] = 'danger';
        }
        
        // Execute the statement
        if (!$stmt->execute()) {
            $_SESSION['message'] = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
			$_SESSION['success'] = 'danger';
        } else {
            // Insert successful, set success message
            $_SESSION['message'] = 'Household information added successfully.';
			$_SESSION['success'] = 'success';

            $user_id = $_SESSION['id'];
            $action = "INSERT";
            $table_name = "Households";
            logAuditTrail($user_id, $action, $table_name);
        }
    }

    $stmt->close();
    echo "<script>window.location.href='../residentInfo.php'</script>";
    // header("Location: ../residentInfo.php");
    exit;
}
?>