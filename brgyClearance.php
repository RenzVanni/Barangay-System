<?php include './server/server.php'?>
<?php
$filterOption = $_GET["filter"] ?? null;
$filterValue = $_GET["value"] ?? null;


$params = [];
$types = "";

$query =  "SELECT * FROM tbl_brgyclearance";

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

// $stmt->close();

// $result = $conn->query($query);

$brgyClearance = array();
while($row = $result->fetch_assoc()) {
  $brgyClearance[] = $row;
}
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Clearance</title>
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
            <p>Barangay Clearance</p>
            
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
            <div class="add-cont">
               
                <a href="#" class="add" id="addbrgyClearance">+ Clearance</a>
                <a class="add1" href="?filter=status&value=Pending">Pending</a>
                <a class="add1" href="?filter=status&value=for pick-up">For Pick-up</a>
                <a class="add1" href="?filter=status&value=completed">Completed</a>
                <a href="archives/ArchivebrgyClearance.php" class="archiveResidents">Archive</a>
            </div>
        </div>

        <?php include './template/message.php' ?>

        <form action="" class="form-allCert">
            <div class="third_layer">
                <table id="table">
                    <thead>
                        <tr>
                            <th>Fullname</th>
                            <th>Address</th>
                            <th>Date of Birth</th>
                            <th>Place of Birth</th>
                            <th>Purpose</th>
                            <th>Date of Issue</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($brgyClearance)) { ?>
                        <?php $no=1; foreach($brgyClearance as $row): ?>
                        <tr>
                            <td><?= $row['applicant_fname'] ?> <?= $row['applicant_mname'] ?>
                                <?= $row['applicant_lname'] ?>
                            </td>
                            <td><?= $row['house_no']. " ". $row['street']. " ". $row['subdivision'] ?></td>
                            <td><?= $row['date-of-birth'] ?></td>
                            <td><?= $row['place-of-birth'] ?></td>
                            <td><?= $row['purpose'] ?></td>
                            <td><?= $row['date_requested'] ?></td>
                            <td>
                                <form action="./model/update_status/update_brgyClearance.php" method="POST"
                                    class="form-allCert" id="statusForm">
                                    <select name="status" id="Status">
                                        <option class="Pending" value="Pending"
                                            <?php echo ($row['status'] === 'Pending') ? 'selected' : ''; ?>>Pending
                                        </option>
                                        <option class="For_Pick_up" value="For Pick-up"
                                            <?php echo ($row['status'] === 'For Pick-up') ? 'selected' : ''; ?>>For
                                            Pick-up
                                        </option>
                                        <option class="Completed" value="Completed"
                                            <?php echo ($row['status'] === 'Completed') ? 'selected' : ''; ?>>Completed
                                        </option>
                                    </select>
                                    <input type="hidden" name="id" value="<?= $row['id']?>">
                                    <input type="hidden" name="dateRequested" value="<?= $row['date_requested']?>">

                                </form>
                            </td>
                            </td>
                            <td>
                                <a class="print"
                                    href="./generate/brgyClearance_generate.php?id=<?= $row['id'] ?>">View</a>
                               

                               
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

    <div class="modal-addBrgyClearance">
        <form class="formBrgyClearance" action="./model/add_brgyClearance.php" method="post">
            <div class="title-cont-modal">
                <p>Barangay Clearance</p>
                <img src="iconsBackend/close 1.png" class="closeForm" alt="">
            </div>

            <div class="modal-layer-brgyClearance">
                <div class="input-brgy-clearance">
                    <label for="applicantName">Applicant:</label>
                    <div class="label111">
                        <input type="text" name="applicant_fname" id="applicant_fname" placeholder="First Name" required>
                        <input type="text" name="applicant_mname" id="applicant_mname" placeholder="Middle Name">
                        <input type="text" name="applicant_lname" id="applicant_lname" placeholder="Last Name" required>
                        <input type="text" name="applicant_suffix" id="applicant_suffix" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-brgy-clearance">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" id="house_no" placeholder="Houseno.">
                        <input type="text" name="street" id="street" placeholder="Street name" required>
                        <input type="text" name="subdivision" id="subdivision" placeholder="Subdivision name">
                    </div>
                </div>
                <div class="input-brgy-clearance">
                    <label for="birth_date">Birth Date:</label>
                    <input type="date" name="dob" id="birth_date" required>
                </div>
                <div class="input-brgy-clearance">
                    <label for="place_of_birth">Place of Birth:</label>
                    <input type="text" name="pob" id="place_of_birth" required>
                </div>
                <div class="input-brgy-clearance">
                    <label for="purpose">Purpose:</label>
                    <input type="text" name="purpose" id="purpose" name="purpose" required>
                </div>

            </div>
            <input type="submit" id="submit" value="Request">
        </form>
    </div>

    <!-- EDIT MODAL -->
    <div class="modal-editBrgyClearance">
        <form class="formBrgyClearance" action="./model/edit_certificates/edit_brgyClearance.php" method="post">
            <div class="title-cont-modal">
                <p>Barangay Clearance</p>
                <img src="iconsBackend/close 1.png" class="closeForm1" alt="">
            </div>

            <div class="modal-layer-brgyClearance">
                <div class="input-brgy-clearance">
                    <label for="applicantName">Applicant:</label>
                    <div class="label111">
                        <input type="text" name="applicant_fname" id="applicant_fname1" placeholder="First Name" required>
                        <input type="text" name="applicant_mname" id="applicant_mname1" placeholder="Middle Name">
                        <input type="text" name="applicant_lname" id="applicant_lname1" placeholder="Last Name" required>
                        <input type="text" name="applicant_suffix" id="applicant_suffix1" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-brgy-clearance">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" id="house_no1" placeholder="Houseno.">
                        <input type="text" name="street" id="street1" placeholder="Street name" required>
                        <input type="text" name="subdivision" id="subdivision1" placeholder="Subdivision name">
                    </div>
                </div>
                <div class="input-brgy-clearance">
                    <label for="birth_date">Birth Date:</label>
                    <input type="date" name="dob" id="birth_date1" required>
                </div>
                <div class="input-brgy-clearance">
                    <label for="place_of_birth">Place of Birth:</label>
                    <input type="text" name="pob" id="place_of_birth1" required>
                </div>
                <div class="input-brgy-clearance">
                    <label for="purpose">Purpose:</label>
                    <input type="text" name="purpose" id="purpose1" name="purpose" required>
                </div>

            </div>
            <input type="hidden" name="id" id="brgyClearance_id">
            <input type="hidden" name="date_requested" id="date_requested">
            <input type="submit" id="submit" value="Request">
        </form>
    </div>





    <script src="./js//jQuery-3.7.0.js"></script>
    <script src="./js//app.js"></script>
    <script>
    document.querySelectorAll('.form-allCert').forEach(function(form) {
        form.querySelector('select[name="status"]').addEventListener('change', function() {
            // Trigger form submission when an option is selected
            form.submit();
        });
    });
    const addbrgyClearanceLink = document.getElementById('addbrgyClearance');
    const modaladdBrgyClearance = document.querySelector('.modal-addBrgyClearance');
    const closeForm = document.querySelector('.closeForm');

    addbrgyClearanceLink.addEventListener('click', function(event) {
        event.preventDefault();
        modaladdBrgyClearance.style.display = 'block';
    });

    closeForm.addEventListener('click', function() {
        modaladdBrgyClearance.style.display = 'none';
    });
    //EDIT
    const editbrgyClearanceLink = document.querySelectorAll('.edit');
    const modaleditBrgyClearance = document.querySelector('.modal-editBrgyClearance');
    const closeForm1 = document.querySelector('.closeForm1');

    editbrgyClearanceLink.forEach(edit => {
        edit.addEventListener('click', function(event) {
            event.preventDefault();
            modaleditBrgyClearance.style.display = 'block';
        });

        closeForm1.addEventListener('click', function() {
            modaleditBrgyClearance.style.display = 'none';
        });
    })
    </script>
</body>

</html>

<script>
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