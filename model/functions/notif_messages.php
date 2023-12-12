<?php
function getNewMessages($conn) {
    // Fetch new certificates from tables like idfom, brgyclearance, certoflbr, etc.
    $sql = "SELECT * FROM chat_messages WHERE seen = 'unread' ORDER BY timestamp DESC"; // Adjust the query based on your tables and criteria

    $result = $conn->query($sql);

    // Check if there are new certificates
    if ($result->num_rows > 0) {
        // Fetch the results as an array
        $messages = array();
        while ($row = $result->fetch_assoc()) {
            $messages[] = $row;
        }

        return $messages;
    } else {
        return array();
    }

    // $sql2 = "SELECT * FROM tbl_users WHERE id = $id"; // Adjust the query based on your tables and criteria

    // $result2 = $conn->query($sql2);

    // // Check if there are new certificates
    // if ($result2->num_rows > 0) {
    //     // Fetch the results as an array
    //     $user = array();
    //     while ($row = $result->fetch_assoc()) {
    //         $user[] = $row;
    //     }

    //     return $user;
    // } else {
    //     return array();
    // }
}


function markCertificateAsReadMessage($conn, $id) {
    $id = (int)$id;

    // Update the status of the specific certificate to mark it as read
    $sql = "UPDATE chat_messages SET seen = 'read' WHERE id = $id AND seen = 'unread'";
    
    // Execute the query
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error updating record: " . $conn->error;
        return false;
    }
}

function getUser($conn, $id) {
    // Fetch new certificates from tables like idfom, brgyclearance, certoflbr, etc.
    $sql2 = "SELECT * FROM tbl_users WHERE id = $id"; // Adjust the query based on your tables and criteria

    $result2 = $conn->query($sql2);

    // Check if there are new certificates
    if ($result2->num_rows > 0) {
        // Fetch the results as an array
        $user = $result2->fetch_assoc();
        }
    return $user;
}

// Fetch new certificates
$newMessages = getNewMessages($conn);

// Display new certificates
foreach ($newMessages as $message) {
    echo '<div class="one-message clickable-notification-message" data-senderId="'.$message['sender_id'].'" data-id="'. $message['id'].'" data-name="'. $message['sender'].'">
        <div class="row_message">
            <div class="left_message">
                <img src="icons/message.png" alt="">
            </div>
            <div class="right_message">
                <div class="account_name">' . $message['sender'] . '</div>
                <div class="message">Message:</div>
                <div class="message_form">' . $message['messages'] . '</div>
                <div class="time">' . $message['timestamp'] . '</div>
            </div>
        </div>
        <div class="underline"></div>
    </div>';
}

// Mark certificates as read after displaying


?>