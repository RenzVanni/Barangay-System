<?php include './server/server.php'?>

<?php 
$query =  "SELECT * FROM tbl_users WHERE `email`!=''";
$result = $conn->query($query);

$residents = array();
while($row = $result->fetch_assoc()) {
  $residents[] = $row;
}

if(!empty($_GET['fname']) && !empty($_GET['lname'])) {
    $name = $_GET['fname']." ".$_GET['mname']." ".$_GET['lname'];
    $firstname = $_GET['fname'];
    $middlename = $_GET['mname'];
    $lastname = $_GET['lname'];
    $query2 =  "SELECT * FROM chat_messages WHERE `sender`='$name' OR `receiver`='$name'";
    $result2 = $conn->query($query2);

    $messages = array();
    while($row = $result2->fetch_assoc()) {
    $messages[] = $row;
    }

        // Select the latest chat messages for the given sender or receiver
    $queryv2 = "SELECT * FROM chat_messages WHERE `sender`='$name' OR `receiver`='$name' ORDER BY timestamp DESC LIMIT 1";
    $resultv2 = $conn->query($queryv2);
    $messagesv2 = $resultv2->fetch_assoc();

    $query3 =  "SELECT * FROM tbl_users WHERE `firstname`='$firstname' AND `middlename`='$middlename' AND `lastname`='$lastname'";
    $result3 = $conn->query($query3);
    $user = $result3->fetch_assoc(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="style4.css ">
    <link rel="stylesheet" href="./style/generateCert.css">
    <script src="sidebar.js "></script>
</head>

<body>
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include './sidebar.php' ?>
    

    <div class="home_residents">
        <div class="first_layer">
            <p>Messages</p>
            
        </div>
        
        <div class="messages-cont">
            <div class="inbox-cont">
                <div class="search-cont">
                    <label for="search">Search:</label>
                    <input type="text" class="searchBar" id="search" placeholder="Search Resident Here..">
                </div>
                <?php if(!empty($residents)) { ?>
                    <?php $no=1; foreach($residents as $row): ?>
                        <a href="?fname=<?= $row['firstname'] ?>&mname=<?= $row['middlename'] ?>&lname=<?= $row['lastname'] ?>">
                        <div class="one-inbox">
                            <div class="user-cont">
                                <p class="name"><?= $row['firstname']." ".$row['middlename']." ".$row['lastname']?></p>
                                <?php   $yourName = $row['firstname']." ".$row['middlename']." ".$row['lastname'];
                                        $queryM = "SELECT * FROM chat_messages WHERE `sender`='$yourName' OR `receiver`='$yourName' ORDER BY timestamp DESC LIMIT 1";
                                        $resultM = $conn->query($queryM);
                                        $messageM = $resultM->fetch_assoc();
                                        $timestamp = isset($messageM['timestamp']) ? $messageM['timestamp'] : "";
                                        if ($timestamp) {
                                            $dateTime = new DateTime($timestamp);
                                            $formattedTime = $dateTime->format('H:i'); // Format as time (hours:minutes)
                                            $formattedDate = $dateTime->format('Y-m-d'); // Format as date (year-month-day)
                                        } ?>
                                <p class="question"><?= (isset($messageM['messages'])) ? $messageM['messages'] : "" ?></p>
                            </div>
                            <div class="time-cont">
                                <p class="time"><?= isset($formattedDate) ? $formattedDate : "" ?></p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="7" viewBox="0 0 8 7" fill="none">
                                    <circle cx="4.04541" cy="3.37378" r="3.37378" fill="#EB7878" />
                            </svg>
                        </div>
                        </a>
                    <?php $no++; endforeach ?>
                <?php } ?>
                
            </div>  
            <div class="chat-cont">
                <div class="header-name">
                    <p class="name"><?= $name ?></p>
                    <p class="location">No.123 Sinigang St. Dasmarinas Cavite</p>
                </div>

                <div class="body-message">

                    <div id="chat-container">
                        <?php if(!empty($messages)) { ?>
                            <?php $no=1; foreach($messages as $row) :?>
                                <?php  $messageClass = ($row['sender'] === 'admin') ? 'admin-sender' : 'sender'; ?>
                                <div id="chat-messages" class="chat-messages">
                                    <div class="message-<?= $messageClass ?>">
                                    <p class="<?= $messageClass ?>"><?= $row['messages'] ?></p>
                                    </div>
                                </div>
                            <?php $no++; endforeach ?>
                        <?php } ?>
                    </div>

                    <form action="./model/reply_message.php" method="post" id="chatForm">
                        <input type="hidden" name="name" value="<?= $name ?>">
                        <div id="user-input" style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                            <textarea type="text" name="reply" id="user-message" placeholder="Type your message..."
                                style="width: 900px; height: 32px; padding: 5px 5px; margin: 15px 0px; text-align: start;
                                font-family: Poppins;
                                font-size: 12px;
                                font-style: normal;
                                font-weight: 600;
                                line-height: normal;" maxlength="70" > </textarea>
                            
                            <input type="hidden" name="contactNo" value="<?= $user['contact_no'] ?>">
                            <button type="submit" style="margin-left: 12px; border: none; cursor: pointer;"> 
                               <img id="send-button" src="iconsBackend/send.png" alt="" onclick="sendMessage()" style="display: flex;">
                            </button>
                           
                           
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <script src="./js//jQuery-3.7.0.js"></script>
    <script src="./js//app.js"></script>


<!-- Add this script after including sidebar.js -->
<script>
    // function sendMessage() {
    //     // Get user input from the textarea
    //     var userMessage = document.getElementById('user-message').value;

    //     // Check if the user input is not empty
    //     if (userMessage.trim() !== '') {
    //         // Create a new message-admin container
    //         var newMessageAdminContainer = document.createElement('div');
    //         newMessageAdminContainer.classList.add('message-admin');

    //         // Create a paragraph element for the message content
    //         var messageContent = document.createElement('p');
    //         messageContent.classList.add('chat-admin');
    //         messageContent.textContent = userMessage;

    //         // Set the CSS property for word-wrap to break-word
    //         messageContent.style.wordWrap = 'break-word';

    //         // Append the message content to the message-admin container
    //         newMessageAdminContainer.appendChild(messageContent);

    //         // Get the chat-messages div where the new message-admin container will be appended
    //         var chatMessages = document.getElementById('chat-messages');

    //         // Append the new message-admin container to the chat-messages div
    //         chatMessages.appendChild(newMessageAdminContainer);

    //         // Clear the user input after sending the message
    //         document.getElementById('user-message').value = '';
    //     }
    // }

    // // Attach the function to the keyup event of the user-message textarea
    // document.getElementById('user-message').addEventListener('keyup', function(event) {
    //     // Check if the Enter key is released (keyCode 13)
    //     if (event.key === 'Enter') {
    //         event.preventDefault(); // Prevent the default behavior of the Enter key (e.g., adding a newline)

    //         // Call the sendMessage function when Enter is released
    //         sendMessage();
    //     }
    // });
</script>




    

</body>
</html>