<?php include './server/server.php'?>
<?php
$filterOption = $_GET["filter"] ?? null;
$filterValue = $_GET["value"] ?? null;


$params = [];
$types = "";

$query =  "SELECT * FROM tbl_idform";

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

$idForm = array();
while($row = $result->fetch_assoc()) {
  $idForm[] = $row;
}
$stmt->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Form</title>
    <link rel="stylesheet" href="style3.css ?<?php echo time(); ?>">
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
            <p>ID Form</p>
           
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
           
            <div class="add-cont">
                <a href="?filter=status&value=Pending">Pending</a>
                <a href="?filter=status&value=for pick-up">For Pick-up</a>
                <a href="?filter=status&value=completed">Completed</a>
                <!-- <select name="status_change" id="status_change">
                    <option value="Pending"><a href="?filter=status&value=pending">Pending</a></option>
                    <option value="ForPickUp"><a href="?filter=status&value=for pick-up">For Pick-up</a></option>
                    <option value="Completed"><a href="?filter=status&value=completed">Completed</a></option>
                </select> -->
                <a href="#" class="add" id="addIdForm">+ ID Form</a>
                <a href="archives/ArchiveIdForm.php" class="archiveResidents">Archive</a>
            </div>
        </div>

        <?php include './template/message.php' ?>

        <form action="" class="form-allCert"> 
            <div class="third_layer">
                <table id="table">
                    <thead>
                        <tr>
                            <th>Applicant</th>
                            <th>Requestor</th>
                            <th>Address</th>
                            <th style="display: none">Place of Birth</th>
                            <th style="display: none">Birth Date</th>
                            <th style="display: none">Civil Status</th>
                            <th>Contact Number</th>
                            <th>Document For</th>
                            <th>Purpose</th>
                            <th style="display: none">Date Requested</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if(!empty($idForm)) { ?>
                        <?php $no=1; foreach($idForm as $row): ?>
                        <tr>
                            <td><?= $row['applicant_fname'] ?> <?= $row['applicant_mname']?>
                                <?= $row['applicant_lname']?>
                            </td>
                            <td><?= $row['requestor_fname'] ?> <?= $row['requestor_mname']?>
                                <?= $row['requestor_lname']?>
                            </td>
                            <td><?= $row['house_no']. " ". $row['street']. " ". $row['subdivision']?></td>
                            <td style="display: none"><?= $row['place_of_birth']?></td>
                            <td style="display: none"><?= $row['birth_date']?></td>
                            <td style="display: none"><?= $row['civil_status']?></td>
                            <td><?= $row['contact_number']?></td>
                            <td><?= $row['documentFor'] ?></td>
                            <td><?= $row['purpose'] ?></td>
                            <td style="display: none"><?= $row['date_requested'] ?></td>
                            <td>
                                <form action="./model/update_status/update_idform.php" method="POST" class="form-allCert"
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
                                    <input type="hidden" name="dateRequested" value="<?= $row['date_requested']?>">
                                </form>

                            </td>
                            <td>
                            
                                <?php if($row['documentFor'] === 'Self') { ?>
                                <a href="./generate/idForm_generate.php?id=<?= $row['id'] ?>" class="print">View</a>
                                <?php } 
                        else { ?>
                                <a href="./generate/idForm_generate.php?id=<?= $row['id'] ?>" class="print">View</a>
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

    <div class="modal-addIdForm">
        <form class="formIdForm" action="./model/add_idForm.php" method="post">
            <div class="title-cont-modal">
                <p>ID Form</p>
                <img src="iconsBackend/close 1.png" class="closeIdForm" alt="">
            </div>

            <div class="modal-layer1">
                <div class="input-label">
                    <label for="applicantName">Applicant:</label>
                    <div class="label111">
                        <input type="text" name="applicant_fname" id="applicant_fname" placeholder="First Name" required>
                        <input type="text" name="applicant_mname" id="applicant_mname" placeholder="Middle Name">
                        <input type="text" name="applicant_lname" id="applicant_lname" placeholder="Last Name" required>
                        <input type="text" name="applicant_suffix" id="applicant_suffix" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-label">
                    <label for="requestorName">Requestor:</label>
                    <div class="label111">
                        <input type="text" name="requestor_fname" id="requestor_fname" placeholder="First Name" required>
                        <input type="text" name="requestor_mname" id="requestor_mname" placeholder="Middle Name">
                        <input type="text" name="requestor_lname" id="requestor_lname" placeholder="Last Name" required>
                        <input type="text" name="requestor_suffix" id="requestor_suffix" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-label">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" id="house_no" placeholder="Houseno.">
                        <input type="text" name="street" id="street" placeholder="Street name" required>
                        <input type="text" name="subdivision" id="subdivision" placeholder="Subdivision name">
                    </div>
                </div>
                <div class="input-label">
                    <label for="place_of_birth">Place of Birth:</label>
                    <input type="text" name="pob" id="place_of_birth" required>
                </div>
                <div class="input-label">
                    <label for="birth_date">Birth Date:</label>
                    <input type="date" name="dob" id="birth_date" required>
                </div>
                <div class="input-label">
                    <label for="civil_status">Civil Status:</label>
                    <input type="text" name="civil_status" id="civil_status" required>
                </div>
                <div class="input-label">
                    <label for="contact_number">Contact Number:</label>
                    <input type="text" name="contact_no" id="contact_number" >
                </div>
                <div class="input-label">
                    <label for="documentFor">Document For:</label>
                    <select name="documentFor" id="documentFor">
                        <option value="Self">Forself</option>
                        <option value="Someone">Forsomeone</option>
                    </select>
                </div>
                <div class="input-label">
                    <label for="purpose">Purpose:</label>
                    <input type="text" id="purpose" name="purpose" required>
                </div>
            </div>
            <input type="submit" id="submit" value="Request">
        </form>
    </div>

    <!-- EDIT MODAL -->
    <div class="modal-editIdForm">
        <form class="formIdForm" action="./model/edit_certificates/edit_idForm.php" method="post">
            <div class="title-cont-modal">
                <p>ID Form</p>
                <img src="iconsBackend/close 1.png" class="closeIdForm1" alt="">
            </div>

            <div class="modal-layer1">
                <div class="input-label">
                    <label for="applicantName">Applicant:</label>
                    <div class="label111">
                        <input type="text" name="applicant_fname" id="applicant_fname1" placeholder="First Name" required>
                        <input type="text" name="applicant_mname" id="applicant_mname1" placeholder="Middle Name">
                        <input type="text" name="applicant_lname" id="applicant_lname1" placeholder="Last Name" required>
                        <input type="text" name="applicant_suffix" id="applicant_suffix1" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-label">
                    <label for="requestorName">Requestor:</label>
                    <div class="label111">
                        <input type="text" name="requestor_fname" id="requestor_fname1" placeholder="First Name" required>
                        <input type="text" name="requestor_mname" id="requestor_mname1" placeholder="Middle Name">
                        <input type="text" name="requestor_lname" id="requestor_lname1" placeholder="Last Name" required>
                        <input type="text" name="requestor_suffix" id="requestor_suffix1" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-label">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" id="house_no1" placeholder="Houseno.">
                        <input type="text" name="street" id="street1" placeholder="Street name" required>
                        <input type="text" name="subdivision" id="subdivision1" placeholder="Subdivision name">
                    </div>
                </div>
                <div class="input-label">
                    <label for="place_of_birth">Place of Birth:</label>
                    <input type="text" name="pob" id="place_of_birth1" required>
                </div>
                <div class="input-label">
                    <label for="birth_date">Birth Date:</label>
                    <input type="date" name="dob" id="birth_date1" required>
                </div>
                <div class="input-label">
                    <label for="civil_status">Civil Status:</label>
                    <input type="text" name="civil_status" id="civil_status1" required>
                </div>
                <div class="input-label">
                    <label for="contact_number">Contact Number:</label>
                    <input type="text" name="contact_no" id="contact_number1">
                </div>
                <div class="input-label">
                    <label for="documentFor">Document For:</label>
                    <select name="documentFor" id="documentFor1">
                        <option value="Self">Forself</option>
                        <option value="Someone">Forsomeone</option>
                    </select>
                </div>
                <div class="input-label">
                    <label for="purpose">Purpose:</label>
                    <input type="text" id="purpose1" name="purpose" required>
                </div>
            </div>
            <input type="hidden" name="id" id="idform_id">
            <input type="hidden" name="date_requested" id="date_requested">
            <input type="submit" id="submit" value="Request">
        </form>
    </div>


    <script src="./js//jQuery-3.7.0.js"></script>
    <script src="./js//app.js"></script>
    <script>
    const addIdFormLink = document.getElementById('addIdForm');
    const modaladd = document.querySelector('.modal-addIdForm');
    const closeIdForm = document.querySelector('.closeIdForm');

    addIdFormLink.addEventListener('click', function(event) {
        event.preventDefault();
        modaladd.style.display = 'block';
    });

    closeIdForm.addEventListener('click', function() {
        modaladd.style.display = 'none';
    });
    //EDIT
    const editIdFormLink = document.querySelectorAll('.edit');
    const modaledit = document.querySelector('.modal-editIdForm');
    const closeIdForm1 = document.querySelector('.closeIdForm1');



    editIdFormLink.forEach(edit => {
        edit.addEventListener('click', function(event) {
            event.preventDefault();
            modaledit.style.display = 'block';
        });

        closeIdForm1.addEventListener('click', function() {
            modaledit.style.display = 'none';
        });
    })
    </script>
</body>

</html>

<script>
document.querySelectorAll('.form-allCert').forEach(function(form) {
    form.querySelector('select[name="status"]').addEventListener('change', function() {
        // Trigger form submission when an option is selected
        form.submit();
    });
});
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