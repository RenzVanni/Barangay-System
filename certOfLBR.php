<?php include './server/server.php'?>
<?php
$filterOption = $_GET["filter"] ?? null;
$filterValue = $_GET["value"] ?? null;


$params = [];
$types = "";

$query =  "SELECT * FROM tbl_certoflbr";

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

$certoflbr = array();
while($row = $result->fetch_assoc()) {
  $certoflbr[] = $row;
}
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Late Birth Registration</title>
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
            <p>Certificate of Late Birth Registration</p>
            
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
            <div class="add-cont">
                
                <a href="#" class="add" id="addlbr_forself">+ Forself</a>
                <a href="#" class="add" id="addlbr_forsingleparent">+ Single parent</a>
                <a href="#" class="add" id="addlbr_fortheirchild">+ Their child</a>
                <a class="add1" href="?filter=status&value=Pending">Pending</a>
                <a class="add1" href="?filter=status&value=for pick-up">For Pick-up</a>
                <a class="add1" href="?filter=status&value=completed">Completed</a>
                <a href="archives/ArchiveCertOfLBR.php" class="archiveResidents">Archive</a>
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
                            <th>Name of Parent</th>
                            <th>Name of Father</th>
                            <th>Name of Mother</th>
                            <th>Date of Birth</th>
                            <th>Address</th>
                            <th style="display: none;">Date Requested</th>
                            <th>Document For</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($certoflbr)) { ?>
                        <?php $no=1; foreach($certoflbr as $row): ?>
                        <tr>
                            <td><?= $row['applicant_fname']. ' ' .$row['applicant_mname']. ' ' .$row['applicant_lname'] ?>
                            </td>
                            <td><?= $row['requestor_fname']. ' ' .$row['requestor_mname']. ' ' .$row['requestor_lname'] ?>
                            </td>
                            <td><?= $row['parent_fname']. ' ' .$row['parent_mname']. ' ' .$row['parent_lname'] ?></td>
                            <td><?= $row['father_fname']. ' ' .$row['father_mname']. ' ' .$row['father_lname']  ?></td>
                            <td><?= $row['mother_fname']. ' ' .$row['mother_mname']. ' ' .$row['mother_lname'] ?></td>
                            <td><?= $row['date_of_birth'] ?></td>
                            <td><?= $row['house_no']. " ". $row['street']. " ". $row['subdivision'] ?></td>
                            <td style="display: none;"><?= $row['date_requested'] ?></td>
                            
                            <td><?= $row['documentFor'] ?></td>
                            <td>
                                <form action="./model/update_status/update_certoOfLBR.php" method="POST"
                                    class="form-allCert" id="statusForm">
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

                                    <!-- <button type="submit" class="UpdateStatus">Update</button> -->
                                </form>
                            </td>
                            </td>
                            <td>
                              
                                <!-- PRINT -->
                                <?php if($row['documentFor'] === 'Self') { ?>
                                <a href="./generate/certOfLBR_generate_forself.php?id=<?= $row['id'] ?>"
                                    class="print">View</a>
                                <?php }
                                  elseif ($row['documentFor'] === 'children') { ?>
                                <a href="./generate/certOfLBR_generate_fortheirchild.php?id=<?= $row['id'] ?>"
                                    class="print">View</a>
                                <?php } else {?>
                                <a href="./generate/certOfLBR_generate_forsingleparent.php?id=<?= $row['id'] ?>"
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

    <div class="modal-addlbr_forself">
        <form class="formlbr_forself" action="./model/add_certOfLBR.php" method="post">
            <div class="title-cont-modal">
                <p>For Self</p>
                <img src="iconsBackend/close 1.png" class="closeForm_forself" alt="">
            </div>

            <div class="modal-layer-lbr-self">
                <div class="input-lbr-self">
                    <label for="applicantName">Applicant:</label>
                    <div class="label111">
                        <input type="text" name="applicant_fname" id="applicant_fname_self" placeholder="First Name" required>
                        <input type="text" name="applicant_mname" id="applicant_mname_self" placeholder="Middle Name">
                        <input type="text" name="applicant_lname" id="applicant_lname_self" placeholder="Last Name" required>
                        <input type="text" name="applicant_suffix" id="applicant_suffix_self" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-self">
                    <label for="fatherName">Father Name:</label>
                    <div class="label111">
                        <input type="text" name="father_fname" id="father_fname_self" placeholder="First Name" required>
                        <input type="text" name="father_mname" id="father_mname_self" placeholder="Middle Name">
                        <input type="text" name="father_lname" id="father_lname_self" placeholder="Last Name" required>
                        <input type="text" name="father_suffix" id="father_suffix_self" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-self">
                    <label for="motherName">Mother Name:</label>
                    <div class="label111">
                        <input type="text" name="mother_fname" id="mother_fname_self" placeholder="First Name" required>
                        <input type="text" name="mother_mname" id="mother_mname_self" placeholder="Middle Name">
                        <input type="text" name="mother_lname" id="mother_lname_self" placeholder="Last Name" required>
                        <input type="text" name="mother_suffix" id="mother_suffix_self" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-self">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob_self" name="dob" required>
                </div>
                <div class="input-lbr-self">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" id="house_no_self" placeholder="Houseno.">
                        <input type="text" name="street" id="street_self" placeholder="Street name" required>
                        <input type="text" name="subdivision" id="subdivision_self" placeholder="Subdivision name">
                    </div>
                </div>
            </div>
            <input type="hidden" name="documentFor" value="Self">
            <input type="submit" id="submit" value="Request">
        </form>
    </div>

    <!-- EDIT MODAL SELF -->
    <div class="modal-editlbr_forself">
        <form class="formlbr_forself" action="./model/edit_certificates/edit_certOfLbr.php" method="post">
            <div class="title-cont-modal">
                <p>For Self</p>
                <img src="iconsBackend/close 1.png" class="closeForm_forself1" alt="">
            </div>

            <div class="modal-layer-lbr-self">
                <div class="input-lbr-self">
                    <label for="applicantName">Applicant:</label>
                    <div class="label111">
                        <input type="text" name="applicant_fname" class="applicant_fname" id="applicant_fname_self1"
                            placeholder="First Name" required>
                        <input type="text" name="applicant_mname" class="applicant_mname" id="applicant_mname_self1"
                            placeholder="Middle Name">
                        <input type="text" name="applicant_lname" class="applicant_lname" id="applicant_lname_self1"
                            placeholder="Last Name" required>
                        <input type="text" name="applicant_suffix" class="applicant_suffix" id="applicant_suffix_self1"
                            placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-self">
                    <label for="fatherName">Father Name:</label>
                    <div class="label111">
                        <input type="text" name="father_fname" class="father_fname" id="father_fname_self1"
                            placeholder="First Name" required>
                        <input type="text" name="father_mname" class="father_mname" id="father_mname_self1"
                            placeholder="Middle Name">
                        <input type="text" name="father_lname" class="father_lname" id="father_lname_self1"
                            placeholder="Last Name" required>
                        <input type="text" name="father_suffix" class="father_suffix" id="father_suffix_self1"
                            placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-self">
                    <label for="motherName">Mother Name:</label>
                    <div class="label111">
                        <input type="text" name="mother_fname" class="mother_fname" id="mother_fname_self1"
                            placeholder="First Name" required>
                        <input type="text" name="mother_mname" class="mother_mname" id="mother_mname_self1"
                            placeholder="Middle Name">
                        <input type="text" name="mother_lname" class="mother_lname" id="mother_lname_self1"
                            placeholder="Last Name" required>
                        <input type="text" name="mother_suffix" class="mother_suffix" id="mother_suffix_self1"
                            placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-self">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob_self1" name="dob" class="dob">
                </div>
                <div class="input-lbr-self">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" class="house_no" id="house_no_self1" placeholder="Houseno.">
                        <input type="text" name="street" class="street" id="street_self1" placeholder="Street name" required>
                        <input type="text" name="subdivision" class="subdivision" id="subdivision_self1"
                            placeholder="Subdivision name">
                    </div>
                </div>
            </div>
            <input type="hidden" name="documentFor" value="Self">
            <input type="hidden" name="id" class="certOFlbr_id">
            <input type="hidden" name="date_requested" class="ate_requested">
            <input type="submit" id="submit" value="Request">
        </form>
    </div>

    <div class="modal-addlbr_forsingleparent">
        <form class="formlbr_forsingleparent" action="./model/add_certOfLBR.php" method="post">
            <div class="title-cont-modal">
                <p>For Single Parent</p>
                <img src="iconsBackend/close 1.png" class="closeForm_forsingleparent" alt="">
            </div>

            <div class="modal-layer-lbr-single-parent">
                <div class="input-lbr-single-parent">
                    <label for="requestorName">Requestor:</label>
                    <div class="label111">
                        <input type="text" name="requestor_fname" id="requestor_fname_parent" placeholder="First Name" required>
                        <input type="text" name="requestor_mname" id="requestor_mname_parent" placeholder="Middle Name">
                        <input type="text" name="requestor_lname" id="requestor_lname_parent" placeholder="Last Name" required>
                        <input type="text" name="requestor_suffix" id="requestor_suffix_parent" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-single-parent">
                    <label for="parentName">Parent Name:</label>
                    <div class="label111">
                        <input type="text" name="parent_fname" id="parent_fname_parent" placeholder="First Name" required>
                        <input type="text" name="parent_mname" id="parent_mname_parent" placeholder="Middle Name">
                        <input type="text" name="parent_lname" id="parent_lname_parent" placeholder="Last Name" required>
                        <input type="text" name="parent_suffix" id="parent_suffix_parent" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-single-parent">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob_parent" name="dob">
                </div>
                <div class="input-lbr-single-parent">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" id="house_no_parent" placeholder="Houseno.">
                        <input type="text" name="street" id="street_parent" placeholder="Street name" required>
                        <input type="text" name="subdivision" id="subdivision_parent" placeholder="Subdivision name">
                    </div>
                </div>
            </div>

            <input type="hidden" name="documentFor" value="Single Parent">
            <input type="submit" id="submit" value="Request">
        </form>
    </div>

    <!-- EDIT MODAL PARENT -->
    <div class="modal-editlbr_forsingleparent">
        <form class="formlbr_forsingleparent" action="./model/edit_certificates/edit_certOfLbr.php" method="post">
            <div class="title-cont-modal">
                <p>For Single Parent</p>
                <img src="iconsBackend/close 1.png" class="closeForm_forsingleparent1" alt="">
            </div>

            <div class="modal-layer-lbr-single-parent">
                <div class="input-lbr-single-parent">
                    <label for="requestorName">Requestor:</label>
                    <div class="label111">
                        <input type="text" name="requestor_fname" class="requestor_fname" id="requestor_fname_parent1"
                            placeholder="First Name" required>
                        <input type="text" name="requestor_mname" class="requestor_mname" id="requestor_mname_parent1"
                            placeholder="Middle Name">
                        <input type="text" name="requestor_lname" class="requestor_lname" id="requestor_lname_parent1"
                            placeholder="Last Name" required>
                        <input type="text" name="requestor_suffix" class="requestor_suffix"
                            id="requestor_suffix_parent1" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-single-parent">
                    <label for="parentName">Parent Name:</label>
                    <div class="label111">
                        <input type="text" name="parent_fname" class="parent_fname" id="parent_fname_parent1"
                            placeholder="First Name" required>
                        <input type="text" name="parent_mname" class="requestor_mname" id="parent_mname_parent1"
                            placeholder="Middle Name">
                        <input type="text" name="parent_lname" class="requestor_lname" id="parent_lname_parent1"
                            placeholder="Last Name" required>
                        <input type="text" name="parent_suffix" class="requestor_suffix" id="parent_suffix_parent1"
                            placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-single-parent">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob_parent1" name="dob" class="dob" required>
                </div>
                <div class="input-lbr-single-parent">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" class="house_no" id="house_no_parent1"
                            placeholder="Houseno.">
                        <input type="text" name="street" class="street" id="street_parent1" placeholder="Street name" required>
                        <input type="text" name="subdivision" class="subdivision" id="subdivision_parent1"
                            placeholder="Subdivision name">
                    </div>
                </div>
            </div>

            <input type="hidden" name="documentFor" value="Single Parent">
            <input type="hidden" name="id" class="certOFlbr_id">
            <input type="hidden" name="date_requested" class="ate_requested">
            <input type="submit" id="submit" value="Request">
        </form>
    </div>


    <div class="modal-addlbr_fortheirchild">
        <form class="formlbr_fortheirchild" action="./model/add_certOfLBR.php" method="post">
            <div class="title-cont-modal">
                <p>For Their Child</p>
                <img src="iconsBackend/close 1.png" class="closeForm_fortheirchild" alt="">
            </div>

            <div class="modal-layer-lbr-for-child">
                <div class="input-lbr-for-child">
                    <label for="requestorName">Requestor:</label>
                    <div class="label111">
                        <input type="text" name="requestor_fname" id="requestor_fname_child" placeholder="First Name" required>
                        <input type="text" name="requestor_mname" id="requestor_mname_child" placeholder="Middle Name">
                        <input type="text" name="requestor_lname" id="requestor_lname_child" placeholder="Last Name" required>
                        <input type="text" name="requestor_suffix" id="requestor_suffix_child" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-for-child">
                    <label for="fatherName">Father Name:</label>
                    <div class="label111">
                        <input type="text" name="father_fname" id="father_fname_child" placeholder="First Name" required>
                        <input type="text" name="father_mname" id="father_mname_child" placeholder="Middle Name">
                        <input type="text" name="father_lname" id="father_lname_child" placeholder="Last Name" required>
                        <input type="text" name="father_suffix" id="father_suffix_child" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-for-child">
                    <label for="motherName">Mother Name:</label>
                    <div class="label111">
                        <input type="text" name="mother_fname" id="mother_fname_child" placeholder="First Name" required>
                        <input type="text" name="mother_mname" id="mother_mname_child" placeholder="Middle Name">
                        <input type="text" name="mother_lname" id="mother_lname_child" placeholder="Last Name" required>
                        <input type="text" name="mother_suffix" id="mother_suffix_child" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-for-child">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob_child" name="dob" required>
                </div>
                <div class="input-lbr-for-child">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" id="house_no_child" placeholder="Houseno.">
                        <input type="text" name="street" id="street_child" placeholder="Street name" required>
                        <input type="text" name="subdivision" id="subdivision_child" placeholder="Subdivision name">
                    </div>
                </div>
            </div>
            <input type="hidden" name="documentFor" value="Children">
            <input type="submit" id="submit" value="Request">
        </form>
    </div>

    <!-- EDIT MODAL CHILD -->
    <div class="modal-editlbr_fortheirchild">
        <form class="formlbr_fortheirchild" action="./model/edit_certificates/edit_certOfLbr.php" method="post">
            <div class="title-cont-modal">
                <p>For Their Child</p>
                <img src="iconsBackend/close 1.png" class="closeForm_fortheirchild1" alt="">
            </div>

            <div class="modal-layer-lbr-for-child">
                <div class="input-lbr-for-child">
                    <label for="requestorName">Requestor:</label>
                    <div class="label111">
                        <input type="text" name="requestor_fname" class="requestor_fname" id="requestor_fname_child1"
                            placeholder="First Name" required>
                        <input type="text" name="requestor_mname" class="requestor_mname" id="requestor_mname_child1"
                            placeholder="Middle Name">
                        <input type="text" name="requestor_lname" class="requestor_lname" id="requestor_lname_child1"
                            placeholder="Last Name" required>
                        <input type="text" name="requestor_suffix" class="requestor_suffix" id="requestor_suffix_child1"
                            placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-for-child">
                    <label for="fatherName">Father Name:</label>
                    <div class="label111">
                        <input type="text" name="father_fname" class="father_fname" id="father_fname_child1"
                            placeholder="First Name" required>
                        <input type="text" name="father_mname" class="father_mname" id="father_mname_child1"
                            placeholder="Middle Name">
                        <input type="text" name="father_lname" class="father_lname" id="father_lname_child1"
                            placeholder="Last Name" required>
                        <input type="text" name="father_suffix" class="father_suffix" id="father_suffix_child1"
                            placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-for-child">
                    <label for="motherName">Mother Name:</label>
                    <div class="label111">
                        <input type="text" name="mother_fname" class="mother_fname" id="mother_fname_child1"
                            placeholder="First Name" required>
                        <input type="text" name="mother_mname" class="mother_mname" id="mother_mname_child1"
                            placeholder="Middle Name">
                        <input type="text" name="mother_lname" class="mother_lname" id="mother_lname_child1"
                            placeholder="Last Name" required>
                        <input type="text" name="mother_suffix" class="mother_suffix id=" mother_suffix_child1"
                            placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-for-child">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob_child1" name="dob" class="dob" required>
                </div>
                <div class="input-lbr-for-child">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" class="house_no" id="house_no_child1" placeholder="Houseno.">
                        <input type="text" name="street" class="street" id="street_child1" placeholder="Street name" required>
                        <input type="text" name="subdivision" class="subdivision" id="subdivision_child1"
                            placeholder="Subdivision name">
                    </div>
                </div>
            </div>
            <input type="hidden" name="documentFor" value="Children">
            <input type="hidden" name="id" class="certOFlbr_id">
            <input type="hidden" name="date_requested" class="ate_requested">
            <input type="submit" id="submit" value="Request">
        </form>
    </div>




    <script src="./js/jQuery-3.7.0.js"></script>
    <script src="./js/app.js"></script>
    <script>
    document.querySelectorAll('.form-allCert').forEach(function(form) {
        form.querySelector('select[name="status"]').addEventListener('change', function() {
            // Trigger form submission when an option is selected
            form.submit();
        });
    });
    const addlbrLinkSelf = document.getElementById('addlbr_forself');
    const modaladdlbrSelf = document.querySelector('.modal-addlbr_forself');
    const closeFormSelf = document.querySelector('.closeForm_forself');

    addlbrLinkSelf.addEventListener('click', function(event) {
        event.preventDefault();
        modaladdlbrSelf.style.display = 'block';
    });

    closeFormSelf.addEventListener('click', function() {
        modaladdlbrSelf.style.display = 'none';
    });

    const addlbrLinkParent = document.getElementById('addlbr_forsingleparent');
    const modaladdlbrParent = document.querySelector('.modal-addlbr_forsingleparent');
    const closeFormParent = document.querySelector('.closeForm_forsingleparent');

    addlbrLinkParent.addEventListener('click', function(event) {
        event.preventDefault();
        modaladdlbrParent.style.display = 'block';
    });

    closeFormParent.addEventListener('click', function() {
        modaladdlbrParent.style.display = 'none';
    });

    const addlbrLinkChild = document.getElementById('addlbr_fortheirchild');
    const modaladdlbrChild = document.querySelector('.modal-addlbr_fortheirchild');
    const closeFormChild = document.querySelector('.closeForm_fortheirchild');

    addlbrLinkChild.addEventListener('click', function(event) {
        event.preventDefault();
        modaladdlbrChild.style.display = 'block';
    });

    closeFormChild.addEventListener('click', function() {
        modaladdlbrChild.style.display = 'none';
    });


    //EDIT
    const editlbrLinkSelf = document.querySelectorAll('.editlbr_forself');
    const modaleditlbrSelf = document.querySelector('.modal-editlbr_forself');
    const closeFormSelf1 = document.querySelector('.closeForm_forself1');

    editlbrLinkSelf.forEach(edit => {
        edit.addEventListener('click', function(event) {
            event.preventDefault();
            modaleditlbrSelf.style.display = 'block';
        });

        closeFormSelf1.addEventListener('click', function() {
            modaleditlbrSelf.style.display = 'none';
        });
    })

    const editlbrLinkParent = document.querySelectorAll('.editlbr_forsingleparent');
    const modaleditlbrParent = document.querySelector('.modal-editlbr_forsingleparent');
    const closeFormParent1 = document.querySelector('.closeForm_forsingleparent1');

    editlbrLinkParent.forEach(edit => {
        edit.addEventListener('click', function(event) {
            event.preventDefault();
            modaleditlbrParent.style.display = 'block';
        });

        closeFormParent1.addEventListener('click', function() {
            modaleditlbrParent.style.display = 'none';
        });
    })

    const editlbrLinkChild = document.querySelectorAll('.editlbr_fortheirchild');
    const modaleditlbrChild = document.querySelector('.modal-editlbr_fortheirchild');
    const closeFormChild1 = document.querySelector('.closeForm_fortheirchild1');

    editlbrLinkChild.forEach(edit => {
        edit.addEventListener('click', function(event) {
            event.preventDefault();
            modaleditlbrChild.style.display = 'block';
        });

        closeFormChild1.addEventListener('click', function() {
            modaleditlbrChild.style.display = 'none';
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

</script>

<script>
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
document.getElementById('prevBtn').addEventListener('click', (event) => {
    event.preventDefault(); // Prevent form submission
    if (currentPage > 1) {
        currentPage--;
        showRows(currentPage);
        updatePaginationButtons();
    }
});

// Next button click event
document.getElementById('nextBtn').addEventListener('click', (event) => {
    event.preventDefault(); // Prevent form submission
    if (currentPage < Math.ceil(totalRows / rowsPerPage)) {
        currentPage++;
        showRows(currentPage);
        updatePaginationButtons();
    }
});
</script>