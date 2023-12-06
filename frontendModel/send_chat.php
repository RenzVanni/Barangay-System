<?php
    include "../frontendServer/server.php";

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    if ($_POST['message'] !== "") {
        $message = $_POST['message'];
        $sender = $_SESSION['firstname']." ".$_SESSION['middlename']." ".$_SESSION['lastname'];

        $stmt = $conn->prepare("INSERT INTO chat_messages (messages, `sender`) VALUES (?,?)");
        $stmt->bind_param("ss", $message, $sender);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        // Redirect back to the main chat page
        header('Location: ../main.php');
        exit();
    }
?>
