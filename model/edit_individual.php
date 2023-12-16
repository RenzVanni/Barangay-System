<?php
include '../server/server.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Assuming $conn is the connection to your database
    
    // Escape and retrieve form data
    $headId = $conn->real_escape_string($_POST['headId']);

    $id = $conn->real_escape_string($_POST['id']);
    $fname = $conn->real_escape_string($_POST['firstname']);
    $mname = $conn->real_escape_string($_POST['middlename']);
    $lname = $conn->real_escape_string($_POST['lastname']);
    $ext = $conn->real_escape_string($_POST['ext']);
    $dbirth = $conn->real_escape_string($_POST['dob']);
    $pbirth = $conn->real_escape_string($_POST['pob']);
    $citizenship = $conn->real_escape_string($_POST['citizenship']);
    $contact = $conn->real_escape_string($_POST['contact-no']);
    $email = $conn->real_escape_string($_POST['email']);
    $houseNo = $conn->real_escape_string($_POST['house-no']);
    $street = $conn->real_escape_string($_POST['street']);
    $subdivision = $conn->real_escape_string($_POST['subdivision']);
    $occupation = $conn->real_escape_string($_POST['occupation']);
    $sex = $conn->real_escape_string($_POST['sex']);
    $cstatus = $conn->real_escape_string($_POST['civil-status']);
    $vstatus = $conn->real_escape_string($_POST['voter-status']);

    $householdHeadName = 'yes';
     // Get the old household head name for comparison
    $oldHeadStmt = $conn->prepare("SELECT * FROM tbl_households WHERE household_head = ?");
    $oldHeadStmt->bind_param("s", $householdHeadName);
    $oldHeadStmt->execute();
    $oldHeadResult = $oldHeadStmt->get_result();
    $oldHeadData = $oldHeadResult->fetch_assoc();

    // Prepare the SQL statement for updating the record
    $stmt = $conn->prepare("UPDATE tbl_households SET
        firstname = ?,
        middlename = ?,
        lastname = ?,
        ext = ?,
        date_of_birth = ?,
        place_of_birth = ?,
        citizenship = ?,
        contact_no = ?,
        email = ?,
        house_no = ?,
        street = ?,
        subdivision = ?,
        occupation = ?,
        sex = ?,
        civil_status = ?,
        voter_status = ?
        WHERE id = ?");

    // Bind parameters to the prepared statement
    $stmt->bind_param("ssssssssssssssssi",
        $fname, $mname, $lname, $ext, $dbirth, $pbirth, $citizenship, $contact, $email,
        $houseNo, $street, $subdivision, $occupation, $sex, $cstatus, $vstatus, $id);

    // Execute the update statement
    if ($stmt->execute()) {
           $newHouseholdHead = $fname . ' ' . $mname . ' ' . $lname;
            $updateAllStmt = $conn->prepare("UPDATE tbl_households SET household_head = ? WHERE household_head = ?");
            $updateAllStmt->bind_param("ss", $newHouseholdHead, $oldHeadData['household_head']);
            $updateAllStmt->execute();
            $updateAllStmt->close();
            
        echo "<script>window.location.href='../householdDisplay.php?id=$headId'</script>";
        // header("Location: ../householdDisplay.php?id=" . $headId);
        exit;
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
    
    // Close the connection
    $conn->close();
}
?>