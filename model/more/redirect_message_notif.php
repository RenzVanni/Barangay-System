<?php
include "../../server/server.php";
include "../functions/notif_messages.php";

// Get parameters from the URL
$notificationId = $_GET['id'];

// Mark the specific certificate as read
if (markCertificateAsReadMessage($conn, $notificationId)) {
    // Redirect to the corresponding page
        echo "<script>window.location.href='../../message.php?id=$notificationId'</script>";
        // header('Location: ../../message.php?id='. $notificationId);
} else {
    // Handle the case where marking as read fails
    echo 'Error marking notification as read.';
}

if (getUser($conn, $notificationId)) {
    // Redirect to the corresponding page
        echo "<script>window.location.href='../../message.php?id=$notificationId'</script>";
        // header('Location: ../../message.php?id='. $notificationId);
} else {
    // Handle the case where marking as read fails
    echo 'Error marking notification as read.';
}

exit;
?>