<?php include '../server/server.php' ?>
<?php
    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_certoflbr WHERE `id`='$id'";
    $result = $conn->query($query);
    $certOfLBR = $result->fetch_assoc();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Certificate of Late Birth Registration For Single Parent</title>
    <link rel="stylesheet" href="../style/generateCert.css">
    <script src="sidebar1.js "></script>
</head>

<body>
    <?php include '../model/fetch_brgy_role.php' ?>
    <?php include '../actives/active_restore.php' ?>
    <?php include '../actives/active_account.php' ?>
    <?php include 'sidebar1.php' ?>

    <div class="printing-container-lbr">
        <div class="title-cont">
            <p>Generate Certificate of Late Birth Registration For Single Parent</p>
            
        </div>

        <a href="../certOfLBR.php" class="backContainer">
            <img src="../iconsBackend/back.png" alt="">
            <p>Go Back To LBR Records</p>
        </a>

        <div class="print-title">
            <p>Certificate of Late Birth Registration</p>
            <div class="left-title">
                <button type="button" id="edit" 
                    onclick="certOfLbr(this)"
                    data-id="<?= $certOfLBR['id']?>"
                    data-requestor_fname="<?= $certOfLBR['requestor_fname']?>"
                    data-requestor_mname="<?= $certOfLBR['requestor_mname']?>"
                    data-requestor_lname="<?= $certOfLBR['requestor_lname']?>"
                    data-requestor_suffix="<?= $certOfLBR['requestor_suffix']?>" 
                    data-parent_fname="<?= $certOfLBR['parent_fname']?>"
                    data-parent_mname="<?= $certOfLBR['parent_mname']?>"
                    data-parent_lname="<?= $certOfLBR['parent_lname']?>"
                    data-parent_suffix="<?= $certOfLBR['parent_suffix']?>"
                    data-house_no="<?= $certOfLBR['house_no']?>"
                    data-street="<?= $certOfLBR['street']?>" data-subdivision="<?= $certOfLBR['subdivision']?>"
                    data-documentFor="<?= $certOfLBR['documentFor']?>"
                    data-date_of_birth="<?= $certOfLBR['date_of_birth']?>"
                    data-date_requested="<?= $certOfLBR['date_requested']?>"
                    data-status="<?= $certOfLBR['status']?>"
                    data-seen="<?= $certOfLBR['seen']?>"
                >Edit</button>
                
                <a href="#" id="print" onclick="printDiv('printMe')">Print</a>
            </div>
        </div>

        <div class="form-container" id="printMe">
            <form action="#" class="paper">

                <div class="header-cont" style="display: flex;
                flex-direction: row;
                justify-content: space-between;
                width: 100%;
                height: 133px;">
                    <img class="left" src="../image/barangaylogo.png" alt="" style=" width: 118.677px;
                    height: 132.677px;
          
                    margin-left: 10px;
                    margin-top: 10px;">

                    <div class="center-head" style="display: flex;
                    justify-content: center;
                    flex-direction: column;
                    align-items: center;
                    text-align: center;">
                        <p class="first" style="  color: #000;
                        text-align: center;
                        font-family: Caladea;
                        font-size: 12px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;">Republic of the Phippines
                            <br>
                            Province of Cavite
                            <br>
                            City of Dasmarinas
                        </p>
                        <p class="second" style=" color: #000;
                        font-family: Caladea;
                        font-size: 23px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;">
                            <span style=" color: #00AF50;
                            text-align: center;
                            font-family: Caladea;
                            font-size: 30px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;">BARANGAY ZONE IV</span><br>
                            OFFICE OF SANGGUIANG BARANGAY
                        </p>
                        <p class="third" style="  color: #000;
                        text-align: center;
                        font-family: Caladea;
                        font-size: 13px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;">Tel. No. (046) 471-1247</p>
                    </div>

                    <img class="right" src="../image/dasmaLogoPrint.png" alt="" style=" width: 115.677px;
                    height: 125.677px;
                    
                    margin-top: 10px;
                    margin-right: 10px;">
                </div>

                <div class="lines" style="border-bottom:1px solid black"></div>

                <div class="body-container-lbr" style="width: 100%;
                height: auto;">
                    <div class="title-body" style="  margin-top: 20px;
                    display: flex;
                    justify-content: center;
                    color: #000;
                    font-family: Caladea;
                    font-size: 16px;
                    font-style: normal;
                    font-weight: 700;
                    line-height: normal;">CERTIFICATE OF LATE BIRTH REGISTRATION</div>

                    <p class="to" style="color: #000;
                    font-family: Caladea;
                    font-size: 16px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                    
                    margin-left: 70px;
                    margin-top: 30px;">City Civil Registration</p>
                    <p class="governor" style="color: #000;
                    font-family: Caladea;
                    font-size: 15px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
               
                    margin-left: 70px;">City of Dasmarinas, Cavite</p>

                    <p class="greet" style=" color: #000;
                    font-family: Caladea;
                    font-size: 16px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                     
                    margin-top: 50px;
                    margin-left: 70px;">THIS IS TO CERTIFY THAT:</p>

                    <p class="first-p" style=" color: #000;
                    font-family: Caladea;
                    font-size: 16px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                    padding-right: 80px;
                    
                    margin-top: 30px;
                    margin-left: 70px;">1.
                        <input type="text"
                            value="<?php echo $certOfLBR['requestor_fname']. ' ' .$certOfLBR['requestor_mname']. ' ' .$certOfLBR['requestor_lname'] ?>"
                            id="nameRequest" placeholder="NAME OF REQUESTING LATE BIRTH" style="color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: 20px;
                        border: none;
                        border-bottom: 1px solid black;
                        width: auto;">
                        is the child/one of the children of
                        <input type="text"
                            value="<?php echo $certOfLBR['parent_fname']. ' ' .$certOfLBR['parent_mname']. ' ' .$certOfLBR['parent_lname'] ?>"
                            id="nameParent" placeholder="NAME OF PARENT" style="color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: 20px;
                        border: none;
                        border-bottom: 1px solid black;
                        width: auto;">
                        and
                        <input type="text" id="noData" value="Father/Mother (No Data Available)" style="color: #000;
                        font-family: Caladea;
                        font-size: 13px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 203px;">, who was born on
                        <input type="text" id="dob" value="
