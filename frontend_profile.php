<!-- <div class="myProfile"> -->
    <main>
        <div class="section1">
            <div class="icon1 frontendProfile-icon1">
                <img src="./assets/default-profile.svg" alt="">
            </div>
            <div class="icon2 frontendProfile-icon2">
                <img src="./assets/lock-icon.svg" alt="">
            </div>
        </div>
        <div class="section2 profile-section2">
            <h1>Profile</h1>
            <div class="close-profile">
                <img src="./assets/close-login.svg" alt="close-icon">
            </div>
            <form action="./frontendModel/profile/update_profile.php" method="post" enctype="multipart/form-data">
                <div class="form1">
                    <label for="">Username:</label>
                    <input type="text" readonly name="" id="" value="<?= $_SESSION['username'] ?>">

                    <label for="">Name:</label>
                    <input type="text" readonly name="" id="" value="<?= $_SESSION['firstname']." ".$_SESSION['middlename']." ".$_SESSION['lastname'] ?>">

                    <label for="">Address:</label>
                    <input type="text" readonly name="" id="" value="<?= $_SESSION['house_no']." ".$_SESSION['street']." ".$_SESSION['subdivision'] ?>">

                    <label for="">Email:</label>
                    <input type="text" readonly name="" id="" value="<?= $_SESSION['profile_img'] ?>">

                    <label for="">Contact:</label>
                    <input type="text" readonly name="" id="" value="<?= $_SESSION['contact_no'] ?>">
                </div>
                <div class="form2">

                <div class="profile-img" id="profile-preview">
                    <!-- <img src="./assets/default-profile.svg" alt="default-profile-icon"> -->
                        <?php if(isset($_SESSION['profile_img'])) { ?>
                            <img src="./uploads/profile/<?= $_SESSION['profile_img'] ?>" alt="Profile-img">
                        <?php } else { ?> 
                            <img src="./assets/default-profile.svg" alt="default-profile">
                        <?php } ?>
                </div>
                    <label for="yourImage">
                            <img src="./assets/camera-icon.svg" alt="camera-icon">
                    </label>
                    <input type="file" name="profile_img" id="yourImage" onchange="updateProfileImg()" required>
                    <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                    <button type="submit" name="submit">Save</button>
                </div>
            </form>
        </div>
        <div class="section3 profile-section3">
            <div class="close-profile">
                <img src="./assets/close-login.svg" alt="close-icon">
            </div>
            <div class="key-img">
                <img src="./assets/key-icon.svg" alt="key-icon">
            </div>
            <h1>Change Password</h1>
            <p>Must be at least 8 characters.</p>
            <form action="./frontendModel/user_change_password.php" method="post">
                <input type="password" name="old_password" id="" placeholder="Old Password...">
                <input type="password" minlength="8" name="new_password" id="" placeholder="New Password...">
                <input type="password" minlength="8" name="confirm_password" id="" placeholder="Confirm Password...">
                <button type="submit">Continue</button>
            </form>
        </div>
    </main>
<!-- </div> -->