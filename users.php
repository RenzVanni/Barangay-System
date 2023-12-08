<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tbl_users";
$result = $conn->query($query);

$users = array();
while($row = $result->fetch_assoc()) {
  $users[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account</title>
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
            <p>Users</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
            <div class="add-cont">
                <a href="#" class="addUsers" id="addUser">+ User</a>
                <a href="archives/ArchiveUser.php" class="archiveResidents">Archive</a>
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
                        <th>Resident Name</th>
                        <th>Username</th>
                        <th>User Type</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($users)) { ?>
                    <?php $no=1; foreach($users as $row): ?>
                    <tr>
                        <td><?= $row['firstname']. " " .$row['middlename']. " " .$row['lastname'] ?></td>
                        <td><?= $row['username']?></td>
                        <td><?= $row['role']?></td>
                        <td><?= $row['time'] ?></td>
                        <td class="actions">
                            <a href="" class="edit" id="editUser" onclick="editPassword(this)"
                                data-id="<?= $row['id']?>" data-email="<?= $row["email"] ?>"
                                data-username="<?= $row['username'] ?>">Edit</a>
                                <a href="#"
                                    class="delete">Delete</a>

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
                                            <a href="./model/remove/remove_user.php?id=<?= $row['id']?>">Delete</a>
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

    <div class="modal-AddUser">
        <form class="form2-user" action="./model/create_account.php" method="POST">
            <div class="title-cont-1">
                <p class="title-name">Create New User</p>
                <img src="iconsBackend/close 1.png" class="closeBtn" alt="">
            </div>

            <div class="unang-layer-user">
                <img id="preview" alt="Preview">
                <label for="file-upload" class="custom-file-upload">
                    <input type="file" accept="image/*" onchange="previewImage(event)">
            </div>

            <div class="pangalawang-layer-user">
                <label for="username-user"></label>Username
                <input type="text" id="username-user" name="username" required>

                <label for="password-user"></label>Password
                <input type="password" id="password-user" name="password" required>

                <label for="usertype-user">User Type</label>
                <select id="usertype-user" name="usertype-user" required>
                    <option value="staff">Staff</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>

            <input class="submitUser" type="submit" value="Create">
        </form>
    </div>


    <div class="modal-editUser" id="modal-editUser">
        <form class="form2-user" action="./model/change_password.php" method="POST">
            <div class="title-cont-1">
                <p class="title-name">Edit User</p>
                <img src="iconsBackend/close 1.png" class="closeBtnEdit" alt="">
            </div>

            <div class="unang-layer-user">
                <img id="preview" alt="Preview">
                <label for="file-upload" class="custom-file-upload">
                    <input type="file" accept="image/*" onchange="previewImage(event)">
            </div>

            <div class="pangalawang-layer-user">
                <label for="username-user">Username</label>
                <input type="text" id="username-user1" name="username" readonly value="<?= $row['username'] ?>"
                    required>
                <?php if($_SESSION["role"] === "staff") { ?>
                <label for="password-user">Current Password</label>
                <input type="password" id="current_password" name="current_password" required>
                <?php } ?>

                <label for="password-user">New Password</label>
                <input type="password" id="new_password" name="new_password" required>

                <?php if($_SESSION["role"] === "staff") { ?>
                <label for="password-user">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
                <?php } ?>

                <!-- <label for="usertype-user">User Type</label>
                <select id="usertype-user" name="usertype-user" required>
                    <option value="staff">Staff</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select> -->
            </div>

            <input type="hidden" name="email" id="update-email" value="<?= $row["email"] ?>">
            <input type="hidden" id="id" name="id">
            <?php if($_SESSION["role"] === "staff") { ?>
            <input class="submitUser" type="submit" value="Create">
            <?php } else {?>
            <input class="submitUser" type="submit" name="submit_admin" value="Create">

            <?php } ?>
        </form>
    </div>
    <!-- edit user -->


 
    <script src="./js//jQuery-3.7.0.js"></script>
    <script src="./js//app.js"></script>

    <script>
    function previewImage(event) {
        var input = event.target;
        var preview = document.querySelector('#preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.setAttribute('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.setAttribute('src', '');
        }
    }

    // add user
    const addUserLink = document.getElementById('addUser');
    const modal = document.querySelector('.modal-AddUser');
    const closeButton = document.querySelector('.closeBtn');

    addUserLink.addEventListener('click', function(event) {
        event.preventDefault();
        modal.style.display = 'block';
    });

    closeButton.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // edit user
    const editUserLink = document.querySelectorAll('.edit');
    const modalEdit = document.querySelector('.modal-editUser');
    const closeButtonEdit = document.querySelector('.closeBtnEdit');

    editUserLink.forEach(edit => {
        edit.addEventListener('click', function(event) {
            event.preventDefault();
            modalEdit.style.display = 'block';
        });
    })
    closeButtonEdit.addEventListener('click', function() {
        modalEdit.style.display = 'none';
    });


    // Set existing image
    var existingImage = 'image/user 1.png'; // Replace with the path to your existing image
    var preview = document.querySelector('#preview');
    preview.setAttribute('src', existingImage);

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

</body>

</html>