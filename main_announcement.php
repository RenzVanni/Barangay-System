<?php include "./server/server.php" ?>
<?php
    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_announcement WHERE `id`='$id'";
    $result = $conn->query($query);
    $announcement = $result->fetch_assoc();

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./frontendScss/styles.css">
</head>

<body>

    <div class="announcementHeader">
        <div class="layer1">
            <div class="logo">
                <img src="./assets/brgy-logo.png" alt="brgy-logo" />
            </div>
            <div class="brgy">
                <span>Republic of the Philippines</span>
                <h2>Zone IV Dasmariñas Cavite</h2>
            </div>
        </div>

        <ul class="sub-menu">
            <li><a href="./index.php#">Home</a></li>
            <li><a href="./index.php#about">About</a></li>
            <li><a href="./index.php#services">Services</a></li>
            <li><a href="./index.php#announcement">Announcement</a></li>
            <li><a href=" ./index.php#frontendAwareness">Awareness</a></li>
            <li><a href="./index.php#contact-us">Contact us!</a></li>
            <?php if(isset($_SESSION['username'])) { ?>
            <li><a href="./Cart.php">Request</a></li>
            <?php }?>
        </ul>
    </div>

    <div class="announcement_title">
        <h1><?= $announcement['title'] ?></h1>
    </div>

    <section class="announcement_context">
        <section class="image-container">
            <img src="./uploads/announcement/<?= $announcement['image_announcement']?>" alt="image" />
        </section>
        <h2><?= $announcement['title'] ?></h2>
        <p><?= $announcement['details'] ?></p>
    </section>


    <footer>
        <img src="./assets/brgy-footer-logo.png" alt="" />

        <h2>BARANGAY ZONE IV DASMARINAS, CAVITE</h2>

        <div class="links">
            <h2>
                QUICK LINKS
                <ul>
                    <li>HOME</li>
                    <li>ABOUT</li>
                    <li>SERVICES</li>
                    <li>ANNOUNCEMENT</li>
                    <li>CONTACT US</li>
                </ul>
            </h2>
        </div>

        <div class="com">
            <ul>
                <li>
                    <img src="./assets/location.png" alt="" />
                    <p>Camerino Ave, Brgy Zone 4, Bayan Dasmariñas, Cavite</p>
                </li>
                <li>
                    <img src="./assets/email.png" alt="" />
                    <p>barangayhall.zone4@gmail.com</p>
                </li>
                <li>
                    <img src="./assets/telephone.png" alt="" />
                    <p>(046) 471 1247</p>
                </li>
            </ul>
        </div>
    </footer>

    <div class="copyright">
        <h2>
            Copyright © 2023 by Barangay Zone IV Dasmariñas Cavite. All Rights
            Reserved.
        </h2>
    </div>

</body>

</html>