<?php include '../server/server.php' ?>
<?php
    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_brgyclearance WHERE `id`='$id'";
    $result = $conn->query($query);
    $brgyclearance = $result->fetch_assoc();

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Barangay Clearance</title>
    <link rel="stylesheet" href="../style/generateCert.css ?<?php echo time(); ?>">
    <script src="sidebar1.js ?<?php echo time(); ?>"></script>
</head>

<body>
    <?php include '../model/fetch_brgy_role.php' ?>
    <?php include '../actives/active_restore.php' ?>
    <?php include '../actives/active_account.php' ?>
    <?php include 'sidebar1.php' ?>

    <div class="printing-container-brgyClearance">
        <div class="title-cont">
            <p>Generate Barangay Clearance</p>
            <a href="#">Logout</a>
        </div>

        <a href="../brgyClearance.php" class="backContainer">
            <img src="../icons/back.png" alt="">
            <p>Go Back</p>
        </a>

        <div class="print-title">
            <p>Barangay Clearance</p>
            <div class="left-title">
                <button type="button" id="edit" onclick="editBrgyClearance(this)"
                    data-id="<?= $brgyclearance['id']?>"
                    data-applicant_fname="<?= $brgyclearance['applicant_fname']?>"
                    data-applicant_mname="<?= $brgyclearance['applicant_mname']?>"
                    data-applicant_lname="<?= $brgyclearance['applicant_lname']?>"
                    data-applicant_suffix="<?= $brgyclearance['applicant_suffix']?>" data-house_no="<?= $brgyclearance['house_no']?>"
                    data-street="<?= $brgyclearance['street']?>" data-subdivision="<?= $brgyclearance['subdivision']?>"
                    data-pob="<?= $brgyclearance['place-of-birth']?>" data-dob="<?= $brgyclearance['date-of-birth']?>"
                    data-purpose="<?= $brgyclearance['purpose']?>"
                    data-date_requested="<?= $brgyclearance['date_requested']?>"
                    data-status="<?= $brgyclearance['status']?>"
                    data-seen="<?= $brgyclearance['seen']?>"
                >Edit</button>
                
                <a href="#" id="print" onclick="printDiv('printMe')">Print</a>
            </div>
        </div>

        <div class="form-container-brgyClearance" id="printMe">
            <form action="#" class="paper" style="border:1px solid black">

                <div class="header-cont" style="display: flex;  flex-direction: row;
                justify-content: space-between;  width: 100%;
                height: 133px;">
                    <img class="left" src="../image/barangaylogo.png" alt="" style="width: 118.677px;
                    height: 132.677px;
                    margin-left: 10px;
                    margin-top: 10px;">

                    <div class="center-head" style="display: flex;
                    justify-content: center;
                    flex-direction: column;
                    align-items: center;
                    text-align: center;">
                        <p class="first" style="color: #000;
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
                        <p class="second" style="color: #000;
                        font-family: Caladea;
                        font-size: 23px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;">
                            <span style="color: #00AF50;
                            text-align: center;
                            font-family: Caladea;
                            font-size: 30px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;">BARANGAY ZONE IV</span><br>
                            OFFICE OF SANGGUIANG BARANGAY
                        </p>
                        <p class="third" style=" color: #000;
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

                <div class="body-container" style="display: flex;
                flex-direction: row;
                width: 100%;
                height: auto;">
                    <div class="left-cont" style=" width: 30%;

                    display: flex;
                    flex-direction: column;
                    margin-left: 1px;
                    height: 832px;
                    padding-right: 40px;">
                        <div class="rectangle-cont" style=" position: relative;">
                            <img src="../image/Rectangle.png" alt="" style=" position: absolute;
                            top: 0;
                            left: 0;
                            pointer-events: none;
                            width: 222px;
                            height: 830px;
                            margin-top: 1px;">
                        </div>

                        <p class="b-captain" style="position: relative; display: flex; flex-direction: column;  justify-content: center;
                        align-items: center;
                        margin-top: 30px;
                        margin-left: 25px;">
                            <span style="color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;  ">MERCADO P. HAYAG</span>Punong Barangay
                        </p>
                        <p class="k-title" style="color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            align-items: flex-start;
                            margin-left: 10px;
                            margin-top: 30px;
                            position: relative;">KAGAWAD:</p>
                        <div class="left-name-cont" style="position: relative; display: flex;
                            flex-direction: column;
                            width: 100%;
                            color: #000;
                            font-family: Caladea;
                            font-size: 12px;
                            font-style: normal;
                            font-weight: 400;
                            line-height: normal;">
                            <p class="b-councilor" style=" margin-left: 10px;
                            margin-top: 15px;
                            display: flex;
                            flex-direction: column;">
                                <span style="color: #000;
                                font-family: Caladea;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal; ">JORGE P. CANTIMBUHAN</span>Committee on Peace & Order/Human
                                Rights
                            </p>
                            <p class="b-councilor" style=" margin-left: 10px;
                            margin-top: 15px;
                            display: flex;
                            flex-direction: column;">
                                <span style="color: #000;
                                font-family: Caladea;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal; ">ALEXANDER P. GENEVEO</span>Committee on Rules & Privileges
                            </p>
                            <p class="b-councilor" style=" margin-left: 10px;
                            margin-top: 15px;
                            display: flex;
                            flex-direction: column;">
                                <span style="color: #000;
                                font-family: Caladea;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal; ">EFREN F. LARA</span>Committee on Budget & Appropration
                            </p>
                            <p class="b-councilor" style=" margin-left: 10px;
                            margin-top: 15px;
                            display: flex;
                            flex-direction: column;">
                                <span style="color: #000;
                                font-family: Caladea;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal; ">IAN MARK S. MENDOZA</span>Committee on Health & Sanitation
                            </p>
                            <p class="b-councilor" style=" margin-left: 10px;
                            margin-top: 15px;
                            display: flex;
                            flex-direction: column;">
                                <span style="color: #000;
                                font-family: Caladea;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal; ">HONESTO P. GUYAMIN</span>Committee on Cooperatives/Livelihood
                            </p>
                            <p class="b-councilor" style=" margin-left: 10px;
                            margin-top: 15px;
                            display: flex;
                            flex-direction: column;">
                                <span style="color: #000;
                                font-family: Caladea;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal; ">LEO L. FERRER</span>Committee on Women & Family/Sports
                                Development
                            </p>
                            <p class="b-councilor" style=" margin-left: 10px;
                            margin-top: 15px;
                            display: flex;
                            flex-direction: column;">
                                <span style="color: #000;
                                font-family: Caladea;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal; ">RELLY Q. KALUGDAN</span>Committee on Infrastructure
                            </p>
                            <p class="b-councilor1" style=" margin-left: 10px;
                            margin-top: 35px;
                            display: flex;
                            flex-direction: column;">
                                <span style="color: #000;
                                font-family: Caladea;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal; ">FRANCES JANKEE T. LACSADO</span>Brgy. Treasurer
                            </p>
                            <p class="b-councilor1" style="margin-left: 10px;
                            margin-top: 35px;
                            display: flex;
                            flex-direction: column;">
                                <span style="color: #000;
                                font-family: Caladea;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal; ">JERIKA V. LARA</span>Brgy. Secretary
                            </p>
                            <p class="b-councilor1" style=" margin-left: 10px;
                            margin-top: 35px;
                            display: flex;
                            flex-direction: column;">
                                <span style="color: #000;
                                font-family: Caladea;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal; ">JERALD Y. CORPUZ</span>SK Chairperson
                            </p>
                        </div>
                    </div>

                    <div class="right-cont" style="width: 70%;
                    padding: 10px;">
                        <div class="title" style=" color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        text-decoration-line: underline;

                        display: flex;
                        justify-content: center;
                        align-items: center;
                        margin-top: 10px;">BARANGAY CLEARANCE</div>
                        <p class="greet" style=" color: #000;
                        font-family: Caladea;
                        font-size: 13px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;
                        margin-top: 15px;">To Whom It May Concern:</p>
                        <p class="certify" style=" text-indent: 50px;
                        color: #000;
                        font-family: Caladea;
                        font-size: 13px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: 20px;">This
                            is to certify that the person whose name, signature and right thumb mark print
                            appeared hereon, applied for clearance and has complied with the requirements
                            which have been verified by this office. Results of which are listed below:</p>

                        <div class="info" style="display: flex;
                        flex-direction: column;
                        margin-top: 30px;">
                            <p class="name" style="display: flex;
                            flex-direction: row;
                            color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            margin-bottom: 15px;
                            align-items: center;">NAME:
                                <input type="text"
                                    value="<?php echo $brgyclearance['applicant_fname']. " ". $brgyclearance['applicant_mname']. " ". $brgyclearance['applicant_lname']?>"
                                    id="name" required="required" style=" width: 300px;
                                margin-left: 110px;
                                border: none;
                                border-bottom: 1px solid black;
                                padding-left: 5px;
                                padding-right: 5px;

                                color: #000;
                                font-family: Caladea;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;">
                            </p>
                            <p class="address" style=" display: flex;
                            flex-direction: row;
                            color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            margin-bottom: 15px;
                            align-items: center;">ADDRESS:
                                <input type="text"
                                    value="<?php echo $brgyclearance['house_no']. " ". $brgyclearance['street']. " ". $brgyclearance['subdivision']?>"
                                    id="address" required="required" style="width: 300px;
                                margin-left: 90px;
                                border: none;
                                border-bottom: 1px solid black;
                                padding-left: 5px;
                                padding-right: 5px;

                                color: #000;
                                font-family: Caladea;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;">
                            </p>
                            <p class="dob" style=" display: flex;
                            flex-direction: row;
                            color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            margin-bottom: 15px;
                            align-items: center;">DATE OF BIRTH:
                                <input type="text" value="<?php echo $brgyclearance['date-of-birth']?>" id="dob"
                                    required="required" style=" width: 300px;
                                margin-left: 52px;
                                border: none;
                                border-bottom: 1px solid black;
                                padding-left: 5px;
                                padding-right: 5px;

                                color: #000;
                                font-family: Caladea;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;">
                            </p>
                            <p class="pob" style="  display: flex;
                            flex-direction: row;
                            color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            margin-bottom: 15px;
                            align-items: center;">PLACE OF BIRHT:
                                <input type="text" value="<?php echo $brgyclearance['place-of-birth']?>" id="pob"
                                    required="required" style=" width: 300px;
                                margin-left: 45px;
                                border: none;
                                border-bottom: 1px solid black;
                                padding-left: 5px;
                                padding-right: 5px;

                                color: #000;
                                font-family: Caladea;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;">
                            </p>
                            <p class="purpose" style="display: flex;
                            flex-direction: row;
                            color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            margin-bottom: 15px;
                            align-items: center;">PURPOSE:
                                <input type="text" value="<?php echo $brgyclearance['purpose']?>" id="purpose"
                                    required="required" style="width: 300px;
                                margin-left: 90px;
                                border: none;
                                border-bottom: 1px solid black;
                                padding-left: 5px;
                                padding-right: 5px;

                                color: #000;
                                font-family: Caladea;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;">
                            </p>
                            <p class="certNo" style="display: flex;
                            flex-direction: row;
                            color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            margin-bottom: 15px;
                            align-items: center;">RES. CERT. NO.:
                                <input type="text" id="certNo" required="required" style="width: 300px;
                                margin-left: 60px;
                                border: none;
                                border-bottom: 1px solid black;
                                padding-left: 5px;
                                padding-right: 5px;

                                color: #000;
                                font-family: Caladea;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;">
                            </p>
                            <p class="dateIssue" style="display: flex;
                            flex-direction: row;
                            color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            margin-bottom: 15px;
                            align-items: center;">DATE OF ISSUE:
                                <input type="text" value="<?php echo $brgyclearance['date_requested']?>" id="dateIssue"
                                    required="required" style="width: 300px;
                                margin-left: 56px;
                                border: none;
                                border-bottom: 1px solid black;
                                padding-left: 5px;
                                padding-right: 5px;

                                color: #000;
                                font-family: Caladea;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;">
                            </p>
                            <p class="findings" style=" display: flex;
                            flex-direction: row;
                            color: #000;
                            font-family: Caladea;
                            font-size: 13px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            margin-bottom: 15px;
                            align-items: center;">FINDINGS:
                                <span style=" width: 300px;
                                margin-left: 90px;

                                color: #000;
                                font-family: Caladea;
                                font-size: 13px;
                                font-style: normal;
                                font-weight: 700;
                                line-height: normal;
                                margin-top: 12px;">NO CRIMINAL, CIVIL OR ADMINISTRATIVE COMPLAINT/S AS OF THIS DATE
                                    ISSUE</span>
                            </p>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" width="475" height="4" viewbox="0 0 475 4" fill="none">
                            <path d="M0 2.5L475 2.48485" stroke="black" stroke-width="3" stroke-dasharray="10 10" />
                        </svg>

                        <div class="signature-cont" style="  display: flex;
                        flex-direction: row;
                        justify-content: flex-end;

                        color: #000;
                        font-family: Caladea;
                        font-size: 13px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        margin-top: 12px;">
                            <p class="signature" style="display: flex;
                            flex-direction: column;
                            justify-content: center;
                            align-items: center;
                            margin-top: 75px;
                            margin-right: 30px;">____________________________
                                <span>Signature</span>
                            </p>
                            <p class="thumb-mark" style="border-radius: 10px;
                            border: 1px solid black;
                            width: 120px;
                            height: 90px;
                            margin-right: 40px;">
                                <span style="display: flex;
                                flex-direction: column;
                                justify-content: center;
                                align-items: center;
                                margin-top: 90px;">Right Thumb Mark</span>
                            </p>
                        </div>

                        <p class="from" style="display: flex;
                        justify-content: flex-end;
                        margin-right: 130px;
                        color: #000;
                        font-family: Caladea;
                        font-size: 13px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;
                        margin-top: 70px;">Certified by:</p>

                        <p class="b-captain" style="display: flex;
                        flex-direction: column;
                        align-items: center;
                        margin-left: 220px;
                        margin-top: 30px;">
                            <span style="color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;  ">MERCADO P. HAYAG</span>Punong Barangay
                        </p>

                        <p class="validity" style="width: 210px;
                        margin-top: 30px;

                        color: #000;
                        font-family: Caladea;
                        font-size: 13px;
                        font-style: italic;
                        font-weight: 400;
                        line-height: 30px;">(2 Months Validity after Date of Issue) Not Valid Without Official Dry Seal
                        </p>

                        <div class="watermark-cont-brgyClearance" style="position: relative;
                        margin-top: -680px;
                        margin-left: 20px;">
                            <img src="../image/watermarklogo.png" alt="" style=" position: absolute;
                            top: 0;
                            left: 0;
                            pointer-events: none;">
                        </div>

                    </div>
                </div>

            </form>
        </div>
    </div>

     <!-- EDIT MODAL -->
     <div class="modal-editBrgyClearance">
        <form class="formBrgyClearance" action="../model/edit_certificates/edit_brgyClearance.php" method="post">
            <div class="title-cont-modal">
                <p>Resident Information</p>
                <img src="../icons/close 1.png" class="closeForm1" alt="">
            </div>

            <div class="modal-layer-brgyClearance">
                <div class="input-brgy-clearance">
                    <label for="applicantName">Applicant:</label>
                    <div class="label111">
                        <input type="text" name="applicant_fname" id="applicant_fname1" placeholder="First Name">
                        <input type="text" name="applicant_mname" id="applicant_mname1" placeholder="Middle Name">
                        <input type="text" name="applicant_lname" id="applicant_lname1" placeholder="Last Name">
                        <input type="text" name="applicant_suffix" id="applicant_suffix1" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-brgy-clearance">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" id="house_no1" placeholder="Houseno.">
                        <input type="text" name="street" id="street1" placeholder="Street name">
                        <input type="text" name="subdivision" id="subdivision1" placeholder="Subdivision name">
                    </div>
                </div>
                <div class="input-brgy-clearance">
                    <label for="birth_date">Birth Date:</label>
                    <input type="date" name="dob" id="birth_date1">
                </div>
                <div class="input-brgy-clearance">
                    <label for="place_of_birth">Place of Birth:</label>
                    <input type="text" name="pob" id="place_of_birth1">
                </div>
                <div class="input-brgy-clearance">
                    <label for="purpose">Purpose:</label>
                    <input type="text" name="purpose" id="purpose1" name="purpose">
                </div>

            </div>
            <input type="hidden" name="id" id="brgyClearance_id">
            <input type="hidden" name="status" id="status">
            <input type="hidden" name="seen" id="seen">
            <input type="submit" id="submit" value="Save">
        </form>
    </div>

    <script src="../js//jQuery-3.7.0.js"></script>
    <script src="../js//app.js"></script>

    <script>
    function printDiv(divName) {
        var printContents = document
            .getElementById(divName)
            .innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;

    }
    </script>
</body>

</html>

<script>
    const editLink = document.getElementById('edit');
    const modaleditLink = document.querySelector('.modal-editBrgyClearance');
    const closeForm = document.querySelector('.closeForm1');

    editLink.addEventListener('click', function(event) {
        event.preventDefault();
        modaleditLink.style.display = 'block';
    });

    closeForm.addEventListener('click', function() {
        modaleditLink.style.display = 'none';
    });
</script>