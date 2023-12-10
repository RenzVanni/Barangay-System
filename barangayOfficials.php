<?php include "./server/server.php" ?>
<?php 
    $off_q = "SELECT *, tblofficials.id as id, tblchairmanship.id as chair_id FROM tblofficials  JOIN tblchairmanship ON tblchairmanship.id=tblofficials.chairmanship ORDER BY tblchairmanship.id ASC";
	
	$res_o = $conn->query($off_q);

	$official = array();
	while($row = $res_o->fetch_assoc()){
		$official[] = $row; 
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Officials</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style4.css">
    <link rel="stylesheet" href="sidenav.css">
    <link rel="stylesheet" href="./style/generateCert.css">
    <script src="sidebar.js"></script>

</head>

<body>
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include './sidebar.php' ?>

    <div class="home_officials">
        <div class="left_officials">
            <div class="first_layer">
                <p>Barangay Officials</p>
              
            </div>
            <div class="second_layer">
                <div class="text-cont">
                    <p>Current Barangay Officials</p>
                </div>
                <div class="modal-cont">
                    <a href="#" id="showModal">+ Officials</a>
                    <a href="archives/ArchiveOfficial.php" id="archive">Archive</a>
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
                <table>
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Chairmanship</th>
                            <th>Term Start</th>
                            <th>Term End</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php if(!empty($official)) { ?>
                    <?php foreach($official as $row): ?>
                    <tr>
                        <td><?= $row['firstname']. " ".$row['middlename']. " ".$row['lastname']?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['termstart'] ?></td>
                        <td><?= $row['termend'] ?></td>
                        <td class="status"><?= $row['status'] ?></td>
                        <td class="actions">
                            <span class="edit" id="editOfficials" onclick="editOfficial(this)"
                                data-id="<?= $row['id'] ?>" data-fname="<?= $row['firstname'] ?>"
                                data-mname="<?= $row['middlename'] ?>" data-lname="<?= $row['lastname'] ?>"
                                data-suffix="<?= $row['suffix'] ?>" data-chair="<?= $row['chair_id'] ?>"
                                data-start="<?= $row['termstart'] ?>" data-end="<?= $row['termend'] ?>"
                                data-status="<?= $row['status'] ?>">Edit</span>
                            <!-- <a href="./model/remove/remove_official.php?id=<?= $row['id'] ?>" class="delete">Delete</a> -->
                        </td>
                    </tr>
                    <?php endforeach ?>
                    <?php }?>
                    <!-- Add more rows here -->
                    <!-- Add more rows here -->
                </table>
            </div>
        </div>

    </div>

    <!-- START ADD OFFICIALS -->
    <div class="modal-AddOfficials">
        <form class="formOfficials" action="./model/add_officials.php" method="POST">
            <div class="Unang-cont">
                <p>Create Officials</p>
                <img src="iconsBackend/close 1.png" class="closeBtnAdd" alt="">
            </div>

            <div class="pangalawang-cont">
                <label for="officialName">Applicant:</label>
                <div class="labelOfficials">
                    <input type="text" name="officialName_fname" id="officialName_fname" placeholder="First Name"
                        required>
                    <input type="text" name="officialName_mname" id="officialName_mname" placeholder="Middle Name">
                    <input type="text" name="officialName_lame" id="officialName_lname" placeholder="Last Name"
                        required>
                    <input type="text" name="officialName_suffix" id="officialName_suffix" placeholder="Suffix">
                </div>

                <label class="chairmanship" for="chairmanship">Chairmanship:</label>
                <select id="chairmanship" name="chairmanship" required>
                    <option disabled selected>Select Chairmanship</option>
                    <?php foreach($chair as $row): ?>
                    <?php if(!in_array($row['id'], array_column($official, 'chair_id'))): ?>
                    <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
                    <?php endif; ?>

                    <?php endforeach ?>
                </select>


                <label class="term-start" for="term-start">Term Start:</label>
                <input type="date" id="term-start" name="term-start" required>

                <label class="term-end" for="term-end">Term End:</label>
                <input type="date" id="term-end" name="term-end" required>

                <!-- <label class="status1" for="status">Status:</label>
      <select id="status" name="status" required>
        <option value="">Select Status</option>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
      </select> -->

                <input type="hidden" name="status" value="Active">

                <div class="addContOfficial">
                   <button type="submit">Submit</button>
                </div>
           
            </div>

        </form>
    </div>
    <!-- END ADD OFFICIALS -->





    <!-- START EDIT OFFICIALS -->
    <div class="modal-editOfficials">
        <form class="formOfficials" action="./model/edit_official.php" method="POST">
            <div class="Unang-cont">
                <p>Create Officials</p>
                <img src="iconsBackend/close 1.png" class="closeBtnEdit" alt="">
            </div>

            <div class="pangalawang-cont">
                <label for="officialName">Applicant:</label>
                <div class="labelOfficials">
                    <input type="text" name="officialName_fname" id="officialName_fname1" placeholder="First Name"
                        required>
                    <input type="text" name="officialName_mname" id="officialName_mname1" placeholder="Middle Name">
                    <input type="text" name="officialName_lname" id="officialName_lname1" placeholder="Last Name"
                        required>
                    <input type="text" name="officialName_suffix" id="officialName_suffix1" placeholder="Suffix">
                </div>

                <label class="chairmanship" for="chairmanship">Chairmanship:</label>
                <select id="chairmanship1" name="chairmanship" required>
                    <option disabled selected>Select Chairmanship</option>
                    <?php foreach($chair as $row): ?>
                    <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
                    <?php endforeach ?>
                </select>

                <label class="term-start" for="term-start">Term Start:</label>
                <input type="date" id="term-start1" name="term-start" required>

                <label class="term-end" for="term-end">Term End:</label>
                <input type="date" id="term-end1" name="term-end" required>

                <label class="status1" for="status">Status:</label>
                <select id="status1" name="status" required>
                    <option value="">Select Status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>

                <input type="hidden" name="official_id" id="official_id">
                <input class="submitAdd" type="submit" value="Create">
            </div>

        </form>
    </div>
    <!-- END EDIT OFFICIALS -->




    <script src="./js//jQuery-3.7.0.js"></script>
    <script src="./js//app.js"></script>
    <script>
    const showModalLink = document.getElementById('showModal');
    const modal = document.querySelector('.modal-AddOfficials');
    const closeButton = document.querySelector('.closeBtnAdd');

    showModalLink.addEventListener('click', function(event) {
        event.preventDefault();
        modal.style.display = 'block';
    });

    closeButton.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    const editOfficialsLink = document.querySelectorAll('.edit');
    const modalEdit = document.querySelector('.modal-editOfficials');
    const closeButtonEdit = document.querySelector('.closeBtnEdit');

    editOfficialsLink.forEach(edit => {
        edit.addEventListener('click', function(event) {
            event.preventDefault();
            modalEdit.style.display = 'block';
        });
    })

    closeButtonEdit.addEventListener('click', function() {
        modalEdit.style.display = 'none';
    });
    </script>
</body>

</html>