<?php include '../server/server.php'?>
<?php
$query =  "SELECT * FROM del_business_archive";
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
    <title>Archives Business Records</title>
    <link rel="stylesheet" href="../style3.css ">
    <link rel="stylesheet" href="../style4.css ">
    <link rel="stylesheet" href="../style/generateCert.css">
    <script src="sidebar2.js "></script>
    <link rel="stylesheet" href="../sidenav.css">
</head>

<body>
    <?php include '../model/fetch_brgy_role.php' ?>
    <?php include '../actives/active_restore.php' ?>
    <?php include '../actives/active_account.php' ?>
    <?php include 'sidebar2.php' ?>

    <div class="home_residents">
        <div class="first_layer">
            <p>Archives Business Records</p>
           
        </div>
        <a href="../business.php" class="backContainer">
            <img src="../iconsBackend/back.png" alt="">
            <p>Go Back</p>
        </a>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
        </div>

        <?php include '../template/message.php' ?>

        <div class="third_layer">
            <table id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>TAXPAYER NAME</th>
                        <th>BUSINESS NAME</th>
                        <th>BUSINESS ADDRESS</th>
                        <th>BUSINESS TYPE</th>
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
                    </tr>
                    <?php $no++; endforeach  ?>
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

<script src="../js//jQuery-3.7.0.js"></script>
<script src="../js//app.js"></script>

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