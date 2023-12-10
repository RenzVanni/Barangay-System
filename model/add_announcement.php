<?php
include('../server/server.php');

if (!isset($_SESSION['username'])) {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

$title = $conn->real_escape_string($_POST['title']);
$details = $conn->real_escape_string($_POST['details']);
$begin_date = $conn->real_escape_string($_POST['begin_date']);
$end_date = $conn->real_escape_string($_POST['end_date']);
$image = $_FILES['image_announcement']['name'];


// File upload handling
$targetDirectory = "../uploads/announcement/";
$targetAnnouncement = $targetDirectory . basename($_FILES['image_announcement']['name']);
$validAnnouncementImage = move_uploaded_file($_FILES['image_announcement']['tmp_name'], $targetAnnouncement);

if (!empty($title) && !empty($details)) {
    $insert = "INSERT INTO tbl_announcement (`title`, `details`, `image_announcement`, `begin_date`, `until_date`) 
                VALUES ('$title', '$details', '$image', '$begin_date', '$end_date')";
    $result = $conn->query($insert);

    if ($result === true) {
        $_SESSION['message'] = 'Announcement added!';
        $_SESSION['success'] = 'success';
    } else {
        $_SESSION['message'] = 'Something went wrong!';
        $_SESSION['success'] = 'danger';
    }
} else {
    $_SESSION['message'] = 'Please fill up the form completely!';
    $_SESSION['success'] = 'danger';
}

header("Location: ../announcement.php");

$conn->close();
?>