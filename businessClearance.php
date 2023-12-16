<?php include './server/server.php'?>
<?php
$filterOption = $_GET["filter"] ?? null;
$filterValue = $_GET["value"] ?? null;


$params = [];
$types = "";

$query =  "SELECT * FROM tbl_businessClearance";

if($filterOption && $filterValue) {
    $query .= " WHERE `$filterOption` = ?";
    $params[] = $filterValue;
    $types .= "s";
} else {
    $query .= " WHERE `status`='Pending'";
}
$query .= " ORDER BY id DESC";  // Move the ORDER BY clause here
$stmt = $conn->prepare($query);

if (!empty($types) && !empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();

$result = $stmt->get_result();

$businessClearance = array();
while($row = $result->fetch_assoc()) {
  $businessClearance[] = $row;
}
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Clearance</title>
    <link rel="stylesheet" href="style3.css ?<?php echo time(); ?> ">
    <link rel="stylesheet" href="style4.css ">
    <link rel="stylesheet" href="sidenav.css ">
    <link rel="stylesheet" href="modal.css ">
    <link rel="stylesheet" href="./style/generateCert.css">
    <script src="sidebar.js "></script>

</head>

<body>
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include './sidebar.php' ?>

    <div class="home_residents">
        <div class="first_layer">
            <p>Business Clearance</p>
          
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
            <div class="add-cont">
                
                <a href="#" class="add" id="addClearance">+ Clearance</a>
                <a href="#" class="add" id="addClosure">+ Closure</a>
                <a class="add1" href="?filter=status&value=Pending">Pending</a>
                <a class="add1" href="?filter=status&value=for pick-up">For Pick-up</a>
                <a class="add1" href="?filter=status&value=completed">Completed</a>
                <a href="archives/ArchiveBusinessClearance.php" class="archiveResidents">Archive</a>
            </div>
        </div>

        <?php include './template/message.php' ?>

        <form action="" class="form-allCert">
            <div class="third_layer">
                <table id="table">
                    <thead>
                        <tr>
                            <th>Business Name</th>
                            <th>Business Owner's Name</th>
                            <th>Business Address</th>
                            <th>Date Applied</th>
                            <th>Document For</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($businessClearance)) { ?>
                        <?php $no=1; foreach($businessClearance as $row): ?>
                        <tr>
                            <td><?= $row['business_name'] ?></td>
                            <td><?= $row['business_owner_fname']. ' ' .$row['business_owner_mname']. ' ' .$row['business_owner_lname'] ?>
                            </td>
                            <td><?= $row['house_no']. " ". $row['street']. " ". $row['subdivision'] ?></td>
                            <td><?= $row['date_applied'] ?></td>
                            <td><?= $row['documentFor'] ?></td>
                            <td>
                                <form action="./model/update_status/update_businessClearance.php" method="POST" class="form-allCert"
                                    id="statusForm">
                                    <select name="status" id="Status">
                                        <!-- <option class="Pending" value="Pending">Pending</option> -->
                                        <option class="Pending" value="Pending"
                                            <?php echo ($row['status'] === 'Pending') ? 'selected' : ''; ?>>Pending
                                        </option>
                                        <option class="For_Pick_up" value="For Pick-up"
                                            <?php echo ($row['status'] === 'For Pick-up') ? 'selected' : ''; ?>>For Pick-up
                                        </option>
                                        <option class="Completed" value="Completed"
                                            <?php echo ($row['status'] === 'Completed') ? 'selected' : ''; ?>>Completed
                                        </option>
                                    </select>
                                    <input type="hidden" name="id" value="<?= $row['id']?>">
                                    <input type="hidden" name="dateRequested" value="<?= $row['date_applied']?>">
                                </form>
                            </td>
                            </td>
                            <td>
                            
                             <!-- PRINT -->
                            <?php if($row['documentFor'] === 'Clearance') { ?>
                            <a href="./generate/businessClearance_generate.php?id=<?= $row['id'] ?>"
                                class="print">View</a>
                            <?php } else {?>
                            <a href="./generate/businessClosure.php?id=<?= $row['id'] ?>"
                                class="print">View</a>
                            <?php } ?>
                            
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
        </form>
    </div>

    <div class="modal-addClearance">
        <form class="formaddClearance" action="./model/add_businessClearance.php" method="post">
            <div class="title-cont-modal">
                <p>Clearance</p>
                <img src="iconsBackend/close 1.png" class="closeClearance" alt="">
            </div>

            <div class="modal-layer-b-clearance">
                <div class="input-b-clearance">
                    <label for="businessName">Business Name:</label>
                    <input type="text" name="business_name" id="businessName" placeholder="Business name">
                </div>
                <div class="input-b-clearance">
                    <label for="ownerName">Business Owner's Name:</label>
                    <div class="label111">
                        <input type="text" name="owner_fname" id="business_owner_fname" placeholder="First Name">
                        <input type="text" name="owner_mname" id="owner_mname" placeholder="Middle Name">
                        <input type="text" name="owner_lname" id="business_owner_lname" placeholder="Last Name">
                        <input type="text" name="owner_suffix" id="business_owner_suffix" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-b-clearance">
                    <label for="address">Business Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" id="house_no" placeholder="Houseno.">
                        <input type="text" name="street" id="street" placeholder="Street name">
                        <input type="text" name="subdivision" id="subdivision" placeholder="Subdivision name">
                    </div>
                </div>
            </div>
            <input type="hidden" name="documentFor" value="Clearance">
            <input type="submit" id="submit" value="Add">
        </form>
    </div>


    <div class="modal-addClosure">
        <form class="formaddClosure" action="./model/add_businessClosure.php" method="post">
            <div class="title-cont-modal">
                <p>Closure</p>
                <img src="iconsBackend/close 1.png" class="closeClosure" alt="">
            </div>

            <div class="modal-layer-b-closure">
                <div class="input-b-closure">
                    <label for="businessName">Business Name:</label>
                    <input type="text" name="business_name" id="businessName" placeholder="Business name">
                </div>
                <div class="input-b-closure">
                    <label for="ownerName">Business Owner's Name:</label>
                    <div class="label111">
                        <input type="text" name="owner_fname" id="business_owner_fname" placeholder="First Name">
                        <input type="text" name="owner_mname" id="business_owner_mname" placeholder="Middle Name">
                        <input type="text" name="owner_lname" id="business_owner_lname" placeholder="Last Name">
                        <input type="text" name="owner_suffix" id="business_owner_suffix" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-b-closure">
                    <label for="address">Business Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" id="house_no" placeholder="Houseno.">
                        <input type="text" name="street" id="street" placeholder="Street name">
                        <input type="text" name="subdivision" id="subdivision" placeholder="Subdivision name">
                    </div>
                </div>

                <textarea name="purpose" id="" cols="30" rows="10" required></textarea>

            </div>
            <input type="hidden" name="documentFor" value="Closure">
            <input type="submit" id="submit" value="Add">
        </form>
    </div>


    <script src="./js//jQuery-3.7.0.js"></script>
    <script src="./js//app.js"></script>


</body>

</html>

<script>
document.querySelectorAll('.form-allCert').forEach(function(form) {
    form.querySelector('select[name="status"]').addEventListener('change', function() {
        // Trigger form submission when an option is selected
        form.submit();
    });
});
const addClearanceLink = document.getElementById('addClearance');
const modaladdClearance = document.querySelector('.modal-addClearance');
const closeClearance = document.querySelector('.closeClearance');

addClearanceLink.addEventListener('click', function(event) {
    event.preventDefault();
    modaladdClearance.style.display = 'block';
});

closeClearance.addEventListener('click', function() {
    modaladdClearance.style.display = 'none';
});

const addClosureLink = document.getElementById('addClosure');
const modaladdClosure = document.querySelector('.modal-addClosure');
const closeClosure = document.querySelector('.closeClosure');

addClosureLink.addEventListener('click', function(event) {
    event.preventDefault();
    modaladdClosure.style.display = 'block';
});

closeClosure.addEventListener('click', function() {
    modaladdClosure.style.display = 'none';
});

// DELETE RESIDENTS
const deleteLink = document.querySelectorAll('.delete');
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