<?php
include '../../server/server.php';

if (!isset($_SESSION['username'])) {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

if (isset($_POST['submit'])) {

    $id = $conn->real_escape_string($_POST['id']);
    $profile_img = $_FILES['profile_img']['name'];

    // File upload handling
    $targetDirectory = "../../uploads/profile/";
    $targetProfile = $targetDirectory . basename($_FILES['profile_img']['name']);

    // Check if the file was successfully uploaded
    if (move_uploaded_file($_FILES['profile_img']['tmp_name'], $targetProfile)) {

        $query = "UPDATE tbl_users SET profile_img='$profile_img' WHERE id='$id';";

        if ($conn->query($query) === true) {
            $_SESSION['message'] = 'Profile image has been updated!';
            $_SESSION['success'] = 'success';
        } else {
            $_SESSION['message'] = 'Error updating Profile image: ' . $conn->error;
            $_SESSION['success'] = 'danger';
        }
    } else {
        $_SESSION['message'] = 'Error uploading the profile image.';
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
