<?php include './server/server.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total PWD</title>
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
            <p>Total PWD</p>
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
                <div class="bigBoxPwd">
                    <div class="text-cont">
                        <p class="text">TOTAL PERSON <br> WITH DISABILITIES</p>
                        <p class="number">3,000</p>
                    </div>
                    <img src="icons/ResidentsSeeMore.png" alt="">
                </div>
            </div>
            <div class="Second-Cont">
                <div class="smallBoxPwd">
                    <div class="text-cont">
                        <p class="text">Male</p>
                        <p class="number">600</p>
                    </div>
                    <img src="icons/people.png" alt="">
                </div>
                <div class="smallBoxPwd">
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
                        <td><?= $row['age']?></td>
                        <td><?= $row['date-of-birth'] ?></td>
                        <td><?= $row['gender'] ?></td>
                        <td><?= $row['civil-status'] ?></td>
                        <td><?= $row['street'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td class="actions">
                            <a href="#" class="edit" id="editResidents" onclick="editResident(this)"
                                data-id="<?= $row['id'] ?>" data-fname="<?= $row['firstname'] ?>"
                                data-mname="<?= $row['middlename'] ?>" data-lname="<?= $row['lastname'] ?>"
                                data-age="<?= $row['age'] ?>" data-gender="<?= $row['gender'] ?>"
                                data-houseNo="<?= $row['house-no'] ?>" data-street="<?= $row['street'] ?>"
                                data-subdivision="<?= $row['subdivision'] ?>" data-dbirth="<?= $row['date-of-birth'] ?>"
                                data-pbirth="<?= $row['place-of-birth'] ?>" data-cstatus="<?= $row['civil-status'] ?>"
                                data-occupation="<?= $row['occupation'] ?>" data-email="<?= $row['email'] ?>"
                                data-contactNo="<?= $row['contact-no'] ?>" data-vstatus="<?= $row['voter-status'] ?>"
                                data-identified="<?= $row['identified'] ?>" data-sector="<?= $row['sector'] ?>"
                                data-citizenship="<?= $row['citizenship'] ?>"
                                data-householdNo="<?= $row['household-no'] ?>" data-osy="<?= $row['osy'] ?>"
                                data-pwd="<?= $row['pwd'] ?>" data-mfname="<?= $row['mother-firstname'] ?>"
                                data-mmname="<?= $row['mother-middlename'] ?>"
                                data-mlname="<?= $row['mother-lastname'] ?>" data-mage="<?= $row['mother-age'] ?>"
                                data-mhouseNo="<?= $row['mother-house-no'] ?>"
                                data-mstreet="<?= $row['mother-street'] ?>"
                                data-msubdivision="<?= $row['mother-subdivision'] ?>"
                                data-mhouseholdNo="<?= $row['mother-household-head'] ?>"
                                data-ffname="<?= $row['father-firstname'] ?>"
                                data-fmname="<?= $row['father-middlename'] ?>"
                                data-flname="<?= $row['father-lastname'] ?>" data-fage="<?= $row['father-age'] ?>"
                                data-fhouseNo="<?= $row['father-house-no'] ?>"
                                data-fstreet="<?= $row['father-street'] ?>"
                                data-fsubdivision="<?= $row['father-subdivision'] ?>"
                                data-fhouseholdNo="<?= $row['father-household-head'] ?>">Edit</a>
                            <a href="./model/print_resident.php" class="print">Print</a>
                            <?php 
                                $userExists = false;
                                foreach($users as $user) {
                                    if ($user['firstname'] === $row['firstname'] && $user['lastname'] === $row['lastname']) {
                                        $userExists = true;
                                        break;
                                    }
                                }
                            ?>
                            <?php if(!$userExists) { ?>
                            <a href="#" class="accountBtn" onclick="createAccount(this)"
                                data-fname="<?= $row['firstname'] ?>" data-mname="<?= $row['middlename'] ?>"
                                data-lname="<?= $row['lastname'] ?>" data-age="<?= $row['age'] ?>"
                                data-gender="<?= $row['gender'] ?>" data-street="<?= $row['street'] ?>"
                                data-cstatus="<?= $row['civil-status'] ?>" data-dbirth="<?= $row['date-of-birth'] ?>"
                                data-email="<?= $row['email'] ?>">Account</a>
                            <?php } ?>
                            <a href="./model/remove_resident.php?id=<?= $row['id'] ?>" class="delete">Delete</a>
                        </td>
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