<?php
include "../../server/server.php";
include "../functions/notification.php";

// Get parameters from the URL
$notificationId = $_GET['id'];
$notificationSource = $_GET['source'];

// Mark the specific certificate as read
if (markCertificateAsRead($conn, $notificationSource, $notificationId)) {
    // Redirect to the corresponding page
    if ($notificationSource === 'tbl_idform') {
        header('Location: ../../idForm.php');
    } else if ($notificationSource === 'tbl_brgyclearance') {
        header('Location: ../../brgyClearance.php');
    } else if ($notificationSource === 'tbl_ecertificate') {
        header('Location: ../../endorsmentCert.php');
    } else if ($notificationSource === 'tbl_certofindigency') {
        header('Location: ../../certOfIndigency.php');
    } else if ($notificationSource === 'tbl_certoflbr') {
        header('Location: ../../certOfLBR.php');
    } else {
        echo 'Unknown notification source.';
    }
} else {
    // Handle the case where marking as read fails
    echo 'Error marking notification as read.';
}

exit;
?>