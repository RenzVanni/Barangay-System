<?php include '../server/server.php' ?>
<?php
    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_businessclearance WHERE `id`='$id'";
    $result = $conn->query($query);
    $businessClearance = $result->fetch_assoc();

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Business Clearance</title>
    <link rel="stylesheet" href="../style/generateCert.css ">
    <script src="sidebar1.js "></script>
</head>

<body>
    <?php include '../model/fetch_brgy_role.php' ?>
    <?php include '../actives/active_restore.php' ?>
    <?php include '../actives/active_account.php' ?>
    <?php include 'sidebar1.php' ?>

    <div class="printing-container-businessClearance">
        <div class="title-cont">
            <p>Generate Business Clearance</p>
           
        </div>

        <a href="../businessClearance.php" class="backContainer">
            <img src="../iconsBackend/back.png" alt="">
            <p>Go Back</p>
        </a>

        <div class="print-title">
            <p>Business Clearance</p>
            <div class="left-title">
                <button type="submit" id="edit"
                onclick="editBusinessClearance(this)"
                data-id="<?= $businessClearance['id']?>"
                data-business_name="<?= $businessClearance['business_name']?>"
                data-business_owner_fname="<?= $businessClearance['business_owner_fname']?>"
                data-business_owner_mname="<?= $businessClearance['business_owner_mname']?>"
                data-business_owner_lname="<?= $businessClearance['business_owner_lname']?>"
                data-business_owner_suffix="<?= $businessClearance['business_owner_suffix']?>"
                data-house_no="<?= $businessClearance['house_no']?>"
                data-street="<?= $businessClearance['street']?>"
                data-subdivision="<?= $businessClearance['subdivision']?>"
                data-date_applied="<?= $businessClearance['date_applied']?>"
                data-documentFor="<?= $businessClearance['documentFor']?>"
                data-status="<?= $businessClearance['status']?>"
                data-status="<?= $businessClearance['status']?>"
                data-seen="<?= $businessClearance['seen']?>"
                >Edit</button>
                
                <a href="#" id="print" onclick="printDiv('printMe')">Print</a>
            </div>
        </div>

        <div class="form-container-businessClearance" id="printMe">
            <form action="#" class="paper" style="border:1px solid black">

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

                <div class="body-container" style=" display: flex;
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

                    <div class="right-cont-business" style="width: 70%;
                    padding: 10px;">
                        <div class="title" style="color: #000;
                        font-family: Caladea;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        text-decoration-line: underline;
            
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        margin-top: 10px;">BARANGAY BUSINESS CLEARANCE</div>

                        <div class="info" style="display: flex;
                        flex-direction: column;
                        margin-top: 40px;">
                            <p class="name" style="display: flex;
                            flex-direction: row;
                            color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            margin-bottom: 15px;
                            align-items: center;">BUSINESS NAME:
                                <input type="text" id="name" value="<?php echo $businessClearance['business_name']?>"
                                    required="required" style=" width: 300px;
                                margin-left: 50px;
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
                            <p class="address" style="display: flex;
                            flex-direction: row;
                            color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            margin-bottom: 15px;
                            align-items: center;">BUSINESS ADDRESS:
                                <input type="text" id="address"
                                    value="<?php echo $businessClearance['house_no']." ".$businessClearance['street']." ".$businessClearance['subdivision']?>" 
                                    required="required"
                                    style="width: 300px;
                                margin-left: 32px;
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
                            <p class="owner" style="display: flex;
                            flex-direction: row;
                            color: #000;
                            font-family: Caladea;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            margin-bottom: 15px;
                            align-items: center;">BUSINESS OWNER:
                                <input type="text" id="owner"
                                    value="<?php echo $businessClearance['business_owner_fname']. " ". $businessClearance['business_owner_mname']. " ". $businessClearance['business_owner_lname']?>"
                                    required="required" style=" width: 300px;
                                margin-left: 42px;
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
                        </div>

                        <p class="certify" style="text-indent: 50px;
                        color: #000;
                        font-family: Caladea;
                        font-size: 13px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        margin-top: 40px;">THE UNDERSIGNED INTERPOSES NO OBJECTION TO ISSUANCE OF THIS
                            BUSINESS PERMIT PROVIDED, HOWEVER THAT THE APPLICANT SHALL ABIDE ALL PERTINENT
                            CITY/BARANGAY ORDINANCES/RESOLUTIONS/EXECUTIVE ORDERS THAT MAY AFFECT HIS/HER
                            BUSINESS OPERATIONS AS WELL AS THE BARANGAY WHEREIN HIS/HER ESTABLISHMENT IS
                            LOCATED.</p>

                        <p class="given" style=" text-indent: 50px;
                        color: #000;
                        font-family: Caladea;
                        font-size: 14px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;
                        margin-top: 100px;">Given this _______day of _______,
                            <span id="year-now">2023</span>
                            at Barangay Hall Zone IV, City of Dasmariñas, Cavite.
                        </p>

                        <p class="from" style=" display: flex;
                        justify-content: flex-end;
                        margin-right: 130px;
                        color: #000;
                        font-family: Caladea;
                        font-size: 13px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;
                        margin-top: 70px;">Approved by:</p>

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

                        <div class="signature-cont" style=" display: flex;
                        flex-direction: row;
                        justify-content: flex-start;
                        margin-left: 10px;
            
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
                            margin-top: 65px;">____________________________
                                <span>Applicant’s Signature</span>
                            </p>
                        </div>

                        <p class="ending-p" style="color: #000;
                        font-family: Caladea;
                        font-size: 12px;
                        font-style: normal;
                        font-weight: 400;
                        line-height: normal;
                        margin-top: 50px;">This Clearance may be cancelled or revoked anytime should
                            public safety and interest so demand and upon the engagement in illegal
                            transactions.
                            <span id="year-span" style="color: #000;
                            font-family: Caladea;
                            font-size: 12px;
                            font-style: italic;
                            font-weight: 400;
                            line-height: normal;">(This permit shall be renewed on January
                                <script>
                                const yearSpan = document.getElementById("year-span");
                                const currentYear = new Date().getFullYear();
                                yearSpan.textContent = "(This permit shall be renewed on January " +
                                    currentYear;
                                </script>)
                            </span>
                        </p>

                        <p class="validity" style="width: 210px;
                        margin-top: 30px;
            
                        color: #000;
                        font-family: Caladea;
                        font-size: 13px;
                        font-style: italic;
                        font-weight: 700;
                        line-height: normal;">Not Valid Without Official Dry Seal</p>

                        <div class="watermark-cont-businessClearance" style=" position: relative;
                        margin-top: -680px;
                        margin-left: 20px;">
                            <img src="../image/watermarklogo.png" alt="" style="position: absolute;
                            top: 0;
                            left: 0;
                            pointer-events: none;">
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="modal-editClearance">
        <form class="formeditClearance" action="../model/edit_certificates/edit_businessClearance.php" method="post">
            <div class="title-cont-modal">
                <p>Resident Infomration</p>
                <img src="../iconsBackend/close 1.png" class="closeClearance" alt="">
            </div>

            <div class="modal-layer-b-clearance">
                <div class="input-b-clearance">
                    <label for="businessName">Business Name:</label>
                    <input type="text" name="business_name" id="businessName" placeholder="Business name">
                </div>
                <div class="input-b-clearance">
                    <label for="ownerName">Business Owner's Name:</label>
                    <div class="label111">
                        <input type="text" name="owner_fname" id="business_owner_fname" placeholder="First Name">
                        <input type="text" name="owner_mname" id="business_owner_mname" placeholder="Middle Name">
                        <input type="text" name="owner_lname" id="business_owner_lname" placeholder="Last Name">
                        <input type="text" name="owner_suffix" id="business_owner_suffix" placeholder="Suffix">
                    </div>
                </div>
                <div class="input-b-clearance">
                    <label for="address">Business Address:</label>
                    <div class="label111">
                        <input type="text" name="house_no" id="house_no" placeholder="Houseno.">
                        <input type="text" name="street" id="street" placeholder="Street name">
                        <input type="text" name="subdivision" id="subdivision" placeholder="Subdivision name">
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" id="business_id">
            <input type="hidden" name="documentFor" id="documentFor" value="Clearance">
            <input type="hidden" name="date_applied" id="date_applied">
            <input type="hidden" name="status" id="status">
            <input type="hidden" name="seen" id="seen">
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
const yearSpan = document.getElementById("year-now");

// Function to update year
function updateYear() {
    const currentYear = new Date().getFullYear();
    yearSpan.textContent = currentYear;
}

// Call the updateYear function every second to keep the year updated in real-time
setInterval(updateYear, 1000);

// Initial call to set the content immediately
updateYear();
</script>

<script>
    const editLink = document.getElementById('edit');
    const modaleditLink = document.querySelector('.modal-editClearance');
    const closeForm = document.querySelector('.closeClearance');

    editLink.addEventListener('click', function(event) {
        event.preventDefault();
        modaleditLink.style.display = 'block';
    });

    closeForm.addEventListener('click', function() {
        modaleditLink.style.display = 'none';
    });
</script>