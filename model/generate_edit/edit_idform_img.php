<?php
include '../../server/server.php';

if (!isset($_SESSION['username'])) {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

$id = $conn->real_escape_string($_POST['id']);
$image = $_FILES['image']['name'];


// File upload handling
$targetDirectory = "../../uploads/idImage/";
$targetAnnouncement = $targetDirectory . basename($_FILES['image']['name']);
$validAnnouncementImage = move_uploaded_file($_FILES['image']['tmp_name'], $targetAnnouncement);


if (!empty($image)) {

    $query = "UPDATE tbl_idform SET image='$image' WHERE id='$id'";

    if ($conn->query($query) === true) {
        $_SESSION['message'] = 'ID form image has been updated!';
        $_SESSION['success'] = 'success';
    } else {
        $_SESSION['message'] = 'Error updating ID form image: ' . $conn->error;
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