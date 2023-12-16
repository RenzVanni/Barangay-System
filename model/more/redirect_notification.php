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
        echo "<script>window.location.href='../../idForm.php'</script>";
        // header('Location: ../../idForm.php');
    } else if ($notificationSource === 'tbl_brgyclearance') {
        echo "<script>window.location.href='../../brgyClearance.php'</script>";
        // header('Location: ../../brgyClearance.php');
    } else if ($notificationSource === 'tbl_ecertificate') {
        echo "<script>window.location.href='../../endorsmentCert.php'</script>";
        // header('Location: ../../endorsmentCert.php');
    } else if ($notificationSource === 'tbl_certofindigency') {
        echo "<script>window.location.href='../../certOfIndigency.php'</script>";
        // header('Location: ../../certOfIndigency.php');
    } else if ($notificationSource === 'tbl_certoflbr') {
        echo "<script>window.location.href='../../certOfLBR.php'</script>";
        // header('Location: ../../certOfLBR.php');
    } else {
        echo 'Unknown notification source.';
    }
} else {
    // Handle the case where marking as read fails
    echo 'Error marking notification as read.';
}

exit;
?>