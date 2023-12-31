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

    $eighteenYearsAgo = date('Y-m-d', strtotime('-24 years'));

    $startDate = date('Y-m-d', strtotime('-24 years'));
    $endDate = date('Y-m-d', strtotime('-15 years'));
    // Fetch residents who are 18 years old and below based on their birthday
    $select = $conn->prepare("SELECT * FROM tbl_households WHERE date_of_birth BETWEEN ? AND ? ");
    $select->bind_param("ss", $startDate, $endDate);
    $select->execute();
    $result = $select->get_result();
    $osy = $result->num_rows;

    $startDateSnr = date('Y-m-d', strtotime('-60 years'));
    // $endDateSnr = date('Y-m-d', strtotime('-15 years'));
    // Fetch residents who are 18 years old and below based on their birthday
    $selectSnr = $conn->prepare("SELECT * FROM tbl_households WHERE date_of_birth <= ? ");
    $selectSnr->bind_param("s", $startDateSnr);
    $selectSnr->execute();
    $resultSnr = $selectSnr->get_result();
    $snr = $resultSnr->num_rows;

    $query7 = "SELECT * FROM tbl_households WHERE pwd='PWD'";
	$pwd = $conn->query($query7)->num_rows;

    $query8 =  "SELECT * FROM tbl_awareness WHERE status='active' ORDER BY timestamp DESC";
    $awareness = $conn->query($query8)->num_rows;

    $query9 =  "SELECT * FROM tbl_complain WHERE status='active' ORDER BY id DESC";
    $complain = $conn->query($query9)->num_rows;

    $query10 = "SELECT * FROM tbl_households WHERE `ofw`='ofw'";
	$ofw = $conn->query($query10)->num_rows;

    $query11 = "SELECT * FROM tbl_households WHERE `osc`='osc'";
	$osc = $conn->query($query11)->num_rows;

    $query12 = "SELECT * FROM tbl_households WHERE `osy`='osy'";
	$osy = $conn->query($query12)->num_rows;

    $query13 = "SELECT * FROM tbl_households WHERE `pwd`='pwd'";
	$pwd = $conn->query($query13)->num_rows;

    $options = $options ?? "none";
    $query14 = "SELECT * FROM tbl_households WHERE `education`!='$options'";
	$students = $conn->query($query14)->num_rows;

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

    $queryInquiry = "SELECT name, email, message, MAX(timestamp) AS latest_timestamp FROM contact_us GROUP BY name";
    $resultInquiry = $conn->query($queryInquiry);

    $inquiryData = array();
    while($row = $resultInquiry->fetch_assoc()) {
    $inquiryData[] = $row;
}

