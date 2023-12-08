<?php include './server/server.php'?>
<?php
$sortOption = $_GET["sort"] ?? null;
$filterOption = $_GET["filter"] ?? null;
$filterValue = $_GET["value"] ?? null;


$params = [];
$types = "";

$query =  "SELECT * FROM tbl_households";

if($filterOption && $filterValue) {
    $query .= " WHERE `$filterOption` = ?";
    $params[] = $filterValue;
    $types .= "s";
}

if($sortOption == "age") {
    $query .= " ORDER BY $sortOption DESC";
}

$stmt = $conn->prepare($query);

if (!empty($types) && !empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();

$result = $stmt->get_result();

$residents = array();
while($row = $result->fetch_assoc()) {
  $residents[] = $row;
}

$stmt->close();

$query2 =  "SELECT * FROM tbl_users";
$result2 = $conn->query($query2);
$row2 = $result2->fetch_assoc();
$users = array();
while($userRow = $result2->fetch_assoc()) {
    $users[] = array(
        'firstname' => $userRow['firstname'], 
        'lastname' => $userRow['lastname']
    );
}

$ageFilter = isset($_GET["age"]) ? (int)$_GET["age"] : null;
$seniorFilter = isset($_GET["senior"]) && $_GET["senior"] === "true";

$filteredResidents = [];

foreach ($residents as $resident) {
    $age = calculateAge($resident['date_of_birth']);

    if ($ageFilter && $age == $ageFilter) {
        $filteredResidents[] = $resident;
        // echo "<pre>";
        // print_r($filteredResidents);
        // echo "</pre>";
    } elseif ($seniorFilter && $age >= 60) {
        $filteredResidents[] = $resident;
        // echo "<pre>";
        // print_r($filteredResidents);
        // echo "</pre>";
    }
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
    <title>Resident Information</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="style4.css">
    <link rel="stylesheet" href="sidenav.css">
    <link rel="stylesheet" href="./style/generateCert.css">
    <script src="sidebar.js"></script>

</head>

<body>
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/import_residents.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include "./sidebar.php" ?>

    <div class="home_residents">
        <div class="first_layer">
            <p>Resident Information</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input class="searchBar" type="text" placeholder=" Enter text here">
                <a href="#" id="sortFilter">Sort & Filter </a>

                <div class="sort">
                    <div class="header-sort">
                        <img src="iconsBackend/close 1.png" alt="" class="close-sort">
                    </div>
                    <div class="sortby-cont">
                        <p>Sort by</p>
                        <div class="sort-btn">
                            <ul>
                                <li><a href="?age=filter">Age</a></li>
                                <li><a href="?senior=true">SNR</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sortby-cont">
                        <p>Filter by</p>
                        <div class="sort-btn">
                            <ul>
                                <li><a href="?filter=sex&value=male">Male</a></li>
                                <li><a href="?filter=sex&value=female">Female</a></li>
                                <li><a href="?filter=civil_status&value=Single">Single</a></li>
                                <li><a href="?filter=civil_status&value=Married">Married</a></li>
                                <li><a href="?filter=civil_status&value=Divorced">Divorced</a></li>
                                <li><a href="?filter=civil_status&value=Widowed">Widowed</a></li>
                                <li><a href="?filter=voter_status&value=voter">Voter</a></li>
                                <li><a href="?filter=osy&value=OSY">OSY</a></li>
                                <li><a href="?filter=pwd&value=PWD">PWD</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="add-cont">
                <a href="./addIndividual.php" class="add">+Individual</a>
                <a href="./addHousehold.php" class="add">+Household</a>
                <a href="./model/export_households_csv.php" class="exportCVS">+Export CVS</a>
                <button class="importBtn">+Import</button>
                <a href="archives/ArchiveResident.php" class="archiveResidents">Archive</a>
            </div>
        </div>

        <!-- export_households_csv.php -->

        <?php include './template/message.php' ?>

        <div class="third_layer">
            <table id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Sex</th>
                        <th>Date of Birth</th>
                        <th>Place of Birth</th>
                        <th>Civil Status</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($residents)) { ?>
                    <?php $no=1; foreach($residents as $row): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['firstname'] ?> <?=$row['middlename'] ?> <?= $row['lastname']?></td>
                        <td><?= calculateAge($row['date_of_birth'])?></td>
                        <td><?= $row['sex'] ?></td>
                        <td><?= $row['date_of_birth'] ?></td>
                        <td><?= $row['place_of_birth'] ?></td>
                        <td><?= $row['civil_status'] ?></td>
                        <td><?= $row['house_no']. " " .$row['street']. " " .$row['subdivision'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td class="actions">
                            <a href="#" class="edit" id="editResidents" onclick="editResident(this)"
                                data-id="<?= $row['id'] ?>" data-fname="<?= $row['firstname'] ?>"
                                data-mname="<?= $row['middlename'] ?>" data-lname="<?= $row['lastname'] ?>"
                                data-sex="<?= $row['sex'] ?>" data-houseNo="<?= $row['house_no'] ?>"
                                data-street="<?= $row['street'] ?>" data-subdivision="<?= $row['subdivision'] ?>"
                                data-dbirth="<?= $row['date_of_birth'] ?>" data-pbirth="<?= $row['place_of_birth'] ?>"
                                data-cstatus="<?= $row['civil_status'] ?>" data-occupation="<?= $row['occupation'] ?>"
                                data-email="<?= $row['email'] ?>" data-contactNo="<?= $row['contact_no'] ?>"
                                data-vstatus="<?= $row['voter_status'] ?>" data-citizenship="<?= $row['citizenship'] ?>"
                                data-householdNo="<?= $row['household_no'] ?>" data-osy="<?= $row['osy'] ?>"
                                data-pwd="<?= $row['pwd'] ?>">Edit</a>
                            <?php 
                                $userExists = false;
                                foreach($users as $user) {
                                    if ($user['firstname'] === $row['firstname'] && $user['lastname'] === $row['lastname']) {
                                        $userExists = true;
                                        break;
                                    }
                                }
                            ?>
                            <?php if(!$userExists) { ?>
                            <a href="#" class="accountBtn" onclick="createAccount(this)"
                                data-id="<?= $row['id'] ?>" 
                                data-fname="<?= $row['firstname'] ?>" 
                                data-mname="<?= $row['middlename'] ?>"
                                data-lname="<?= $row['lastname'] ?>"
                                data-age="<?= calculateAge($row['date_of_birth']) ?>" 
                                data-sex="<?= $row['sex'] ?>"
                                data-houseNo="<?= $row['house_no'] ?>" 
                                data-street="<?= $row['street'] ?>"
                                data-subdivision="<?= $row['subdivision'] ?>" 
                                data-cstatus="<?= $row['civil_status'] ?>"
                                data-dbirth="<?= $row['date_of_birth'] ?>" 
                                data-pbirth="<?= $row['place_of_birth'] ?>" 
                                data-email="<?= $row['email'] ?>">Account</a>
                            <?php } ?>
                            <a href="#" class="delete delete-archive" id="delete-archive">Delete</a>

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
                                        <a href="./model/remove/remove_resident.php?id=<?= $row['id']?>">Delete</a>
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



    <!-- START EDIT RESIDENTS -->
    <div class="modal-editResidents">
        <form class="form1" action="./model/edit_resident.php" method="POST">
            <div class="title-cont">
                <p>Edit Resident Registration Form</p>
                <img src="iconsBackend/close 1.png" class="closeBtnEdit" alt="">
            </div>
            <div class="unang-layer">
                <div class="input-wrapper">
                    <label for="firstname">First Name:</label>
                    <input type="text" id="firstname" name="firstname" required>
                </div>

                <div class="input-wrapper">
                    <label for="middlename">Middle Name:</label>
                    <input type="text" id="middlename" name="middlename" required>
                </div>

                <div class="input-wrapper">
                    <label for="lastname">Last Name:</label>
                    <input type="text" id="lastname" name="lastname" required>
                </div>

                <!-- <div class="input-wrapper">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" required>
                </div> -->

                <div class="input-wrapper">
                    <label for="sex">Sex:</label>
                    <select id="sex" name="sex" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <div class="pangalawang-layer">
                <div class="input-wrapper1">
                    <label for="address">Address:</label><br>
                    <div class="address-cont">
                        <!-- <label for="house-no">House No.:</label> -->
                        <input type="text" id="house-no" name="house-no" placeholder="House no." required><br>

                        <!-- <label for="street">Street:</label> -->
                        <input type="text" id="street" name="street" placeholder="Street" required><br>

                        <!-- <label for="subdivision">Subdivision:</label> -->
                        <input type="text" id="subdivision" name="subdivision" placeholder="Subdivision" required>
                    </div>
                </div>

                <div class="input-wrapper1">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>
                </div>

                <div class="input-wrapper1">
                    <label for="place-of-birth">Place of Birth:</label>
                    <input type="text" id="place-of-birth" name="place-of-birth" required>
                </div>

                <div class="input-wrapper1">
                    <label for="civil-status">Civil Status:</label>
                    <select id="civil-status" name="civil-status" required>
                        <option value="">Select Civil Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widowed">Widowed</option>
                    </select>
                </div>
            </div>

            <div class="pangatlong-layer">
                <div class="input-wrapper">
                    <label for="occupation">Occupation:</label>
                    <input type="text" id="occupation" name="occupation" required>
                </div>

                <div class="input-wrapper">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-wrapper">
                    <label for="contact-no">Contact No.:</label>
                    <input type="tel" id="contact-no" name="contact-no" required>
                </div>

                <div class="input-wrapper">
                    <label for="voter-status">Voter Status:</label>
                    <select id="voter-status" name="voter-status" required>
                        <option value="">Select Voter Status</option>
                        <option value="voter">Voter</option>
                        <option value="non-voter">Non-voter</option>
                    </select>
                </div>

                <!-- <div class="input-wrapper">
                    <label for="identified">Identified as:</label>
                    <select id="identified" name="identified" required>
                        <option value="">Select Sector</option>
                        <option value="Positive">Positive</option>
                        <option value="Negative">Negative</option>
                    </select>
                </div> -->
            </div>

            <div class="pangapat-layer">
                <!-- <div class="input-wrapper">
                    <label for="sector">Sector:</label>
                    <select id="sector" name="sector" required>
                        <option value="">Select Sector</option>
                        <option value="Student">Student</option>
                        <option value="Senior Citizen">Senior Citizen</option>
                    </select>
                </div> -->

                <div class="input-wrapper">
                    <label for="citizenship">Citizenship:</label>
                    <input type="text" id="citizenship" name="citizenship" required>
                </div>

                <div class="input-wrapper">
                    <label for="household-no">Household No.:</label>
                    <input type="text" id="household-no" name="household-no" required>
                </div>

                <div class="checkbox-cont">
                    <div class="input-wrapper">
                        <div class="check1">
                            <input type="checkbox" id="out-of-school-youth" value="OSY" name="out-of-school-youth">
                            <label for="out-of-school-youth">Out of School Youth:</label>
                        </div>
                    </div>

                    <div class="input-wrapper">
                        <div class="check2">
                            <input type="checkbox" id="person-with-disability" value="PWD"
                                name="person-with-disability">
                            <label for="person-with-disability">Person with Disability:</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of div -->


            <!-- End of parent div -->
            <!-- END EDIT RESIDENTS -->
            <input type="hidden" name="id" id="id">
            <input class="submit" type="submit" value="Create">
        </form>

    </div>





</body>

</html>

<script src=" ./js/jQuery-3.7.0.js"></script>
<script src="./js//app.js"></script>
<script>
const editResidentsLink = document.querySelectorAll('.edit');
const modalEdit = document.querySelector('.modal-editResidents');
const closeButtonEdit = document.querySelector('.closeBtnEdit');

// EDIT RESIDENTS
editResidentsLink.forEach(edit => {
    edit.addEventListener('click', function(event) {
        event.preventDefault();
        modalEdit.style.display = 'block';
        console.log("log")
    });
})

closeButtonEdit.addEventListener('click', function() {
    modalEdit.style.display = 'none';
});



// DELETE RESIDENTS
const deleteLink = document.querySelectorAll('.delete-archive');
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


// SORT & FILTER
const sortFilterLink = document.getElementById('sortFilter');
const sort = document.querySelector('.sort');
const closeSort = document.querySelector('.close-sort');

sortFilterLink.addEventListener('click', function(event) {
    event.preventDefault();
    sort.style.display = 'block';
});

closeSort.addEventListener('click', function() {
    sort.style.display = 'none';
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