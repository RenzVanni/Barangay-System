<?php include './server/server.php'?>
<?php
$id = $_GET['id'];
$query =  "SELECT * FROM tbl_business WHERE id='$id'";
$result = $conn->query($query);
$business = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Businesst</title>
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
            <p>Business List of <span id="currentYear"></span></p>
            
        </div>
        <a href="business.php" class="backContainer">
            <img src="iconsBackend/back.png" alt="">
            <p>Go Back</p>
        </a>

        <form action="./model/edit_business.php" method="post" class="formAddBusiness">
            <div class="BusinessCont">
                <div class="businessHeader">
                    <p>Business Registration</p>
                </div>
                <div class="businessBody">
                    <div class="left_cont">
                        <label for="taxPayer_name">Taxpayer Name</label>
                        <div class="input_business">
                            <input type="text" name="taxPayer_lname" value="<?= $business['taxpayer_lname'] ?>" id="taxPayer_lname" placeholder="Last Name"
                                required>
                            <input type="text" name="taxPayer_fname" value="<?= $business['taxpayer_fname'] ?>" id="taxPayer_fname" placeholder="First Name"
                                required>
                            <input type="text" name="taxPayer_mname" value="<?= $business['taxpayer_mname'] ?>" id="taxPayer_mname" placeholder="Middle Name">
                            <input type="text" name="taxPayer_suffix" value="<?= $business['taxpayer_suffix'] ?>" id="taxPayer_suffix" placeholder="Suffix">
                        </div>
                        <label for="taxPayer_name">Location</label>
                        <div class="input_business">
                            <input type="text" name="taxPayer_houseNo" value="<?= $business['house_no'] ?>" id="taxPayer_houseNo" placeholder="House no.">
                            <input type="text" name="taxPayer_street" value="<?= $business['street'] ?>" id="taxPayer_street" placeholder="Street Name"
                                required>
                            <input type="text" name="taxPayer_subdivision" value="<?= $business['subdivision'] ?>" id="taxPayer_subdivision"
                                placeholder="Subdivision Name">
                        </div>
                        <label for="businessType">Business Type</label>
                        <div class="input_business">
                            <select name="businessType" value="<?= $business['business_type'] ?>" id="businessType" required>
                                <option value="">Select Type</option>
                                <option value="Food">Food</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="right_cont">
                        <label for="business_name">Business Name</label>
                        <div class="input_business">
                            <input type="text" name="business_name" value="<?= $business['business_name'] ?>" id="business_name" placeholder="Business Name"
                                required>
                        </div>


                        <label for="date">Start Date</label>
                        <div class="input_business" required>
                            <input type="date" id="date_started" value="<?= $business['business_started'] ?>" name="date_started">
                        </div>

                        <label for="businessStatus">Business Status</label>
                        <div class="input_business">
                            <select name="businessStatus" value="<?= $business['business_status'] ?>" id="businessStatus" required>
                                <option value="">Select Status</option>
                                <option value="New">New</option>
                                <option value="Renewal">Renewal</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="id" value="<?= $business['id'] ?>">
            <div class="submitBussinessCont">
                <button type="submit" class="">Create</button>
            </div>

        </form>


    </div>

</body>

</html>
<script>
// Function to update the current year
function updateYear() {
    const currentYear = new Date().getFullYear(); // Get the current year
    const yearElement = document.getElementById("currentYear"); // Get the element by ID
    yearElement.textContent = currentYear; // Set the text content to the current year
}

// Call the function to initially set the year
updateYear();

// Set up an interval to update the year every minute (adjust as needed)
setInterval(updateYear, 60000); // 60000 milliseconds = 1 minute

// Function to clear input fields in a row
function clearRow(button) {
    const row = button.closest('tr');
    const inputs = row.querySelectorAll('input');
    inputs.forEach(input => {
        input.value = ''; // Clear the input value
    });
}
</script>