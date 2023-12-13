<?php include './server/server.php'?>
<?php
    $eighteenYearsAgo = date('Y-m-d', strtotime('-18 years'));

    // Fetch residents who are 18 years old and below based on their birthday
    $select = $conn->prepare("SELECT * FROM tbl_households WHERE date_of_birth >= ?");
    $select->bind_param("s", $eighteenYearsAgo);
    $select->execute();
    $result = $select->get_result();
    $total = $result->num_rows;

    $residents = array();
    while ($row = $result->fetch_assoc()) {
        $residents[] = $row;
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total OSY</title>
    <link rel="stylesheet" href="moreInfo.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="sidenav.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="./style/generateCert.css?<?php echo time(); ?>">
    <script src="sidebar.js ?<?php echo time(); ?>"></script>

</head>
<body>
    
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include './sidebar.php' ?>

    <div class="home_residents">
        <div class="first_layer">
            <p>Total OSY</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
        </div>

        <div class="Box-Container">
            <div class="First-Cont">
                <div class="bigBoxOsy">
                    <div class="text-cont">
                        <p class="text">TOTAL OUT OF <br> SCHOOL YOUTH <br>(15-24 years old)</p>
                        <p class="number"><?= number_format($total)?></p>
                    </div>
                    <img src="icons/ResidentsSeeMore.png" alt="">
                </div>
            </div>
            <div class="Second-Cont">
                <div class="smallBoxOsy">
                    <div class="text-cont">
                        <p class="text">Male</p>
                        <p class="number">600</p>
                    </div>
                    <img src="icons/people.png" alt="">
                </div>
                <div class="smallBoxOsy">
                    <div class="text-cont">
                        <p class="text">Female</p>
                        <p class="number">600</p>
                    </div>
                    <img src="icons/people.png" alt="">
                </div>
            </div>
        </div>

        <div class="fourth_layer">
            <table id="table">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Civil Status</th>
                        <th>Street</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($residents)) { ?>
                    <?php $no=1; foreach($residents as $row): ?>
                    <tr>
                        <td><?= $row['firstname'] ?> <?=$row['middlename'] ?> <?= $row['lastname']?></td>
                        <td><?= $row['date_of_birth'] ?></td>
                        <td><?= $row['sex'] ?></td>
                        <td><?= $row['civil_status'] ?></td>
                        <td><?= $row['street'] ?></td>
                        <td><?= $row['email'] ?></td>
                    </tr>
                    <?php $no++; endforeach ?>
                    <?php } ?>
                </tbody>
                <!-- Add more rows here -->
            </table>
        </div>

     
    </div>
</body>
</html>