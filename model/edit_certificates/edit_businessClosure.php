<?php
include('../../server/server.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the form
    $id = $conn->real_escape_string($_POST['id']);
    $business_name = $conn->real_escape_string($_POST['business_name']);
    $owner_fname = $conn->real_escape_string($_POST['owner_fname']);
    $owner_mname = $conn->real_escape_string($_POST['owner_mname']);
    $owner_lname = $conn->real_escape_string($_POST['owner_lname']);
    $owner_suffix = $conn->real_escape_string($_POST['owner_suffix']);
    
    $house_no = $conn->real_escape_string($_POST['house_no']);
    $street = $conn->real_escape_string($_POST['street']);
    $subdivision = $conn->real_escape_string($_POST['subdivision']);
    
    $date_applied = $conn->real_escape_string($_POST['date_applied']);
    $document_for = $conn->real_escape_string($_POST['documentFor']);
    // $status = $conn->real_escape_string($_POST['status']);
    // $seen = $conn->real_escape_string($_POST['seen']);

    $purpose = $conn->real_escape_string($_POST['purpose']);


    // Construct the SQL UPDATE query
    $update_query = "UPDATE tbl_businessclearance
                     SET `business_name`='$business_name', `business_owner_fname`='$owner_fname',`business_owner_mname`='$owner_mname',`business_owner_lname`='$owner_lname',`business_owner_suffix`='$owner_suffix',`house_no`='$house_no',`street`='$street',`subdivision`='$subdivision', `purpose`='$purpose'
                     WHERE id = '$id'";

    // Execute the query
    $result = $conn->query($update_query);

    if ($result === true) {
        $_SESSION['message'] = 'Business Closure updated successfully!';
        $_SESSION['success'] = 'success';
    } else {
        $_SESSION['message'] = 'Error updating record: ' . $conn->error;
        $_SESSION['success'] = 'danger';
    }

    // Redirect to the appropriate page (adjust the path accordingly)
    echo "<script>window.location.href='../../generate/businessClosure.php?id=$id'</script>";
    // header("Location: ../../generate/businessClosure.php?id=". $id);
    exit();
}

$conn->close();
?>