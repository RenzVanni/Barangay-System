<?php
include('../server/server.php');

if (!isset($_SESSION['username'])) {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

$what = $conn->real_escape_string($_POST['what_announcement']);
$where = $conn->real_escape_string($_POST['where_announcement']);
$who = $conn->real_escape_string($_POST['who_announcement']);
$why = $conn->real_escape_string($_POST['why_announcement']);
$when = $conn->real_escape_string($_POST['when_announcement']);
$date = $conn->real_escape_string($_POST['date_announcement']);
$image = $_FILES['image_announcement']['name'];


// File upload handling
$targetDirectory = "../uploads/announcement/";
$targetAnnouncement = $targetDirectory . basename($_FILES['image_announcement']['name']);
$validAnnouncementImage = move_uploaded_file($_FILES['image_announcement']['tmp_name'], $targetAnnouncement);

if (!empty($what) && !empty($where) && $validAnnouncementImage) {
    $insert = "INSERT INTO tbl_announcement (`what_announcement`, `why_announcement`, `where_announcement`, `when_announcement`, `who_announcement`, `date_announcement`, `image_announcement`) 
                VALUES ('$what', '$why', '$where', '$when', '$who', '$date', '$image')";
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