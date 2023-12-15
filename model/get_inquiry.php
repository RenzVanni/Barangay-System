<?php
include "../server/server.php";

if (!isset($_SESSION['username'])) {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

$name = isset($_GET['name']) ? urldecode($_GET['name']) : '';
$result = $conn->query("SELECT * FROM contact_us WHERE `name`='$name'ORDER BY timestamp ASC");

$messages = array();
while ($row = $result->fetch_assoc()) {
    $messageClass = ($row['sender'] === 'admin') ? 'admin-sender' : 'sender';

    echo "
        <div id='chat-messages' class='chat-messages'>
            <div class='message-{$messageClass}'>
            <p class='{$messageClass}'>{$row['message']}</p>
            </div>
        </div>";
}
$conn->close();
?>
