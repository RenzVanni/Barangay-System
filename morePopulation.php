<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tbl_households ORDER BY id DESC";
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
    <title>Total Population</title>
    <link rel="stylesheet" href="moreInfo.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="sidenav.css ">
    <link rel="stylesheet" href="./style/generateCert.css">
    <script src="sidebar.js "></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    

</head>
    

</head>

<body>

    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include './sidebar.php' ?>


    <div class="home_residents">
        <div class="first_layer">
            <p>Total Population</p>
           
        </div>

        <a href="dashboard.php" class="backContainer">
            <img src="iconsBackend/back.png" alt="">
            <p>Go Back</p>
        </a>

        <div class="second_layer1">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder="Enter text here" id="searchInput">
            </div>

            <div class="sorting-cont">
                
                <div class="label-cont">
                <p>Sort and Filter By:</p>
                    <label><input type="checkbox" class="sort-checkbox" data-column="0"> Full Name</label>
                    <label><input type="checkbox" class="sort-checkbox" data-column="1"> Age</label>
                    <label><input type="checkbox" class="sort-checkbox" data-column="2"> Date of Birth</label>
                    <label><input type="checkbox" class="sort-checkbox" data-column="3"> Gender</label>
                    <label><input type="checkbox" class="sort-checkbox" data-column="4"> Civil Status</label>
                    <label><input type="checkbox" class="sort-checkbox" data-column="5"> Address</label>
                    <!-- Add more checkboxes for other columns -->
                </div>
              

               <div class="order-cont">
                <p>Order:</p>
                    <select id="orderSelect">
                        <option value="asc">Ascending</option>
                        <option value="desc">Descending</option>
                    </select>

                <button id="sortButton">Sort</button>   
               </div>

               
            </div>
        </div>


        <div class="Box-Container">
            <div class="First-Cont">
                <div class="bigBox">
                    <div class="text-cont">
                        <p class="text">TOTAL POPULATION</p>
                        <p class="number"><?= number_format($total) ?></p>
                    </div>
                    <img src="iconsBackend/ResidentsSeeMore.png" alt="">
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


    <!-- <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.2.js"></script> -->
    <script src="./js//jQuery-3.7.0.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="./js/app.js"></script>

        <script>
           $(document).ready(function() {
                var dataTable = $('#table').DataTable({
                    "paging": false, // Disable pagination for simplicity
                    "searching": true // Enable searching
                });

                // Enable search functionality for the DataTable
                $('#searchInput').on('keyup', function() {
                    dataTable.search($(this).val()).draw();
                });

                // Custom sorting and filtering
                $('#sortButton').on('click', function() {
                    var order = $('#orderSelect').val(); // Get the selected order
                    var columnsToSort = [];

                    // Collect columns to sort based on checked checkboxes
                    $('.sort-checkbox:checked').each(function() {
                        columnsToSort.push(parseInt($(this).data('column')));
                    });

                    // Perform custom sorting
                    dataTable.order(columnsToSort.map(column => [column, order])).draw();
                });
            });
        </script>
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