<?php echo $certOfLBR['date_of_birth']
?>
                        " placeholder="DATE OF BIRTH" style="color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        border: none;
                        border-bottom: 1px solid black;
                        width: auto;">
                        at <span style="color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;">City of Dasmarinas, Cavite.</span>
                    </p>

                    <p class="second-p" style=" color: #000;
                    font-family: Caladea;
                    font-size: 16px;;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                    padding-right: 80px;
                    
                    margin-top: 30px;
                    margin-left: 70px;">
                        2. The birth of
                        <input type="text"
                            value="<?php echo $certOfLBR['requestor_fname']. ' ' .$certOfLBR['requestor_mname']. ' ' .$certOfLBR['requestor_lname']?>"
                            id="nameRequest1" placeholder="NAME OF REQUESTING LATE BIRTH" style="color: #000;
                            font-family: Caladea;
                            font-size: 16px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            border: none;
                            border-bottom: 1px solid black;
                            width: auto;">,
                        was attended by Midwife/Traditional hilot who was from Brgy. Zone IV, City of
                        Dasmarinas Cavite.
                    </p>

                    <p class="third-p" style=" color: #000;
                    font-family: Caladea;
                    font-size: 16px;;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                    padding-right: 80px;
                    
                    margin-top: 30px;
                    margin-left: 70px;">
                        3. I know the date and place of birth of
                        <input type="text"
                            value="<?php echo $certOfLBR['requestor_fname']. ' ' .$certOfLBR['requestor_mname']. ' ' .$certOfLBR['requestor_lname'] ?>"
                            id="nameRequest2" placeholder="NAME OF REQUESTING LATE BIRTH" style="color: #000;
                            font-family: Caladea;
                            font-size: 16px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            border: none;
                            border-bottom: 1px solid black;
                            width: auto;">
                        as well as his/her parentage and citizenship because the spouses,
                        <input type="text"
                            value="<?php echo $certOfLBR['parent_fname']. ' ' .$certOfLBR['parent_mname']. ' ' .$certOfLBR['parent_lname']?>"
                            id="nameParent1" placeholder="NAME OF PARENT" style="color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: 20px;
                        border: none;
                        border-bottom: 1px solid black;
                        width: auto;">
                        and
                        <input type="text" id="noData" value="Father/Mother (No Data Available)" style="color: #000;
                        font-family: Caladea;
                        font-size: 13px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        border: none;
                        border-bottom: 1px solid black;
                        width: 203px;">
                        are personally known to me and residing of
                        <input type="text"
                            value="<?php echo $certOfLBR['house_no']. " ". $certOfLBR['street']. " ". $certOfLBR['subdivision']?>"
                            id="address" placeholder="ADDRESS" style="color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: 20px;
                        border: none;
                        border-bottom: 1px solid black;
                        width: auto;">, Zone IV, City of Dasmarinas, Cavite.
                    </p>

                    <p class="fourth-p" style=" color: #000;
                    font-family: Caladea;
                    font-size: 16px;;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                    padding-right: 80px;
                    
                    margin-top: 30px;
                    margin-left: 70px;">This certification is being issued to the request of
                        <input type="text"
                            value="<?php echo $certOfLBR['parent_fname']. ' ' .$certOfLBR['parent_mname']. ' ' .$certOfLBR['parent_lname']?>"
                            id="nameParent2" placeholder="NAME OF PARENT" style="color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        border: none;
                        border-bottom: 1px solid black;
                        width: auto;">
                        in order to certify the birth of
                        <input type="text" value="<?php echo $certOfLBR['requestor_fname']. ' ' .$certOfLBR['requestor_mname']. ' ' .$certOfLBR['requestor_lname'] 
 ?>" id="nameRequest3" placeholder="NAME OF REQUESTING LATE BIRTH" style="color: #000;
                            font-family: Caladea;
                            font-size: 16px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: 20px;
                            border: none;
                            border-bottom: 1px solid black;
                            width: auto;">
                        and in order to give effect to the delayed registration of his/her birth on the
                        Office of City Civil Registrar of City of Dasmarinas, Cavite.
                    </p>

                    <div class="date-time" id="date-time" style=" color: #000;
                    font-family: Caladea;
                    font-size: 16px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                    
                    margin-top: 40px;
                    margin-left: 100px;"></div>

                    <p class="captain-name" style="color: #000;
                    font-family: Caladea;
                    font-size: 15px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
        
                    margin-top: 30px;
                    margin-left: 450px;">
                        <span style="color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
              
                        margin-top: 30px;">MEDARDO P. HAYAG<br></span>
                        Punong Barangay
                    </p>
                </div>

                <div class="watermark-cont" style="position: relative;
                margin-top: -580px;
                margin-left: 140px;">
                    <img src="../image/watermarklogo.png" alt="" style=" position: absolute;
                    top: 0;
                    left: 0;
                    pointer-events: none;">
                </div>
            </form>
        </div>
    </div>

     <!-- EDIT MODAL PARENT -->
     <div class="modal-editlbr_forsingleparent">
        <form class="formlbr_forsingleparent" action="../model/edit_certificates/edit_certOfLbr.php" method="post">
            <div class="title-cont-modal">
                <p>Resident Information</p>
                <img src="../iconsBackend/close 1.png" class="closeForm_forsingleparent1" alt="">
            </div>

            <div class="modal-layer-lbr-single-parent">
                <div class="input-lbr-single-parent">
                    <label for="requestorName">Requestor:</label>
                    <div class="label111">
                        <input type="text" name="requestor_fname" class="requestor_fname" id="requestor_fname_parent1"
                            placeholder="First Name">
                        <input type="text" name="requestor_mname" class="requestor_mname" id="requestor_mname_parent1"
                            placeholder="Middle Name">
                        <input type="text" name="requestor_lname" class="requestor_lname" id="requestor_lname_parent1"
                            placeholder="Last Name">
                        <input type="text" name="requestor_suffix" class="requestor_suffix"
                            id="requestor_suffix_parent1" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-lbr-single-parent">
                    <label for="parentName">Parent Name:</label>
                    <div class="label111">
                        <input type="text" name="parent_fname" class="parent_fname" id="parent_fname_parent1"
                            placeholder="First Name">
                        <input type="text" name="parent_mname" class="parent_mname" id="parent_mname_parent1"
                            placeholder="Middle Name">
                        <input type="text" name="parent_lname" class="parent_lname" id="parent_lname_parent1"
                            placeholder="Last Name">
                        <input type="text" name="parent_suffix" class="parent_suffix" id="parent_suffix_parent1"
                            placeholder="Suffix">
                    </div>
                </div>
                
                <div class="input-lbr-single-parent">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" class="house_no" id="house_no_parent1"
                            placeholder="Houseno.">
                        <input type="text" name="street" class="street" id="street_parent1" placeholder="Street name">
                        <input type="text" name="subdivision" class="subdivision" id="subdivision_parent1"
                            placeholder="Subdivision name">
                    </div>
                </div>
                <div class="input-lbr-single-parent">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob_parent1" name="dob" class="dob">
                </div>
            </div>
            <input type="hidden" name="id" class="certOFlbr_id">
            <input type="hidden" name="documentFor" class="documentFor">
            <input type="hidden" name="status" class="status">
            <input type="hidden" name="seen" class="seen">
            <input type="submit" id="submit" value="Save">
        </form>
    </div>

    <script src="../js//jQuery-3.7.0.js"></script>
    <script src="../js//app.js"></script>

    <script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;

    }
    </script>
