<div class="active-service" id="active-service">
    <form class="active-form" action="./frontendModel/request_brgyId.php" method="post" enctype="multipart/form-data">
        <div class="main-form">
            <div class="active-service-close"><img src="./assets/close-login.svg" alt=""></div>
            <h2>Barangay ID</h2>
            <div class="container requestor">
                <label for="requestor">Applicant</label>
                <!-- <input class="requestorName" type="text" name="applicant_fname" id=""
                    placeholder="Enter applicant firstname"> 
                <input class="applicantName" type="text" name="applicant_mname" id=""
                    placeholder="Enter applicant middlename">
                <input class="applicantName" type="text" name="applicant_lname" id=""
                    placeholder="Enter applicant lastname">
                <input class="applicantName" type="text" name="applicant_suffix" id=""
                    placeholder="Enter applicant suffix"> -->
                <select name="applicant_fname" id="">
                    <option disabled selected>Firstname</option>
                    <?php foreach($residentData as $row): ?>
                        <option value="<?= $row['firstname'] ?>"><?= $row['firstname'] ?></option>
                    <?php endforeach ?>
                </select>
                <select name="applicant_mname" id="">
                    <option disabled selected>Middlename</option>
                    <?php foreach($residentData as $row): ?>
                        <option value="<?= $row['middlename'] ?>"><?= $row['middlename'] ?></option>
                    <?php endforeach ?>
                </select>
                <select name="applicant_lname" id="">
                    <option disabled selected>Lastname</option>
                    <?php foreach($residentData as $row): ?>
                        <option value="<?= $row['lastname'] ?>"><?= $row['lastname'] ?></option>
                    <?php endforeach ?>
                </select>
                <select name="applicant_suffix" id="">
                    <option disabled selected>Suffix</option>
                    <?php foreach($residentData as $row): ?>
                        <option value="<?= $row['suffix'] ?>"><?= $row['suffix'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="container">
                <label for="contact-number">Contact Number</label>
                <input required type="number" minlength="11" name="contactNo" id="contact-number" placeholder="Enter Contact Number" />

                <div class="idImage-container">
                    <input type="file" name="image" id="idImage" onchange="displayImage()">
                    <div id="previewImage" class="previewImage"></div>
                </div>
            </div>
            <div class="container">
                <label for="for">For</label>
                <select name="documentFor" id="for" class="for">
                    <option value="self">For self</option>
                    <option value="Someone">For someone else</option>
                </select>
            </div>
            <input type="hidden" name="requestor_fname" value="<?php echo $_SESSION['firstname']?>">
            <input type="hidden" name="requestor_mname" value="<?php echo $_SESSION['middlename']?>">
            <input type="hidden" name="requestor_lname" value="<?php echo $_SESSION['lastname']?>">
            <input type="hidden" name="requestor_suffix" value="<?php echo $_SESSION['suffix']?>">
            <input type="hidden" name="requestor_houseNo" value="<?php echo $_SESSION['house_no'] ?>" id="">
            <input type="hidden" name="requestor_street" value="<?php echo $_SESSION['street'] ?>" id="">
            <input type="hidden" name="requestor_subdivision" value="<?php echo $_SESSION['subdivision'] ?>" id="">
            <input type="hidden" name="requestor_dob" value="<?php echo $_SESSION['date_of_birth'] ?>" id="">
            <input type="hidden" name="requestor_pob" value="<?php echo $_SESSION['place_of_birth'] ?>" id="">
            <input type="hidden" name="requestor_civilStatus" value="<?php echo $_SESSION['civil'] ?>">
            <button type="button" class="fake-btn">Request</button>
        </div>
        <div class="confirmation">
            <div class="main-container">
                <div class="reminder-container">
                    <h3>Reminder!</h3>
                    <p>Dear residents, kindly be reminded that in order to claim your documents, please proceed to the
                        barangay office. Be prepared for a short interview regarding the purpose of your request and
                        ensure that you have the necessary payment ready for processing your requested documents. Thank
                        you for your cooperation.</p>
                </div>
                <div class="buttons">
                    <button type="submit" class="active-service-request">Request</button>
                    <button type="button" class="cancel-request">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</div>


<div class="active-service" id="active-service">
    <form class="active-form" action="./frontendModel/request_brgyClearance.php" method="post">
        <div class="main-form">
            <div class="active-service-close"><img src="./assets/close-login.svg" alt=""></div>
            <h2>Barangay Clearance</h2>
            <input type="hidden" name="applicant_fname" value="<?php echo $_SESSION['firstname']?>">
            <input type="hidden" name="applicant_mname" value="<?php echo $_SESSION['middlename']?>">
            <input type="hidden" name="applicant_lname" value="<?php echo $_SESSION['lastname']?>">
            <input type="hidden" name="requestor_suffix" value="<?php echo $_SESSION['suffix']?>">
            <input type="hidden" name="applicant_houseNo" value="<?php echo $_SESSION['house_no'] ?>" id="">
            <input type="hidden" name="applicant_street" value="<?php echo $_SESSION['street'] ?>" id="">
            <input type="hidden" name="applicant_subdivision" value="<?php echo $_SESSION['subdivision'] ?>" id="">
            <input type="hidden" name="applicant_pob" value="<?php echo $_SESSION['place_of_birth'] ?>" id="">
            <input type="hidden" name="applicant_dob" value="<?php echo $_SESSION['date_of_birth'] ?>" id="">
            <button type="button" class="fake-btn">Request</button>
        </div>
        <div class="confirmation">
            <div class="main-container">
                <div class="reminder-container">
                    <h3>Reminder!</h3>
                    <p>Dear residents, kindly be reminded that in order to claim your documents, please proceed to the
                        barangay office. Be prepared for a short interview regarding the purpose of your request and
                        ensure that you have the necessary payment ready for processing your requested documents. Thank
                        you for your cooperation.</p>
                </div>
                <div class="buttons">
                    <button type="submit" class="active-service-request">Request</button>
                    <button type="button" class="cancel-request">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="active-service" id="active-service">
    <form class="active-form" action="./frontendModel/request_endoresement.php" method="POST">
        <div class="main-form">
            <div class="active-service-close"><img src="./assets/close-login.svg" alt=""></div>
            <h2>Endorsement</h2>
            <div class="container requestor">
                <label for="requestor">Requestor</label>
                <!-- <input class="requestorName" type="text" name="requestor_fname" id=""
                    placeholder="Enter requestor firstname">
                <input class="requestorName" type="text" name="requestor_mname" id=""
                    placeholder="Enter requestor middlename">
                <input class="requestorName" type="text" name="requestor_lname" id=""
                    placeholder="Enter requestor lastname">
                <input class="requestorName" type="text" name="requestor_suffix" id=""
                    placeholder="Enter requestor suffix"> -->
                <select name="requestor_fname" id="">
                    <option disabled selected>Firstname</option>
                    <?php foreach($residentData as $row): ?>
                        <option value="<?= $row['firstname'] ?>"><?= $row['firstname'] ?></option>
                    <?php endforeach ?>
                </select>
                <select name="requestor_mname" id="">
                    <option disabled selected>Middlename</option>
                    <?php foreach($residentData as $row): ?>
                        <option value="<?= $row['middlename'] ?>"><?= $row['middlename'] ?></option>
                    <?php endforeach ?>
                </select>
                <select name="requestor_lname" id="">
                    <option disabled selected>Lastname</option>
                    <?php foreach($residentData as $row): ?>
                        <option value="<?= $row['lastname'] ?>"><?= $row['lastname'] ?></option>
                    <?php endforeach ?>
                </select>
                <select name="requestor_suffix" id="">
                    <option disabled selected>Suffix</option>
                    <?php foreach($residentData as $row): ?>
                        <option value="<?= $row['suffix'] ?>"><?= $row['suffix'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="container">
                <label for="for">For</label>
                <select name="documentFor" id="for" class="for">
                    <option value="Self">For self</option>
                    <option value="Someone">For someone else</option>
                </select>
            </div>

            <input type="hidden" name="applicant_fname" value="<?php echo $_SESSION['firstname']?>">
            <input type="hidden" name="applicant_mname" value="<?php echo $_SESSION['middlename']?>">
            <input type="hidden" name="applicant_lname" value="<?php echo $_SESSION['lastname']?>">
            <input type="hidden" name="requestor_suffix" value="<?php echo $_SESSION['suffix']?>">
            <input type="hidden" name="applicant_houseNo" value="<?php echo $_SESSION['house_no'] ?>" id="">
            <input type="hidden" name="applicant_street" value="<?php echo $_SESSION['street'] ?>" id="">
            <input type="hidden" name="applicant_subdivision" value="<?php echo $_SESSION['subdivision'] ?>" id="">

            <button type="button" class="fake-btn">Request</button>
        </div>
        <div class="confirmation">
            <div class="main-container">
                <div class="reminder-container">
                    <h3>Reminder!</h3>
                    <p>Dear residents, kindly be reminded that in order to claim your documents, please proceed to the
                        barangay office. Be prepared for a short interview regarding the purpose of your request and
                        ensure that you have the necessary payment ready for processing your requested documents. Thank
                        you for your cooperation.</p>
                </div>
                <div class="buttons">
                    <button type="submit" class="active-service-request">Request</button>
                    <button type="button" class="cancel-request">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="active-service" id="active-service">
    <form class="active-form" action="./frontendModel/request_certOfIndigency.php" method="POST">
        <div class="main-form">
            <div class="active-service-close"><img src="./assets/close-login.svg" alt=""></div>
            <h2>Certificate of Indigency</h2>
            <div class="container requestor">
                <label for="requestor">Requestor</label>
                <!-- <input class="requestorName" type="text" name="requestor_fname" id="requestor"
                    placeholder="Enter requestor firstname">
                <input class="requestorName" type="text" name="requestor_mname" id="requestor"
                    placeholder="Enter requestor middlename">
                <input class="requestorName" type="text" name="requestor_lname" id="requestor"
                    placeholder="Enter requestor lastname">
                <input class="requestorName" type="text" name="requestor_suffix" id=""
                    placeholder="Enter requestor suffix"> -->
                <select name="requestor_fname" id="">
                    <option disabled selected>Firstname</option>
                    <?php foreach($residentData as $row): ?>
                        <option value="<?= $row['firstname'] ?>"><?= $row['firstname'] ?></option>
                    <?php endforeach ?>
                </select>
                <select name="requestor_mname" id="">
                    <option disabled selected>Middlename</option>
                    <?php foreach($residentData as $row): ?>
                        <option value="<?= $row['middlename'] ?>"><?= $row['middlename'] ?></option>
                    <?php endforeach ?>
                </select>
                <select name="requestor_lname" id="">
                    <option disabled selected>Lastname</option>
                    <?php foreach($residentData as $row): ?>
                        <option value="<?= $row['lastname'] ?>"><?= $row['lastname'] ?></option>
                    <?php endforeach ?>
                </select>
                <select name="requestor_suffix" id="">
                    <option disabled selected>Suffix</option>
                    <?php foreach($residentData as $row): ?>
                        <option value="<?= $row['suffix'] ?>"><?= $row['suffix'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="container">
                <label for="for">For</label>
                <select name="documentFor" id="For" class="for">
                    <option value="Self">For self</option>
                    <option value="Someone">For someone else</option>
                </select>
            </div>

            <input type="hidden" name="applicant_fname" value="<?php echo $_SESSION['firstname']?>">
            <input type="hidden" name="applicant_mname" value="<?php echo $_SESSION['middlename']?>">
            <input type="hidden" name="applicant_lname" value="<?php echo $_SESSION['lastname']?>">
            <input type="hidden" name="requestor_suffix" value="<?php echo $_SESSION['suffix']?>">
            <input type="hidden" name="applicant_houseNo" value="<?php echo $_SESSION['house_no'] ?>" id="">
            <input type="hidden" name="applicant_street" value="<?php echo $_SESSION['street'] ?>" id="">
            <input type="hidden" name="applicant_subdivision" value="<?php echo $_SESSION['subdivision'] ?>" id="">


            <button type="button" class="fake-btn">Request</button>
        </div>
        <div class="confirmation">
            <div class="main-container">
                <div class="reminder-container">
                    <h3>Reminder!</h3>
                    <p>Dear residents, kindly be reminded that in order to claim your documents, please proceed to the
                        barangay office. Be prepared for a short interview regarding the purpose of your request and
                        ensure that you have the necessary payment ready for processing your requested documents. Thank
                        you for your cooperation.</p>
                </div>
                <div class="buttons">
                    <button type="submit" class="active-service-request">Request</button>
                    <button type="button" class="cancel-request">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</div>


<div class="active-service" id="active-service">
    <form class="active-form" action="./frontendModel/request_certOfLBR.php" method="post">
        <div class="main-form">
            <div class="active-service-close"><img src="./assets/close-login.svg" alt=""></div>
            <h2>Certificate of Late Birth Registration</h2>
            <div class="container">
                <label for="ffname">Father's Firstname</label>
                <input required type="text" name="ffname" id="ffname" placeholder="Enter Father's Firstname" />
            </div>
            <div class="container">
                <label for="fmname">Father's Middlename</label>
                <input required type="text" name="fmname" id="fmname" placeholder="Enter Father's Middlename" />
            </div>
            <div class="container">
                <label for="flname">Father's Lastname</label>
                <input required type="text" name="flname" id="flname" placeholder="Enter Father's Lastname" />
            </div>
             <div class="container">
                <label for="fsuffix">Father's Suffix</label>
                <input required type="text" name="fsuffix" id="fsuffix" placeholder="Enter Father's Suffix" />
            </div>
            <div class="container">
                <label for="mfname">Mother's Firstname</label>
                <input required type="text" name="mfname" id="mfname" placeholder="Enter Mother's Firstname" />
            </div>
            <div class="container">
                <label for="mmname">Mohert's Middlename</label>
                <input required type="text" name="mmname" id="mmname" placeholder="Enter Mother's Middlename" />
            </div>
            <div class="container">
                <label for="mlname">Mother's Lastname</label>
                <input required type="text" name="mlname" id="mlname" placeholder="Enter Mother's Lastname" />
            </div>
            <div class="container">
                <label for="msuffix">Mother's Suffix</label>
                <input required type="text" name="msuffix" id="msuffix" placeholder="Enter Mother's Suffix" />
            </div>
            <div class="container">
                <label for="for">For</label>
                <select name="documentFor" id="For" class="for">
                    <option value="Self">For self</option>
                    <option value="Someone">For someone else</option>
                </select>
            </div>
            <input type="hidden" name="applicant_fname" value="<?php echo $_SESSION['firstname']?>">
            <input type="hidden" name="applicant_mname" value="<?php echo $_SESSION['middlename']?>">
            <input type="hidden" name="applicant_lname" value="<?php echo $_SESSION['lastname']?>">
            <input type="hidden" name="applicant_suffix" value="<?php echo $_SESSION['suffix']?>">
            <input type="hidden" name="applicant_houseNo" value="<?php echo $_SESSION['house_no'] ?>" id="">
            <input type="hidden" name="applicant_street" value="<?php echo $_SESSION['street'] ?>" id="">
            <input type="hidden" name="applicant_subdivision" value="<?php echo $_SESSION['subdivision'] ?>" id="">
            <button type="button" class="fake-btn">Request</button>
        </div>
        <div class="confirmation">
            <div class="main-container">
                <div class="reminder-container">
                    <h3>Reminder!</h3>
                    <p>Dear residents, kindly be reminded that in order to claim your documents, please proceed to the
                        barangay office. Be prepared for a short interview regarding the purpose of your request and
                        ensure that you have the necessary payment ready for processing your requested documents. Thank
                        you for your cooperation.</p>
                </div>
                <div class="buttons">
                    <button type="submit" class="active-service-request">Request</button>
                    <button type="button" class="cancel-request">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="active-service" id="active-service">
    <form class="active-form" action="./frontendModel/request_businessClearance.php" method="post">
        <div class="main-form">
            <div class="active-service-close"><img src="./assets/close-login.svg" alt=""></div>
            <h2>Business Clearance</h2>
            <div class="container">
                <label for="business-name">Name of Business</label>
                <input required type="text" name="business_name" id="business-name" placeholder="Enter Business Name" />
            </div>
            <div class="container">
                <label for="business-owner-name">Business Owner Firstname</label>
                <input required type="text" value="<?= $_SESSION['firstname'] ?>" name="owner_fname" id="business-owner-fname"
                    placeholder="Enter Business Owner" />
            </div>
            <div class="container">
                <label for="business-owner-name">Business Owner Middlename</label>
                <input type="text" value="<?= $_SESSION['middlename'] ?>" name="owner_mname" id="business-owner-mname"
                    placeholder="Enter Business Owner" />
            </div>
            <div class="container">
                <label for="business-owner-name">Business Owner Lastname</label>
                <input required type="text" value="<?= $_SESSION['lastname'] ?>" name="owner_lname" id="business-owner-lname"
                    placeholder="Enter Business Owner" />
            </div>
            <div class="container">
                <label for="business-owner-suffix">Business Owner Suffix</label>
                <input type="text" value="<?= $_SESSION['suffix'] ?>" name="owner_suffix" id="business-owner-suffix"
                    placeholder="Enter Business Suffix" />
            </div>
            <div class="container">
                <label for="business-address">Address of Business</label>
                <input type="text" name="house_no" id="business-house_no"
                    placeholder="Enter House No..." />
                <input type="text" name="street" id="business-street"
                    placeholder="Enter Street..." />
                <input type="text" name="subdivision" id="business-subdivision"
                    placeholder="Enter House No..." />
            </div>
            <button type="button" class="fake-btn">Request</button>
        </div>
        <div class="confirmation">
            <div class="main-container">
                <div class="reminder-container">
                    <h3>Reminder!</h3>
                    <p>Dear residents, kindly be reminded that in order to claim your documents, please proceed to the
                        barangay office. Be prepared for a short interview regarding the purpose of your request and
                        ensure that you have the necessary payment ready for processing your requested documents. Thank
                        you for your cooperation.</p>
                </div>
                <div class="buttons">
                    <button type="submit" class="active-service-request">Request</button>
                    <button type="button" class="cancel-request">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</div>