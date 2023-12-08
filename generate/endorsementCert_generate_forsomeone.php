<?php include '../server/server.php' ?>
<?php
    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_ecertificate WHERE `id`='$id'";
    $result = $conn->query($query);
    $ecertificate = $result->fetch_assoc();

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Endorsement Certificate For Someone</title>
    <link rel="stylesheet" href="../style/generateCert.css ">
    <script src="sidebar1.js "></script>

</head>

<body>
    <?php include '../model/fetch_brgy_role.php' ?>
    <?php include '../actives/active_restore.php' ?>
    <?php include '../actives/active_account.php' ?>
    <?php include 'sidebar1.php' ?>

    <div class="printing-container-endorsement">
        <div class="title-cont">
            <p>Generate Endorsement Certificate For Someone</p>
            <a href="#">Logout</a>
        </div>

        <a href="../endorsmentCert.php" class="backContainer">
            <img src="../iconsBackend/back.png" alt="">
            <p>Go Back</p>
        </a>

        <div class="print-title">
            <p>Endorsement Certificate</p>
            <div class="left-title">
                <button type="button" id="edit"
                   onclick="editEndorsementCert(this)"
                    data-id="<?= $ecertificate['id']?>"
                    data-applicant_fname="<?= $ecertificate['applicant_fname']?>"
                    data-applicant_mname="<?= $ecertificate['applicant_mname']?>"
                    data-applicant_lname="<?= $ecertificate['applicant_lname']?>"
                    data-applicant_suffix="<?= $ecertificate['applicant_suffix']?>"
                    data-requestor_fname="<?= $ecertificate['requestor_fname']?>"
                    data-requestor_mname="<?= $ecertificate['requestor_mname']?>"
                    data-requestor_lname="<?= $ecertificate['requestor_lname']?>"
                    data-requestor_suffix="<?= $ecertificate['requestor_suffix']?>" 
                    data-house_no="<?= $ecertificate['house_no']?>"
                    data-street="<?= $ecertificate['street']?>" data-subdivision="<?= $ecertificate['subdivision']?>"
                    data-purpose="<?= $ecertificate['purpose']?>"
                    data-documentFor="<?= $ecertificate['documentFor']?>"
                    data-date_requested="<?= $ecertificate['date_requested']?>"
                    data-status="<?= $ecertificate['status']?>"
                    data-seen="<?= $ecertificate['seen']?>"
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

                <div class="body-container" style="  width: 100%;
         height: auto;">
                    <div class="title-body" style=" margin-top: 20px;
          display: flex;
          justify-content: center;
          color: #000;
          font-family: Caladea;
          font-size: 18px;
          font-style: normal;
          font-weight: 700;
          line-height: normal;">ENDORSEMENT</div>

                    <p class="to" style="  color: #000;
          font-family: Caladea;
          font-size: 18px;
          font-style: normal;
          font-weight: 400;
          line-height: normal;
          
          margin-left: 60px;
          margin-top: 30px;">To: <span style="  color: #000;
            font-family: Caladea;
            font-size: 18px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;">Juanito Victor “Jonvic” Remulla Jr.</span></p>
                    <p class="governor" style=" color: #000;
          font-family: Caladea;
          font-size: 16px;
          font-style: normal;
          font-weight: 400;
          line-height: normal;
     
          margin-left: 85px;">Governor - Cavite</p>

                    <p class="greet" style="color: #000;
          font-family: Caladea;
          font-size: 20px;
          font-style: normal;
          font-weight: 400;
          line-height: normal;
           
          margin-top: 50px;
          margin-left: 105px;">Good Day!</p>

                    <p class="first-p" style="text-indent: 50px;
          color: #000;
          font-family: Caladea;
          font-size: 20px;
          font-style: normal;
          font-weight: 400;
          line-height: normal;
          
          margin-top: 30px;
          margin-left: 85px;"><span>I am here to endorse <input type="text"
                                value="<?php echo $ecertificate['requestor_fname']. ' ' .$ecertificate['requestor_mname']. ' ' .$ecertificate['requestor_lname'] ?>"
                                id="name" placeholder="NAME OF REQUESTOR" required style=" color: #000;
            font-family: Caladea;
            font-size: 20px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;

            border: none;
            border-bottom: 1px solid black;
            width: 200px;">.He / She is a <br></span>
                        bonafide residents of <input type="text"
                            value="<?php echo $ecertificate['house_no']. " ". $ecertificate['street']. " ". $ecertificate['subdivision'] ?>"
                            id="address" placeholder="ADDRESS" required style=" color: #000;
            font-family: Caladea;
            font-size: 20px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;

            border: none;
            border-bottom: 1px solid black;
            width: 200px;">., Brgy. Zone IV, Dasmarinas <br>
                        City, Cavite.</p>

                    <p class="second-p" style="  text-indent: 50px;
          color: #000;
          font-family: Caladea;
          font-size: 20px;
          font-style: normal;
          font-weight: 400;
          line-height: normal;
          
          margin-top: 30px;
          margin-left: 85px;"><span>He is personally known to undersigned to be a person of
                            good <br> </span> moral character, law abiding citizen and well-rounded
                        person.</p>

                    <p class="third-p" style=" text-indent: 50px;
          color: #000;
          font-family: Caladea;
          font-size: 20px;
          font-style: normal;
          font-weight: 400;
          line-height: normal;
          
          margin-top: 30px;
          margin-left: 85px;"><span>In this regard, I would like to endorse (him/her) to your office for
                        </span><br><input type="text" value="<?php echo $ecertificate['purpose'] ?>" id="purpose"
                            placeholder="PURPOSE" required style=" color: #000;
           font-family: Caladea;
           font-size: 20px;
           font-style: normal;
           font-weight: 400;
           line-height: normal;

           border: none;
           border-bottom: 1px solid black;
           width: 200px;">
                        of (his/her) brother, <input type="text"
                            value="<?php echo $ecertificate['applicant_fname']. ' ' .$ecertificate['applicant_mname']. ' ' .$ecertificate['applicant_lname']?>"
                            id="name1" placeholder="NAME OF APPLICANT" style=" color: #000;
           font-family: Caladea;
           font-size: 20px;
           font-style: normal;
           font-weight: 400;
           line-height: normal;

           border: none;
           border-bottom: 1px solid black;
           width: 200px;">.</p>

                    <div class="date-time" id="date-time" style="color: #000;
          font-family: Caladea;
          font-size: 20px;
          font-style: normal;
          font-weight: 400;
          line-height: normal;
          
          margin-top: 40px;
          margin-left: 105px;"></div>

                    <p class="ending-p" style="color: #000;
          font-family: Caladea;
          font-size: 20px;
          font-style: normal;
          font-weight: 400;
          line-height: normal;
          
          margin-top: 40px;
          margin-left: 105px;">Thank you and more power!</p>

                    <p class="from" style=" color: #000;
          font-family: Caladea;
          font-size: 17px;
          font-style: normal;
          font-weight: 400;
          line-height: normal;

          margin-top: 30px;
          margin-left: 450px;">Respectfully yours,</p>
                    <p class="captain-name" style=" color: #000;
          font-family: Caladea;
          font-size: 17px;
          font-style: normal;
          font-weight: 400;
          line-height: normal;

          margin-top: 30px;
          margin-left: 450px;"><span style="  color: #000;
            font-family: Caladea;
            font-size: 20px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
  
            margin-top: 30px;">MEDARDO P. HAYAG<br></span>
                        Punong Barangay</p>
                </div>

                <div class="watermark-cont" style="position: relative;
         margin-top: -580px;
         margin-left: 140px;">
                    <img src="../image/watermarklogo.png" alt="" style="position: absolute;
          top: 0;
          left: 0;
          pointer-events: none;">
                </div>
            </form>
        </div>
    </div>

     <!-- EDIT MODAL SOMEONE -->
     <div class="modal-editEcert_forsomeone">
        <form class="formEcert_forsomeone" action="../model/edit_certificates/edit_endorsementCert.php" method="post">
            <div class="title-cont-modal">
                <p>Resident Information</p>
                <img src="../iconsBackend/close 1.png" class="closeForm_forsomeone1" alt="">
            </div>

            <div class="modal-layer-endorsement-someone">
                <div class="input-e-someone">
                    <label for="applicantName">Applicant:</label>
                    <div class="label111">
                        <input type="text" name="applicant_fname" id="applicant_fname_someone1" class="applicant_fname"
                            placeholder="First Name">
                        <input type="text" name="applicant_mname" id="applicant_mname_someone1" class="applicant_mname"
                            placeholder="Middle Name">
                        <input type="text" name="applicant_lname" id="applicant_lname_someone1" class="applicant_lname"
                            placeholder="Last Name">
                        <input type="text" name="applicant_suffix" id="applicant_suffix_someone1"
                            class="applicant_suffix" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-e-someone">
                    <label for="requestorName">Requestor:</label>
                    <div class="label111">
                        <input type="text" name="requestor_fname" id="requestor_fname_someone1" class="requestor_fname"
                            placeholder="First Name">
                        <input type="text" name="requestor_mname" id="requestor_mname_someone1" class="requestor_mname"
                            placeholder="Middle Name">
                        <input type="text" name="requestor_lname" id="requestor_lname_someone1" class="requestor_lname"
                            placeholder="Last Name">
                        <input type="text" name="requestor_suffix" id="requestor_suffix_someone1"
                            class="requestor_suffix" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-e-someone">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" id="house_no_someone1" class="house_no"
                            placeholder="Houseno.">
                        <input type="text" name="street" id="street_someone1" class="street" placeholder="Street name">
                        <input type="text" name="subdivision" id="subdivision_someone1" class="subdivision"
                            placeholder="Subdivision name">
                    </div>
                </div>
                <div class="input-e-someone">
                    <label for="purpose">Purpose:</label>
                    <input type="text" name="purpose" id="purpose_someone1" class="purpose">
                </div>
            </div>
            <input type="hidden" name="id" class="endorsementCert_id">
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
    dateTimeElement.innerHTML = `Issued this ${day}${daySuffix} day of ${month}, ${year}`;
}

// Call the updateDate function to set the content initially
updateDate();
</script>

<script>
    const editLink = document.getElementById('edit');
    const modaleditLink = document.querySelector('.modal-editEcert_forsomeone');
    const closeForm = document.querySelector('.closeForm_forsomeone1');

    editLink.addEventListener('click', function(event) {
        event.preventDefault();
        modaleditLink.style.display = 'block';
    });

    closeForm.addEventListener('click', function() {
        modaleditLink.style.display = 'none';
    });
</script>