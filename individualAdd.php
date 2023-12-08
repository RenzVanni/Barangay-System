<?php include './server/server.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Residents</title>
    <link rel="stylesheet" href="style3.css ">
    <link rel="stylesheet" href="style4.css ">
    <link rel="stylesheet" href="sidenav.css ">
    <link rel="stylesheet" href="./style/generateCert.css">
    <script src="sidebar.js "></script>

</head>

<body>

    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/import_residents.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include './sidebar.php' ?>


    <div class="home_residents">
        <div class="first_layer">
            <p>INDIVIDUAL RECORD OF BARANGAY INHABITANTS</p>
            <a href="#">Logout</a>
        </div>
        <a href="residentInfo.php" class="backContainer">
            <img src="iconsBackend/back.png" alt="">
            <p>Go Back</p>
        </a>

        <form action="./model/add_individual.php" method="post">
            <div class="table-wrapper">
                <table class="addResidentsTable">
                    <thead>
                        <tr>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Ext.</th>
                            <th>Date of Birth</th>
                            <th>Place of Birth</th>
                            <th>Sex</th>
                            <th>Civil Status</th>
                            <th>Citizenship</th>
                            <th>Occupational</th>
                            <th>No.</th>
                            <th>St. Name</th>
                            <th>Name of Subdivision</th>
                            <th class="houseTitle">Household No.</th>
                            <th>Email</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="lastname" oninput="this.value = this.value.toUpperCase()"
                                    required></td>
                            <td><input type="text" name="firstname" oninput="this.value = this.value.toUpperCase()"
                                    required></td>
                            <td><input type="text" name="middlename" oninput="this.value = this.value.toUpperCase()"
                                    required></td>
                            <td><input type="text" name="ext" oninput="this.value = this.value.toUpperCase()"></td>

                            <td><input type="date" name="dob" oninput="this.value = this.value.toUpperCase()" required>
                            </td>
                            <td><input type="text" name="place-of-birth"
                                    oninput="this.value = this.value.toUpperCase()"></td>

                            <td><select name="sex" class="sex111" required>
                                    <option value=""></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </td>
                            <td>
                                <select name="civil-status" class="civilStatus111" required>
                                    <option value=""></option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                            </td>
                            <td><input type="text" name="citizenship" oninput="this.value = this.value.toUpperCase()"
                                    required></td>
                            <td><input type="text" name="occupation" oninput="this.value = this.value.toUpperCase()"
                                    required></td>
                            <td><input type="text" name="house-no" oninput="this.value = this.value.toUpperCase()"></td>
                            <td><input type="text" name="street" oninput="this.value = this.value.toUpperCase()"
                                    required></td>
                            <td><input type="text" name="subdivision" oninput="this.value = this.value.toUpperCase()">
                            </td>
                            <td><input type="text" name="household-no" oninput="this.value = this.value.toUpperCase()">
                            </td>
                            <td><input type="email" name="email" id=""></td>
                            <td>
                                <div class="DeleteBtn" onclick="ClearRow(this)">Clear</div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="submitHouseholdCont">
                <button type="submit" class="submitHousehold">Create</button>
            </div>
        </form>
    </div>

</body>

</html>

<script>
function ClearRow(button) {
    // Find the row containing the clicked button
    var row = button.parentNode.parentNode;

    // Get all input elements within that row
    var inputs = row.querySelectorAll('input, select');

    // Loop through the input elements and clear their values
    inputs.forEach(function(input) {
        if (input.type === 'text' || input.type === 'date' || input.type === 'select-one') {
            input.value = '';
        }
    });
}
</script>