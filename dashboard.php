<?php include "./server/server.php" ?>
<?php 

function calculateAge($dob) {
    $today = new DateTime();
    $birthDate = new DateTime($dob);
    $interval = $today->diff($birthDate);
    return $interval->y;
}
	$query = "SELECT * FROM tbl_households";
    $result = $conn->query($query);
	$total = $result->num_rows;

  	$query1 = "SELECT * FROM tbl_households WHERE sex='Male'";
    $result1 = $conn->query($query1);
	$male = $result1->num_rows;

	$query2 = "SELECT * FROM tbl_households WHERE sex='Female'";
    $result2 = $conn->query($query2);
	$female = $result2->num_rows;

  	$query3 = "SELECT * FROM tbl_households WHERE `voter_status`='voter'";
    $result3 = $conn->query($query3);
	$totalvoters = $result3->num_rows;

  $query4 = "SELECT * FROM tbl_households WHERE `voter_status`='non-voter'";
	$non = $conn->query($query4)->num_rows;

  $query5 = "SELECT * FROM tbl_blotter";
	$blotter = $conn->query($query5)->num_rows;

  $query6 = "SELECT * FROM tbl_households WHERE osy='OSY'";
	$osy = $conn->query($query6)->num_rows;

  $query7 = "SELECT * FROM tbl_households WHERE pwd='PWD'";
	$pwd = $conn->query($query7)->num_rows;

//   $query8 = "SELECT * FROM tblresidents WHERE age>=60";
// 	$snr = $conn->query($query8)->num_rows;

