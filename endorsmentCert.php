<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tbl_ecertificate";
$result = $conn->query($query);

$ecertificate = array();
while($row = $result->fetch_assoc()) {
  $ecertificate[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Endorsment Certificate</title>
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
            <p>Endorsment Certificate</p>
          
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
            <div class="add-cont">
                <select name="status_change" id="status_change">
                    <option value="Pending">Pending</option>
                    <option value="ForPickUp">For Pick-up</option>
                    <option value="Completed">Completed</option>
                </select>
                <a href="#" class="add" id="addEcert_forself">+ Forself</a>
                <a href="#" class="add" id="addEcert_forsomeone">+ Forsomeone</a>
                <a href="archives/ArchiveEndorsementCert.php" class="archiveResidents">Archive</a>
            </div>
        </div>

        <?php include './template/message.php' ?>

        <form action="" class="form-allCert">
            <div class="third_layer">
                <table id="table">
                    <thead>
                        <tr>
                            <th>Name of Applicant</th>
                            <th>Name of Requestor</th>
                            <th>Address</th>
                            <th>Document For</th>
                            <th>Purpose</th>
                            <th>Date Requested</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($ecertificate)) { ?>
                        <?php $no=1; foreach($ecertificate as $row): ?>
                        <tr>
                            <td><?= $row['applicant_fname'] ?> <?= $row['applicant_mname'] ?>
                                <?= $row['applicant_lname'] ?>
                            </td>
                            <td><?= $row['requestor_fname'] ?> <?= $row['requestor_mname'] ?>
                                <?= $row['requestor_lname'] ?>
                            </td>
                            <td><?= $row['house_no']. " ". $row['street']. " ". $row['subdivision']?></td>
                            <td><?= $row['documentFor'] ?></td>
                            <td><?= $row['purpose'] ?></td>
                            <td><?= $row['date_requested'] ?></td>
                            <td>
                                <form action="./model/update_status/update_endorsement.php" method="POST"
                                    class="form-allCert" id="statusForm<?= $row['id'] ?>">
                                    <select name="status" id="Status">
                                        <!-- <option class="Pending" value="Pending">Pending</option> -->
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
                                <!-- PRINT -->
                                <?php if($row['documentFor'] === 'Self') { ?>
                                <a href="./generate/endorsementCert_generate_forselft.php?id=<?= $row['id']?>"
                                    class="print">View</a>
                                <?php } else {?>
                                <a href="./generate/endorsementCert_generate_forsomeone.php?id=<?= $row['id']?>"
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

    <div class="modal-addEcert_forself">
        <form class="formEcert_forself" action="./model/add_endorsementCert.php" method="post">
            <div class="title-cont-modal">
                <p>For Self</p>
                <img src="iconsBackend/close 1.png" class="closeForm_forself" alt="">
            </div>

            <div class="modal-layer-endorsement-self">
                <div class="input-e-self">
                    <label for="applicantName">Applicant:</label>
                    <div class="label111">
                        <input type="text" name="applicant_fname" id="applicant_fname_self" placeholder="First Name" required>
                        <input type="text" name="applicant_mname" id="applicant_mname_self" placeholder="Middle Name">
                        <input type="text" name="applicant_lname" id="applicant_lname_self" placeholder="Last Name" required>
                        <input type="text" name="applicant_suffix" id="applicant_suffix_self" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-e-self">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" id="house_no_self" placeholder="Houseno.">
                        <input type="text" name="street" id="street_self" placeholder="Street name" required>
                        <input type="text" name="subdivision" id="subdivision_self" placeholder="Subdivision name">
                    </div>
                </div>
                <div class="input-e-self">
                    <label for="purpose">Purpose:</label>
                    <input type="text" name="purpose" id="purpose_self" required>
                </div>
            </div>
            <input type="hidden" name="documentFor" value="Self">
            <input type="submit" id="submit" value="Request">
        </form>
    </div>

    <!-- EDIT MODAL SELF -->
    <div class="modal-editEcert_forself">
        <form class="formEcert_forself" action="./model/edit_certificates/edit_endorsementCert.php" method="post">
            <div class="title-cont-modal">
                <p>For Self</p>
                <img src="iconsBackend/close 1.png" class="closeForm_forself1" alt="">
            </div>

            <div class="modal-layer-endorsement-self">
                <div class="input-e-self">
                    <label for="applicantName">Applicant:</label>
                    <div class="label111">
                        <input type="text" name="applicant_fname" id="applicant_fname_self1" class="applicant_fname"
                            placeholder="First Name" required>
                        <input type="text" name="applicant_mname" id="applicant_mname_self1" class="applicant_mname"
                            placeholder="Middle Name">
                        <input type="text" name="applicant_lname" id="applicant_lname_self1" class="applicant_lname"
                            placeholder="Last Name" required>
                        <input type="text" name="applicant_suffix" id="applicant_suffix_self1" class="applicant_suffix"
                            placeholder="Suffix">
                    </div>
                </div>
                <div class="input-e-self">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" id="house_no1" class="house_no" placeholder="Houseno.">
                        <input type="text" name="street" id="street1" class="street" placeholder="Street name" required>
                        <input type="text" name="subdivision" id="subdivision1" class="subdivision"
                            placeholder="Subdivision name">
                    </div>
                </div>
                <div class="input-e-self">
                    <label for="purpose">Purpose:</label>
                    <input type="text" name="purpose" id="purpose1" class="purpose" required>
                </div>
            </div>
            <input type="hidden" name="documentFor" value="Self">
            <input type="hidden" name="date_requested" id="date_requested" class="date_requested">
            <input type="hidden" name="id" id="endorsementCert_id" class="endorsementCert_id">
            <input type="submit" id="submit" value="Request">
        </form>
    </div>

    <div class="modal-addEcert_forsomeone">
        <form class="formEcert_forsomeone" action="./model/add_endorsementCert.php" method="post">
            <div class="title-cont-modal">
                <p>For Someone</p>
                <img src="iconsBackend/close 1.png" class="closeForm_forsomeone" alt="">
            </div>

            <div class="modal-layer-endorsement-someone">
                <div class="input-e-someone">
                    <label for="applicantName">Applicant:</label>
                    <div class="label111">
                        <input type="text" name="applicant_fname" id="applicant_fname_someone" placeholder="First Name" required>
                        <input type="text" name="applicant_mname" id="applicant_mname_someone"
                            placeholder="Middle Name">
                        <input type="text" name="applicant_lname" id="applicant_lname_someone" placeholder="Last Name" required>
                        <input type="text" name="applicant_suffix" id="applicant_suffix_someone" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-e-someone">
                    <label for="requestorName">Requestor:</label>
                    <div class="label111">
                        <input type="text" name="requestor_fname" id="requestor_fname_someone" placeholder="First Name" required>
                        <input type="text" name="requestor_mname" id="requestor_mname_someone"
                            placeholder="Middle Name">
                        <input type="text" name="requestor_lname" id="requestor_lname_someone" placeholder="Last Name" required>
                        <input type="text" name="requestor_suffix" id="requestor_suffix_someone" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-e-someone">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" id="house_no_someone" placeholder="Houseno.">
                        <input type="text" name="street" id="street_someone" placeholder="Street name" required>
                        <input type="text" name="subdivision" id="subdivision_someone" placeholder="Subdivision name">
                    </div>
                </div>
                <div class="input-e-someone">
                    <label for="purpose">Purpose:</label>
                    <input type="text" name="purpose" id="purpose_someone" required>
                </div>
            </div>
            <input type="hidden" name="documentFor" value="Someone">
            <input type="submit" id="submit" value="Request">
        </form>
    </div>

    <!-- EDIT MODAL SOMEONE -->
    <div class="modal-editEcert_forsomeone">
        <form class="formEcert_forsomeone" action="./model/edit_certificates/edit_endorsementCert.php" method="post">
            <div class="title-cont-modal">
                <p>For Someone</p>
                <img src="iconsBackend/close 1.png" class="closeForm_forsomeone1" alt="">
            </div>

            <div class="modal-layer-endorsement-someone">
                <div class="input-e-someone">
                    <label for="applicantName">Applicant:</label>
                    <div class="label111">
                        <input type="text" name="applicant_fname" id="applicant_fname_someone1" class="applicant_fname"
                            placeholder="First Name" required>
                        <input type="text" name="applicant_mname" id="applicant_mname_someone1" class="applicant_mname"
                            placeholder="Middle Name">
                        <input type="text" name="applicant_lname" id="applicant_lname_someone1" class="applicant_lname"
                            placeholder="Last Name" required>
                        <input type="text" name="applicant_suffix" id="applicant_suffix_someone1"
                            class="applicant_suffix" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-e-someone">
                    <label for="requestorName">Requestor:</label>
                    <div class="label111">
                        <input type="text" name="requestor_fname" id="requestor_fname_someone1" class="requestor_fname"
                            placeholder="First Name" required>
                        <input type="text" name="requestor_mname" id="requestor_mname_someone1" class="requestor_mname"
                            placeholder="Middle Name">
                        <input type="text" name="requestor_lname" id="requestor_lname_someone1" class="requestor_lname"
                            placeholder="Last Name" required>
                        <input type="text" name="requestor_suffix" id="requestor_suffix_someone1"
                            class="requestor_suffix" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-e-someone">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" id="house_no_someone1" class="house_no"
                            placeholder="Houseno.">
                        <input type="text" name="street" id="street_someone1" class="street" placeholder="Street name" required>
                        <input type="text" name="subdivision" id="subdivision_someone1" class="subdivision"
                            placeholder="Subdivision name">
                    </div>
                </div>
                <div class="input-e-someone">
                    <label for="purpose">Purpose:</label>
                    <input type="text" name="purpose" id="purpose_someone1" class="purpose" required>
                </div>
            </div>
            <input type="hidden" name="documentFor" value="Someone">
            <input type="hidden" name="date_requested" id="date_requested" class="date_requested">
            <input type="hidden" name="id" id="endorsementCert_id" class="endorsementCert_id">
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
    const addEcertLinkSelf = document.getElementById('addEcert_forself');
    const modaladdEcertSelf = document.querySelector('.modal-addEcert_forself');
    const closeFormSelf = document.querySelector('.closeForm_forself');

    addEcertLinkSelf.addEventListener('click', function(event) {
        event.preventDefault();
        modaladdEcertSelf.style.display = 'block';
    });

    closeFormSelf.addEventListener('click', function() {
        modaladdEcertSelf.style.display = 'none';
    });

    const addEcertLinkSomeone = document.getElementById('addEcert_forsomeone');
    const modaladdEcertSomeone = document.querySelector('.modal-addEcert_forsomeone');
    const closeFormSomeone = document.querySelector('.closeForm_forsomeone');

    addEcertLinkSomeone.addEventListener('click', function(event) {
        event.preventDefault();
        modaladdEcertSomeone.style.display = 'block';
    });

    closeFormSomeone.addEventListener('click', function() {
        modaladdEcertSomeone.style.display = 'none';
    });

    // EDIT MODAL
    const editEcertLinkSelf = document.querySelectorAll('.editEcert_forself');
    const modaleditEcertSelf = document.querySelector('.modal-editEcert_forself');
    const closeFormSelf1 = document.querySelector('.closeForm_forself1');

    editEcertLinkSelf.forEach(edit => {
        edit.addEventListener('click', function(event) {
            event.preventDefault();
            modaleditEcertSelf.style.display = 'block';
        });
        closeFormSelf1.addEventListener('click', function() {
            modaleditEcertSelf.style.display = 'none';
        });
    })


    const editEcertLinkSomeone = document.querySelectorAll('.editEcert_forsomeone');
    const modaleditEcertSomeone = document.querySelector('.modal-editEcert_forsomeone');
    const closeFormSomeone1 = document.querySelector('.closeForm_forsomeone1');

    editEcertLinkSomeone.forEach(edit => {
        edit.addEventListener('click', function(event) {
            event.preventDefault();
            modaleditEcertSomeone.style.display = 'block';
        });

        closeFormSomeone1.addEventListener('click', function() {
            modaleditEcertSomeone.style.display = 'none';
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