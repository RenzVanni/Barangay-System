<!-- <div class="myProfile"> -->
    <main>
        <div class="section1">
            <div class="icon1">
                <img src="./assets/default-profile.svg" alt="">
            </div>
            <div class="icon2">
                <img src="./assets//lock-icon.svg" alt="">
            </div>
        </div>
        <div class="section2">
            <h1>Profile</h1>
            <div class="close-profile">
                <img src="./assets/close-login.svg" alt="close-icon">
            </div>
            <form action="">
                <div class="form1">
                    <label for="">Username:</label>
                    <input type="text" readonly name="" id="" value="<?= $_SESSION['username'] ?>">

                    <label for="">Name:</label>
                    <input type="text" readonly name="" id="" value="<?= $_SESSION['firstname']." ".$_SESSION['middlename']." ".$_SESSION['lastname'] ?>">

                    <label for="">Address:</label>
                    <input type="text" readonly name="" id="" value="<?= $_SESSION['house_no']." ".$_SESSION['street']." ".$_SESSION['subdivision'] ?>">

                    <label for="">Email:</label>
                    <input type="text" readonly name="" id="" value="<?= $_SESSION['email'] ?>">

                    <label for="">Contact:</label>
                    <input type="text" readonly name="" id="" value="<?= $_SESSION['contact_no'] ?>">
                </div>
                <div class="form2">

                <div class="profile-img">
                    <img src="./assets/default-profile.svg" alt="default-profile-icon">
                </div>
                    <label for="yourImage">
                        <img src="./assets/camera-icon.svg" alt="camera-icon">
                    </label>
                    <input type="file" name="" id="yourImage">
                </div>
            </form>
        </div>
        <div class="section3">
            <div class="key-img">
                <img src="./assets/key-icon.svg" alt="key-icon">
            </div>
        </div>
    </main>
<!-- </div> -->