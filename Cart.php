<?php include "./server/server.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="./frontendScss/styles.css?<?php echo time()?>">

</head>

<body>
    <?php include "./frontendModel/fetch_brgy_information.php" ?>

    <div class="cart">

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
                <li><a href="./main.php#">Home</a></li>
                <li><a href="./main.php#about">About</a></li>
                <li><a href="./main.php#services">Services</a></li>
                <li><a href="./main.php#frontendAnnouncement">Announcement</a></li>
                <li><a href="./main.php#contact-us">Contact us!</a></li>
                <?php if(isset($_SESSION['username'])) { ?>
                <li><a href="#">Request</a></li>
                <li><?php echo $_SESSION['username'];?></li>
                <li><a href="./frontendModel/logout.php?username=<?= $_SESSION['username']  ?>">Logout</a></li>
                <?php } else {?>
                <li class="login" id="login">Login</li>
                <?php } ?>
            </ul>
        </div>
        <div class="main-cart">
            <h1>Requested Status</h1>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Requestor name</td>
                            <td>Description</td>
                            <td>Requested Date</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($certs)) {?>
                        <?php foreach($certs as $row) : ?>
                        <tr>
                            <td><?= $row['applicant_fname']. " ". $row['applicant_mname']. " ". $row['applicant_lname'] ?>
                            </td>
                            <td>
                                <?php  if(isset($row['requestor_fname']) && $row['source'] !== 'tbl_businessclearance') {
                             echo $row['requestor_fname']. " ". $row['requestor_mname']. " ". $row['requestor_lname']; }?>
                            </td>
                            <td>
                                <?php     
                            if (isset($row['applicant_fname'])) {
                                if ($row['source'] === 'tbl_idform') {
                                    echo "Identification";
                                } elseif ($row['source'] === 'tbl_brgyclearance') {
                                    echo "Barangay Clearance";
                                }
                                elseif ($row['source'] === 'tbl_ecertificate') {
                                    echo "Endorsement Certificate";
                                }
                                elseif ($row['source'] === 'tbl_certoflbr') {
                                    echo "Certificate of Late Birth";
                                }
                                elseif ($row['source'] === 'tbl_certofindigency') {
                                    echo "Certificate of Indigency";
                                }
                                elseif ($row['source'] === 'tbl_businessclearance') {
                                    echo "Business Clearance";
                                }
                            }
                            ?>
                            </td>
                            <td>
                                <?= $row['date_requested'] ?></td>
                            <td>
                                <?php if($row['status'] === "Pending") {?>
                                <span class="pending"><?= $row['status']?></span>
                                <?php } else if($row['status'] === "For Pick-up") {?>
                                <span class="pick-up"><?= $row['status']?></span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php
                                if ($row['source'] === 'tbl_idform') { ?>
                                <a href="#" class="cancel-item">Cancel</a>
                                <div class="cancel-container">
                                    <div class="confirm-cancel-item">
                                        <div class="main-container">
                                            <div class="warning-context">
                                                <div class="warning-img">
                                                    <div class="container">
                                                        <img src="./assets/warning-icon.svg" alt="warning-icon">
                                                    </div>
                                                </div>
                                                <div class="context">
                                                    <h3>Cancel Request?</h3>
                                                    <p>Are you sure you want to cancel your request? All of your about
                                                        this request will be permanently removed. This action cannot be
                                                        undone.</p>
                                                </div>
                                            </div>
                                            <div class="buttons">
                                                <button type="button" class="btn1"><a
                                                        href="./frontendModel/cancel/cancel_idform.php?id=<?= $row['id'] ?>">Confirm</a></button>
                                                <button type="button" class="abort-cancel-item">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } elseif ($row['source'] === 'tbl_brgyclearance') { ?>
                                <a href="#" class="cancel-item">Cancel</a>
                                <div class="cancel-container">
                                    <div class="confirm-cancel-item">
                                        <div class="main-container">
                                            <div class="warning-context">
                                                <div class="warning-img">
                                                    <div class="container">
                                                        <img src="./assets/warning-icon.svg" alt="warning-icon">
                                                    </div>
                                                </div>
                                                <div class="context">
                                                    <h3>Cancel Request?</h3>
                                                    <p>Are you sure you want to cancel your request? All of your about
                                                        this request will be permanently removed. This action cannot be
                                                        undone.</p>
                                                </div>
                                            </div>
                                            <div class="buttons">
                                                <button type="button" class="btn1"><a
                                                        href="./frontendModel/cancel/cancel_brgyClearance.php?id=<?= $row['id'] ?>">Confirm</a></button>
                                                <button type="button" class="abort-cancel-item">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }
                                elseif ($row['source'] === 'tbl_ecertificate') { ?>
                                <a href="#" class="cancel-item">Cancel</a>
                                <div class="cancel-container">
                                    <div class="confirm-cancel-item">
                                        <div class="main-container">
                                            <div class="warning-context">
                                                <div class="warning-img">
                                                    <div class="container">
                                                        <img src="./assets/warning-icon.svg" alt="warning-icon">
                                                    </div>
                                                </div>
                                                <div class="context">
                                                    <h3>Cancel Request?</h3>
                                                    <p>Are you sure you want to cancel your request? All of your about
                                                        this request will be permanently removed. This action cannot be
                                                        undone.</p>
                                                </div>
                                            </div>
                                            <div class="buttons">
                                                <button type="button" class="btn1"><a
                                                        href="./frontendModel/cancel/cancel_endorsement.php?id=<?= $row['id'] ?>">Confirm</a></button>
                                                <button type="button" class="abort-cancel-item">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }
                                elseif ($row['source'] === 'tbl_certoflbr') { ?>
                                <a href="#" class="cancel-item">Cancel</a>
                                <div class="cancel-container">
                                    <div class="confirm-cancel-item">
                                        <div class="main-container">
                                            <div class="warning-context">
                                                <div class="warning-img">
                                                    <div class="container">
                                                        <img src="./assets/warning-icon.svg" alt="warning-icon">
                                                    </div>
                                                </div>
                                                <div class="context">
                                                    <h3>Cancel Request?</h3>
                                                    <p>Are you sure you want to cancel your request? All of your about
                                                        this request will be permanently removed. This action cannot be
                                                        undone.</p>
                                                </div>
                                            </div>
                                            <div class="buttons">
                                                <button type="button" class="btn1"><a
                                                        href="./frontendModel/cancel/cancel_certOfLbr.php?id=<?= $row['id'] ?>">Confirm</a></button>
                                                <button type="button" class="abort-cancel-item">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }
                                elseif ($row['source'] === 'tbl_certofindigency') { ?>
                                <a href="#" class="cancel-item">Cancel</a>
                                <div class="cancel-container">
                                    <div class="confirm-cancel-item">
                                        <div class="main-container">
                                            <div class="warning-context">
                                                <div class="warning-img">
                                                    <div class="container">
                                                        <img src="./assets/warning-icon.svg" alt="warning-icon">
                                                    </div>
                                                </div>
                                                <div class="context">
                                                    <h3>Cancel Request?</h3>
                                                    <p>Are you sure you want to cancel your request? All of your about
                                                        this request will be permanently removed. This action cannot be
                                                        undone.</p>
                                                </div>
                                            </div>
                                            <div class="buttons">
                                                <button type="button" class="btn1"><a
                                                        href="./frontendModel/cancel/cancel_certOfIndigency.php?id=<?= $row['id'] ?>">Confirm</a></button>
                                                <button type="button" class="abort-cancel-item">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }
                                elseif ($row['source'] === 'tbl_businessclearance') { ?>
                                <a href="#" class="cancel-item">Cancel</a>
                                <div class="cancel-container">
                                    <div class="confirm-cancel-item">
                                        <div class="main-container">
                                            <div class="warning-context">
                                                <div class="warning-img">
                                                    <div class="container">
                                                        <img src="./assets/warning-icon.svg" alt="warning-icon">
                                                    </div>
                                                </div>
                                                <div class="context">
                                                    <h3>Cancel Request?</h3>
                                                    <p>Are you sure you want to cancel your request? All of your about
                                                        this request will be permanently removed. This action cannot be
                                                        undone.</p>
                                                </div>
                                            </div>
                                            <div class="buttons">
                                                <button type="button" class="btn1"><a
                                                        href="./frontendModel/cancel/cancel_certOfIndigency.php?id=<?= $row['id'] ?>">Confirm</a></button>
                                                <button type="button" class="abort-cancel-item">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }
                                ?>
                            </td>
                        </tr>
                        <?php  endforeach  ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="./forntendJs//jQuery-3-7-0.js"></script>
    <script src="./forntendJs//app.js"></script>
</body>

</html>