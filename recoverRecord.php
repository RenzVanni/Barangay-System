<?php include './server/server.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECOVER INDIVIDUAL RECORD OF BARANGAY INHABITANT</title>
    <link rel="stylesheet" href="style3.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
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
            <p>RECOVER INDIVIDUAL RECORD OF BARANGAY INHABITANT</p>
           
        </div>
        <a href="archives/ArchiveResident.php" class="backContainer">
            <img src="iconsBackend/back.png" alt="">
            <p>Go Back To Archive Resident</p>
        </a>


        <form action="./model/add_individual.php" method="post" class="input-form" style="margin-top: 30px;">
            <div class="headerInfo">
                <p>Recover Individual Information</p>
            </div>
            <div class="bodyInfo">
                <div class="leftInfo">
                    <div class="inputFullname">
                        <div class="name-cont">
                            <p>First Name<span>*</span></p>
                            <input type="text" name="firstname" id="firstName"
                                oninput="this.value = this.value.toUpperCase()" placeholder="First Name" required>
                        </div>
                        <div class="name-cont">
                            <p>Middle Name<span></span></p>  
                            <input type="text" name="middlename" id="middleName"
                                oninput="this.value = this.value.toUpperCase()" placeholder="Middle Name">
                        </div>
                        <div class="name-cont">
                            <p>Last Name<span>*</span></p>
                            <input type="text" name="lastname" id="lastName"
                                oninput="this.value = this.value.toUpperCase()" placeholder="Last Name" required>
                        </div>
                        <div class="name-cont">
                            <p>Suffix <span></span></p>
                            <input type="text" name="suffix" class="suffix" id="ext"
                                oninput="this.value = this.value.toUpperCase()" placeholder="Suffix">
                        </div>
                    </div>
                    <div class="inputDob">
                        <p>Date of Birth<span>*</span></p>
                        <input type="date" name="dob" id="dateBirth" oninput="this.value = this.value.toUpperCase()"
                            required>
                    </div>
                    <div class="inputPob">
                        <p>Place of Birth<span>*</span></p>
                        <input type="text" name="pob" id="placeBirth" oninput="this.value = this.value.toUpperCase()"
                            required>
                    </div>
                    <div class="inputCitizenship">
                        <p>Citizenship<span>*</span></p>
                        <input type="text" name="citizenship" id="citizenship"
                            oninput="this.value = this.value.toUpperCase()" required>
                    </div>
                    <div class="inputPhoneNo">
                        <p>Contact Number</p>
                        <input type="number" name="contact-no" id="phoneNo" placeholder="e.g., 09123456789">
                    </div>
                    <div class="inputEmail">
                        <p>Email Address</p>
                        <input type="text" name="email" id="email" placeholder="Enter your email">
                    </div>
                </div>

                <div class="rightInfo">
                    <div class="inputAddress">
                        <p>Address<span>*</span></p>
                        <input type="text" name="house-no" class="houseNo" id="no"
                            oninput="this.value = this.value.toUpperCase()" placeholder="House No.">
                        <input type="text" name="street" id="streetName" oninput="this.value = this.value.toUpperCase()"
                            placeholder="Street Name" required>
                        <input type="text" name="subdivision" id="subdiName"
                            oninput="this.value = this.value.toUpperCase()" placeholder="Subdivision Name">
                    </div>

                    <div class="inputOccupation">
                        <p>Occupation <span>*</span></p>
                        <input type="text" name="occupation" id="occupation"
                            oninput="this.value = this.value.toUpperCase()">
                    </div>

                    <div class="inputSex">
                        <p>Sex <span>*</span></p>
                        <select id="sex" name="sex" class="sex111" required>
                            <option value=""></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                   
                    
                    
                    <div class="inputCivilStatus">
                        <p>Civil Status <span>*</span></p>
                        <select id="civilStatus" name="civil-status" class="civilStatus111" required>
                            <option value=""></option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                    </div>
                    

                    <div class="inputEducational">
                        <p>Educational Attainment<span>*</span></p>
                        <select id="civilStatus" name="civil-status" class="civilStatus111" required>
                            <option value=""></option>
                            <option value="Single">None</option>
                            <option value="Married">Elementary Eduaction</option>
                            <option value="Divorced">High School Education</option>
                            <option value="Widowed">College</option>
                            <option value="Widowed">Postgraduate Program</option>
                            <option value="Widowed">Non-Formal Eduaction</option>
                            <option value="Widowed">Vocational</option>
                        </select>
                    </div>

                    <div class="inputPwd">
                        <p>PWD  </p>
                        <input type="checkbox" name="pwd" id="pwd">
                    </div>

                    <div class="inputPwd">
                        <p>OSY  </p>
                        <input type="checkbox" name="osy" id="osy">
                    </div>

                    <div class="inputPwd">
                        <p>OSC  </p>
                        <input type="checkbox" name="osc" id="osc">
                    </div>

                    <div class="inputPwd">
                        <p>OFW  </p>
                        <input type="checkbox" name="ofw" id="ofw">
                    </div>
                   
                   
                </div>
            </div>
            <div class="footerInfo">
                <button type="submit" class="addSaTable">Recover</button>
            </div>
        </form>
        <div class="note"><span>*</span>Please verify if your address remains the same; if not, you can update it accordingly.</div>
    </div>
</body>

</html>