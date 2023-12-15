<div class="awareness-page" id="frontendAwareness">
    <div class="section-1">
        <h1>Awareness</h1>
        <p>Maligayang pagdating sa aming Resident Awareness Module! Ito ay isang mahusay at bago tool na makakatulong sa pagpabuti ng ating Barangay. Dito, madali mong maireport ang anumang problema o alalahanin mo, at siguradong maririnig ang iyong boses. <br><br>
           Hindi lang ito simpleng tool, kundi isang paraan din para tayo ay magtulungan at magkaruon ng positibong pagbabago sa ating komunidad. Sa tulong mo, mas magiging matibay at magkakaisa ang ating Barangay, kung saan lahat ay ligtas at mahalaga. Bawat ulat mo ay mahalaga at makakatulong sa atin na malaman ang mga lugar na kailangan ng atensyon at pagpapabuti.
           <br><br>Kung may makikita kang butas sa kalsada, sirang ilaw, o anuman, gamitin mo ang Resident Awareness Module para makatulong sa pagpabuti ng ating komunidad. Wag mag-atubiling mag-contribute para gawing mas maganda ang Barangay para sa lahat!
           
    </div>

    <div class="section-2">
        <form action="./frontendModel/send_awareness.php" method="POST">
            <label for="">Name:</label>
            <?php if(isset($_SESSION['username'])) { ?>
            <div class="name">
                <input type="text" value="<?= $_SESSION['firstname'] ?>" name="firstname" id="" placeholder="Firstname..." required>
                <input type="text" value="<?= $_SESSION['middlename'] ?>" name="middlename" id="" placeholder="Middlename...">
                <input type="text" value="<?= $_SESSION['lastname'] ?>" name="lastname" id="" placeholder="Lastname..." required>
                <input type="text" value="<?= $_SESSION['suffix'] ?>" name="suffix" id="suffix" placeholder="Suffix...">
            </div>
            <?php } else { ?>
                <div class="name">
                    <input type="text" name="firstname" id="" placeholder="Firstname..." required>
                    <input type="text" name="middlename" id="" placeholder="Middlename...">
                    <input type="text" name="lastname" id="" placeholder="Lastname..." required>
                    <input type="text" name="suffix" id="suffix" placeholder="Suffix...">
                </div>
            <?php } ?>


            <label for="">Details:</label>
            <textarea name="details" id="" placeholder="Details..." required></textarea>
            <?php if(isset($_SESSION['username'])) {?>
                <button type="button" class="awarenessBtn">Submit</button>
            <?php } else { ?>
                <button type="button" class="fakeAwarenessBtn"><a href="./login_page.php">Submit</a></button>
            <?php } ?>

            <?php if(isset($_SESSION['username'])) { ?>
            <input type="hidden" value="<?= $_SESSION['house_no'] ?>" name="house_no" id="" placeholder="House no...">
            <input type="hidden" value="<?= $_SESSION['street'] ?>" name="street" id="" placeholder="Street...">
            <input type="hidden" value="<?= $_SESSION['subdivision'] ?>" name="subdivision" id="" placeholder="Subdivision...">
            <?php } ?>

            <div class="confirmAwareness">
                <div class="main-awarenessConfirmation">
                    <h1>Are you sure?</h1>
                    <div class="btns">
                        <button class="cancelAwareness">Cancel</button>
                        <button type="submit" class="proceed">OK</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>