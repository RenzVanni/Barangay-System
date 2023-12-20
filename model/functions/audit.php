<?php

function logAuditTrail($user_id, $action, $table_name) {
    global $conn;

    $user_id = mysqli_real_escape_string($conn, $user_id);
    $action = mysqli_real_escape_string($conn, $action);
    $table_name = mysqli_real_escape_string($conn, $table_name);

    $query = "INSERT INTO audit_log (user_id, action, table_name) 
              VALUES ('$user_id', '$action', '$table_name')";

    if ($conn->query($query) === TRUE) {
        echo "Audit trail logged successfully.";
    } else {
        echo "Error logging audit trail: " . $conn->error;
    }
}
?>