//   $query9 = "SELECT * FROM tblresidents WHERE sector='Student'";
// 	$students = $conn->query($query9)->num_rows;

  if(isset($_GET['state'])) {
    $state = $_GET['state'];
    
    if($state=='male'){
        $query = "SELECT * FROM tblresidents WHERE sex='Male'";
        $result2 = $conn->query($query);
    }elseif($state=='female'){
        $query = "SELECT * FROM tblresidents WHERE sex='Female'";
        $result2 = $conn->query($query);
    }elseif($state=='osy'){
        $query = "SELECT * FROM tblresidents WHERE osy='OSY'";
        $result2 = $conn->query($query);
    }elseif($state=='pwd'){
        $query = "SELECT * FROM tblresidents WHERE pwd='PWD'";
        $result2 = $conn->query($query);
    }elseif($state=='snr'){
        $query = "SELECT * FROM tblresidents WHERE sector='Senior Citizen'";
        $result2 = $conn->query($query);
    }elseif($state=='students'){
        $query = "SELECT * FROM tblresidents WHERE pwd='Student'";
        $result2 = $conn->query($query);
    }elseif($state=='blotters'){
        $query = "SELECT * FROM tblblotter";
        $result2 = $conn->query($query);
    }elseif($state=='non_voters'){
        $query = "SELECT * FROM tblresidents WHERE `voter_status`='non-voter'";
        $result2 = $conn->query($query);
    }elseif($state=='voters'){
        $query = "SELECT * FROM tblresidents WHERE `voter_status`='voter'";
        $result2 = $conn->query($query);
       
    }else{
        $query = "SELECT * FROM tblresidents";
        $result2 = $conn->query($query);
    }

	
    $resident = array();
	while($row = $result2->fetch_assoc()){
		$resident[] = $row; 
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style4.css">
    <link rel="stylesheet" href="./style/generateCert.css">
    <script src="sidebar.js"></script>

</head>

<body>
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include "./sidebar.php" ?>

    <?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>"
        role="alert">
        <?php echo "<script type='text/javascript'>alert('" . $_SESSION['message'] . "');</script>"; ?>
    </div>
    <?php unset($_SESSION['message']); ?>
    <?php endif ?>

    <div class="modal_notification">
        <div class="form_notification">
            <!-- <div class="one-notif">
                <div class="row_notif">
                    <div class="left_notif">
                        <img src="iconsBackend/request.png" alt="">
                    </div>
                    <div class="right_notif">
                        <div class="account_name">Rodwin C. Homeres</div>
                        <div class="request">REQUEST:</div>
                        <div class="request_form">Certificate of Late Birth Registration</div>
                        <div class="time">3 hours ago</div>
                    </div>
                </div>
                <div class="underline"></div>
            </div>

            <div class="one-notif">
                <div class="row_notif">
                    <div class="left_notif">
                        <img src="iconsBackend/request.png" alt="">
                    </div>
                    <div class="right_notif">
                        <div class="account_name">Rodwin C. Homeres</div>
                        <div class="request">REQUEST:</div>
                        <div class="request_form">Certificate of Late Birth Registration</div>
                        <div class="time">3 hours ago</div>
                    </div>
                </div>
                <div class="underline"></div>
            </div> -->
            <?php include './model/functions/notification.php' ?>

        </div>
    </div>

    <div class="modal_message">
        <div class="form_message">
            <!-- <div class="one-message">
                <div class="row_message">
                    <div class="left_message">
                        <img src="icons/message.png" alt="">
                    </div>
                    <div class="right_message">
                        <div class="account_name">Rodwin C. Homeres</div>
                        <div class="message">Message:</div>
                        <div class="message_form">message ko na daw to</div>
                        <div class="time">3 hours ago</div>
                    </div>
                </div>
<<<<<<< HEAD
                <div class="underline"></div>
            </div> -->
            <?php include './model/functions/notif_messages.php' ?>
=======
                <div class="underline"></div> -->
            </div>
>>>>>>> 4729839a9c4a42e0e168a19c7c28faac64a56c66
        </div>
    </div>

    <div class="home-container">
        <div class="center">
            <div class="box">
                <div class="rectangle">
                    <p>Dashboard</p>
                    <div class="container-header">
                        <div class="message-cont">
                            <img src="iconsBackend/message.png" alt="" id="messages">
                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="7" viewBox="0 0 8 7" fill="none">
                                <circle cx="4.04541" cy="3.37378" r="3.37378" fill="#EB7878" />
                            </svg>
                        </div>
                       
                        <div class="notif-cont">
                            <img src="iconsBackend/bell.png" alt="" id="notifications">
                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="7" viewBox="0 0 8 7" fill="none">
                                <circle cx="4.04541" cy="3.37378" r="3.37378" fill="#EB7878" />
                            </svg>
                        </div>
                       
                        <a class="logout" href="./model/logout.php">Logout</a>
                    </div>
                </div>
                <div class="stats">
                    <div class="population">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">Population</div>
                                <div class="c2"><?= number_format($total) ?>
                                </div>
                                <div class="c3">Total Population</div>
                            </div>
                            <div class="b2">
                                <div class="c4-p">
                                    <img src="iconsBackend/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-p" id="more-population">
                            <a href="morePopulation.php" class="b3">More info</a>
                            <div class="b4">
                                <img src="iconsBackend/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="male">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">MALE</div>
                                <div class="c2-m"><?= number_format($male) ?></div>
                                <div class="c3">Total Male</div>
                            </div>
                            <div class="b2">
                                <div class="c4-m">
                                    <img src="iconsBackend/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-m" id="more-male">
                            <a href="moreMale.php" class="b3">More info</a>
                            <div class="b4">
                                <img src="iconsBackend/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="female">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">FEMALE</div>
                                <div class="c2-f"><?= number_format($female) ?></div>
                                <div class="c3">Total Female</div>
                            </div>
                            <div class="b2">
                                <div class="c4-f">
                                    <img src="iconsBackend/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-f" id="more-female">
                            <a href="moreFemale.php" class="b3">More info</a>
                            <div class="b4">
                                <img src="iconsBackend/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="voters">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">VOTERS</div>
                                <div class="c2-v"><?= number_format($totalvoters) ?></div>
                                <div class="c3">Total Voters</div>
                            </div>
                            <div class="b2">
                                <div class="c4-v">
                                    <img src="iconsBackend/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-v" id="more-voters">
                            <a href="moreVoters.php" class="b3">More info</a>
                            <div class="b4">
                                <img src="iconsBackend/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div> -->

                    <div class="blotter">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">BLOTTER</div>
                                <div class="c2-b"><?= number_format($blotter) ?></div>
                                <div class="c3">Total Blotter</div>
                            </div>
                            <div class="b2">
                                <div class="c4-b">
                                    <img src="iconsBackend/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-b" id="more-blotters">
                            <a href="blotter.php" class="b3">More info</a>
                            <div class="b4">
                                <img src="iconsBackend/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div>

                    <!-- <div class="osc">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">OSC (6-14)</div>
                                <div class="c2-osc">0</div>
                                <div class="c3">Total Out of School Children</div>
                            </div>
                            <div class="b2">
                                <div class="c4-osc">
                                    <img src="iconsBackend/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-osc" id="more-osc">
                            <a href="moreOSC.php" class="b3">More info</a>
                            <div class="b4">
                                <img src="iconsBackend/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="osy">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">OSY (15-24)</div>
                                <div class="c2-o"><?= number_format($osy) ?></div>
                                <div class="c3">Total Out of School Youth</div>
                            </div>
                            <div class="b2">
                                <div class="c4-o">
                                    <img src="iconsBackend/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-o" id="more-osy">
                            <a href="moreOSY.php" class="b3">More info</a>
                            <div class="b4">
                                <img src="iconsBackend/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div>



                    <div class="soloParent">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">Solo Parent</div>
                                <div class="c2-soloP">0</div>
                                <div class="c3">Total Solo Parent</div>
                            </div>
                            <div class="b2">
                                <div class="c4-soloP">
                                    <img src="iconsBackend/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-soloP" id="more-soloParent">
                            <a href="moreSoloParent.php" class="b3">More info</a>
                            <div class="b4">
                                <img src="iconsBackend/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="pwd">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">PWD</div>
                                <div class="c2-pw"><?= number_format($pwd) ?></div>
                                <div class="c3">Total Person with Disabilities</div>
                            </div>
                            <div class="b2">
                                <div class="c4-pw">
                                    <img src="iconsBackend/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-pw" id="more-pwd">
                            <a href="morePWD.php" class="b3">More info</a>
                            <div class="b4">
                                <img src="iconsBackend/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="labor">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">Labor Force</div>
                                <div class="c2-lbr">0</div>
                                <div class="c3">Total Labor Force</div>
                            </div>
                            <div class="b2">
                                <div class="c4-lbr">
                                    <img src="iconsBackend/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-lbr" id="more-labor">
                            <a href="moreLaborForce.php" class="b3">More info</a>
                            <div class="b4">
                                <img src="iconsBackend/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="unemploy">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">Unemployed</div>
                                <div class="c2-ploy">0</div>
                                <div class="c3">Total Unemployed</div>
                            </div>
                            <div class="b2">
                                <div class="c4-ploy">
                                    <img src="iconsBackend/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-ploy" id="more-unemploy">
                            <a href="moreUnemployed.php" class="b3">More info</a>
                            <div class="b4">
                                <img src="iconsBackend/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="ofw">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">OFW</div>
                                <div class="c2-ofw">0</div>
                                <div class="c3">Total Overseas Filipino Worker</div>
                            </div>
                            <div class="b2">
                                <div class="c4-ofw">
                                    <img src="iconsBackend/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-ofw" id="more-ofw">
                            <a href="moreOFW.php" class="b3">More info</a>
                            <div class="b4">
                                <img src="iconsBackend/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="student">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">Student</div>
                                <div class="c2-student">0</div>
                                <div class="c3">Total Students</div>
                            </div>
                            <div class="b2">
                                <div class="c4-student">
                                    <img src="iconsBackend/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-student" id="more-student">
                            <a href="moreStudents.php" class="b3">More info</a>
                            <div class="b4">
                                <img src="iconsBackend/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="senior">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">Senior Citizen</div>
                                <div class="c2-senior">0</div>
                                <div class="c3">Total Senior Citizens</div>
                            </div>
                            <div class="b2">
                                <div class="c4-senior">
                                    <img src="iconsBackend/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-senior" id="more-senior">
                            <a href="moreSNR.php" class="b3">More info</a>
                            <div class="b4">
                                <img src="iconsBackend/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div> -->

                </div>

                <div class="line-container">
                    <img src="vector/Line 6.png" alt="">
                </div>

                <div class="containerLogs">
                    <div class="RecentLogs">Recent Logs</div>
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>User</th>
                            <th>Information</th>
                        </tr>
                        <tr>
                            <td>June 28, 2023</td>
                            <td>10:00 AM</td>
                            <td>John Doe</td>
                            <td>Information 1</td>
                        </tr>
                    </table>
                    <div class="nextBtn">NEXT</div>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/jQuery-3.7.0.js"></script>
    <script src="./js/app.js"></script>
    <script>
    const notifications = document.getElementById('notifications');
    const modalNotification = document.querySelector('.modal_notification');
    const svgIcon = document.querySelector('.notif-cont svg');

    // Function to check if there is at least one notification
    function hasNotifications() {
        return document.querySelectorAll('.one-notif').length > 0;
    }

    // Toggle modal and SVG icon on notifications click
    notifications.addEventListener('click', function(event) {
        event.preventDefault();

        if (modalNotification.style.display === 'block') {
            modalNotification.style.display = 'none';
            svgIcon.style.display = 'none';
        } else {
            modalNotification.style.display = 'block';
            // Display SVG icon if there is at least one notification
            if (hasNotifications()) {
                svgIcon.style.display = 'block';
            }
        }
    });

    // Close modal on outside click
    document.body.addEventListener('click', function(event) {
        if (!modalNotification.contains(event.target) && event.target !== notifications) {
            modalNotification.style.display = 'none';
            svgIcon.style.display = 'none';
        }
    });

    // Check and display SVG icon on page load
    document.addEventListener('DOMContentLoaded', function() {
        if (hasNotifications()) {
            svgIcon.style.display = 'block';
        }
    });
    </script>

    <script>
        //MESSAGE MODAL
        const messages = document.getElementById('messages');
        const modalMessages = document.querySelector('.modal_message');
        const svgIcon1 = document.querySelector('.message-cont svg');
        
        // Toggle modal and SVG icon on messages click
        messages.addEventListener('click', function(event) {
        event.preventDefault();

        if (modalMessages.style.display === 'block') {
            modalMessages.style.display = 'none';
            svgIcon1.style.display = 'none';
        } else {
            modalMessages.style.display = 'block';
            // Display SVG icon if there is at least one notification
            if (hasMesssages()) {
                svgIcon1.style.display = 'block';
            }
        }
    });
     // Close modal on outside click
     document.body.addEventListener('click', function(event) {
        if (!modalMessages.contains(event.target) && event.target !== messages) {
            modalMessages.style.display = 'none';
            svgIcon1.style.display = 'none';
        }
    });
    // Check and display SVG icon on page load
    document.addEventListener('DOMContentLoaded', function() {
        if (hasMessages()) {
            svgIcon1.style.display = 'block';
        }
    });
    </script>

    <script>
    // Function to fetch and display notifications
    function fetchNotifications() {
        $.ajax({
            url: 'notification.php', // Update the URL to the PHP file handling notifications
            type: 'GET',
            dataType: 'html',
            success: function(data) {
                // Update the notification container with the fetched data
                $('#notificationContainer').html(data);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching notifications:', error);
            }
        });
    }

    // Function to periodically fetch notifications (every 1 minute in this example)
    function startFetchingNotifications() {
        setInterval(fetchNotifications, 60000); // Adjust the interval as needed
    }

    // Start fetching notifications when the page loads
    $(document).ready(function() {
        fetchNotifications();
        startFetchingNotifications();
    });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add click event listener to all elements with class 'clickable-notification'
        const clickableNotifications = document.querySelectorAll('.clickable-notification');
        clickableNotifications.forEach(function(notification) {
            notification.addEventListener('click', function() {
                // Get the ID of the clicked notification
                const notificationId = notification.getAttribute('data-id');
                const notificationSource = notification.getAttribute('data-source');

                // Send an AJAX request to mark the notification as read
                const xhr = new XMLHttpRequest();
                const timestamp = new Date().getTime(); // Add timestamp
                xhr.open('GET', './model/more/redirect_notification.php?id=' + notificationId +
                    '&source=' + notificationSource + '&timestamp=' + timestamp, true);
                xhr.onload = function() {
                    // Handle the response if needed
                    if (xhr.status === 200) {
                        // Redirect to the corresponding page based on the source
                        if (notificationSource === 'tbl_idform') {
                            console.log(notificationSource)
                            window.location.href = 'idForm.php';
                        } else if (notificationSource === 'tbl_brgyclearance') {
                            window.location.href = 'brgyClearance.php';
                        } else if (notificationSource === 'tbl_ecertificate') {
                            window.location.href = 'endorsmentCert.php';
                        } else if (notificationSource === 'tbl_certofindigency') {
                            window.location.href = 'certOfIndigency.php';
                        } else if (notificationSource === 'tbl_certoflbr') {
                            window.location.href = 'certOfLBR.php';
                        } else {
                            console.error('Unknown notification source:',
                                notificationSource);
                        }
                    } else {
                        // Handle errors if needed
                        console.error('Error marking notification as read:', xhr
                            .statusText);
                    }
                };
                xhr.send();

                // Add any other logic you need for handling the click event
            });
        });
    });
    </script>

    <script>
    // Function to fetch and display notifications
    function fetchMessageNotif() {
        $.ajax({
            url: 'notif_messages.php', // Update the URL to the PHP file handling notifications
            type: 'GET',
            dataType: 'html',
            success: function(data) {
                // Update the notification container with the fetched data
                $('#messageNotificationContainer').html(data);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching notifications:', error);
            }
        });
    }

    // Function to periodically fetch notifications (every 1 minute in this example)
    function startFetchingMessageNotif() {
        setInterval(fetchMessageNotif, 60000); // Adjust the interval as needed
    }

    $(document).ready(function() {
        fetchMessageNotif();
        startFetchingMessageNotif();
    });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {        // Add click event listener to all elements with class 'clickable-notification'
            // Start fetching notifications when the page loads
        const clickableMessageNotif = document.querySelectorAll('.clickable-notification-message');
        clickableMessageNotif.forEach(function(notification) {
            notification.addEventListener('click', function() {
                // Get the ID of the clicked notification
                const messageId = notification.getAttribute('data-id');
                const messageSender = notification.getAttribute('data-name');

                // Send an AJAX request to mark the notification as read
                const xhr = new XMLHttpRequest();
                xhr.open('GET', './model/more/redirect_message_notif.php?id=' + messageId, true);
                xhr.onload = function() {
                    // Handle the response if needed
                    if (xhr.status === 200) {
                        // Redirect to the corresponding page based on the source
                        window.location.href = 'message.php?name='+ messageSender;


                    } else {
                        // Handle errors if needed
                        console.error('Error marking notification as read:', xhr
                            .statusText);
                    }
                };
                xhr.send();

                // Add any other logic you need for handling the click event
            });
        });
    });
    </script>


</body>

</html>