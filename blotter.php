<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tbl_blotter";
$result = $conn->query($query);

$residents = array();
while($row = $result->fetch_assoc()) {
  $residents[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blotter Reports</title>
    <link rel="stylesheet" href="style3.css ">
    <link rel="stylesheet" href="style4.css ">
    <link rel="stylesheet" href="sidenav.css ">
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
            <p>Blotter</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
            <div class="add-cont">
                <a href="#" class="addBlotter" id="addBlotter">+ Blotter</a>
                <a href="archives/ArchiveBlotter.php" class="archiveResidents">Archive</a>
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
                        <th>Complainant</th>
                        <th>Respondent</th>
                        <th>Victim(s)</th>
                        <th>Blotter/Incident</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($residents)) { ?>
                    <?php $no=1; foreach($residents as $row): ?>
                    <tr>
                        <td><?= $row['complainant_fname']." ".$row['complainant_mname']." ".$row['complainant_lname']." ".$row['complainant_suffix']?>
                        </td>
                        <td><?= $row['respondent_fname']." ".$row['respondent_mname']." ".$row['respondent_lname']." ".$row['respondent_suffix']?>
                        </td>
                        <td><?= $row['victim_fname']." ".$row['victim_mname']." ".$row['victim_lname']." ".$row['victim_suffix'] ?>
                        </td>
                        <td><?= $row['type'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td class="actions">
                            <a href="#" class="edit" id="editBlotter" onclick="editBlotter(this)"
                                data-id="<?= $row['id'] ?>" data-complainant-fname="<?= $row['complainant_fname'] ?>"
                                data-complainant-mname="<?= $row['complainant_mname'] ?>"
                                data-complainant-lname="<?= $row['complainant_lname'] ?>"
                                data-complainant-suffix="<?= $row['complainant_suffix'] ?>"
                                data-respondent-fname="<?= $row['respondent_fname'] ?>"
                                data-respondent-mname="<?= $row['respondent_mname'] ?>"
                                data-respondent-lname="<?= $row['respondent_lname'] ?>"
                                data-respondent-suffix="<?= $row['respondent_suffix'] ?>"
                                data-victim-fname="<?= $row['victim_fname'] ?>"
                                data-victim-mname="<?= $row['victim_mname'] ?>"
                                data-victim-lname="<?= $row['victim_lname'] ?>"
                                data-victim-suffix="<?= $row['victim_suffix'] ?>" data-type="<?= $row['type'] ?>"
                                data-location="<?= $row['location'] ?>" data-date="<?= $row['date'] ?>"
                                data-time="<?= $row['time'] ?>" data-details="<?= $row['details'] ?>"
                                data-status="<?= $row['status'] ?>">Edit</a>
                            <a href="./model/print_blotter.php?id=<?= $row['id']?>" class="print">Print</a>
                            <a href="#" class="delete">Cancel</a>

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
                                        <a href="./model/remove/remove_blotter.php?id=<?= $row['id']?>">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </td>
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

    <!-- START ADD Blotter -->
    <div class="modal-AddBlotter">
        <form class="form2Blotter" action="./model/add_blotter.php" method="POST">
            <div class="title-cont">
                <p>Blotter Form</p>
                <img src="iconsBackend/close 1.png" class="closeBtnAdd" alt="">
            </div>

            <div class="hanggang-apatBlotter">
                <div class="unang-layerBlotter">
                    <label for="complainant">Complainant</label>
                    <div class="input-cont-blotter">
                        <input type="text" name="complainant_fname" id="complainant_fname" placeholder="First Name"
                            required>
                        <input type="text" name="complainant_mname" id="complainant_mname" placeholder="Middle Name">
                        <input type="text" name="complainant_lname" id="complainant_lname" placeholder="Last Name"
                            required>
                        <input type="text" name="complainant_suffix" id="complainant_suffix" placeholder="Suffix">
                    </div>

                    <label for="respondent">Repondent</label>
                    <div class="input-cont-blotter">
                        <input type="text" name="respondent_fname" id="respondent_fname" placeholder="First Name"
                            required>
                        <input type="text" name="respondent_mname" id="respondent_mname" placeholder="Middle Name">
                        <input type="text" name="respondent_lname" id="respondent_lname" placeholder="Last Name"
                            required>
                        <input type="text" name="respondent_suffix" id="respondent_suffix" placeholder="Suffix">
                    </div>

                    <label for="victim">Victim</label>
                    <div class="input-cont-blotter">
                        <input type="text" name="victim_fname" id="victim_fname" placeholder="First Name"
                            required>
                        <input type="text" name="victim_mname" id="victim_mname" placeholder="Middle Name">
                        <input type="text" name="victim_lname" id="victim_lname" placeholder="Last Name"
                            required>
                        <input type="text" name="victim_suffix" id="victim_suffix" placeholder="Suffix">
                    </div>
                </div>

                <div class="pangalawang-layerBlotter">
                    <label for="time">Time</label>
                    <input id="timeBlotter" type="time" name="time" required>

                    <label for="type">Type</label>
                    <select id="typeBlotter" name="type" required>
                        <option value="">Select Type</option>
                        <option value="amicable">Amicable</option>
                        <option value="incident">Incident</option>
                    </select>

                    <label for="location">Location</label>
                    <input id="locationBlotter" type="text" name="location" placeholder="Street Name" required>
                </div>

                <div class="pangapat-layerBlotter">
                    <label for="date">Date</label>
                    <input id="dateBlotter" type="date" name="date" required>

                    <label for="status">Status</label>
                    <select id="statusBlotter" name="status" required>
                        <option value="">Select Status</option>
                        <option value="active">Active</option>
                        <option value="scheduled">Scheduled</option>
                    </select>
                </div>
            </div>

            <div class="panglima-layerBlotter">
                <label class="detailstext" for="occupation">Details:</label>
                <textarea id="detailsBlotter" name="details" cols="4" rows="50" required></textarea>
            </div>

            <input class="submitBlotter" type="submit" value="Create">
        </form>
    </div>
    <!-- END ADD Blotter -->





    <!-- START EDIT Blotter -->
    <div class="modal-editBlotter">
        <form class="form2Blotter" action="./model/edit_blotter.php" method="POST">
            <div class="title-cont">
                <p>Blotter Form</p>
                <img src="iconsBackend/close 1.png" class="closeBtnEdit" alt="">
            </div>

            <div class="hanggang-apatBlotter">
                <div class="unang-layerBlotter">
                    <label for="complainant">Complainant</label>
                    <div class="input-cont-blotter">
                        <input type="text" name="complainant_fname" id="complainant_fname1" placeholder="First Name"
                            required>
                        <input type="text" name="complainant_mname" id="complainant_mname1" placeholder="Middle Name">
                        <input type="text" name="complainant_lname" id="complainant_lname1" placeholder="Last Name"
                            required>
                        <input type="text" name="complainant_suffix" id="complainant_suffix1" placeholder="Suffix">
                    </div>

                    <label for="respondent">Repondent</label>
                    <div class="input-cont-blotter">
                        <input type="text" name="respondent_fname" id="respondent_fname1" placeholder="First Name"
                            required>
                        <input type="text" name="respondent_mname" id="respondent_mname1" placeholder="Middle Name">
                        <input type="text" name="respondent_lname" id="respondent_lname1" placeholder="Last Name"
                            required>
                        <input type="text" name="respondent_suffix" id="respondent_suffix1" placeholder="Suffix">
                    </div>
                    
                    <label for="victim">Victim</label>
                    <div class="input-cont-blotter">
                        <input type="text" name="victim_fname" id="victim_fname1" placeholder="First Name"
                            required>
                        <input type="text" name="victim_mname" id="victim_mname1" placeholder="Middle Name">
                        <input type="text" name="victim_lname" id="victim_lname1" placeholder="Last Name"
                            required>
                        <input type="text" name="victim_suffix" id="victim_suffix1" placeholder="Suffix">
                    </div>
                </div>

                <div class="pangalawang-layerBlotter">
                    <label for="time">Time</label>
                    <input id="timeBlotter1" step="any" type="time" name="time" required>

                    <label for="type">Type</label>
                    <select id="typeBlotter1" name="type" required>
                        <option value="">Select Type</option>
                        <option value="amicable">Amicable</option>
                        <option value="incident">Incident</option>
                    </select>

                    <label for="location">Location</label>
                    <input id="locationBlotter1" type="text" name="location" placeholder="Street Name" required>
                </div>

                <div class="pangapat-layerBlotter">
                    <label for="date">Date</label>
                    <input id="dateBlotter1" type="date" name="date" required>

                    <label for="status">Status</label>
                    <select id="statusBlotter1" name="status" required>
                        <option value="">Select Status</option>
                        <option value="active">Active</option>
                        <option value="scheduled">Scheduled</option>
                        <option value="settled">Settled</option>
                    </select>
                </div>
            </div>

            <div class="panglima-layerBlotter">
                <label class="detailstext" for="occupation">Details:</label>
                <textarea id="detailsBlotter1" name="details" cols="4" rows="50" required></textarea>
            </div>

            <input type="hidden" name="blotter_id" id="blotter_id">
            <input class="submitBlotter" type="submit" value="Create">
            
        </form>
    </div>
    <!-- END EDIT Blotter -->



    <script src="./js//jQuery-3.7.0.js"></script>
    <script src="./js//app.js"></script>
    <script>
    const addBlotterLink = document.getElementById('addBlotter');
    const modal = document.querySelector('.modal-AddBlotter');
    const closeButton = document.querySelector('.closeBtnAdd');

    addBlotterLink.addEventListener('click', function(event) {
        event.preventDefault();
        modal.style.display = 'block';
    });

    closeButton.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // editblotter
    const editBlotterLink = document.querySelectorAll('.edit');
    const modalEdit = document.querySelector('.modal-editBlotter');
    const closeButtonEdit = document.querySelector('.closeBtnEdit');


    editBlotterLink.forEach(edit => {
        edit.addEventListener("click", (e) => {
            e.preventDefault();
            modalEdit.style.display = 'block'
        })
    })
    closeButtonEdit.addEventListener('click', function() {
        modalEdit.style.display = 'none';
    });
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