$audit = "SELECT * FROM audit_log ORDER BY created_at DESC";
$auditResult = $conn->query($audit);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style1.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
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
                <div class="underline"></div>
            </div> -->
            <?php include './model/functions/notif_messages.php' ?>
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
                    <div class="complain">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">Complain</div>
                                <div class="c2-complain"><?= number_format($complain) ?></div>
                                <div class="c3">Total Complain</div>
                            </div>
                            <div class="b2">
                                <div class="c4-complain">
                                    <img src="iconsBackend/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-complain" id="more-complain">
                            <a href="moreComplain.php" class="b3">More info</a>
                            <div class="b4">
                                <img src="iconsBackend/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="awareness">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">Awareness</div>
                                <div class="c2-awareness"><?= number_format($awareness) ?></div>
                                <div class="c3">Total Awareness</div>
                            </div>
                            <div class="b2">
                                <div class="c4-awareness">
                                    <img src="iconsBackend/people.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="a2-awareness" id="more-awareness">
                            <a href="moreAwareness.php" class="b3">More info</a>
                            <div class="b4">
                                <img src="iconsBackend/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div>

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
                            <a href="moreBlotter.php" class="b3">More info</a>
                            <div class="b4">
                                <img src="iconsBackend/down-arrow.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="senior">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">Senior Citizen</div>
                                <div class="c2-senior"><?= number_format($snr) ?></div>
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
                    </div>

                    <div class="ofw">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">OFW</div>
                                <div class="c2-ofw"><?= number_format($ofw) ?></div>
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

                    <div class="osc">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">OSC</div>
                                <div class="c2-osc"><?= number_format($osc) ?></div>
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
                                <div class="c1">OSY</div>
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

                    <div class="student">
                        <div class="a1">
                            <div class="b1">
                                <div class="c1">Student</div>
                                <div class="c2-student"><?= number_format($students) ?></div>
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



                    <!-- <div class="soloParent">
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
                    </div> -->

                </div>

                <div class="line-container">
                    <img src="vector/Line 6.png" alt="">
                </div>

                <div class="containerLogs">
                    <div class="RecentLogs">Login Logs</div>
                    <table id="table">
                        <thead>
                            <tr>
                                <th class="username">Username</th>
                                <th class="activity">Activity</th>
                                <th class="date">Date </th>
                                <th class="time">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Fetch recent logs from the database
                            $recentLogsQuery = $conn->query("SELECT * FROM login_logs ORDER BY id DESC LIMIT 10");

                            while ($log = $recentLogsQuery->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $log['username'] . '</td>';
                                echo '<td>' . $log['activity'] . '</td>';
                                echo '<td>' . $log['log_date'] . '</td>';
                                echo '<td>' . $log['log_time'] . '</td>';
                                echo '</tr>';
                            }

                            $recentLogsQuery->close();
                            ?>
                        </tbody>
                    </table>
                    <div class="pagination">
                        <button id="prevBtn">Previous</button>
                        <div id="pageNumbers" class="page-numbers"></div>
                        <button id="nextBtn">Next</button>
                    </div>
                </div>

                <div class="line-container">
                    <img src="vector/Line 6.png" alt="">
                </div>

                <div class="containerLogs">
                    <div class="RecentLogs">Activity Logs</div>
                    <table class="table" id="tableAct">
                        <thead>
                            <tr>
                                <th class="username">User ID</th>
                                <th class="activity">Action</th>
                                <th class="date">Table Name</th>
                                <th class="time">Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($auditResult->num_rows > 0) {
                                while ($row = $auditResult->fetch_assoc()) {
                                    $admin_id = $row['user_id'];
                                    $query = "SELECT * FROM tbl_users WHERE id='$admin_id'";
                                    $result = $conn->query($query);
                                // Check if the query was successful and if there are results
                                    if ($result && $result->num_rows > 0) {
                                        $name = $result->fetch_assoc();

                                        echo "<tr>";
                                        echo "<td>{$name['firstname']} {$name['middlename']} {$name['lastname']}</td>";
                                        echo "<td>{$row['action']}</td>";
                                        echo "<td>{$row['table_name']}</td>";
                                        echo "<td>{$row['created_at']}</td>";
                                        echo "</tr>";
                                    } else {
                                        // Handle the case when no user data is found
                                        echo "<tr>";
                                        echo "<td>User Not Found</td>";
                                        echo "<td>{$row['action']}</td>";
                                        echo "<td>{$row['table_name']}</td>";
                                        echo "<td>{$row['created_at']}</td>";
                                        echo "</tr>";
                                    }
                                }
                            } else {
                                echo "<tr><td colspan='8'>No audit trail records found.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="pagination">
                        <button id="prevBtn1">Previous</button>
                        <div id="pageNumbers1" class="page-numbers"></div>
                        <button id="nextBtn1">Next</button>
                    </div>
                </div>

                

                <div class="line-container">
                    <img src="vector/Line 6.png" alt="">
                </div>

                <div class="inquiries-cont">
                    <p class="title">Inquiries</p>

                    <div class="all-quiry-cont">
                        <?php if(!empty($inquiryData)) { ?>
                            <?php $no=1; foreach($inquiryData as $row): ?>
                                <a href="inquiry.php?name=<?= $row['name'] ?>&email=<?= $row['email'] ?>">
                                    <div class="one-inquiry">
                                        <p class="email"><?= $row['email'] ?></p>
                                        <p class="name"><?= $row['name'] ?></p>
                                        <p class="message"><?= $row['message'] ?></p>
                                    </div>
                                </a>
                            <?php $no++; endforeach ?>
                        <?php } ?>
                        <!-- <div class="one-inquiry">
                            <p class="email">rohomeres026@gmal.com</p>
                            <p class="name">Rodwin</p>
                            <p class="message">how to create an account?</p>
                        </div>
                        <div class="one-inquiry">
                            <p class="email">rohomeres026@gmal.com</p>
                            <p class="name">Rodwin</p>
                            <p class="message">how to create an account?</p>
                        </div>
                        <div class="one-inquiry">
                            <p class="email">rohomeres026@gmal.com</p>
                            <p class="name">Rodwin</p>
                            <p class="message">how to create an account?</p>
                        </div> -->
                    </div>
                    <a href="inquiry.php">View more</a>
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
                $('#notificationContainer').html(data);
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
                const senderId = notification.getAttribute('data-senderId');
                const messageSender = notification.getAttribute('data-name');
                const fname = notification.getAttribute('data-fname');
                const mname = notification.getAttribute('data-mname');
                const lname = notification.getAttribute('data-lname');

                // Send an AJAX request to mark the notification as read
                const xhr = new XMLHttpRequest();
                xhr.open('GET', './model/more/redirect_message_notif.php?id=' + messageId, true);
                xhr.onload = function() {
                    // Handle the response if needed
                    if (xhr.status === 200) {
                        // Redirect to the corresponding page based on the source
                         window.location.href = 'message.php?fname=' + fname + '&mname=' + mname + '&lname=' + lname;


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

<script>
// JavaScript code to handle pagination for Login Logs
const table = document.getElementById('table');
const rows = table.querySelectorAll('tbody tr');
const totalRows = rows.length;
const rowsPerPage = 5;
let currentPage = 1;

function showRows(page) {
    const start = (page - 1) * rowsPerPage;
    const end = start + rowsPerPage;

    rows.forEach((row, index) => {
        if (index >= start && index < end) {
            row.style.display = 'table-row';
        } else {
            row.style.display = 'none';
        }
    });
}

function updatePaginationButtons() {
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const pageNumbers = document.getElementById('pageNumbers');

    prevBtn.disabled = currentPage === 1;
    nextBtn.disabled = currentPage === Math.ceil(totalRows / rowsPerPage);

    pageNumbers.textContent = currentPage;
}

// Initial setup for Login Logs
showRows(currentPage);
updatePaginationButtons();

// Previous button click event for Login Logs
document.getElementById('prevBtn').addEventListener('click', () => {
    if (currentPage > 1) {
        currentPage--;
        showRows(currentPage);
        updatePaginationButtons();
    }
});

// Next button click event for Login Logs
document.getElementById('nextBtn').addEventListener('click', () => {
    if (currentPage < Math.ceil(totalRows / rowsPerPage)) {
        currentPage++;
        showRows(currentPage);
        updatePaginationButtons();
    }
});

// JavaScript code to handle pagination for Activity Logs
const tableAct = document.getElementById('tableAct');
const rowsAct = tableAct.querySelectorAll('tbody tr');
const totalRowsAct = rowsAct.length;
const rowsPerPageAct = 5;
let currentPageAct = 1;

function showRowsAct(page) {
    const start = (page - 1) * rowsPerPageAct;
    const end = start + rowsPerPageAct;

    rowsAct.forEach((row, index) => {
        if (index >= start && index < end) {
            row.style.display = 'table-row';
        } else {
            row.style.display = 'none';
        }
    });
}

function updatePaginationButtonsAct() {
    const prevBtn = document.getElementById('prevBtn1');
    const nextBtn = document.getElementById('nextBtn1');
    const pageNumbers = document.getElementById('pageNumbers1');

    prevBtn.disabled = currentPageAct === 1;
    nextBtn.disabled = currentPageAct === Math.ceil(totalRowsAct / rowsPerPageAct);

    pageNumbers.textContent = currentPageAct;
}

// Initial setup for Activity Logs
showRowsAct(currentPageAct);
updatePaginationButtonsAct();

// Previous button click event for Activity Logs
document.getElementById('prevBtn1').addEventListener('click', () => {
    if (currentPageAct > 1) {
        currentPageAct--;
        showRowsAct(currentPageAct);
        updatePaginationButtonsAct();
    }
});

// Next button click event for Activity Logs
document.getElementById('nextBtn1').addEventListener('click', () => {
    if (currentPageAct < Math.ceil(totalRowsAct / rowsPerPageAct)) {
        currentPageAct++;
        showRowsAct(currentPageAct);
        updatePaginationButtonsAct();
    }
});

</script>
