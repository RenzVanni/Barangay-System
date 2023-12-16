<?php include "../server/server.php" ?>
<?php
$query =  "SELECT *,officials_archive.id as id, tblchairmanship.id as chair_id FROM officials_archive JOIN tblchairmanship ON tblchairmanship.id=officials_archive.chairmanship ORDER BY officials_archive.id DESC ";
$result = $conn->query($query);

$officials = array();
while($row = $result->fetch_assoc()) {
  $officials[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archives Barangay Officials</title>
    <link rel="stylesheet" href="../style2.css ">
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

    <div class="home_officials">
        <div class="left_officials">
            <div class="first_layer">
                <p>Archives Barangay Officialss</p>
               
            </div>

            <a href="../barangayOfficials.php" class="backContainer">
                <img src="../iconsBackend/back.png" alt="">
                <p>Go Back</p>
            </a>

            <div class="second_layer">
                <div class="text-cont">
                    <p>Archives</p>
                </div>
                <div class="modal-cont">

                </div>
            </div>

            <?php if(isset($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>"
                role="alert">
                <?php echo $_SESSION['message']; ?>
            </div>
            <?php unset($_SESSION['message']); ?>
            <?php endif ?>


            <div class="third_layer">
                <table id="table">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Chairmanship</th>
                            <th>Term Start</th>
                            <th>Term End</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($officials)) { ?>
                        <?php foreach($officials as $row): ?>
                        <tr>
                            <td><?= $row['firstname']. " ". $row['middlename']. " ". $row['lastname']?></td>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['termstart'] ?></td>
                            <td><?= $row['termend'] ?></td>
                            <td class="status"><?= $row['status'] ?></td>
                        </tr>
                        <?php endforeach ?>
                        <?php }?>
                    </tbody>
                </table>
                <div class="pagination">
                    <button id="prevBtn">Previous</button>
                    <div id="pageNumbers" class="page-numbers"></div>
                    <button id="nextBtn">Next</button>
                </div>
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