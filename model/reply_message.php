<?php
    include "../server/server.php";

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    if ($_POST['reply'] !== "") {
        $adminMessage = $_POST['reply'];
        $receiver = $_POST['name'];
        $sender = $_SESSION['role'];
        $from = $_SESSION['firstname']." ".$_SESSION['middlename']." ".$_SESSION['lastname'];
        $contactNo = $_POST['contactNo'];

        $stmt = $conn->prepare("INSERT INTO chat_messages (messages, `sender`, `receiver`) VALUES (?,?, ?)");
        $stmt->bind_param("sss", $adminMessage, $sender, $receiver);
        $stmt->execute();

        // $smsReply = true;
        // include "./sms/send.php";

        $stmt->close();
        $conn->close();

        // Redirect back to the main chat page
        echo "<script>window.location.href='../message.php'</script>";
        // header('Location: ../message.php');
        exit();
    }
?>
