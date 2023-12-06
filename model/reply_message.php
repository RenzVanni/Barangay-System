<?php
    include "../server/server.php";

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    if ($_POST['reply'] !== "") {
        $message = $_POST['reply'];
        $receiver = $_POST['name'];
        $sender = $_SESSION['role'];
        $from = $_SESSION['firstname']." ".$_SESSION['middlename']." ".$_SESSION['lastname'];

        $stmt = $conn->prepare("INSERT INTO chat_messages (messages, `sender`, `receiver`) VALUES (?,?, ?)");
        $stmt->bind_param("sss", $message, $sender, $receiver);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        // Redirect back to the main chat page
        header('Location: ../message.php');
        exit();
    }
?>
