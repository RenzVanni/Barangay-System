<?php
include '../server/server.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $urlId = $_POST['urlId'];
    // Assuming $conn is the connection to your database
    
    // Prepare the statement once for efficiency
    $stmt = $conn->prepare("UPDATE tbl_households 
                           SET `firstname`=?, `middlename`=?, `lastname`=?, `sex`=?, `house_no`=?, `street`=?, 
                               `subdivision`=?, `date_of_birth`=?, `place_of_birth`=?, `civil_status`=?, 
                               `occupation`=?, `citizenship`=?, `household_head`=?, `suffix`=?, `email`=?, 
                               `contact_no`=?, `voter_status`=?, `profile_img`=?
                           WHERE `id`=?");

    $totalEntries = count($_POST['lastName']); // Assumes every other array has the same count

    $householdHeadName = '';

    for ($i = 0; $i < $totalEntries; $i++) {

        // File upload handling
        $imagePath = ""; // Initialize with a default value

        if (isset($_FILES['imageProfile']['name'][$i]) && !empty($_FILES['imageProfile']['name'][$i])) {
            $uploadDir = "../uploads/profile/"; // Specify your upload directory
            $uploadFile = $uploadDir . basename($_FILES['imageProfile']['name'][$i]);

            if (move_uploaded_file($_FILES['imageProfile']['tmp_name'][$i], $uploadFile)) {
                $imagePath = $uploadFile;
            } else {
                echo "File upload failed.";
                // Handle the error as needed
            }
        }

        // Set $householdHead to the name of the household head marked as 'yes'
        // $householdHead = ($_POST['householdHead'][$i+1] === 'yes') ? 'yes' : $householdHeadName;
            // Check if the current person is the household head
        // if (isset($_POST['householdHead'][$i+1]) && $_POST['householdHead'][$i+1] === 'yes') {
        //     $householdHeadName = 'yes';
        // } else {
        //     $householdHeadName = $_POST['firstName'][$i] . ' ' . $_POST['middleName'][$i] . ' ' . $_POST['lastName'][$i];
        // }

        // Check if the current person is the household head
        // $householdHead = (isset($_POST['householdHead'][$i+1]) && $_POST['householdHead'][$i+1] === 'yes') ? 'yes' : $_POST['firstName'][$i] . ' ' . $_POST['middleName'][$i] . ' ' . $_POST['lastName'][$i];

        // Check if the current person is the household head
        $householdHead = (isset($_POST['householdHead'][$i+1]) && $_POST['householdHead'][$i+1] === 'yes') ? 'yes' : '';

        // If the current person is not the household head, find the one with 'yes' and set the value
        if ($householdHead !== 'yes') {
            for ($j = 0; $j < $totalEntries; $j++) {
                if (isset($_POST['householdHead'][$j+1]) && $_POST['householdHead'][$j+1] === 'yes') {
                    $householdHead = $_POST['firstName'][$j] . ' ' . $_POST['middleName'][$j] . ' ' . $_POST['lastName'][$j];
                    break; // Stop searching once found
                }
            }
        }

        if (!$stmt->bind_param("ssssssssssssssssssi", 
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
            $householdHead,
            $_POST['ext'][$i],
            $_POST['email'][$i],
            $_POST['contact_no'][$i],
            $_POST['voter_status'][$i],
            $imagePath,
            $_POST['id'][$i]
        )) {
            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        
        // Execute the statement
        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
    }

    $stmt->close();
    header("Location: ../editHouseholds.php?id=". $urlId);
    exit;
}
?>
