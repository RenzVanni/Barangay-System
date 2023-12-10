<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tbl_awareness";
$result = $conn->query($query);

$awareness = array();
while($row = $result->fetch_assoc()) {
  $awareness[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awereness Report</title>
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
            <p>Awareness</p>
           
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
            <div class="add-cont">
                <a href="#" class="addAwareness" id="addAwareness">+ Awareness</a>
                <a href="archives/ArchiveAwareness.php" class="archiveResidents">Archive</a>
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
                        <th>Details</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($awareness)) { ?>
                    <?php $no=1; foreach($awareness as $row): ?>
                    <tr>
                        <td><?= $row['firstname']." ".$row['middlename']." ".$row['lastname']." ".$row['suffix']?>
                        </td>
                        <td><?= $row['details']?></td>
                        <td><?= $row['date'] ?></td>
                        <td><?= $row['time'] ?></td>
                        <td><?= $row['location'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td class="actions">
                            <a href="#" class="edit" id="editAwareness" onclick="editAwareness(this)"
                                data-id="<?= $row['id'] ?>" data-firstname="<?= $row['firstname'] ?>"
                                data-middlename="<?= $row['middlename'] ?>" data-lastname="<?= $row['lastname'] ?>"
                                data-suffix="<?= $row['suffix'] ?>" data-date="<?= $row['date'] ?>"
                                data-time="<?= $row['time'] ?>" data-location="<?= $row['location'] ?>"
                                data-details="<?= $row['details'] ?>" data-status="<?= $row['status'] ?>">Edit</a>
                            <a href="./model/print_awareness.php" class="print">Print</a>
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
                                        <a href="./model/remove/remove_awareness.php?id=<?= $row['id']?>">Delete</a>
                                    </div>
                                </div>
                            </div>
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
    </div>

    <!-- ADD AWARENESS -->
    <div class="modal-AddAwareness">
        <form class="form2Awareness" action="./model/add_awareness.php" method="POST">
            <div class="title-cont">
                <p class="title-name">Awareness</p>
                <img src="iconsBackend/close 1.png" class="closeBtnAdd" alt="">
            </div>

            <div class="unang-layer-to">
                <div class="unang-left">
                    <label for="name">Complainant:</label>
                    <div class="input-cont-complain">
                        <input type="text" name="firstname" id="complainant_fname" placeholder="First Name" required>
                        <input type="text" name="middlename" id="complainant_mname" placeholder="Middle Name">
                        <input type="text" name="lastname" id="complainant_lname" placeholder="Last Name" required>
                        <input type="text" name="suffix" id="complainant_suffix" placeholder="Suffix">
                    </div>

                    <div class="input-complain222">
                        <div class="input-cont-complain2">
                            <label for="time">Time:</label>
                            <input id="timeComplain" type="time" name="time">
                        </div>

                        <div class="input-cont-complain2">
                            <label for="date">Date:</label>
                            <input id="dateComplain" type="date" name="date">
                        </div>

                        <div class="input-cont-complain2">
                            <label for="location">Location:</label>
                            <input id="locationComplain" type="text" name="location" placeholder="Street Name">
                        </div>
                    </div>
                </div>
            </div>

            <div class="pangalawang-layer-to">
                <label class="detailstext1" for="occupation">Details:</label>
                <textarea id="detailAwareness" name="details_awareness" cols="100" rows="10" required></textarea>
            </div>

            <div class="pangatlong-layer-to">
                <div class="statusComplain_cont">
                    <label for="statusComplain">Status</label>
                    <select id="statusComplain" name="status_awareness" required>
                        <option value="">Select Status</option>
                        <option value="active">Active</option>
                        <option value="schedule">Schedule</option>
                    </select>
                </div>

                <div class="submit_cont">
                    <button type="submit">Submit</button>
                </div>
            </div>


        </form>
    </div>
    <!-- END ADD Awareness -->

    <!-- EDIT AWARENESS -->
    <div class="modal-editAwareness">
        <form class="form2Awareness" action="./model/edit_awareness.php" method="POST">
            <div class="title-cont">
                <p class="title-name">Awareness</p>
                <img src="iconsBackend/close 1.png" class="closeBtnEdit" alt="">
            </div>

            <div class="unang-layer-to">
                <div class="unang-left">
                    <label for="name">Complainant:</label>
                    <div class="input-cont-complain">
                        <input type="text" name="firstname" id="complainant_fname1" placeholder="First Name" required>
                        <input type="text" name="middlename" id="complainant_mname1" placeholder="Middle Name">
                        <input type="text" name="lastname" id="complainant_lname1" placeholder="Last Name" required>
                        <input type="text" name="suffix" id="complainant_suffix1" placeholder="Suffix">
                    </div>

                    <div class="input-complain222">
                        <div class="input-cont-complain2">
                            <label for="time">Time:</label>
                            <input id="timeAwareness1" type="time" name="time">
                        </div>

                        <div class="input-cont-complain2">
                            <label for="date">Date:</label>
                            <input id="dateAwareness1" type="date" name="date">
                        </div>

                        <div class="input-cont-complain2">
                            <label for="location">Location:</label>
                            <input id="locationAwareness1" type="text" name="location" placeholder="Street Name">
                        </div>
                    </div>
                </div>
            </div>

            <div class="pangalawang-layer-to">
                <label class="detailstext1" for="occupation">Details:</label>
                <textarea id="detailAwareness1" name="details_awareness" cols="100" rows="10" required></textarea>
            </div>

            <div class="pangatlong-layer-to">
                <div class="statusComplain_cont">
                    <label for="statusComplain">Status</label>
                    <select id="statusAwareness1" name="status_awareness" required>
                        <option value="">Select Status</option>
                        <option value="active">Active</option>
                        <option value="schedule">Schedule</option>
                        <option value="settled">Settled</option>
                    </select>
                </div>

                <div class="submit_cont">
                    <button type="submit">Submit</button>
                </div>
            </div>

            <input type="hidden" name="id" id="awareness_id">
        </form>
    </div>
    <!-- END EDIT Awareness -->





    <script src="./js/jQuery-3.7.0.js"></script>
    <script src="./js//app.js"></script>
    <script>
    const addAwarenessLink = document.getElementById('addAwareness');
    const modalAdd = document.querySelector('.modal-AddAwareness');
    const closeButtonAdd = document.querySelector('.closeBtnAdd');

    addAwarenessLink.addEventListener('click', function(event) {
        event.preventDefault();
        modalAdd.style.display = 'block';
    });

    closeButtonAdd.addEventListener('click', function() {
        modalAdd.style.display = 'none';
    });

    // editblotter
    const editAwarenessLink = document.querySelectorAll('.edit');
    const modalEdit = document.querySelector('.modal-editAwareness');
    const closeButtonEdit = document.querySelector('.closeBtnEdit');

    editAwarenessLink.forEach(edit => {
        edit.addEventListener("click", () => {
            modalEdit.style.display = "block"
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