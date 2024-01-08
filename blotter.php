<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tbl_blotter";
$result = $conn->query($query);

$blotter = array();
while($row = $result->fetch_assoc()) {
  $blotter[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blotter Reports</title>
    <link rel="stylesheet" href="style3.css ?<?php echo time(); ?> ">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
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
                        <th>Type of Incident</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Involved Person/Specific Identification</th>
                        <th>Narrative Details of Inciden</th>
                        <th>Respondent</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($blotter)) { ?>
                    <?php $no=1; foreach($blotter as $row): ?>
                    <tr>
                        <td><?= $row['incident_type'] ?></td>
                        <td><?= $row['location'] ?></td>
                        <td><?= $row['blotter_date'] ?></td>
                        <td><?= $row['involved'] ?></td>
                        <td><?= $row['details'] ?></td>
                        <td><?= $row['respondent'] ?></td>
                        <td class="actions">
                            <a href="#" class="edit" id="editBlotter" onclick="editBlotter(this)"
                            data-id="<?= $row['id'] ?>"
                            data-incident_type="<?= $row['incident_type'] ?>"
                            data-location="<?= $row['location'] ?>"
                            data-blotter_date="<?= $row['blotter_date'] ?>"
                            data-involved="<?= $row['involved'] ?>"
                            data-details="<?= $row['details'] ?>"
                            data-respondent="<?= $row['respondent'] ?>"
                            >Edit</a>
                            <?php if($_SESSION['role'] === '3') { ?>
                            <a href="#" class="delete">Delete</a>
                            <?php } ?>

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
                    <div class="column1">
                        <label for="type_inciden">Type of Incident</label>
                        <input type="text" name="incident_type" id="type_incident" class="type_incident">
                    </div>
                    <div class="column2">
                        <label for="location">Exact Location of Incident</label>
                        <input type="text" name="location" id="location" class="location">
                    </div>
                    <div class="column3">
                        <label for="dates">Exclusive Dates and Time of Incident</label>
                        <input type="datetime-local" name="blotter_date" id="dateBlotter" class="date">
                    </div>
                </div>
            </div>

            <div class="panglima-layerBlotter">
                <label for="involved">Involved Person/Specific Identification</label>
                <textarea id="involved" name="involved" cols="4" rows="50" required></textarea>
            </div>

            <div class="panganim-layerBlotter">
                <label for="details">Narrative Details of Incident</label>
                <textarea id="details" name="details" cols="4" rows="50" required></textarea>
            </div>
            <div class="pangpito-layerBlotter">
                <label for="respondent">Respondent</label>
                <input type="text" name="respondent" id="respondent" class="respondent">
            </div>

            <input class="submitBlotter" type="submit" value="Submit">
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
                    <div class="column1">
                        <label for="type_inciden">Type of Incident</label>
                        <input type="text" name="incident_type" id="incident_type1" class="type_incident">
                    </div>
                    <div class="column2">
                        <label for="location">Exact Location of Incident</label>
                        <input type="text" name="location" id="location1" class="location">
                    </div>
                    <div class="column3">
                        <label for="dates">Exclusive Dates and Time of Incident</label>
                        <input type="datetime-local" name="blotter_date" id="blotter_date1" class="date">
                    </div>
                </div>
            </div>

            <div class="panglima-layerBlotter">
                <label for="involved">Involved Person/Specific Identification</label>
                <textarea id="involved1" name="involved" cols="4" rows="50" required></textarea>
            </div>

            <div class="panganim-layerBlotter">
                <label for="details">Narrative Details of Incident</label>
                <textarea id="details1" name="details" cols="4" rows="50" required></textarea>
            </div>
            <div class="pangpito-layerBlotter">
                <label for="respondent">Respondent</label>
                <input type="text" name="respondent" id="respondent1" class="respondent">
            </div>

            <input type="hidden" name="blotter_id" id="blotter_id">
            <input class="submitBlotter" type="submit" value="Update">
            
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