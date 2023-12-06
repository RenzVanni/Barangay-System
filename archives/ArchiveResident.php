<?php include "../server/server.php" ?>
<?php
$query =  "SELECT * FROM del_residents_archive";
$result = $conn->query($query);

$resident = array();
while($row = $result->fetch_assoc()) {
$resident[] = $row;
}

function calculateAge($dob) {
    $today = new DateTime();
    $birthDate = new DateTime($dob);
    $interval = $today->diff($birthDate);
    return $interval->y;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archives Residents Information</title>
    <link rel="stylesheet" href="../style3.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="../style4.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="../style/generateCert.css?<?php echo time(); ?>">
    <script src="sidebar2.js ?<?php echo time(); ?>"></script>
    <link rel="stylesheet" href="../sidenav.css">
</head>

<body>
    <?php include '../model/fetch_brgy_role.php' ?>
    <?php include '../actives/active_restore.php' ?>
    <?php include '../actives/active_account.php' ?>
    <?php include 'sidebar2.php' ?>

    <div class="home_residents">
        <div class="first_layer">
            <p>Archives Resident Information</p>
            <a href="#">Logout</a>
        </div>

        <a href="../residentInfo.php" class="backContainer">
            <img src="../icons/back.png" alt="">
            <p>Go Back</p>
        </a>

        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input class="searchBar" type="text" placeholder=" Enter text here">
                <a href="#" id="sortFilter">Sort & Filter </a>

                <div class="sort">
                    <div class="header-sort">
                        <img src="../icons/close 1.png" alt="" class="close-sort">
                    </div>
                    <div class="sortby-cont">
                        <p>Sort by</p>
                        <div class="sort-btn">
                            <ul>
                                <li><a href="?age=filter">Age</a></li>
                                <li><a href="?senior=true">SNR</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sortby-cont">
                        <p>Filter by</p>
                        <div class="sort-btn">
                            <ul>
                                <li><a href="?filter=sex&value=male">Male</a></li>
                                <li><a href="?filter=sex&value=female">Female</a></li>
                                <li><a href="?filter=civil_status&value=Single">Single</a></li>
                                <li><a href="?filter=civil_status&value=Married">Married</a></li>
                                <li><a href="?filter=civil_status&value=Divorced">Divorced</a></li>
                                <li><a href="?filter=civil_status&value=Widowed">Widowed</a></li>
                                <li><a href="?filter=voter_status&value=voter">Voter</a></li>
                                <li><a href="?filter=osy&value=OSY">OSY</a></li>
                                <li><a href="?filter=pwd&value=PWD">PWD</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include '../template/message.php' ?>

        <div class="third_layer">
            <table id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Sex</th>
                        <th>Date of Birth</th>
                        <th>Place of Birth</th>
                        <th>Civil Status</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($resident)) { ?>
                    <?php $no=1; foreach($resident as $row): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['firstname'] ?> <?=$row['middlename'] ?> <?= $row['lastname']?></td>
                        <td><?= calculateAge($row['date_of_birth'])?></td>
                        <td><?= $row['sex'] ?></td>
                        <td><?= $row['date_of_birth'] ?></td>
                        <td><?= $row['place_of_birth'] ?></td>
                        <td><?= $row['civil_status'] ?></td>
                        <td><?= $row['house_no']. " " .$row['street']. " " .$row['subdivision'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td class="actions">
                            <a href="../model/recover/recover_resident.php?id=<?= $row['id']?>" class="edit"
                                id="editResidents">Recover</a>


                            <div class="modal-delete">
                                <div class="form-delete">
                                    <div class="delete-cont">
                                        <p>Delete</p>
                                        <img src="icons/close 1.png" alt="" class="close-delete">
                                    </div>
                                    <div class="delete-description">
                                        <p>Deleting this will remove all data
                                            and cannot be undone.</p>
                                    </div>
                                    <div class="delete-submit">
                                        <a href="./model/remove/remove_resident.php?id=<?= $row['id']?>">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <?php $no++; endforeach ?>
                    <?php } ?>
                </tbody>
            </table>

            <div class="pagination">
                <button id="prevBtn">Previous</button>
                <div id="pageNumbers" class="page-numbers"></div>
                <button id="nextBtn">Next</button>
            </div>
        </div>
    </div>

</body>

</html>

<script>
// JavaScript code to handle pagination
const table = document.getElementById('table');
const rows = table.querySelectorAll('tbody tr');
const totalRows = rows.length;
const rowsPerPage = 10;
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

// Initial setup
showRows(currentPage);
updatePaginationButtons();

// Previous button click event
document.getElementById('prevBtn').addEventListener('click', () => {
    if (currentPage > 1) {
        currentPage--;
        showRows(currentPage);
        updatePaginationButtons();
    }
});

// Next button click event
document.getElementById('nextBtn').addEventListener('click', () => {
    if (currentPage < Math.ceil(totalRows / rowsPerPage)) {
        currentPage++;
        showRows(currentPage);
        updatePaginationButtons();
    }
});
</script>