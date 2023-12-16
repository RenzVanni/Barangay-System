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
        $receiverEmail = $_POST['email'];
        $sender = $_SESSION['role'];
        $from = $_SESSION['firstname']." ".$_SESSION['middlename']." ".$_SESSION['lastname'];

        $stmt = $conn->prepare("INSERT INTO contact_us (`message`, `name`, `sender`, `receiver`) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $adminMessage, $receiver, $sender, $receiver);
        $stmt->execute();

        // $smsReply = true;
        // include "./sms/send.php";

        include './reply_contact_email.php';

        $stmt->close();
        $conn->close();

        // Redirect back to the main chat page
        echo "<script>window.location.href='../inquiry.php'</script>";
        // header('Location: ../inquiry.php');
        exit();
    }
?>
