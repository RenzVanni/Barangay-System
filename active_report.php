<div class="active-report" id="active-report">
    <form class="active-report-form" action="" method="post">
        <div class="main-form">
            <div class="active-report-close"><img src="./assets/close-login.svg" alt=""></div>
            <h2>Blotter Report</h2>

            <p>Complainant Name:</p>
            <div class="complainant-container">
                <input type="text" name="complainant_fname" id="" placeholder="First Name">
                <input type="text" name="complainant_mname" id="" placeholder="Middle Name">
                <input type="text" name="complainant_lname" id="" placeholder="Last Name">
                <input type="text" name="complainant_suffix" id="" placeholder="Suffix">
            </div>

            <p>Respondent Name:</p>
            <div class="respondent-container">
                <input type="text" name="respondent_fname" id="" placeholder="First Name">
                <input type="text" name="respondent_mname" id="" placeholder="Middle Name">
                <input type="text" name="respondent_lname" id="" placeholder="Last Name">
                <input type="text" name="respondent_suffix" id="" placeholder="Suffix">
            </div>

            <p>Victim Name:</p>
            <div class="victim-container">
                <input type="text" name="victim_fname" id="" placeholder="First Name">
                <input type="text" name="victim_mname" id="" placeholder="Middle Name">
                <input type="text" name="victim_lname" id="" placeholder="Last Name">
                <input type="text" name="victim_suffix" id="" placeholder="Suffix">
            </div>

            <div class="others-container">
                <div class="location-container">
                    <label for="location">Location:</label>
                    <input type="text" name="location" id="" placeholder="Location">
                </div>
                <div class="time-container">
                    <label for="time">Time:</label>
                    <input type="time" name="time" id="">
                </div>
                <div class="date-container">
                    <label for="date">Date:</label>
                    <input type="date" name="date" id="">
                </div>
                <div class="blotter_type-container">
                    <label for="blotter_type">Type:</label>
                    <select name="blotter_type" id="blotter_type">
                        <option value="Amicable">Amicable</option>
                        <option value="Incident">Incident</option>
                    </select>
                </div>
            </div>

            <input type="hidden" name="sender_fname" value="<?php echo $_SESSION['firstname']?>">
            <input type="hidden" name="sender_mname" value="<?php echo $_SESSION['middlename']?>">
            <input type="hidden" name="sender_lname" value="<?php echo $_SESSION['lastname']?>">
            <input type="hidden" name="sender_houseNo" value="<?php echo $_SESSION['house_no'] ?>" id="">
            <input type="hidden" name="sender_street" value="<?php echo $_SESSION['street'] ?>" id="">
            <input type="hidden" name="sender_subdivision" value="<?php echo $_SESSION['subdivision'] ?>" id="">
            <input type="hidden" name="sender_pob" value="<?php echo $_SESSION['place_of_birth'] ?>" id="">
            <input type="hidden" name="sender_dob" value="<?php echo $_SESSION['date_of_birth'] ?>" id="">
            <button type="button" class="fake-btn">Submit</button>
        </div>
        <div class="confirmation">
            <div class="main-container">
                <h1>Are you sure?</h1>
                <div class="buttons">
                    <button type="submit" class="active-report-submit">Submit</button>
                    <button type="button" class="cancel-request">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="active-report" id="active-report">
    <form class="active-report-form" action="" method="post">
        <div class="main-form">
            <div class="active-report-close"><img src="./assets/close-login.svg" alt=""></div>
            <h2>Complain Report</h2>

            <input type="hidden" name="sender_fname" value="<?php echo $_SESSION['firstname']?>">
            <input type="hidden" name="sender_mname" value="<?php echo $_SESSION['middlename']?>">
            <input type="hidden" name="sender_lname" value="<?php echo $_SESSION['lastname']?>">
            <input type="hidden" name="sender_houseNo" value="<?php echo $_SESSION['house_no'] ?>" id="">
            <input type="hidden" name="sender_street" value="<?php echo $_SESSION['street'] ?>" id="">
            <input type="hidden" name="sender_subdivision" value="<?php echo $_SESSION['subdivision'] ?>" id="">
            <input type="hidden" name="sender_pob" value="<?php echo $_SESSION['place_of_birth'] ?>" id="">
            <input type="hidden" name="sender_dob" value="<?php echo $_SESSION['date_of_birth'] ?>" id="">
            <button type="button" class="fake-btn">Submit</button>
        </div>
        <div class="confirmation">
            <div class="main-container">
                <h1>Are you sure?</h1>
                <div class="buttons">
                    <button type="submit" class="active-report-submit">Submit</button>
                    <button type="button" class="cancel-request">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="active-report" id="active-report">
    <form class="active-report-form" action="" method="post">
        <div class="main-form">
            <div class="active-report-close"><img src="./assets/close-login.svg" alt=""></div>
            <h2>Awareness Report</h2>

            <input type="hidden" name="sender_fname" value="<?php echo $_SESSION['firstname']?>">
            <input type="hidden" name="sender_mname" value="<?php echo $_SESSION['middlename']?>">
            <input type="hidden" name="sender_lname" value="<?php echo $_SESSION['lastname']?>">
            <input type="hidden" name="sender_houseNo" value="<?php echo $_SESSION['house_no'] ?>" id="">
            <input type="hidden" name="sender_street" value="<?php echo $_SESSION['street'] ?>" id="">
            <input type="hidden" name="sender_subdivision" value="<?php echo $_SESSION['subdivision'] ?>" id="">
            <input type="hidden" name="sender_pob" value="<?php echo $_SESSION['place_of_birth'] ?>" id="">
            <input type="hidden" name="sender_dob" value="<?php echo $_SESSION['date_of_birth'] ?>" id="">
            <button type="button" class="fake-btn">Submit</button>
        </div>
        <div class="confirmation">
            <div class="main-container">
                <h1>Are you sure?</h1>
                <div class="buttons">
                    <button type="submit" class="active-report-submit">Submit</button>
                    <button type="button" class="cancel-request">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</div>