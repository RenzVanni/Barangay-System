<?php
include '../../server/server.php';

if (!isset($_SESSION['username'])) {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

$id = $conn->real_escape_string($_POST['id']);
$status = $conn->real_escape_string($_POST['status']);


if (!empty($status)) {
           $dateRequested = isset($_POST['dateRequested']) ? $_POST['dateRequested'] : '';
    $query = "UPDATE tbl_certoflbr SET status='$status'";

    // Only include the date if it is present in the form
    if (!empty($dateRequested)) {
        $query .= ", date_requested='$dateRequested'";
    }

    $query .= " WHERE id='$id'";
    // $query = "UPDATE tbl_certoflbr SET status='$status' WHERE id='$id'";

    if ($conn->query($query) === true) {
        $_SESSION['message'] = 'Certificate of Late Birth Registration status has been updated!';
        $_SESSION['success'] = 'success';
    } else {
        $_SESSION['message'] = 'Error updating Certificate Late Birth Registration status: ' . $conn->error;
        $_SESSION['success'] = 'danger';
    }
} else {
    $_SESSION['message'] = 'Please complete the form!';
    $_SESSION['success'] = 'danger';
}

if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}

$conn->close();
?>