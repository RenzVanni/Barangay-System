<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tbl_business";
$result = $conn->query($query);

$business = array();
while($row = $result->fetch_assoc()) {
  $business[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business</title>
    <link rel="stylesheet" href="style3.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="sidenav.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="./style/generateCert.css?<?php echo time(); ?>">
    <script src="sidebar.js ?<?php echo time(); ?>"></script>

</head>

<body>
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/import_residents.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include './sidebar.php' ?>

    <div class="home_residents">
        <div class="first_layer">
            <p>Business Records</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input class="searchBar" type="text" placeholder=" Enter text here">
                <a href="#" id="sortFilter">Sort & Filter </a>

                <div class="sort">
                    <div class="header-sort">
                        <img src="icons/close 1.png" alt="" class="close-sort">
                    </div>
                    <div class="sortby-cont">
                        <p>Sort by</p>
                        <div class="sort-btn">
                            <ul>
                                <li>students</li>
                                <li>osy</li>
                                <li>voters</li>
                                <li>male</li>
                                <li>female</li>
                                <li>snr</li>
                                <li>pwd</li>
                            </ul>
                        </div>
                    </div>
                    <div class="sortby-cont">
                        <p>Filter by</p>
                        <div class="sort-btn">
                            <ul>
                                <li>name</li>
                                <li>pob</li>
                                <li>dob</li>
                                <li>age</li>
                                <li>sex</li>
                                <li>civil status</li>
                                <li>created on</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="add-cont">
                <a href="addBusiness.php" class="add">+ Business</a>
                <a href="./model/export_business_csv.php" class="exportCVS">+ Export CVS</a>
                <button class="importBtn">+ Import</button>
                <a href="archives/ArchiveBusiness.php" class="archiveResidents">Archive</a>
            </div>
        </div>

        <?php include './template/message.php' ?>

        <div class="third_layer">
            <table id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>TAXPAYER NAME</th>
                        <th>BUSINESS NAME</th>
                        <th>BUSINESS ADDRESS</th>
                        <th>BUSINESS TYPE</th>
                        <th>BUSINESS STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($business)) {?>
                    <?php $no=1; foreach($business as $row): ?>
                    <tr>
                        <td>
                            <?= $no ?></td>
                        <td><?= $row['taxpayer_fname']." ".$row['taxpayer_mname']." ".$row['taxpayer_lname']." ".$row['taxpayer_suffix']?>
                        </td>
                        <td>
                            <?= $row['business_name']?></td>
                        <td><?= $row['house_no']." ".$row['street']." ".$row['subdivision']?></td>
                        <td><?= $row['business_type']?></td>
                        <td><?= $row['business_status']?></td>
                        <td>
                            <a href="#" class="edit">Edit</a>
                            <a href="#" class="delete">Delete</a>
                        </td>
                    </tr>
                    <?php $no++; endforeach  ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>



</body>

</html>