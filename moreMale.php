<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tbl_households WHERE sex='MALE' ORDER BY id DESC";
$result = $conn->query($query);
$total = $result->num_rows;

$residents = array();
while($row = $result->fetch_assoc()) {
  $residents[] = $row;
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
    <title>Total Male</title>
    <link rel="stylesheet" href="moreInfo.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="sidenav.css ">
    <link rel="stylesheet" href="./style/generateCert.css">
    <script src="sidebar.js "></script>

</head>

<body>

    <!-- HEADER -->
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include './sidebar.php' ?>

    <div class="home_residents">
        <div class="first_layer">
            <p>Total Male</p>
            <a href="#">Logout</a>
        </div>
        
        <a href="dashboard.php" class="backContainer">
            <img src="iconsBackend/back.png" alt="">
            <p>Go Back</p>
        </a>
        
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
        </div>

        <div class="Box-Container">
            <div class="First-Cont">
                <div class="bigBoxMale">
                    <div class="text-cont">
                        <p class="text">TOTAL MALE</p>
                        <p class="number"><?= number_format($total) ?></p>
                    </div>
                    <img src="iconsBackend/ResidentsSeeMore.png" alt="">
                </div>
            </div>
            <div class="Second-Cont">
                <div class="smallBoxMale">
                    <div class="text-cont">
                        <p class="text">Infant</p>
                        <p class="number">600</p>
                    </div>
                    <img src="iconsBackend/InfantSeeMore.png" alt="">
                </div>
                <div class="smallBoxMale">
                    <div class="text-cont">
                        <p class="text">Child</p>
                        <p class="number">600</p>
                    </div>
                    <img src="iconsBackend/ChildSeeMore.png" alt="">
                </div>

                <div class="smallBoxMale">
                    <div class="text-cont">
                        <p class="text">Adolescents</p>
                        <p class="number">600</p>
                    </div>
                    <img src="iconsBackend/AdolescentsSeeMore.png" alt="">
                </div>

                <div class="smallBoxMale">
                    <div class="text-cont">
                        <p class="text">Adults</p>
                        <p class="number">600</p>
                    </div>
                    <img src="iconsBackend/AdultsSeeMore.png" alt="">
                </div>

                <div class="smallBoxMale">
                    <div class="text-cont">
                        <p class="text">Elderly</p>
                        <p class="number">600</p>
                    </div>
                    <img src="iconsBackend/ElderlySeeMore.png" alt="">
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
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($residents)) { ?>
                    <?php $no=1; foreach($residents as $row): ?>
                    <tr>
                        <td><?= $row['firstname'] ?> <?=$row['middlename'] ?> <?= $row['lastname']?></td>
                        <td><?= calculateAge($row['date_of_birth'])?></td>
                        <td><?= $row['date_of_birth'] ?></td>
                        <td><?= $row['sex'] ?></td>
                        <td><?= $row['civil_status'] ?></td>
                        <td><?= $row['house_no']. " ". $row['street']. " ". $row['subdivision'] ?></td>
                    </tr>
                    <?php $no++; endforeach ?>
                    <?php } ?>
                </tbody>
                <!-- Add more rows here -->
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