</body>

</html>

<script>
// Function to get the day suffix (e.g., 1st, 2nd, 3rd, 4th, etc.)
function getDaySuffix(day) {
    if (day >= 11 && day <= 13) {
        return "th";
    }
    switch (day % 10) {
        case 1:
            return "st";
        case 2:
            return "nd";
        case 3:
            return "rd";
        default:
            return "th";
    }
}

// Function to update date
function updateDate() {
    const now = new Date();
    const day = now.getDate();
    const month = now.toLocaleString("en-US", {
        month: "long"
    });
    const year = now.getFullYear();

    // Get the day suffix
    const daySuffix = getDaySuffix(day);

    // Update the content of the element with id "date-time"
    const dateTimeElement = document.getElementById("date-time");
    dateTimeElement.innerHTML = `Issued this <span style="color: #000;
            font-family: Caladea;
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;"> ${day}${daySuffix} day of ${month}, ${year} </span>`;
}

// Call the updateDate function to set the content initially
updateDate();
</script>

<script>
    const editLink = document.getElementById('edit');
    const modaleditLink = document.querySelector('.modal-editlbr_forsingleparent');
    const closeForm = document.querySelector('.closeForm_forsingleparent1');

    editLink.addEventListener('click', function(event) {
        event.preventDefault();
        modaleditLink.style.display = 'block';
    });

    closeForm.addEventListener('click', function() {
        modaleditLink.style.display = 'none';
    });
</script>