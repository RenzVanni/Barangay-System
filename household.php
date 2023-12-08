<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tbl_households WHERE household_head='yes'";
$result = $conn->query($query);

$households = array();
while($row = $result->fetch_assoc()) {
  $households[] = $row;
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
    <title>HouseHold</title>
    <link rel="stylesheet" href="style3.css ">
    <link rel="stylesheet" href="style4.css ">
    <link rel="stylesheet" href="sidenav.css ">
    <link rel="stylesheet" href="./style/generateCert.css">
    <script src="sidebar.js "></script>
</head>

<body>
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/import_residents.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include './sidebar.php' ?>

    <div class="home_residents">
        <div class="first_layer">
            <p>Household Records</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input class="searchBar" type="text" placeholder=" Enter text here">
                <a href="#">Sort & Filter </a>
            </div>
            <div class="add-cont">
                <a href="archives/ArchiveHousehold.php" class="archiveResidents">Archive</a>
            </div>
        </div>

        <?php include './template/message.php' ?>

        <div class="third_layer">
            <table id="table">
                <thead>
                    <tr>
                        <th>No</th>
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
                    <?php if(!empty($households)) { ?>
                    <?php $no=1; foreach($households as $row):?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['firstname'] ?> <?=$row['middlename'] ?> <?= $row['lastname']?></td>
                        <td><?= calculateAge($row['date_of_birth'])?></td>
                        <td><?= $row['date_of_birth'] ?></td>
                        <td><?= $row['sex'] ?></td>
                        <td><?= $row['civil_status'] ?></td>
                        <td><?= $row['street'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td class="actions">
                            <a href="editHouseholds.php?id=<?= $row['id']?>" class="edit" id="viewHousehold">View</a>

                            <a href="#" class="delete delete-archive" id="delete-archive">Delete</a>

                            <div class="modal-delete">
                                <div class="form-delete">
                                    <div class="delete-cont">
                                        <p>Delete</p>
                                        <img src="iconsBackend/close 1.png" alt="" class="close-delete">
                                    </div>
                                    <div class="delete-description">
                                        <p>Deleting this will remove all data
                                            and cannot be undone.</p>
                                    </div>
                                    <div class="delete-submit">
                                        <a href="./model/remove/remove_household.php?id=<?= $row['id']?>">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <?php $no++; ?>
                    <?php  endforeach ?>
                    <?php } ?>
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
// DELETE RESIDENTS
const deleteLink = document.querySelectorAll('.delete-archive');
const modalDelete = document.querySelectorAll('.modal-delete');
const closeButtonDelete = document.querySelectorAll('.close-delete');

deleteLink.forEach((del, index) => {
    del.addEventListener('click', (e) => {
        console.log("Delete link clicked")
        modalDelete[index].style.display = 'block';
    });

    closeButtonDelete[index].addEventListener('click', function() {
        modalDelete[index].style.display = 'none';
    });
})
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