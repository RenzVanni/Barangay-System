<?php
include "../server/server.php";

if (!isset($_SESSION['username'])) {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

$sender = $_SESSION['firstname']." ".$_SESSION['middlename']." ".$_SESSION['lastname'];

$result = $conn->query("SELECT * FROM chat_messages WHERE `sender`='$sender' OR `receiver`='$sender' ORDER BY timestamp ASC");

$messages = array();
while ($row = $result->fetch_assoc()) {
    $messageClass = ($row['sender'] === 'admin') ? 'message-subContainer-admin' : 'message-subContainer';

    echo "<div class='$messageClass'>
            <div class='main-message'>
                <p>{$row['messages']}</p>
            </div>
          </div>";
}

$conn->close();
?>
